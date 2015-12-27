<?php

namespace common\models\models;

use Yii;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "teachers".
 *
 * @property integer $id
 * @property string $userSurname
 * @property string $userName
 * @property string $nickName
 * @property string $dateBorn
 * @property string $sex
 * @property string $education
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property integer $id_department
 * @property string $imageFile
 *
 * @property Departments $idDepartment
 * @property Teaching[] $teachings
 *
 */
class Teachers extends ActiveRecord
{
    const WEAK = 0;
    const STRONG = 1;

    const min = 3;
    const max = 30;
    public $rememberMe;
    public $passwordRepeat;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'userSurname',
                    'userName',
                    'nickName',
                    'dateBorn',
                    'sex',
                    'education',
                    'email',
                    'phone',
                    'password'
                ],
                'required',
                'message' => "Поле {attribute} не может быть пустым"
            ],
            [['id_department'], 'integer', 'message' => "число должно быть целым"],
            [
                [
                    'userName',
                    'userSurname',
                    'nickName',
                    'dateBorn',
                    'sex',
                    'education',
                    'email',
                    'phone',
                    'password',
                    'rememberMe',
                    'imageFile'
                ],
                'safe'
            ],
            [
                ['userName', 'userSurname', 'nickName'],
                'validatorName'
            ],
            ['rememberMe', 'boolean'],
            ['password', 'validatorPassword'],
            ['email', 'email'],
            ['sex', 'validatorSex'],
            ['phone', 'validatorPhone'],
            ['dateBorn', 'validatorDate'],
            [
                'passwordRepeat',
                'compare',
                'compareAttribute' => 'password',
                'message'          => 'Пароли не совпадают'
            ],
            [
                ['imageFile'],
                'file',
                'extensions' => 'png, jpg',
                'maxSize'    => 1024 * 250,
                'minSize'    => 0,
            ],
            ['education', 'validatorEducation'],

        ];
    }

    public function validatorSex($attribute)
    {
        if (!in_array($this->$attribute, ['man', 'women'])) {
            $this->addError($attribute, 'пол: м или Ж.');
        }
    }

    public function validatorEducation($attribute)
    {
        if (!in_array($this->$attribute, ['base', 'middle', 'higher', 'unfinished higher'])) {
            $this->addError($attribute, 'образование: базовое, среднее, незаконченное высшее, высшее.');
        }
    }

    /**
     * @param $attribute
     */
    public function validatorName($attribute)
    {
        $pattern = '/^[A-Za-zА-Яа-яїЇйЙіІъЪёЁs,]+$/u';
        if (mb_strlen($this->$attribute, 'utf-8') < self::min) {
            $this->addError($attribute, 'данные должны содержать не менее ' . self::min . ' букв');
        } elseif ((mb_strlen($this->$attribute, 'utf-8') > self::max)) {
            $this->addError($attribute, 'данные должны содержать не более ' . self::max . ' букв');

        }
        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'данные должны включать буквы латинского, русского или украинского алфавита');
        }
    }

    public function validatorDate($attribute)
    {
        $pattern = '/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|30|31)/';
        /** @var string $pattern */
        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'формат: yyyy-mm-dd');
        }

    }

    public function validatorPhone($attribute)
    {
        $pattern = '/^\(0[0-9]{2}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/';
        /** @var string $pattern */
        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'формат: (067)898-78-67');
        }

    }

    public function validatorPassword($attribute)
    {
        $pattern = '/^[a-zA-Z0-9_-]{6,20}$/';

        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'пароль очень простой или содержит меньше 6-ти или больше 20-ти символов');
        }
    }

    /**
     * @return bool
     *
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageFile = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userName'       => \Yii::t('app', 'Имя'),
            'userSurname'    => \Yii::t('app', 'Фамилия'),
            'nickName'       => \Yii::t('app', 'Отчество'),
            'dateBorn'       => \Yii::t('app', 'Дата рождения'),
            'sex'            => \Yii::t('app', 'Пол'),
            'education'      => \Yii::t('app', 'Образование'),
            'email'          => \Yii::t('app', 'E-mail'),
            'phone'          => \Yii::t('app', 'Телефон'),
            'passwordRepeat' => \Yii::t('app', 'Повторите пароль'),
            'imageFile'      => \Yii::t('app', 'Фото'),
            'password'       => \Yii::t('app', 'Пароль'),
            'rememberMe'     => \Yii::t('app', 'Запомнить меня'),
            'id'             => \Yii::t('app', 'Номер'),
            'id_department'  => \Yii::t('app', 'Номер кафедры'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'id_department']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachings()
    {
        return $this->hasMany(Teaching::className(), ['id_teacher' => 'id']);
    }

   /* public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['id' => 'id_subject'])->viaTable('teaching',
            ['id_teacher' => 'id']);
    }*/

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllTeachers()
    {
        return $this->find()->asArray()->all();
    }
}
