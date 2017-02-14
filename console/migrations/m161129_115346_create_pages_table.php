<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m161129_115346_create_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255)->notNull(),
            'content'=>$this->text(),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
            'slug' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('pages');
    }
}
