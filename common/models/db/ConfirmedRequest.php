<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "confirmed_request".
 *
 * @property integer $id
 * @property string $name
 * @property string $mail
 * @property string $phone
 * @property integer $dt_add
 * @property integer $dt_end
 * @property integer $new
 */
class ConfirmedRequest extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'confirmed_request';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [ [ 'dt_add', 'new' ], 'integer' ],
            [ [ 'name', 'mail', 'phone' ], 'string', 'max' => 255 ],
            [ [ 'dt_end' ], 'safe' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id'     => 'ID',
            'name'   => 'Name',
            'mail'   => 'Mail',
            'dt_add' => 'Dt Add',
            'dt_end' => 'Dt End',
            'new'    => 'New',
            'phone'  => 'Телефон',
        ];
    }
}
