<?php

use yii\db\Migration;

/**
 * Handles adding phone to table `request`.
 */
class m170110_084117_add_phone_column_to_request_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('request', 'phone', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('request', 'phone');
    }
}
