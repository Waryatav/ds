<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\key_value\models\KeyValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Ключ - значение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-value-index">

    <h1><?= Html::encode( $this->title ) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a( 'Добавить ключ - значение', [ 'create' ], [ 'class' => 'btn btn-success' ] ) ?>
    </p>
    <?= GridView::widget( [
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],

//            'id',
            //'key',
            [
                'attribute'=>'key',
                'label'=>'Ключ'
            ],
            //'value:ntext',
            [
                'attribute'=>'value',
                'label'=>'Значение',
                'format'    => 'ntext',
            ],
//            'dt_add',
//            'dt_update',
            [
                'attribute' => 'dt_add',
                'label'     => 'Дата добавления',
                'format'    => 'text',
                'value'     => function ( $model ) {
                    return date( 'd-m-Y H:i', $model->dt_add );
                }
            ],
            [
                'attribute' => 'dt_update',
                'label'     => 'Дата изменения',
                'format'    => 'text',
                'value'     => function ( $model ) {
                    return date( 'd-m-Y H:i', $model->dt_update );
                }
            ],

            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ] ); ?>
</div>
