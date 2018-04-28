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
            [['url'],'url'],
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
        return ['general supply'=>'general supply','antibody'=>'antibody','cell line'=>'cell line',
            'chemical'=>'chemical',
            'enzyme restriction'=>'enzyme restriction','equipment'=>'equipment',
            'ologo or primer'=>'ologo or primer','plasmid'=>'plasmid'];
    }

    public function getTypesLable($num)
    {
        switch ($num){
            case 0:
                $item = 'general supply';
                break;
            case 1:
                $item = 'antibody';
                break;
            case 2:
                $item = 'cell line';
                break;
            case 3:
                $item = 'chemical';
                break;
            case 4:
                $item = 'enzyme restriction';
                break;
            case 5:
                $item = 'equipment';
                break;
            case 6:
                $item = 'ologo or primer';
                break;
            case 7:
                $item = 'plasmid';
                break;
        }
        return $item;
    }

}
