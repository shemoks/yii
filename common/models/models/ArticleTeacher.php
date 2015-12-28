<?php

namespace common\models\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article_teacher".
 *
 * @property integer $id_teacher
 * @property integer $id_article
 *
 * @property Articles $idArticle
 * @property Teachers $idTeacher
 */
class ArticleTeacher extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_teacher', 'id_article'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_teacher' => Yii::t('app', 'Id Teacher'),
            'id_article' => Yii::t('app', 'Id Article'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'id_article']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTeacher()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'id_teacher']);
    }
}
