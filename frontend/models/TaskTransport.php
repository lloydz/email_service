<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "task_transport".
 *
 * @property integer $id
 * @property integer $task_id
 * @property string $smtp
 * @property integer $port
 * @property string $encryption
 * @property string $sender_email
 * @property string $sender_email_password
 */
class TaskTransport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_transport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'smtp'], 'required'],
            [['task_id', 'port'], 'integer'],
            [['smtp', 'encryption', 'sender_email', 'sender_email_password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'smtp' => 'Smtp',
            'port' => 'Port',
            'encryption' => 'Encryption',
            'sender_email' => 'Sender Email',
            'sender_email_password' => 'Sender Email Password',
        ];
    }
}
