<?php
/**
 * Created by PhpStorm.
 * User: warya
 * Date: 29.11.2016
 * Time: 17:00
 */

namespace backend\modules\key_value\models;


use yii\db\ActiveRecord;

class KeyValue extends \common\models\db\KeyValue{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
        ];
    }
}