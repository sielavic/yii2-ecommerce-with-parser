<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
$array = array();
$name = array();
$napoln = array();
// для create
foreach ($property as $value){
    $array[$value->property->id][$value->id] = $value->value;
    $name[$value->property->id] = $value->property->name;
}
//  для update
if (!$product->isNewRecord){
    foreach ($product->valueProduct as $prop){
        $napoln[$prop->property->id][] = $prop->id;
    }
    $product->propertyValue = $napoln;
}
?>
<section>
<div class="container">
<div class="row">
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>범주</h2>
        <ul class="catalog category-products">
            <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
        </ul>
        <div class="brands_products"><!--brands_products-->
            <h2>브랜드</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?= \app\components\BrandsWidget::widget(); ?>
                </ul>
            </div>
        </div><!--/brands_products-->
       <div class="shipping"><!--shipping-->
        <div class="img-bn"> <img src="/images/home/shipping.png" alt="" class="img-responsive"></div>
        <div class="titlebanner">
        <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btnn btn btn-default3 ">#새로운데님</a>
        </div>    
        </div><!--/shipping-->
    </div>
</div>
<?php
$mainImg = $product->getImage();
$gallery = $product->getImages();
?>
<div class="col-sm-9 padding-right">
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
        <?= Html::img($mainImg->getUrl(), ['alt' => $product->name])?>
       <div id="img_container">      <?= Html::img($mainImg->getUrl(), ['alt' => ""])?>       </div>
 	    <h3>줌</h3>  
<?php 
$js = <<< JS
$(document).ready(function() {	
       $('.view-product h3').click(function()
       {
            var imgSrc = $(this).attr("src");
            $('#img_container img').attr({src: imgSrc});
            $('#img_container').fadeIn('slow');
       });
       $('#img_container').click(function()
       {
            $(this).fadeOut();
       });
});      
JS;
$this->registerJs( $js, $position = yii\web\View::POS_READY, $key = null );
?>	  	   
<?php 
$js = <<< JS
$(document).ready(function() {	
       $('.view-product img').click(function()
       {
            var imgSrc = $(this).attr("src");
            $('#img_container img').attr({src: imgSrc});
            $('#img_container').fadeIn('slow');
       });
       $('#img_container').click(function()
       {
            $(this).fadeOut();
       });
});       
JS;
$this->registerJs( $js, $position = yii\web\View::POS_READY, $key = null );
?> 
  </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
<?php $count = count($gallery); $i = 0; foreach($gallery as $img): ?>
    <?php if($i % 3 == 0):?>
        <div class="col item <?php if($i == 0) echo ' active'?>">
    <?php endif;?>
        <a ><?= Html::img($img->getUrl(), ['alt' => ''])?></a>
    <?php $i++; if($i % 3 == 0 || $i == $count):?>
        </div>
    <?php endif;?>
<?php endforeach;?>
            </div>
<?php 
$js = <<< JS
$(document).ready(function() {	
       $('#similar-product .carousel-inner .item img').click(function()
       {
            var imgSrc = $(this).attr("src");
            $('#img_container img').attr({src: imgSrc}); 
            $('#img_container').fadeIn('slow');
       });
       $('#img_container').click(function()
       {
            $(this).fadeOut();
       });
});      
JS;
$this->registerJs( $js, $position = yii\web\View::POS_READY, $key = null );
?> 
            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <?php if($product->new): ?>
                <?= Html::img("@web/images/product-details/new2.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
            <?php endif?>
            <?php if($product->sale): ?>
                <?= Html::img("@web/images/product-details/sale2.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
            <?php endif?>
            <h2><?= $product->name?></h2>
		    <?php echo $product->rating;
                    echo StarRating::widget([
                    'language' => 'es',
		     'name' => 'rating_1',
                        'model' => $product,
                        'attribute' => 'rating',
	          'pluginOptions' => ['size'=>'xs', 'theme' => 'krajee-uni', 'stars' => 5,
                            'step' => 1,
                            'min' => 0,
                            'max' => 5,
                           // 'disabled' => Yii::$app->user->isGuest ? true : false,//для гостя блокируем кнопки
                            'showClear' => false,// (знак "кирпич")
                            'showCaption' => false,//без подписи количества выбранных
                            'size' => 'xs',
                            'defaultCaption' => '평가 {rating}',
                            ], 
                            'pluginEvents' => [
        "rating:change" => "function(event, value, caption) {
                                $.ajax({
                                    type: 'POST',
                                    url: '".\yii\helpers\Url::to()."',//адрес контроллера и экшена. Так как вид вызван из того же экшена, что и обработка этого запроса, тооставляем пустым или пишем - controller/action
                                    data: {'rait': value},// value - число выбранных звезд
                                    cache: false,
                                    success: function(data) {
                                    var inputRating = $('#product-rating');
                                        if (typeof data.message !== 'undefined') {
                                           inputRating.rating('reset');//очищает рейтинг до значения в бд    
                                        }else{       
                                     inputRating.rating('refresh', {disabled: true, showClear: false, showCaption: true});//добавляет рейтинг и блокирует повторное нажатие                         
                                        }
                                    }
                                });
                            }",
                        ],         
	             ]);  
	             ?>
		   <?php  $form = ActiveForm::begin(['id' => 'field_id' ]); ?>		
		<?php foreach ($array as $key => $value) :?>
			<?= $form->field($product, "propertyValue[$key]" )     //['options' => ['id'=>'$value']]  ['options' => ['id'=>'field_id']]
			->dropDownList($value,  ['onchange' => 'this.form.submit()'],  ['prompt'=>'Choose...'])                   
			//->label($name[$key]); 
			 ->label('크기');                          //$prop->value число
			?>                            
		    <?php  endforeach; ?>
		    <?php ActiveForm::end(); ?>
		    
		    <!--
		        <?php  
			   foreach ($product->valueProduct as  $key => $value) {
			   foreach ($value as $value3) {
			   }
			   echo $form->field($product, "valueProduct") 
			    ->checkboxList(array($value3), ['checked' => 'this.form.submit()'])
			    ->label('');
			   }
			   ?>-->
		  
		 
           <!--   <?php  debug($product->valueProduct); ?> -->
                
		<span>
		<span>US $<?= $product->price?></span>
		<label>수량:</label>
		<input type="text" value="1" id="qty" />
		<a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id ])?>" data-id="<?= $product->id ?>" class="btn btn-fefault add-to-cart cart">
                                        <i class="fa fa-shopping-cart"></i>장바구니에 담기</a></span>                   
            <p><b>상품 가용성 :</b> 재고</p>    
            <p><b>상표:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></p>
            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </br>
            <?= $product->content?>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">추천 아이템</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
<?php $mainImg = $hit->getImage();?>
<?php if($i % 3 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                    <a href="<?= \yii\helpers\Url::to(['wishlist/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn-add-wishlist   btn btn-fefault add-to-wishlist wishlist"> <i class="fa fa-heart"></i></a>
                       <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>">  <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $hit->name])?> </a>
                        <h2>$<?= $hit->price?></h2>
                        <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>"><?= $hit->name?></a></p> 
                        <ul class="sweet2 ">
                  <li>  <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>장바구니에 담기</a></li>
                 </ul>         
                   <?php 
        echo StarRating::widget(['id' => 'rating' . $hit->id, 'name' => 'rating_1', 'value' => $hit->rating, 'pluginOptions' => ['readonly' => true, 'showClear' => false, 'showCaption' => false, 'stars' => 5,
                            'step' => 1,
                            'min' => 0,
                            'max' => 5, 'size' => 'xs']]);
                        ?>
                    </div>
                      <?php if($hit->new): ?>
                    <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                <?php endif?>
                <?php if($hit->sale): ?>
                    <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                <?php endif?> 
                </div>
            </div>
        </div>
<?php $i++; if($i % 3 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php endforeach; ?>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->
</div>
</div>
</div>
</section>
