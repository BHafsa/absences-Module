<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $course_id
 * @property string $designation
 * @property int $coefficient
 * @property int $credit
 * @property int $bonus
 * @property int $educational_unit_id
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coefficient'], 'required'],
            [['coefficient', 'credit', 'bonus', 'educational_unit_id'], 'integer'],
            [['designation'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'designation' => 'Designation',
            'coefficient' => 'Coefficient',
            'credit' => 'Credit',
            'bonus' => 'Bonus',
            'educational_unit_id' => 'Educational Unit ID',
        ];
    }

    public function getClassGroup()
    {
        return $this->hasMany(ClassGroup::className(),['class_group_id' => 'class_group_id']);
    }
}
