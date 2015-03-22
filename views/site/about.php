<?php
use yii\helpers\Html;
use yii\web\view;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'auther', 'content' => 'dds']);
$this->registerLinkTag(['rel' => 'archives', 'content' => 'Discuz!', 'href' => 'http://www.fans.com']);

$cssString = 'body{margin:0px; padding:0px;}';
$this->registerCss($cssString);
$this->registerCssFile('css/site.css');

$jsString = 'alert(4)';
$this->registerJs($jsString, View::POS_BEGIN);
//$this->registerJsFile('assets/9b01db38/yii.js',['depends' => ['yii/web/YiiAsset'], 'position' => View::POS_BEGIN]);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
