<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "absence_session".
 *
 * @property int $student_id
 * @property int $session_id
 */
class AbsenceSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absence_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'session_id'], 'required'],
            [['student_id', 'session_id'], 'integer'],
            [['student_id', 'session_id'], 'unique', 'targetAttribute' => ['student_id', 'session_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'session_id' => 'Session ID',
        ];
    }

     public function getStudent()
    {
        return $this->hasOne(Student::className(), ['student_id' =>'student_id']);
    }
}
