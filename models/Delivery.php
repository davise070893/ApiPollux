<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property integer $id
 * @property integer $id_truck
 * @property integer $id_driver
 * @property string $fecha
 * @property integer $mileage_am
 * @property integer $loader_one
 * @property integer $loader_two
 * @property integer $status
 * @property integer $generated
 * @property string $delivery_date
 * @property string $total_cash
 * @property string $total_chq
 * @property string $total_collection
 * @property string $cashier
 * @property string $supervisor
 * @property integer $closed
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_truck', 'id_driver', 'mileage_am', 'loader_one', 'loader_two', 'status', 'generated', 'closed'], 'integer'],
            [['fecha', 'delivery_date'], 'safe'],
            [['total_cash', 'total_chq', 'total_collection', 'cashier', 'supervisor'], 'string'],
            [['id_truck'], 'exist', 'skipOnError' => true, 'targetClass' => Truck::className(), 'targetAttribute' => ['id_truck' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_truck' => 'Id Truck',
            'id_driver' => 'Id Driver',
            'fecha' => 'Fecha',
            'mileage_am' => 'Mileage Am',
            'loader_one' => 'Loader One',
            'loader_two' => 'Loader Two',
            'status' => 'Status',
            'generated' => 'Generated',
            'delivery_date' => 'Delivery Date',
            'total_cash' => 'Total Cash',
            'total_chq' => 'Total Chq',
            'total_collection' => 'Total Collection',
            'cashier' => 'Cashier',
            'supervisor' => 'Supervisor',
            'closed' => 'Closed',
        ];
    }
}
