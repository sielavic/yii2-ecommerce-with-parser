<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Property */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '제품 속성', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('편집하다', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('지우다', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '정말로 삭제 하시겠습니까 '.$model->name.'?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
        ],
    ]) ?>
</div>
