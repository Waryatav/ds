<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property string $name
 * @property string $mail
 * @property string $phone
 * @property integer $dt_add
 * @property integer $duration
 */
class Request extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [ [ 'dt_add', 'duration' ], 'integer' ],
            [ [ 'name', 'mail', 'phone' ], 'string', 'max' => 255 ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id'       => 'ID',
            'name'     => 'Name',
            'mail'     => 'Mail',
            'dt_add'   => 'Dt Add',
            'duration' => 'Duration',
            'phone'    => 'Телефон',
        ];
    }
}
