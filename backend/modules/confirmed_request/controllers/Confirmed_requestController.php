<?php

namespace backend\modules\confirmed_request\controllers;

use common\classes\Debug;
use Yii;
use backend\modules\confirmed_request\models\ConfirmedRequest;
use backend\modules\confirmed_request\models\ConfirmedRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConfirmedRequestController implements the CRUD actions for ConfirmedRequest model.
 */
class Confirmed_requestController extends Controller {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => [ 'POST' ],
                ],
            ],
        ];
    }

    /**
     * Lists all ConfirmedRequest models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel  = new ConfirmedRequestSearch();
        $dataProvider = $searchModel->search( Yii::$app->request->queryParams );

        return $this->render( 'index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ] );
    }

    /**
     * Displays a single ConfirmedRequest model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView( $id ) {
        return $this->render( 'view', [
            'model' => $this->findModel( $id ),
        ] );
    }

    /**
     * Creates a new ConfirmedRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ConfirmedRequest();

        if ( $model->load( Yii::$app->request->post() ) && $model->save() ) {
            $model->dt_end = strtotime( $model->dt_end );

            return $this->redirect( [ 'view', 'id' => $model->id ] );
        } else {
            return $this->render( 'create', [
                'model' => $model,
            ] );
        }
    }

    public function actionUnload() {
        $conf_reqs_to_mail     = \common\models\db\ConfirmedRequest::find()->andWhere( [
            '>',
            'dt_end',
            time()
        ] )->all();
        $conf_reqs_to_mail_new = \common\models\db\ConfirmedRequest::find()->where( [ 'new' => 1 ] )->andWhere( [
            '>',
            'dt_end',
            time()
        ] )->all();
        $string = "";
        $string_new = "";

        foreach ( $conf_reqs_to_mail as $conf_reqs_item ) {
            $string .= $conf_reqs_item->mail . "\r\n";
        }

        foreach ($conf_reqs_to_mail_new as $conf_reqs_item){
            $string_new .= $conf_reqs_item->mail . "\r\n";
            $conf_reqs_item->new = 0;
            $conf_reqs_item->save();
        }

        file_put_contents( 'mailing/all_mailing.txt', $string );
        file_put_contents( 'mailing/new_mailing.txt', $string_new );
        
        return $this->redirect( [ 'index' ] );

    }

    /**
     * Updates an existing ConfirmedRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate( $id ) {
        $model = $this->findModel( $id );

        if ( $model->load( Yii::$app->request->post() ) ) {

            $model->dt_end = strtotime( $model->dt_end );
            $model->save();

            // Debug::prn($model->dt_end);
            return $this->redirect( [ 'view', 'id' => $model->id ] );
        } else {
            return $this->render( 'update', [
                'model' => $model,
            ] );
        }
    }

    /**
     * Deletes an existing ConfirmedRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete( $id ) {
        $this->findModel( $id )->delete();

        return $this->redirect( [ 'index' ] );
    }


    /**
     * Finds the ConfirmedRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ConfirmedRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel( $id ) {
        if ( ( $model = ConfirmedRequest::findOne( $id ) ) !== null ) {
            return $model;
        } else {
            throw new NotFoundHttpException( 'The requested page does not exist.' );
        }
    }
}
