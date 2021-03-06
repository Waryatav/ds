<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\key_value\models\KeyValue */

$this->title = 'Update Key Value: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Key Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="key-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
