<?php

use yii\db\Migration;

/**
 * Handles adding phone to table `confirmed_request`.
 */
class m170110_084637_add_phone_column_to_confirmed_request_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('confirmed_request', 'phone', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('confirmed_request', 'phone');
    }
}
