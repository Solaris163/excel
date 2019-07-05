<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $level1
 * @property string $level2
 * @property string $level3
 * @property string $price
 * @property string $priceSP
 * @property string $quantity
 * @property string $property
 * @property int $joint_purchase
 * @property string $measure
 * @property string $img
 * @property int $show_on_main
 * @property string $description
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'price', 'priceSP'], 'string', 'max' => 10],
            [['joint_purchase', 'show_on_main'], 'integer'],
            [['description', 'property'], 'string'],
            [['code', 'name', 'level1', 'level2', 'level3', 'measure', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'код',
            'name' => 'Наименование',
            'level1' => 'Уров.1',
            'level2' => 'Уров.2',
            'level3' => 'Уров.3',
            'price' => 'Цена',
            'priceSP' => 'ЦенаСП',
            'quantity' => 'Кол-во',
            'property' => 'П. свойств',
            'joint_purchase' => 'Совм. покуп.',
            'measure' => 'Ед. изм.',
            'img' => 'Картинка',
            'show_on_main' => 'На главн.',
            'description' => 'Описание',
        ];
    }
}
