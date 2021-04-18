<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\rating\StarRating;
?>
<section id="advertisement">
    <div class="container">
     <div class="notification-bar bg-blue text-center">
         
            <h5 class="subscribe-newsletter-btn txt-white mb-0"><i class="fa fa-gift " aria-hidden="true"></i> 다음 주문시 10 % 할인! 예, 부탁합니다!</h5>
        </div>
     
    
    
       <!-- <img src="/images/shop/1.jpg" alt="" /> -->
    </div>
</section>

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

<div class="col-sm-9 padding-right">
<?php if( !empty($hits) ): ?>
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">모든 아이템</h2>
    <?php $i = 0; foreach($hits as $hit): ?>
    <?php $mainImg = $hit->getImage();?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                <a href="<?= \yii\helpers\Url::to(['wishlist/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn-add-wishlist   btn btn-fefault add-to-wishlist wishlist"> <i class="fa fa-heart"></i></a>
                   <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>">  <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $hit->name])?> </a>
                    <h2>$<?= $hit->price?></h2>
                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name?></a></p>
                  <ul class="sweet">
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
  
    
    
    <?php $i++?>
            <?php if($i % 9 == 0): ?>
               <div class="clearfix"></div> 
            <?php endif;?>
            <?php endforeach;?>
        <div class="clearfix"></div> 
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
        <?php else :?>
        <h2>Здесь товаров пока нет...</h2>
    <?php endif;?>
    
    
</div><!--features_items-->




</div>
</div>
</div>
</section>
