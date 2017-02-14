<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pages\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field( $model, 'title' )->textInput( [ 'maxlength' => true ] )->label( 'Заголовок' ) ?>

    <!--    --><? //= $form->field($model, 'content')->textarea(['rows' => 6])->label('Контент') ?>
    <?= $form->field( $model, 'content' )->widget( CKEditor::className(), [
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions( 'elfinder', [
            'preset'=>'full',
            'inline'=>false,
            'path'=>'frontend/web/media/upload',
        ] )
    ] )->label('Контент') ?>

    <!--    --><? //= $form->field($model, 'dt_add')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'dt_update')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton( $model->isNewRecord ? 'Добавить' : 'Изменить', [ 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ] ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
