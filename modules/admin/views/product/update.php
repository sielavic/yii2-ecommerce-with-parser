<?php
use DiDom\Document;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
$this->title = '제품 업데이트: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(isset($content) ){
    echo   $this->render('_form', [
        'model' => $model, 'content' => $content, 'name2' => $name2,  'property' => $property, 'art' => $art
     ]); 
     }else{ 
     echo  $this->render('_form', [
        'model' => $model, 
       'property' => $property
     ]); 
     }  
     ?>
</div>
