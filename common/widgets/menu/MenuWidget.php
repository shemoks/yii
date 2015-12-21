<?php
namespace common\widgets\menu;

use yii\bootstrap\Widget;

class MenuWidget extends Widget
{
    public $siteName;
    public $topMenuItems;
    public $leftMenu;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        echo $this->render('index',[
            'siteName' => $this->siteName,
            'topMenuItems' => $this->topMenuItems,
            'leftMenu' => $this->leftMenu
        ]);
    }
}