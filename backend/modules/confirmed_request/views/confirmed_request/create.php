<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\confirmed_request\models\ConfirmedRequest */

$this->title = 'Добавить подтверженныую заявку';
$this->params['breadcrumbs'][] = ['label' => 'Подтверженные заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="confirmed-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
