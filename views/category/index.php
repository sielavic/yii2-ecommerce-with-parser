<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use kartik\rating\StarRating;
?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                        <li data-target="#slider-carousel" data-slide-to="3"></li>
                         <li data-target="#slider-carousel" data-slide-to="4"></li>
                         <li data-target="#slider-carousel" data-slide-to="5"></li>
                         <li data-target="#slider-carousel" data-slide-to="6"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                        <div class="col-sm-6">
                                <img src="images/home/girl1.png" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" /> <!--   813х798 -->
                              </div>
                            <div class="col-sm-6">
                                <h1><span>서울</span>7호점</h1>
                                <h2>다른 브랜드의 옷가게</h2>
                                <p>여기에서 저렴한 가격으로 다양한 옷을 찾을 수 있습니다 </p>
                                 <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btn btn-default2 get">지금 사세요</a>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>서울</span>7호점</h1>
                                <h2>다른 브랜드의 옷가게</h2>
                                <p>여기에는 할인 및 빠른 배송 시스템이 있습니다. </p>
                                <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btn btn-default2 get">지금 사세요</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                      <div class="item">
                       <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                            <div class="col-sm-6">
                                <h1><span>서울</span>7호점</h1>
                                <h2>다른 브랜드의 옷가게</h2>
                                <p>여기에는 할인 및 빠른 배송 시스템이 있습니다. </p>
                                <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btn btn-default2 get">지금 사세요</a>
                            </div>
                           
                        </div>


                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>서울</span>7호점</h1>
                                <h2>다른 브랜드의 옷가게</h2>
                                <p>우리는 오랫동안 옷을 공급해 왔습니다. 그것은 우리를 신뢰할 수있게합니다 </p>
                                <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btn btn-default2 get">지금 사세요</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl4.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>



                   <div class="item">
                   <div class="col-sm-6">
                                <img src="images/home/girl5.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                            <div class="col-sm-6">
                                <h1><span>서울</span>7호점</h1>
                                <h2>다른 브랜드의 옷가게</h2>
                                <p>우리는 오랫동안 옷을 공급해 왔습니다. 그것은 우리를 신뢰할 수있게합니다 </p>
                                <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btn btn-default2 get">지금 사세요</a>
                            </div>  
                        </div>


                           <div class="item">
                   
                            <div class="col-sm-6">
                                <h1><span>서울</span>7호점</h1>
                                <h2>다른 브랜드의 옷가게</h2>
                                <p>우리는 오랫동안 옷을 공급해 왔습니다. 그것은 우리를 신뢰할 수있게합니다 </p>
                                <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btn btn-default2 get">지금 사세요</a>
                            </div>  
                            <div class="col-sm-6">
                                <img src="images/home/girl6.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>
                        
                        <div class="item">
                   <div class="col-sm-6">
                                <img src="images/home/girl7.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                            <div class="col-sm-6">
                                <h1><span>서울</span>7호점</h1>
                                <h2>다른 브랜드의 옷가게</h2>
                                <p>우리는 오랫동안 옷을 공급해 왔습니다. 그것은 우리를 신뢰할 수있게합니다 </p>
                                <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btn btn-default2 get">지금 사세요</a>
                            </div>  
                            
                        </div>
                        


                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

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
        <div class="img-bn"> <img src="images/home/shipping.png" alt="" class="img-responsive"></div>
        <div class="titlebanner">
        <a href="<?= \yii\helpers\Url::to('@web/category/allcategory') ?>" class="btnn btn btn-default3 ">#새로운데님</a>
        </div>    
        </div><!--/shipping-->

    </div>
</div>





<div class="col-sm-9 padding-right ">
<?php if( !empty($hits) ): ?>
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">인기 상품</h2>
    <?php foreach($hits as $hit): ?>
   
    
    <?php $mainImg = $hit->getImage();?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo  text-center ">
                
           
                
                 <a href="<?= \yii\helpers\Url::to(['wishlist/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn-add-wishlist   btn btn-fefault add-to-wishlist wishlist"> <i class="fa fa-heart"></i></a>
                
                 <a  href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"> <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $hit->name])?> </a> 
                    <h2>$<?= $hit->price?></h2>
                    
                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name?></a></p>
                    <ul class="sweet ">
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
    <?php endforeach;?>
</div><!--features_items-->
<?php endif; ?>


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
                      <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"> <?= Html::img($mainImg->getUrl('268x249'), ['alt' => $hit->name])?>  </a>
                        <h2>$<?= $hit->price?></h2>
                        <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>"><?= $hit->name?></a></p>
                        <ul class="sweet2">                   
                  <li>  <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>장바구니에 담기</a></li>
                 </ul>
                 
                         <?php 
        echo StarRating::widget(['id' => 'rating' . $hit->id . $hit->id, 'name' => 'rating_1', 'value' => $hit->rating, 'pluginOptions' => ['readonly' => true, 'showClear' => false, 'showCaption' => false, 'stars' => 5,
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
