<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PropertyValues */
$this->title = '제품 속성 값 만들기';
$this->params['breadcrumbs'][] = ['label' => '제품 속성의 가치', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-values-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'property' => $property,
    ]) ?>
</div>
