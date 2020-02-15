<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m200215_133112_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'create_at' =>$this->dateTime()->notNull(),
            'update_at' =>$this->dateTime()
        ]);
//Tabela, coluna, linha
        $this->batchInsert('{{%categories}}', ['name', 'create_at'],[
         ['Cartão de crédito', new Expression('NOW()')],
         ['Lazer', new Expression('NOW()')],
         ['Moradia', new Expression('NOW()')],
         ['Supermercado', new Expression('NOW()')],
         ['Veículo', new Expression('NOW()')],
         ['Salario', new Expression('NOW()')]
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
