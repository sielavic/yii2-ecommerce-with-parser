<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="order-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'created_at')->textInput(['placeholder' => '만들어진'])->label(false) ?>
    <?= $form->field($model, 'updated_at')->textInput(['placeholder' => '업데이트 됨'])->label(false) ?>
    <?= $form->field($model, 'qty')->textInput(['placeholder' => '총 상품 수량'])->label(false) ?>
    <?= $form->field($model, 'sum')->textInput(['placeholder' => '합계'])->label(false) ?>
    <?= $form->field($model, 'status')->dropDownList([ '0' => '활성 주문', '1' => '완료된 주문', ])->label('주문 상태') ?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => '당신의 이름'])->label(false) ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => '이메일'])->label(false) ?>
    <?= $form->field($model, 'phone')->textInput(['placeholder' => '전화'])->label(false) ?>
    <?= $form->field($model, 'address')->textInput(['placeholder' => '주소'])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
