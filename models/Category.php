<?php


namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){
        return 'category';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

	public function getPopularBrands() {
		// получаем бренды с наибольшим кол-вом товаров
		$brands = self::find()
		    ->select([
		        'id' => 'category.id',
		        'name' => 'category.name',
		        'count' => 'COUNT(*)'
		    ])
		    ->innerJoin(
		        'product',
		        'product.category_id = category.id'
		    )
		    ->groupBy([
		        'category.id', 'category.name'
		    ])
		    ->orderBy(['count' => SORT_DESC])
		    ->limit(10)
		    ->asArray()
		    // для дальнейшей сортировки
		    ->indexBy('name')
		    ->all();
		// теперь нужно отсортировать бренды по названию
		ksort($brands);
                return $brands;
	    }




} 
