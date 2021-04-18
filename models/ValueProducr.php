<?php

namespace app\models;

//use app\controllers\CustomController;
use Yii;

/**
 * This is the model class for table "value_producr".
 *
 * @property int $id
 * @property int $idValue
 * @property int $idProduct
 */
class ValueProducr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'value_producr';
    }

    /**
     * @return \yii\db\ActiveQuery
     * Связь сохранёных значений с продуктом
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'idProduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * связь сохранёных значений со списком значений
     */
    public function getValue(){
        return $this->hasMany(PropertyValues::className(), ['id' => 'idValue']);

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idValue', 'idProduct'], 'required'],
            [['idValue', 'idProduct'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idValue' => 'Id Value',
            'idProduct' => 'Id Product',
        ];
    }


}
