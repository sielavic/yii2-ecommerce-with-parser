<?php
namespace app\modules\admin\controllers;
use Yii;
use app\modules\admin\models\Product;
use app\modules\admin\models\Property;
use app\modules\admin\models\PropertyValues;
use app\modules\admin\models\ValueProducr;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use DiDom\Document;
use rico\yii2images\models\Image;
use DOMElement;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    // public $html;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(), 
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,          
        ]);
    }
    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product(); 
         // Получаем все значения
        $property = PropertyValues::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "생성물 {$model->name} 추가됨");
             //Приязываем товар к свойствам
            $model->saveValue($model->propertyValue, $model->id);    
            return $this->redirect(['view', 'id' => $model->id]);
            }  
            return $this->render('create', [
            'model' => $model,
            'property' => $property,
        ]);
  
    }
     /**
* @mixin rico\yii2images\behaviors\ImageBehave
*/
public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(!isset($html) && !isset($content)) {
        Yii::$app->request->post('html');
        $html = $model['html'];
        if(!isset($content)   ){
          $document = new Document($html, true);
         $names = $document->find('._copyable');  // '._copyable'
          foreach($names as $name2) {
         $name2->removeAllAttributes();
         $name2->text();
         }
         $contents = $document->find('._1Hbih69XFT');                    // $content->child(0)->html(); $tr->child(2)->remove();
          foreach($contents as $content) {                                                                  
          $tr = $document->first('tbody');
          $tr->child(2)->remove();
          $document->first('.jvlKiI0U_y' )->remove();
          $document->first('._15qeGNn6Dt' )->remove();
          $document->first('._30lbnJNDgG' )->remove();
          $document->first('._1P8iKembp3' )->remove();
          }
          $document = new Document($html, true);
          $modelnames = $document->find('.TH_yvPweZa');    
          foreach($modelnames as $art) {
          $art = $document->first('tbody');
          $art->child(1)->html();
          $document->first('.jvlKiI0U_y' )->remove();
          $document->first('._15qeGNn6Dt' )->remove();
          $document->first('._15qeGNn6Dt' )->remove();
          $art->removeAllAttributes();
        }

         }
  }
            $property = PropertyValues::find()->all();
            if ($model->load(Yii::$app->request->post()) && $model->save() ) {
               unset($model->image);
               $model->gallery = UploadedFile::getInstances($model, 'gallery');
               $model->uploadGallery();
               //Приязываем товар к свойствам
             //   $model->saveValue($model->propertyValue, $model->id);   
             return  $this->redirect(['update', 'id' => $model->id, 'model' => $model, 'property' => $property,  ]); 
           }elseif(!isset($content) && !isset($name2) && !isset($art)){     
            //Yii::$app->session->setFlash('success', " {$model->name} changed");    
            return $this->render('update',[ 'id' => $model->id, 'model' => $model,  'property' => $property]);
          }else{
          return $this->render('update',[ 'id' => $model->id, 'model' => $model, 'content' => $content, 'name2' => $name2, 'art' => $art, 'property' => $property]);
          }      
            if(!isset($content) && isset($name2)){
            Yii::$app->session->setFlash('success', "контент пуст {$model->name} changed");   
            return $this->render('update',[ 'id' => $model->id, 'model' => $model, 'property' => $property, 'name2' => $name2, 'art' => $art]); 
            }else{
             Yii::$app->session->setFlash('success', "Элсе контент {$model->name} changed");    //если без фото и с фото
            return $this->render('update',[ 'id' => $model->id, 'model' => $model, 'content' => $content, 'name2' => $name2, 'art' => $art, 'property' => $property]);
            }
                            //если модель сейв здесь скобка была
    }
    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    } 
    public function actionDeleteImage($id, $image_id = null)
    {
        $model = $this->findModel($id);
        if ( $image_id !== null && ($image = Image::findOne($image_id)) !== null) {
            $model->removeImage( $image );
        }
        if(Yii::$app->request->isPjax){
     $endURL = $this->redirect(['update', 'id' => $model->id]); 
     return $this->run($endURL);
      } else {
     return $this->redirect([$endURL]); 
       }
    }
    /**
     * Sets main model image.
     * @param integer $id
     * @param integer $image_id
     * @return mixed
     */
    public function actionSetMainImage($id, $image_id = null)
    {
        $model = $this->findModel($id);
        if ( $image_id !== null && ($image = Image::findOne($image_id)) !== null) {
            $model->setMainImage( $image );
        }
      // return $this->render('update', [
     //     'model' => $model,
     //  ]);
       if(Yii::$app->request->isPjax){
     $endURL = $this->redirect(['update', 'id' => $model->id]); 
     return $this->run($endURL);
      } else {
     return $this->redirect([$endURL]); 
       }    
     }
 }
    
