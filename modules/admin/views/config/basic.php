<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\config\BasicConfig */
/* @var $form ActiveForm */
?>
<div class="config-basic">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'site_name') ?>
        <?= $form->field($model, 'site_description') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- config-basic -->
