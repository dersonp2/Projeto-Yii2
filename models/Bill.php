<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bills}}".
 *
 * @property int $id
 * @property int $category_id
 * @property int $type
 * @property string $date
 * @property string $description
 * @property float $amount
 * @property int $status
 * @property string $create_at
 * @property string|null $update_at
 *
 * @property Category $category
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bills}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'type', 'date', 'description', 'amount', 'create_at'], 'required'],
            [['category_id', 'type', 'status'], 'integer'],
            [['date', 'create_at', 'update_at'], 'safe'],
            [['amount'], 'number'],
            [['description'], 'string', 'max' => 60],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'type' => 'Type',
            'date' => 'Date',
            'description' => 'Description',
            'amount' => 'Amount',
            'status' => 'Status',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}