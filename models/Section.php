<?php

namespace humhub\modules\absences\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $section_id
 * @property int $level_id
 * @property string $section_name
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level_id', 'section_name'], 'required'],
            [['level_id'], 'integer'],
            [['section_name'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'section_id' => 'Section ID',
            'level_id' => 'Level ID',
            'section_name' => 'Section Name',
        ];
    }
}
