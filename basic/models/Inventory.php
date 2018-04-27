<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property int $id
 * @property string $item_name
 * @property string $vendor
 * @property string $catolog
 * @property string $type
 * @property string $url
 * @property int $quantity
 * @property string $unit
 * @property string $location
 * @property string $per_size
 * @property int $per_price
 * @property string $note
 */
class Inventory extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name'], 'required'],
            [['quantity', 'per_price'], 'integer'],
            [['item_name', 'vendor', 'catolog', 'type', 'url', 'unit', 'location', 'per_size', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_name' => 'Item Name',
            'vendor' => 'Vendor',
            'catolog' => 'Catolog',
            'type' => 'Type',
            'url' => 'Url',
            'quantity' => 'Quantity',
            'unit' => 'Unit',
            'location' => 'Location',
            'per_size' => 'Per Size',
            'per_price' => 'Per Price',
            'note' => 'Note',
        ];
    }

    public function getTypes()
    {
        return ['general supply','antibody','cell line','chemical',
            'enzyme restriction','equipment','ologo or primer','plasmid'];
    }

}
