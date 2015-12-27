<?php

namespace common\models\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $title
 * @property string $topic
 *
 * @property ArticleTeacher[] $articleTeachers
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'topic'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'topic' => Yii::t('app', 'Topic'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTeachers()
    {
        return $this->hasMany(ArticleTeacher::className(), ['id_article' => 'id']);
    }
}
