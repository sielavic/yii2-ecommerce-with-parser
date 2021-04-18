<?php


namespace app\components;
use yii\base\Widget;
use app\models\Category;
use Yii;

class BrandsWidget extends Widget{
public function run() {
        // пробуем извлечь данные из кеша
        $html = Yii::$app->cache->get('menubran1');
        if ($html === false) {
            // данных нет в кеше, получаем их заново
            $brands = (new Category())->getPopularBrands();
            $html = $this->render('brands', ['brands' => $brands]);
            // сохраняем полученные данные в кеше
            Yii::$app->cache->set('menubran', $html, 60);
        }
        return $html;
    }


} 
