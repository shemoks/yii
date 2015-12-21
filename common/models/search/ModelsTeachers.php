<?php

namespace common\models\search;

use common\models\models\Teachers;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



class ModelsTeachers extends Teachers
{
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['userSurname'], 'safe'],
            [['userName'], 'safe'],
            [['nickName'], 'safe'],
            [['dateBorn'], 'safe'],
            [['sex'], 'safe'],
            [['education'], 'safe'],
            [['email'], 'safe'],
            [['phone'], 'safe'],
            [['password'], 'safe'],
            [['imageFile'], 'safe'],
            [['id_department'], 'safe'],

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
        $query = Teachers::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'userName', $this->userName]);
        $query->andFilterWhere(['like', 'userSurname', $this->userSurname]);
        $query->andFilterWhere(['like', 'nickName', $this->nickName]);
        $query->andFilterWhere(['like', 'phone', $this->phone]);
        $query->andFilterWhere(['like', 'imageFile', $this->imageFile]);
        $query->andFilterWhere(['like', 'dateBorn', $this->dateBorn]);
        $query->andFilterWhere(['like', 'sex', $this->sex]);
        $query->andFilterWhere(['like', 'education', $this->education]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'id_department', $this->id_department]);

        return $dataProvider;
    }
}
