<?php
namespace app\modules\admin\models;
use Yii;
/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{ 
   public $image;
    public $gallery;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
public $propertyValue = array(); //id значение свойств
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
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
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [     
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description',  'img'], 'string', 'max' => 255],
           // [['image'], 'file',  'extensions' => 'png, jpg'], 
            [['gallery'], 'file',  'extensions' => 'png, jpg',  'maxFiles' => 0],
            [['html'], 'string'],
            [['art'], 'string'],
            [['name2'], 'string'],
            ['propertyValue', function($attribute, $params, $validator){
                if(!is_array($this->$attribute)){
                    $this->addError($attribute, 'Ой что то пошло не так');
                }
            }],      
            [[ 'html',  'name','price', 'content','category_id', 'urlAlias', 'art', 'name2'], 'safe']
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '아이템 ID',
            'category_id' => '범주',
            'name' => '이름',
            'content' => '함유량',
            'price' => '가격',
            'keywords' => '키워드',
            'description' => '메타 설명',
          //  'value' 
          //  'image' => 'Фото',
            'gallery' => '갤러리',
            'hit' => '인기 상품',
            'new' => '새로운',
            'sale' => '판매',
            'html' => 'html',
            'art' => '제품 번호',  
        ];
    }
 public function uploadGallery(){
        if($this->validate() ){
            foreach($this->gallery as $file){        
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);   
            }         
            return true;
        }else{
            return false;
        }
    }
   /**
     * @param $array
     * @param $idProduct
     * Привязка значений к продукту
     */
    public function saveValue($array , $idProduct ){
        ValueProducr::deleteAll(['idProduct' => $idProduct]);
        foreach ($array as $value){
         if(!empty($value)){
            foreach ($value as $idValue){
                $model= new ValueProducr();
                $model->idProduct = $idProduct;
                $model->idValue = $idValue;
                $model->save();
                }
            }
            
        }
    } 
  public function save($runValidation = true, $attributeNames = null){
    if ($this->getIsNewRecord()) {
        return $this->insert($runValidation, $attributeNames);
    } else {
        return $this->update($runValidation, $attributeNames) !== false;
    }
}  
}     







