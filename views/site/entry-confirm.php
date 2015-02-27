<?php
use yii\helpers\Html;
?>
<p>You have entered the following infomation:</p>

<ul>
    <li><label for="">Name</label>:<?= \yii\helpers\Html::encode($model->name)?></li>
    <li><label for="">Email</label>:<?= \yii\helpers\Html::encode($model->email)?></li>
</ul>
