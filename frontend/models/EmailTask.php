<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "email_task".
 *
 * @property integer $id
 * @property string $name
 * @property integer $creater_id
 * @property string $file_path
 * @property string $excel_file
 * @property integer $total_emails
 * @property integer $succeed_emails
 * @property integer $failed_emails
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 */
class EmailTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'creater_id', 'file_path', 'excel_file'], 'required'],
            [['creater_id', 'start_line', 'total_emails', 'succeed_emails', 'failed_emails', 'status'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name', 'file_path', 'excel_file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'creater_id' => 'Creater ID',
            'file_path' => 'File Path',
            'excel_file' => 'Excel File',
            'start_line' => 'Start Line',
            'total_emails' => 'Total Emails',
            'succeed_emails' => 'Succeed Emails',
            'failed_emails' => 'Failed Emails',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'status' => 'Status',
        ];
    }
    


    /**
     * 新建邮件任务
     *
     * @author zhu huajun <huajun.h.zhu@integle.com>
     * @param array $taskData
     * @param array $transportData
     * @param array $templateData
     * @copyright 2017年2月22日 下午3:04:56
     */
    public function newTask($taskData, $transportData, $templateData) {
        // 开启事务
        $transaction = \Yii::$app->db->beginTransaction();
    
        // 插入任务表
        $taskModel = new self();
        $taskModel->setAttributes($taskData);
        if(empty($taskData['creater_id'])) {
            $taskModel['creater_id'] = \Yii::$app->session['user_info']['id'];
        }
        if(!$taskModel->save()) {
            return $this->modelFail(current($taskModel->getFirstErrors()));
        }
        
        // 任务id
        $taskId = $taskModel->id;
    
        // 插入TaskTransport表
        $transportModel = new TaskTransport();
        $transportModel->setAttributes($transportData);
        $transportModel->setAttribute('task_id', $taskId);
        if(!$transportModel->save()) {
            $transaction->rollBack();
            return $this->modelFail(current($transportModel->getFirstErrors()));
        }
    
        // 插入TaskTemplate表
        $templateModel = new TaskTemplate();
        $templateModel->setAttributes($templateData);
        $templateModel->setAttribute('task_id', $taskId);
        if(!$templateModel->save()) {
            $transaction->rollBack();
            return $this->modelFail(current($templateModel->getFirstErrors()));
        }
    
        $transaction->commit();
    
        return $this->modelSuccess('新建任务成功', [
            'task_id' => $taskId
        ]);
    }
    
    /**
     * 更新任务
     *
     * @author zhu huajun <huajun.h.zhu@integle.com>
     * @param int $taskId
     * @param array $taskData
     * @copyright 2017年2月22日 下午5:30:59
     */
    public function UpdateTaskById($taskId, $taskData) {
        // 查找任务
        $task = self::findOne([
            'id' => $taskId
        ]);
        
        // 任务不存在
        if(!$task) {
            return false;
        }
        
        // 更新任务
        $task->setAttributes($taskData);
        if(!$task->save()) {
            return false;
        }
        
        return true;
    }
    
    /**
     * 获取一条等待执行的邮件任务
     *
     * @author zhu huajun <huajun.h.zhu@integle.com>
     * @copyright 2017年2月22日 下午4:15:01
     */
    public function pickATask() {
        $task = self::findOne([
            'status' => [2, 3]
        ]);
    
        if($task) {
            $task['status'] = 3;
            if($task->save()) {
                return $task;
            }
        }
    
        return null;
    }
    
    public function getTaskResult($param) {
        ;
    }
    
    public function modelReturn($status, $msg, $data) {
        return [
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ];
    }
    
    public function modelSuccess($msg = '', $data) {
        return $this->modelReturn(1, $msg, $data);
    }
    
    public function modelFail($msg, $data = null) {
        return $this->modelReturn(0, $msg, $data);
    }
}
