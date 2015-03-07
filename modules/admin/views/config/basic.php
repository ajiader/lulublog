<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers;

/* @var $this yii\web\View */
/* @var $model app\models\config\BasicConfig */
/* @var $form ActiveForm */
?>
<div class="basic">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sys_site_name') ?>
        <?= $form->field($model, 'sys_site_description') ?>
        <?= $form->field($model, 'sys_site_url') ?>
        <?= $form->field($model, 'sys_site_email') ?>
         <?= $form->field($model, 'sys_allow_register')->checkbox() ?>
        <?= $form->field($model, 'sys_default_role')->dropDownList(['subscriber' => '订阅者', 'contributor' => '投稿者', 'administrator'=>'管理员']) ?>
        <?= $form->field($model, 'sys_utc') ?>
        <?= $form->field($model, 'sys_date_format') ?>
        <?= $form->field($model, 'sys_date_format_custom') ?>
        <?= $form->field($model, 'sys_time_format') ?>
        <?= $form->field($model, 'sys_time_format_custom') ?>
        <?= $form->field($model, 'sys_lang') ?>
        <?= $form->field($model, 'sys_icp') ?>
        <?= $form->field($model, 'sys_stat') ?>


    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- basic -->
