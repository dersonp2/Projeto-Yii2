<?php

use yii\db\Migration;
use \yii\db\Expression;
/**
 * Handles the creation of table `{{%bills}}`.
 */
class m200215_133133_create_bills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bills}}', [
            'id' => $this->primaryKey(),
            'category_id'=> $this->integer()->notNull(),
            'type'=>$this->smallInteger(1)-> notNull(), //1-Receber 2-Pagar
            'date'=>$this->date()->notNull(),
            'description' =>$this->string(60)->notNull(),
            'amount' => $this->decimal(10,2)->notNull(),
            'status'=>$this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' =>$this->dateTime()->notNull(),
            'updated_at' =>$this->dateTime()
        ]);
        $this->addForeignKey('fk_bills_category_id', '{{bills}}', 'category_id',
            '{{categories}}', 'id' );

        $this->batchInsert('{{bills}}',['category_id', 'type','date', 'description', 'amount', 'created_at'] ,[
            //salário
            [6,1,'2020-01-05', 'Salario', 3000, new Expression('NOW()')],
            [6,1,'2020-01-07', 'Salario esposa', 2500, new Expression('NOW()')],

            //Cartao de crédito
            [1,2,'2020-01-10', 'Pneu', -250, new Expression('NOW()')],
            [1,2,'2020-01-10', 'Monitor Led', -679.90, new Expression('NOW()')],

            //Lazer
            [2,2,'2020-01-10', 'Academia', -70, new Expression('NOW()')],
            [2,2,'2020-01-10', 'Netflix', -21.90, new Expression('NOW()')],

            //Moradia
            [3,2,'2020-01-10', 'Moradia', -300, new Expression('NOW()')],

            //Supermercado
            [4,2,'2020-01-12', 'Compras da quinzena', -225, new Expression('NOW()')],

            //Veículo
            [5,2,'2020-01-14', 'Troca de óleo', -100, new Expression('NOW()')],
            [5,2,'2020-01-14', 'Combustível', -80, new Expression('NOW()')],
            [5,2,'2020-01-14', 'Lava Jato', -50, new Expression('NOW()')]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_bills_category_id', '{{bills}}');
        $this->dropTable('{{%bills}}');
    }
}
