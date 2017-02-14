<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\confirmed_request\models\ConfirmedRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Подтвержденные заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="confirmed-request-index">

    <h1><?= Html::encode( $this->title ) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a( 'Добавить', [ 'create' ], [ 'class' => 'btn btn-success' ] ) ?>
    </p>
    <p>
        <?= Html::a( 'Выгрузить', [ 'unload' ], [ 'class' => 'btn btn-success' ] ) ?>
        <!--        <a download="all_mailing.txt" href="mailing/all_mailing.txt">123</a>-->
        <br>
        <br>
        <!--        --><? //= Html::a( 'Cкачать: Вся рассылка', Yii::$app->basePath . '/mailing/all_mailing.txt' ) ?>
        <a href="<?= \yii\helpers\Url::to( '/secure/mailing/all_mailing.txt' ); ?>" download="">Скачать: Вся действующая
            рассылка</a>
        <br>
        <a href="<?= \yii\helpers\Url::to( '/secure/mailing/new_mailing.txt' ); ?>" download="">Скачать: Новые</a>
    </p>
    <?= GridView::widget( [
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],

//            'id',
//            'name',
            [
                'attribute' => 'name',
                'label'     => 'Имя',
            ],
            //'mail',
            [
                'attribute' => 'mail',
                'label'     => 'Почта',
            ],
//            'dt_add',
//            'phone',
            [
                'attribute' => 'dt_add',
                'label'     => 'Дата заявки',
                'format'    => 'text',
                'value'     => function ( $model ) {
                    return date( 'Y-m-d H:i', $model->dt_add );
                },
            ],
            //'dt_end',
            [
                'attribute' => 'dt_end',
                'label'     => 'Дата окончания подписки',
                'format'    => 'text',
                'value'     => function ( $model ) {
                    return date( 'Y-m-d H:i', $model->dt_end );
                },
            ],

            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ] ); ?>
</div>
