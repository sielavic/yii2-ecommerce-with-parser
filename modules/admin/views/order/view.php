<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">
    <h1>주문 번호보기<?= $model->id ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '이 항목을 삭제 하시겠습니까?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
//            'status',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">활성 주문</span>' : '<span class="text-success">완료된 주문</span>',
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
            
        ],
    ]) ?>
    <?php $items = $model->orderItems;?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>이름</th>
                <th>크기</th>
                <th>수량</th>
                <th>가격</th>
                <th>총 주문 금액</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item):?>
                <tr>
                    <td><a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $item->product_id])?>"><?= $item['name']?></a></td>
                    <td><?= $item['size']?></td>
                    <td><?= $item['qty_item']?></td>
                    <td>$<?= $item['price']?></td>
                    <td><?= $item['sum_item']?></td>               
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>
