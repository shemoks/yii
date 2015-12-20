<?php
use yii\helpers\Html;

?>
<div id="lang">
    <span id="current-lang">
        <?= /** @var  $current */
        $current->name;?> <span class="show-more-lang">▼</span>
    </span>
    <ul id="langs">
        <?php /** @var  $language */
        foreach ($language as $lang):?>
            <li class="item-lang">
                <?= Html::a($lang->name, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
            </li>
        <?php endforeach;?>
    </ul>
</div>

