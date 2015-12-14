<?php
namespace frontend\widgets\lang;
use frontend\models\Languages;
use yii\bootstrap\Widget;

class LangWidget extends Widget
{
    public function init(){

    }

    public function run() {
        return $this->render('index', [
            'current' => Languages::getCurrent(),
            'langs' => Languages::find()->where('id != :current_id', [':current_id' => Languages::getCurrent()->id])->all(),
        ]);
    }
}
