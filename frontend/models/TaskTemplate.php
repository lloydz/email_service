<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "task_template".
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $to_excel_col
 * @property string $subject
 * @property string $body
 * @property integer $attachment_type
 * @property integer $attachment_excel_col
 */
class TaskTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id'], 'required'],
            [['task_id', 'to_excel_col', 'attachment_type', 'attachment_excel_col'], 'integer'],
            [['body'], 'string'],
            [['subject'], 'string', 'max' => 255],
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
            'to_excel_col' => 'To Excel Col',
            'subject' => 'Subject',
            'body' => 'Body',
            'attachment_type' => 'Attachment Type',
            'attachment_excel_col' => 'Attachment Excel Col',
        ];
    }
}
