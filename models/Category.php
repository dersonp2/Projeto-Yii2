<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Bill[] $bills
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
        ];
    }

    /**
     * Gets query for [[Bills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bill::className(), ['category_id' => 'id']);
    }

    public static function getNameCategory(){
        $row = static::find()->orderBy('name ASC')->all();
        return ArrayHelper::map($row, 'id', 'name');
    }
}
