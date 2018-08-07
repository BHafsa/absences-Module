<?php

namespace humhub\modules\absences\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use humhub\modules\absences\models\Course;

/**
 * CourseSearch represents the model behind the search form of `humhub\modules\absences_module\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'coefficient', 'credit', 'bonus', 'educational_unit_id'], 'integer'],
            [['designation'], 'safe'],
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
        $query = Course::find();

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
            'course_id' => $this->course_id,
            'coefficient' => $this->coefficient,
            'credit' => $this->credit,
            'bonus' => $this->bonus,
            'educational_unit_id' => $this->educational_unit_id,
        ]);

        $query->andFilterWhere(['like', 'designation', $this->designation]);

        return $dataProvider;
    }
}
