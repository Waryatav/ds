<?php

namespace backend\modules\settings\controllers;

use common\models\db\KeyValue;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Default controller for the `exchange_rates` module
 */
class DefaultController extends Controller {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        if ( isset( $_POST['index_header'] ) ) {
            KeyValue::updateAll( [ 'value' => $_POST['index_header'] ], [ 'key' => 'index_header' ] );
            KeyValue::updateAll( [ 'value' => $_POST['index_button'] ], [ 'key' => 'index_button' ] );
            KeyValue::updateAll( [ 'value' => $_POST['index_main_price'] ], [ 'key' => 'index_main_price' ] );
            KeyValue::updateAll( [ 'value' => $_POST['index_book_title'] ], [ 'key' => 'index_book_title' ] );
            KeyValue::updateAll( [ 'value' => $_POST['social_link_vk'] ], [ 'key' => 'social_link_vk' ] );
            KeyValue::updateAll( [ 'value' => $_POST['index_subtitle'] ], [ 'key' => 'index_subtitle' ] );
        }
        $key_val = KeyValue::find()->all();

        return $this->render( 'index', [
            'key_val' => ArrayHelper::map( $key_val, 'key', 'value' ),
        ] );
    }
}
