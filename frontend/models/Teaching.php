<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "teaching".
 *
 * @property integer $id_subject
 * @property integer $id_teacher
 * @property integer $year
 *
 * @property Subjects $idSubject
 * @property Teachers $idTeacher
 */
class Teaching extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teaching';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_subject', 'id_teacher', 'year'], 'required'],
            [['id_subject', 'id_teacher', 'year'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_subject' => Yii::t('app', 'Id Subject'),
            'id_teacher' => Yii::t('app', 'Id Teacher'),
            'year' => Yii::t('app', 'Year'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubject()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'id_subject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTeacher()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'id_teacher']);
    }
}
