<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\request\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode( $this->title ) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--    <p>-->
    <!--        --><? //= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
    <?= GridView::widget( [
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn', ],

//            'id',
//            'name',
            [
                'attribute' => 'name',
                'label'     => 'Имя',
            ],
            // 'mail',
            [
                'attribute' => 'mail',
                'label'     => 'Почта',
            ],
//            'phone',
//            'dt_add',
            [
                'attribute' => 'dt_add',
                'label'     => 'Дата заявки',
                'format'    => 'text',
                'value'     => function ( $model ) {
                    return date( 'Y-m-d H:i', $model->dt_add );
                },
            ],
//            'duration',
            [
                'attribute' => 'duration',
                'label'     => 'Продолжительность',
            ],

            [ 'class' => 'yii\grid\ActionColumn' ],
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{link}',
                'buttons'  => [
                    'link' => function ( $url, $model, $key ) {
                        $url = \yii\helpers\Url::to( ['/request/request/confirm_request',  'id' => $model->id ] );
             
                        return Html::a( '<span class="glyphicon glyphicon-ok-sign"></span>', $url );
                    },
                ],
            ],
        ],
    ] ); ?>
</div>
