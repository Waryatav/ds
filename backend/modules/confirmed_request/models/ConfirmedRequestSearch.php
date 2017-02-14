<?php

namespace backend\modules\confirmed_request\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\confirmed_request\models\ConfirmedRequest;

/**
 * ConfirmedRequestSearch represents the model behind the search form about `backend\modules\confirmed_request\models\ConfirmedRequest`.
 */
class ConfirmedRequestSearch extends ConfirmedRequest {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [ [ 'id', 'dt_add', 'dt_end' ], 'integer' ],
            [ [ 'name', 'mail', 'phone' ], 'safe' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search( $params ) {
        $query = ConfirmedRequest::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider( [
            'query' => $query,
        ] );

        $this->load( $params );

        if ( ! $this->validate() ) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere( [
            'id'     => $this->id,
            'dt_add' => $this->dt_add,
            'dt_end' => $this->dt_end,
        ] );

        $query->andFilterWhere( [ 'like', 'name', $this->name ] )
              ->andFilterWhere( [ 'like', 'mail', $this->mail ] )
              ->andFilterWhere( [ 'like', 'phone', $this->phone ] );

        return $dataProvider;
    }
}