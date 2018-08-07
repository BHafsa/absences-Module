<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property int $session_id
 * @property int $course_id
 * @property int $group_id
 * @property string $date
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'group_id', 'date'], 'required'],
            [['course_id', 'group_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'session_id' => 'Session ID',
            'course_id' => 'Course ID',
            'group_id' => 'Group ID',
            'date' => 'Date',
        ];
    }

    public function getGroup()
    {
        return $this->hasOne(Group::classNam(), ['id' =>'group_id']);
    }
}