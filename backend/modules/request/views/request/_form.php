<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\request\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field( $model, 'name' )->textInput( [ 'maxlength' => true ] )->label( 'Имя' ) ?>

    <?= $form->field( $model, 'mail' )->textInput( [ 'maxlength' => true ] )->label( 'Почта' ) ?>

<!--    --><?//= $form->field( $model, 'phone' )->textInput( [ 'maxlength' => true ] )?>

    <!--    --><? //= $form->field($model, 'dt_add')->textInput()->label() ?>

    <?= $form->field( $model, 'duration' )->textInput()->label( 'Продолжительность' ) ?>

    <div class="form-group">
        <?= Html::submitButton( $model->isNewRecord ? 'Добавить' : 'Изменить', [ 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ] ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
