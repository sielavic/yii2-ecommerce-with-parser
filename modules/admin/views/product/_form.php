<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
use yii\widgets\DetailView;
use kartik\file\FileInput;
use DiDom\Document;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
$array = array();
$name = array();
$napoln = array();
//Создаём чекбокс лист
foreach ($property as $value){
    $array[$value->property->id][$value->id] = $value->value;
    $name[$value->property->id] = $value->property->name;
}
// Наполняем чекбокс лист
if (!$model->isNewRecord){
    foreach ($model->valueProduct as $prop){
        $napoln[$prop->property->id][] = $prop->id;
    }
    $model->propertyValue = $napoln;
}
?>
<div class="product-form">
<?php if(!empty($content) && !empty($name2)){
 $model['content']= $content;
 $model['name']= $name2;
 $model['art'] = $art;
 }
?>
    <?php $form = ActiveForm::begin(
    [
    //'action' => ['product/index'],
   //'action' =>['view', 'id' => $model->id],
    'options' => ['enctype' => 'multipart/form-data']
    ]
    ); ?>
    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">상위 카테고리</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
        </select>
    </div>
    <?php $model->name = strip_tags($model->name); ?>
    <?php $model->name = mb_eregi_replace("[0-9]", "", $model->name); ?>
    <?php $model->name = mb_eregi_replace("[a-zA-Z]", "", $model->name); ?>
    <?php $model->name = str_replace(array( '(', ')' ), '', $model->name); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php $model->art = strip_tags($model->art); ?>
    <?= $form->field($model, 'art')->textInput() ?>
     <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [])
    ]);
    ?>
    <?= $form->field($model, 'html')->textInput() ?>
    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gallery')->widget(FileInput::class, [
    'pluginOptions' => [
        'initialPreview' => [$model->gallery],
        'initialPreviewAsData' => true,
        'overriteInitial' => true,
        'showCaption' => false,
        'showRemove' => true,
        'showUpload' => true,
        'browseClass' => 'btn btn-primary btn-block',
        'browseIcon' => '<i class="fa fa-camera"></i> ',
        'browseLabel' =>  '사진 선택'
    ],
    'options' => [
     'accept' =>'image/*',
     'multiple' => true
     ],    
]);
?>     
<?php Pjax::begin(); ?>
<?php $gallery = $model->getImages(); ?>
<div class="row">
    <?php foreach ( $gallery as $image ): ?>
        <div class="col-xs-6 col-md-3 thumbnail reshenie_image_form">
            <?= Html::img( $image->getUrl('300x423') , [ 'class' => 'img_slider_view' ] ) ?>
            <p class="text-center">
                <?php 
                    if ( $image->isMain ) {
                        echo Html::tag( 'span' , Yii::t( 'app' , 'Main' ) , [ 'class' => "label label-success" ] );
                    } else {
                        echo Html::a( '<i class="glyphicon glyphicon-pushpin"></i> ' . Yii::t( 'app' , 'Set Main' ),
                            [  'set-main-image', 'id' => $model->id , 'image_id' => $image->id], 
                            [ 'class' => 'btn btn-xs btn-default' ]
                        );
                    }
                ?>
                <?= Html::a( '<i class="glyphicon glyphicon-remove"></i> ' . Yii::t( 'app' , 'Remove' ),
                    [ 'delete-image' , 'id' => $model->id , 'image_id' => $image->id ],
                    [ 'class' => 'btn btn-xs btn-danger' ]
                ) ?>
            </p>
        </div>
    <?php endforeach; ?>
</div> 
<?php Pjax::end(); ?>
    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>
    <?= $form->field($model, 'new')->checkbox([ '0', '1', ]) ?>
    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ]) ?>
   <?php foreach ($array as $key => $value) :?>
        <?= $form->field($model, "propertyValue[$key]") 
        ->checkboxList($value)
        ->label($name[$key]); ?>
    <?php  endforeach; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
