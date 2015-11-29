<?php
/**
 * Created by PhpStorm.
 * User: oksana
 * Date: 28.11.15
 * Time: 20:54
 */

namespace frontend\models;


use yii\base\Model;
use yii;

class Tables extends Model
{
    public $name;

    /**
     * Example constructor.
     *
     */
    public function __construct()
    {
        $this->name = "Выберите таблицу";
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}