<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PropertyValues */
$this->title = '속성 값 편집: ' .$model->property->name . ' ' .$model->value;
$this->params['breadcrumbs'][] = ['label' => '제품 속성의 가치', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->property->name . ' ' .$model->value, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '편집';
?>
<div class="property-values-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'property' => $property,
    ]) ?>
</div>
