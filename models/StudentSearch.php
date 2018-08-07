<?php

namespace humhub\modules\absences\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use humhub\modules\absences_module\models\Student;

/**
 * StudentSearch represents the model behind the search form of `humhub\modules\absences_module\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'class_group_id', 'user_id'], 'integer'],
            [['registration_number', 'date_of_birth', 'place_of_birth', 'admission_date'], 'safe'],
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
        $query = Student::find();

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
            'student_id' => $this->student_id,
            'date_of_birth' => $this->date_of_birth,
            'admission_date' => $this->admission_date,
            'class_group_id' => $this->class_group_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'registration_number', $this->registration_number])
            ->andFilterWhere(['like', 'place_of_birth', $this->place_of_birth]);

        return $dataProvider;
    }
}
