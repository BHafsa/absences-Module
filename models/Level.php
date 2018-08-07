<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property int $level_id
 * @property int $year_id
 * @property int $option_id
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year_id'], 'required'],
            [['year_id', 'option_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'year_id' => 'Year ID',
            'option_id' => 'Option ID',
        ];
    }

    public function getOption()
    {
        return $this->hasOne(Option::className(),['option_id' => 'option_id']);
    }

    public function getYear()
    {
        return $this->hasOne(Year::className(),['year_id' => 'year_id']);
    }

    public function getOptionObject()
    {
        return $this->hasOne(Option::className(),['option_id' => 'option_id'])->one();
    }

    public function getYearObject()
    {
        return $this->hasOne(Year::className(),['year_id' => 'year_id'])->one();
    }

    public function getLabel()
    {
        // return '(string)$this->getYear().(string)$this->getOption();'
        return (string)$this->getYearObject()->label.' '.(string)$this->getOptionObject()->label;
    }


}
