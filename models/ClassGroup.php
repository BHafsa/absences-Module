<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "class_group".
 *
 * @property int $class_group_id
 * @property int $number
 * @property int $section_id
 * @property int $level_id
 * @property string $date
 */
class ClassGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'section_id', 'level_id'], 'integer'],
            [['number','section_id', 'level_id','date'], 'required'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'class_group_id' => 'id',
            'number' => 'Numero du groupe',
            'section_id' => 'Section ID',
            'level_id' => 'Level ID',
            'date' => 'Date',
        ];
    }

    public function getLevel()
    {
          return $this->hasOne(Level::className(),['level_id' => 'level_id']);
    }

    public function getLevelObject()
    {
          return $this->hasOne(Level::className(),['level_id' => 'level_id']) ->one();
    }
}
