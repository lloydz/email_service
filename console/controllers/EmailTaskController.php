<?php
namespace console\controllers;

use Yii;
use frontend\models\TaskResult;
use yii\console\Controller;
use frontend\models\EmailTask;
use frontend\tools\ExcelTool;
use frontend\models\TaskTemplate;
use frontend\models\TaskTransport;
use yii\base\Exception;

class EmailTaskController extends Controller{
    
    private $_commandPath = '';
    private $_command = 'php yii email-task/start';
    
    function actionIndex() {
        //执行命令的路径
        $this->_commandPath = Yii::$app->vendorPath . DIRECTORY_SEPARATOR . '..';
        $changeDir = 'cd ' . $this->_commandPath;
    
        // $console = new Console();
        
        //准备启动服务
        Yii::info('Start!');

        //循环执行应用程序
        while (1) {
            echo 'Will restart app' . PHP_EOL;
            //进入目录
            system($changeDir);
            //执行应用程序，应用程序是死循环
            system($this->_command);
            //等待10秒重启应用程序
            sleep(10);
        }
    }
    
    public function actionStart() {
        date_default_timezone_set('Asia/Shanghai');
        //准备启动服务
        echo '***********************' . PHP_EOL;
        
        // 获取一条待执行的邮件任务
        $taskModel = new EmailTask();
        $task = $taskModel->pickATask();
        if(empty($task)) {
			echo 'No Email Task To Do' . PHP_EOL;
            return true;
        }
        $taskId = $task['id'];
        
        // 获取任务对应的Excel文件
        $excelFileName = iconv('UTF-8', 'gbk', $task['excel_file']);
        // $excelFile = '/home/uploads/email_tasks/' . $task['file_path'] . '/' . $excelFileName;
        $excelFile = '\\\\192.168.100.18\uploads\files\email_tasks\\' . $task['file_path'] . '/' . $excelFileName;
        if(!file_exists($excelFile)) {
            echo 'Excel file:('.$excelFile.') doesnot exist' . PHP_EOL;
            Yii::error('Excel file:('.$excelFile.') doesnot exist');
            $taskModel->UpdateTaskById($taskId, [
                'status' => 0
            ]);
            return false;
        }
        
        // 读取Excel文件
        $fileType = '';
        if(function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
        }
        if(isset($finfo)) {
            $fileType = finfo_file($finfo, $excelFile);
        }
        $excel = new ExcelTool(ExcelTool::READ, $excelFile, $fileType);
        $excelData = $excel->readExcel($excelFile);
        
        $emailCount = count($excelData) - 1;
        $taskModel->UpdateTaskById($taskId, [
            'total_emails' => count($excelData) - 1
        ]);
        
        $this->_sendEmails($taskId, $excelData);

        $taskModel->UpdateTaskById($taskId, [
            'status' => 4
        ]);
    }
    
    private function _sendEmails($taskId, $excelData) {
        //
        $task = (new EmailTask())->findOne($taskId);
        
        // 获取transport
        $transport = (new TaskTransport())->findOne([
            'task_id' => $taskId
        ]);
        if(empty($transport)) {
            echo 'no transport' . PHP_EOL;
            Yii::error('no transport');
            $task['status'] = 0;
            $task->save();
            return false;
        }
        
        // 设置transport
        \Yii::$app->mailer->setTransport([
            'class' => 'Swift_SmtpTransport',
            'host' => $transport['smtp'],
            'username' => $transport['sender_email'],
            'password' => base64_decode($transport['sender_email_password']),
            'port' => $transport['port'],
            'encryption' => $transport['encryption'],
        ]);
        // 获取邮件任务模板
        $template = (new TaskTemplate())->findOne([
            'task_id' => $taskId
        ]);
        if(empty($template)) {
            echo 'no template' . PHP_EOL;
            Yii::error('no template');
            $task['status'] = 0;
            $task->save();
            return false;
        }

        $attachments = [];
        if($template['attachment_type'] != 0) {
            // $attachmentDir = '/home/uploads/email_tasks/' . $task['file_path'] . '/attachments/';
            $attachmentDir = '\\\\192.168.100.18\uploads\files\email_tasks\\' . $task['file_path'] . '/attachments/';
            foreach(scandir($attachmentDir) as $file) {
                if($file == '.' || $file == '..') {
                    continue;
                }
                if(is_file($attachmentDir . $file)) {
                    $attachments[] =  $file;
                }
            }
        }
        
        $titleList = $excelData[0];
        unset($excelData[0]);
        
        // 循环发送邮件
        $sentEmails = 0;
        foreach ($excelData as $line => $data) {
            if($line < $task['start_line'] + 1) {
                continue;
            }
            
            // 发件箱通常会针对每个请求有发送邮件数的限制
            if($sentEmails >= 10) {
                die;
            }

            if(!empty($data[0])) {
                $sentEmails ++;
                
                $from = $transport['sender_email'];
                $to = strval($data[$template['to_excel_col'] - 1]);
                $subject = $this->_handleTemplateStr($template['subject'], $data, $titleList);
                $htmlBody = $this->_handleTemplateStr($template['body'], $data, $titleList);
                // $htmlBody .= '<img src="http://ets.ineln.com/email/read?task_id='.$taskId.'&to='.$to.'" width="1px" height="1px"/>';
                $htmlBody .= '<img src="http://dev.ets.integle.com/email/read?task_id='.$taskId.'&to='.$to.'" width="1px" height="1px"/>';
                $emailAttachments = [];
                
                try {
                    $resultMsg = '';
                    $mail = \Yii::$app->mailer->compose();
                    $mail->setFrom($transport['sender_email']);
                    $mail->setTo($to);
                    $mail->setSubject($subject);
                    $mail->setHtmlBody($htmlBody);
                    foreach($attachments as $attachment) {
                        $addAttachment = false;
                        
                        if($template['attachment_type'] == 1) {
                            $addAttachment = true;
                        } else {
                            $excelColContent = iconv('UTF-8', 'gbk', $data[$template['attachment_excel_col'] - 1]);
                            if(strpos($attachment, $excelColContent) === 0) {
                                $addAttachment = true;
                            }
                        }
                        
                        if($addAttachment) {
                            array_push($emailAttachments, iconv('gbk', 'UTF-8', $attachment));
                            $mail->attach($attachmentDir . $attachment, ['fileName' => iconv('gbk', 'UTF-8', $attachment)]);
                        }
                    }
                    if ($mail->send()) {
                        echo 'send successed...' . PHP_EOL;
                        $resultStatus = 1;
                        $task->updateCounters([
                            'succeed_emails' => 1
                        ]);
                    } else {
                        $resultStatus = 2;
                        echo 'send failed...' . PHP_EOL;
                        $task->updateCounters([
                            'failed_emails' => 1
                        ]);
                    }
                } catch(\Exception $e) {
                    $resultMsg = $e->getMessage();
                    $resultStatus = 2;
                    echo 'send failed.......' . PHP_EOL;
                    $task->updateCounters([
                        'failed_emails' => 1
                    ]);
                }
                
                $task->updateCounters([
                    'start_line' => 1
                ]);

                $taskResultModel = new TaskResult();
                $taskResultModel->setAttributes([
                    'task_id' => $taskId,
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $htmlBody,
                    'attachments' => implode(';', $emailAttachments),
                    'msg' => isset($resultMsg) ? $resultMsg : '',
                    'status' => $resultStatus
                ]);
                
                if(!$taskResultModel->save()) {
                    var_dump($taskResultModel->getFirstErrors());
                    Yii::error(current($taskResultModel->getFirstErrors()));
                }
            }
        }
    }
    
    /**
     * 处理模板字符串，将字符串中的模板部分替换为对应的数据，如{{A1}}替换为$data['A1']
     * 
     * @author zhu huajun <huajun.h.zhu@integle.com>
     * @param str $str
     * @param array $data
     * @copyright 2017年2月24日 下午3:01:36
     */
    private function _handleTemplateStr($str, $data, $titleArr) {
        $matches = [];
        preg_match_all('/{{.*?}}/', $str, $matches);
        $matches = $matches[0];
        
        foreach($matches as $match) {
            $tmp = $match;
            $match = preg_replace('/<.*?>/', '', $match);
            
            $key = trim(substr($match, 2, strlen($match)-4));
            foreach ($titleArr as $col => $title) {
                if($title === $key) {
                    $key = $col;
                    break;
                }
            }
            if(isset($data[$key])) {
                $str = str_replace($tmp, $data[$key], $str);
            }
        }
        
        return $str;
    }
    
    /**
     * 根据序号转换成Excel头
     * @param $index    数字序号
     * @return string   Excel头
     */
    private function _getABC($index){
        $ABC[0] = chr(90);
        for($i = 65; $i< 90; $i++){
            $ABC[$i-64] = chr($i);
        }
    
        $str = '';
        while($index > 0){
            $remainder = $index % 26;
            $str = $ABC[$remainder] . $str;
            if (0 == $index%26)
                --$index;
                $index = intval($index/26);
        }
    
        return $str;
    }
}