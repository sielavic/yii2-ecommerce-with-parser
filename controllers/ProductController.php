<?php


namespace app\controllers;
use app\models\Category;
use app\models\Product;
use yii\helpers\ArrayHelper;
use app\models\Raits;
use app\models\Property;
use app\models\PropertyValues;
use app\models\ValueProducr;
use yii\widgets\Pjax;
use Yii;
use yii\web\Response;

class ProductController extends AppController{

    public function actionView($id){
   //    $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
       // $property = PropertyValues::find()->all();
        if(empty($product))
            throw new \yii\web\HttpException(404, 'Такого товара нет');
//        $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('서울7호점 | ' . $product->name, $product->keywords, $product->description);
         $property = PropertyValues::find()->all();                                     // PropertyValues::find()->all(); //массив     $property = PropertyValues::find()->all(); 
        if ($product->load(Yii::$app->request->post()) && $product->save() ) {
          $product->saveValue($product->propertyValue, $product->id);
         }                                                     //  PropertyValues::findOne($id);
         // Сохраняем чекбоксs
       
        //обработка звездного рейтинга
        if (Yii::$app->request->isPost && Yii::$app->request->isAjax && Yii::$app->request->post('rait') && $product->sessid !== Yii::$app->session->getId() ){
        
            $rait = Yii::$app->request->post('rait');//оценка пользователя
         //   debug($rait);
            $res = [];
                $raits = new Raits();
                $raits->materialId = $id;
                $raits->rateNum = $rait;
                $raits->save();
                $allRaits = Raits::find()->where(['materialId' => $id])
                                         ->select('rateNum');
                $allUsers = $allRaits->count();//сумма всех учетных записей пользователей к дан. материалу (1а запись - 1 пользователь)
                $sumVotes = $allRaits->sum('rateNum');//сумма всех оценок пользователей к дан. материалу
                $totalRating = round($sumVotes / $allUsers, 2);// округляем до сотых
                //записываем вычесленный рейтинг в таблицу материала в поле rating
               $product = Product::findOne($id);
                    $product->sessid  = Yii::$app->session->getId(); //антиспам лайков
                    $product->rating = $totalRating;
                    $product->ratingVotes = $allUsers;
                    $product->save();
                //возвращаем новый рейтинг в вид
                $res['rating'] = $product->rating;//передаем вычесленный рейтинг по материалу
                $res['ratingVotes'] = $product->ratingVotes;//передаем сумму всех голосов по материалу
                 }
       
     
        return $this->render('view',compact( 'product', 'hits', 'property'));
    } 
}
    

    
  


