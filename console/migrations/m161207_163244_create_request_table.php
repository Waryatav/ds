<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request`.
 */
class m161207_163244_create_request_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('request', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(255),
            'mail'=> $this->string(255),
            'dt_add'=>$this->integer(11),
            'duration'=>$this->integer(11),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('request');
    }
}
