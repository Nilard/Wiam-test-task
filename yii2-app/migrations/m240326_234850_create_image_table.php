<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m240326_234850_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-post-image_id',
            '{{%image}}',
            'image_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-post-image_id',
            '{{%image}}'
        );

        $this->dropTable('{{%image}}');
    }
}
