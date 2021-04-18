<?php
namespace app\modules\admin\models;
use Yii;
/**
 * This is the model class for table "property_values".
 *
 * @property int $id
 * @property int $idProperty
 * @property int $value
 */
class PropertyValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property_values';
    }
    /**
     * @return \yii\db\ActiveQuery
     * Получаем свойство
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'idProperty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * Получаем значения присвоеные продукту
     */
    public function getProduct(){
        return $this->hasMany(ValueProducr::className(), ['idValue' => 'id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProperty', 'value'], 'required'],
            [['idProperty'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idProperty' => '제품 속성',
            'value' => '항목 속성 값',
        ];
    }
}
