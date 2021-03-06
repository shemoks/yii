<?php

namespace common\models\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subjects".
 *
 * @property integer $id
 * @property string $title
 * @property integer $count_hours
 * @property string $type_subject
 *
 * @property Teaching[] $teachings
 */
class Subjects extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'count_hours', 'type_subject'], 'required'],
            [['count_hours'], 'integer'],
            [['title', 'type_subject'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'номер предмета'),
            'title' => Yii::t('app', 'название предмета'),
            'count_hours' => Yii::t('app', 'колличество часов'),
            'type_subject' => Yii::t('app', 'тип занятия'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachings()
    {
        return $this->hasMany(Teaching::className(), ['id_subject' => 'id']);
    }

    /*public function getTeachers()
    {
        return $this->hasMany(Teachers::className(), ['id' => 'id_teacher'])->viaTable('teaching',
            ['id_subject' => 'id']);
    }*/
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllSubjects()
    {
        return $this->find()->asArray()->all();
    }
}
