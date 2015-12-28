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
 * @property mixed teachers
 */
class Articles extends \yii\db\ActiveRecord
{
    public $id_teacher;
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
    public function getTeachers()
    {
        return $this->hasMany(Teachers::className(), ['id' => 'id_teacher'])
            ->viaTable('article_teacher',['id_article' => 'id']);
    }
}
