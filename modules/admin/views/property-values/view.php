<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PropertyValues */
$this->title = $model->property->name .' '. $model->value;
$this->params['breadcrumbs'][] = ['label' => '제품 속성의 가치', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-values-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('편집하다', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('지우다', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '속성 값을 삭제 하시겠습니까?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'idProperty',
                'value' => function ($data){
                    return $data->property->name;
                },
                'format' => 'html',
            ],
            'value',
        ],
    ]) ?>
</div>
