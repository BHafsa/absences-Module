<?php

namespace humhub\modules\absences\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use humhub\modules\absences\models\ClassGroup;

/**
 * ClassGroupSearch represents the model behind the search form of `humhub\modules\absences_module\models\ClassGroup`.
 */
class ClassGroupSearch extends ClassGroup
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_group_id', 'number', 'section_id', 'level_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ClassGroup::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'class_group_id' => $this->class_group_id,
            'number' => $this->number,
            'section_id' => $this->section_id,
            'level_id' => $this->level_id,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
