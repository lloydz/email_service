<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class EmailController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        /* \Yii::$app->mailer->setTransport([
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.163.com',
            'username' => 'zhhjchxy@163.com',
            'password' => 'wy123456',
            'port' => '25',
            'encryption' => 'tls',
        ]);
        
        $mail = \Yii::$app->mailer->compose()
            ->setFrom('zhhjchxy@163.com')
            ->setTo('huajun.h.zhu@integle.com')
            ->setSubject('测试')
            ->attach('\\\\192.168.100.18\uploads\files\attachments\0307\1187\58a7be9350579.pdf', ['fileName' => '1.pdf'])
            ->attach('\\\\192.168.100.18\uploads\files\attachments\0307\1187\58a7be9350579.pdf')
            ->setTextBody('现在时间是' . date('Y-m-d H:i:s'));
        if($mail->send()) {
            echo '邮件发送成功..';
        } else {
            echo '邮件发送失败';
        }
        die; */
        
        return $this->render('index');
    }
    
    public function actionUploadAttachments() {
        echo date('Y-m-d H:i:s') . '<br>';
        $attachments = UploadedFile::getInstancesByName('attachments');
        var_dump($attachments);die;
        foreach ($attachments as $attachment) {
            if(!$attachment->saveAs()) {
                echo '附件上传失败';
            }
        }
        echo '附件上传成功';
        echo '<br>' . date('Y-m-d H:i:s');
        // var_dump($attachments);
    }
    
    /**
     * 邮件任务的相关文件上传
     * 
     * @author zhu huajun <huajun.h.zhu@integle.com>
     * @copyright 2017年2月21日 下午2:49:22
     */
    public function actionAjaxFileUpload() {
        // 获取参数
        $isAttachment = \Yii::$app->request->post('is_attachment', 0);
        
        // 所传文件非附件
        if(!$isAttachment) {
            // 生成唯一的任务目录
            $taskDir= uniqid('task_');
            $savePath = \Yii::$app->params['file_upload_path'] . $taskDir . '\\';
            if(!FileHelper::createDirectory($savePath)) {
                return $this->ajaxFail('上传失败');
            }
            
            // 未获取到所上传的文件
            $file = UploadedFile::getInstanceByName('file');
            if(empty($file)) {
                return $this->ajaxFail('上传失败');
            }
            
            // 保存文件
            // $saveName = uniqid('excel_') . '.' . $file->getExtension();
            $saveName = iconv('UTF-8', 'gbk', $file->name);
            if(!$file->saveAs($savePath . $saveName)) {
                return $this->ajaxFail('上传失败');
            }
            
            return $this->ajaxSuccess('上传成功', [
                'task_dir' => $taskDir,
                'file_name' => $file->name
            ]);
        // 所传文件为附件
        } else {
            $taskDir = \Yii::$app->request->post('task_dir');
            if(empty($taskDir)) {
                return $this->ajaxFail('上传失败');
            }
            
            $savePath = \Yii::$app->params['file_upload_path'] . $taskDir . '\\attachments\\';
            if(!FileHelper::createDirectory($savePath)) {
                return $this->ajaxFail('上传失败');
            }
            
            $attachments = UploadedFile::getInstancesByName('attachments');
            if(empty($attachments)) {
                return $this->ajaxFail('上传失败');
            }
            
            foreach ($attachments as $attachment) {
                $saveName = iconv('UTF-8', 'gbk', $attachment->name);
                if(!$attachment->saveAs($savePath . $saveName)) {
                    return $this->ajaxFail('上传失败');
                }
            }
            
            return $this->ajaxSuccess('上传成功', null);
        }
    }
    
    /**
     * @param $status
     * @param $message
     * @param $data
     * @return object json
     */
    public function ajaxReturn($status, $msg, $data) {
        return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                'status' => $status,
                'msg' => $msg,
                'data' => $data
            ]
        ]);
    }
    
    /**
     * @param $data
     * @return object json
     */
    public function ajaxSuccess($msg = '', $data) {
        return $this->ajaxReturn(1, $msg, $data);
    }
    
    /**
     * @param $message
     * @param $data
     * @return object
     */
    public function ajaxFail($msg, $data = '') {
        return $this->ajaxReturn(0, $msg, $data);
    }
}
