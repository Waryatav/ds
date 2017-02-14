<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\confirmed_request\models\ConfirmedRequest */

$this->title = 'Update Confirmed Request: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Confirmed Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="confirmed-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
