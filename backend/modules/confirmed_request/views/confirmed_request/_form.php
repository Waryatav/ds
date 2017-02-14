<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\confirmed_request\models\ConfirmedRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="confirmed-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя') ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true])->label('Почта') ?>

<!--    --><?//= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'dt_add')->textInput()->label('Дата заявки') ?>

<!--    --><?//= $form->field($model, 'dt_end')->textInput()->label('Дата окончания подписки') ?>
    <?= $form->field($model, 'dt_end')->input('date',['value'=>date('Y-m-d',$model->dt_end)])->label('Дата окончания подписки') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
