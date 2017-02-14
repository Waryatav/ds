<?php

namespace backend\modules\request\controllers;

use common\classes\Debug;
use common\models\db\ConfirmedRequest;
use Yii;
use backend\modules\request\models\Request;
use backend\modules\request\models\RequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller {
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
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel  = new RequestSearch();
        $dataProvider = $searchModel->search( Yii::$app->request->queryParams );

        return $this->render( 'index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ] );
    }

    /**
     * Displays a single Request model.
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
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Request();

        if ( $model->load( Yii::$app->request->post() ) && $model->save() ) {
            return $this->redirect( [ 'view', 'id' => $model->id ] );
        } else {
            return $this->render( 'create', [
                'model' => $model,
            ] );
        }
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate( $id ) {
        $model = $this->findModel( $id );

        if ( $model->load( Yii::$app->request->post() ) && $model->save() ) {
            return $this->redirect( [ 'view', 'id' => $model->id ] );
        } else {
            return $this->render( 'update', [
                'model' => $model,
            ] );
        }
    }

    /**
     * Deletes an existing Request model.
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
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel( $id ) {
        if ( ( $model = Request::findOne( $id ) ) !== null ) {
            return $model;
        } else {
            throw new NotFoundHttpException( 'The requested page does not exist.' );
        }
    }

    public function actionConfirm_request() {
        $id = Yii::$app->request->get( 'id' );

        $req = self::findModel( $id );

        $conf_req = ConfirmedRequest::find()->where( [ 'mail' => $req->mail ] )->one();

        if ( empty( $conf_req ) ) {
            $new_conf_req         = new ConfirmedRequest();
            $new_conf_req->name   = $req->name;
            $new_conf_req->mail   = $req->mail;
//            $new_conf_req->phone   = $req->phone;
            $new_conf_req->dt_add = $req->dt_add;
            $new_conf_req->dt_end = $req->dt_add + $req->duration;
            $new_conf_req->save();
            $req->delete();
        } else {
            $conf_req->name = $req->name;

            if ( $conf_req->dt_end < time() ) {
                $conf_req->dt_end = time() + $req->duration;
            } else {
                $conf_req->dt_end = $conf_req->dt_end + $req->duration;
            }

            $conf_req->save();
            $req->delete();
        }

        return $this->redirect( [ 'index' ] );
    }

}
