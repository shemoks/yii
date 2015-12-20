<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Teaching;

/**
 * ModelsTeaching represents the model behind the search form about `frontend\models\Teaching`.
 */
class ModelsTeaching extends Teaching
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_subject', 'id_teacher', 'year'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Teaching::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_subject' => $this->id_subject,
            'id_teacher' => $this->id_teacher,
            'year' => $this->year,
        ]);

        return $dataProvider;
    }
}
