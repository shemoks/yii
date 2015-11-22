<?php
/**
 * Created by PhpStorm.
 * User: oksana
 * Date: 21.11.15
 * Time: 19:40
 */

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


class LoginForm extends Model
{
    const WEAK = 0;
    const STRONG = 1;

    const min = 3;
    const max = 10;

    public $userName;
    public $userSurname;
    public $nickName;
    public $dateBorn;
    public $sex;
    public $education;
    public $email;
    public $phone;
    public $passwordRepeat;
    public $imageFile;
    public $password;
    public $rememberMe = false;

    public function rules()
    {
        return [
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
                    'passwordRepeat',
                    'password'
                ],
                'required',
                'message' => "Поле {attribute} не может быть пустым"
            ],
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
            ['education', 'validatorEducation']
        ];
    }

    public function validatorSex($attribute)
    {
        if (!in_array($this->$attribute, ['man', 'women'])) {
            $this->addError($attribute, 'sex: man or women.');
        }
    }

    public function validatorEducation($attribute)
    {
        if (!in_array($this->$attribute, ['base', 'middle', 'higher', 'unfinished higher'])) {
            $this->addError($attribute, 'education: base or middle or higher or unfinished higher.');
        }
    }

    /**
     * @param $attribute
     */
    public function validatorName($attribute)
    {
        $pattern = '/^[A-Za-zА-Яа-яїЇйЙіІъЪёЁs,]+$/u';
        if (mb_strlen($this->$attribute, 'utf-8') < self::min) {
            $this->addError($attribute, 'data must contain more ' . self::min . ' letters');
        } elseif ((mb_strlen($this->$attribute, 'utf-8') > self::max)) {
            $this->addError($attribute, 'data must contain more ' . self::max . ' letters');

        }
        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'data must contain only russian or english letters');
        }
    }

    public function validatorDate($attribute)
    {
        $pattern = '/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|30|31)/';
        /** @var string $pattern */
        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'format: yyyy-mm-dd');
        }

    }

    public function validatorPhone($attribute)
    {
        $pattern = '/^\(0[0-9]{2}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/';
        /** @var string $pattern */
        if (!preg_match($pattern, $this->$attribute)) {
            $this->addError($attribute, 'format: (067)898-78-67');
        }

    }

    public function attributeLabels()
    {
        return [
            'userName'       => \Yii::t('app', 'Имя'),
            'userSurname'    => \Yii::t('app', 'Фамилия'),
            'nickName'       => \Yii::t('app', 'Логин'),
            'dateBorn'       => \Yii::t('app', 'Дата рождения'),
            'sex'            => \Yii::t('app', 'Пол'),
            'education'      => \Yii::t('app', 'Образование'),
            'email'          => \Yii::t('app', 'E-mail'),
            'phone'          => \Yii::t('app', 'Телефон'),
            'passwordRepeat' => \Yii::t('app', 'Повторите пароль'),
            'imageFile'      => \Yii::t('app', 'Фото'),
            'password'       => \Yii::t('app', 'Пароль'),
            'rememberMe'     => \Yii::t('app', 'Запомнить меня'),
        ];
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
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}