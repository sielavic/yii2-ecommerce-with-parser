<?php


namespace app\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


public $propertyValue = array(); //id значение свойств



    public static function tableName(){
        return 'product';
    }
    
    
       /**
     * @return $this
     * Получаем свойства через связаную модель
     */
    public function getValueProduct()
    {
        return $this->hasMany(PropertyValues::className(), ['id' => 'idValue'])
            ->viaTable('value_producr' , ['idProduct' => 'id']);

    }
    
    
    public function rules()
    {
        return [
        ['propertyValue', function($attribute, $params, $validator){
                if(!is_array($this->$attribute)){
                    $this->addError($attribute, 'Ой что то пошло не так');
                }
            }],
            [['rating', 'ratingVotes', 'rait', 'sessid'], 'safe'],  
        ];
        }
    
    
    
       /**
     * @param $array
     * @param $idProduct
     * Привязка значений к продукту
      */
    public function saveValue($array , $idProduct ){

        ValueProducr::deleteAll(['idProduct' => $idProduct]);
        foreach ($array as $value){
        $idValue = $value;
                $model= new ValueProducr();
                $model->idProduct = $idProduct;
                $model->idValue = $idValue;
                $model->save();
            }
            
        }
    
    
    
    

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

} 
