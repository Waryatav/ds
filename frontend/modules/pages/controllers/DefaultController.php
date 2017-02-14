<?php

namespace frontend\modules\pages\controllers;

use common\classes\Debug;
use common\models\db\KeyValue;
use common\models\db\Pages;
use common\models\db\Request;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Default controller for the `pages` module
 */
class DefaultController extends Controller {
    /**
     * Renders the index view for the module
     * @return string
     */

    public $layout = 'main';

    public function actionIndex() {
        $params = ArrayHelper::map( KeyValue::find()->all(), 'key', 'value' );
        $post   = Pages::find()->where( [ 'slug' => 'glavnaya' ] )->one();

        return $this->render( 'index',
            [
                'params' => $params,
                'post'   => $post
            ] );

    }

    public function actionPages( $slug ) {
        if ( $_GET ) {

            $post = Pages::find()->where( [ 'slug' => $slug ] )->one();

            return $this->render( 'pages',
                [ 'post' => $post ]
            );
        }

    }


    public function beforeAction( $action ) {
        $this->enableCsrfValidation = ( $action->id !== "request" );

        return parent::beforeAction( $action );
    }

    public function actionRequest() {

        if ( $_POST ) {
            $name  = $_POST['name'];
            $mail  = $_POST['mail'];
            $phone = $_POST['phone'];

            $req           = new Request();
            $req->name     = $name;
            $req->mail     = $mail;
           // $req->phone    = $phone;
            $req->dt_add   = time();
            $req->duration = 60 * 60 * 24 * 62;
            $req->save();


        }

    }
}
