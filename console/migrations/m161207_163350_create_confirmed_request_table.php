<?php

use yii\db\Migration;

/**
 * Handles the creation of table `confirmed_request`.
 */
class m161207_163350_create_confirmed_request_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('confirmed_request', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(255),
            'mail'=> $this->string(255),
            'dt_add'=>$this->integer(11),
            'dt_end'=>$this->integer(11),
            'new'=>$this->integer(1)->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('confirmed_request');
    }
}
