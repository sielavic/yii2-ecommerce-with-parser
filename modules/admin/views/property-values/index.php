<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = '제품 속성의 가치';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-values-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('제품 속성 만들기', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'idProperty',
                'value' => function ($data){
                    return $data->property->name;
                },
                'format' => 'html',
            ],
            'value',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
