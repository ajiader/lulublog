<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-9">
        <?= $form->field($model, 'title')->textInput(['maxlength' => 256, 'placeholder' => '请输入标题'])->label(false) ?>

        <?= $form->field($model, 'alias')->textInput(['maxlength' => 128]) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'excerpt')->textInput(['maxlength' => 512]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'visibility')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 64]) ?>
        <?= $form->field($model, 'status')->textInput() ?>
        <?= $form->field($model, 'allow_comment')->textInput() ?>
        <?= $form->field($model, 'sticky')->textInput() ?>
        <?= $form->field($model, 'thumb')->textInput(['maxlength' => 256]) ?>
        <?= $form->field($model, 'template')->textInput(['maxlength' => 64]) ?>
        <?= $form->field($model, 'comments')->textInput() ?>
        <?= $form->field($model, 'views')->textInput() ?>
        <?= $form->field($model, 'diggs')->textInput() ?>
        <?= $form->field($model, 'burys')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
