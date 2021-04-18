<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PropertyValues */
/* @var $form yii\widgets\ActiveForm */
$params = [
    'prompt' => '제품 속성 선택'
];
?>
<div class="property-values-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'idProperty')->dropDownList($property,$params); ?>
    <?= $form->field($model, 'value')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('저장', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
