<?php
/**
 * Created by PhpStorm.
 * User: warya
 * Date: 29.11.2016
 * Time: 16:24
 */

namespace backend\modules\pages\models;


use yii\db\ActiveRecord;

class Pages extends \common\models\db\Pages{
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
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