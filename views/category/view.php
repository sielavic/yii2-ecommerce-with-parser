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
<div class="features_items"><!--features_items-->
<h2 class="title text-center"><?= $category->name?></h2>
    <?php if(!empty($products)): ?>
        <?php $i = 0; foreach($products as $product): ?>
        <?php $mainImg = $product->getImage();?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
            <a href="<?= \yii\helpers\Url::to(['wishlist/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn-add-wishlist   btn btn-fefault add-to-wishlist wishlist"> <i class="fa fa-heart"></i></a>
               <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"> <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $product->name])?></a>
                <h2>$<?= $product->price?></h2>
                
                <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name?></a></p>
                <ul class="sweet">
                  <li>  <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>장바구니에 담기</a></li>
                 </ul>
                 
                 <?php 
        echo StarRating::widget(['id' => 'rating' . $product->id, 'name' => 'rating_1', 'value' => $product->rating, 'pluginOptions' => ['readonly' => true, 'showClear' => false, 'showCaption' => false, 'stars' => 5,
                            'step' => 1,
                            'min' => 0,
                            'max' => 5, 'size' => 'xs']]);
                  ?>
            </div>
            <?php if($product->new): ?>
                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
            <?php endif?>
            <?php if($product->sale): ?>
                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
            <?php endif?>
        </div>
        
    </div>
</div>
            <?php $i++?>
            <?php if($i % 3 == 0): ?>
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
<!--<ul class="pagination">
    <li class="active"><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">&raquo;</a></li>
</ul>-->
</div><!--features_items-->
</div>
</div>
</div>
</section>
