<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $student_id
 * @property string $registration_number
 * @property string $date_of_birth
 * @property string $place_of_birth
 * @property string $admission_date
 * @property int $class_group_id
 * @property int $user_id
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_number', 'date_of_birth', 'place_of_birth', 'class_group_id', 'user_id'], 'required'],
            [['date_of_birth', 'admission_date'], 'safe'],
            [['class_group_id', 'user_id'], 'integer'],
            [['registration_number', 'place_of_birth'], 'string', 'max' => 15],
            [['registration_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'registration_number' => 'Registration Number',
            'date_of_birth' => 'Date Of Birth',
            'place_of_birth' => 'Place Of Birth',
            'admission_date' => 'Admission Date',
            'class_group_id' => 'Class Group ID',
            'user_id' => 'User ID',
        ];
    }
}
