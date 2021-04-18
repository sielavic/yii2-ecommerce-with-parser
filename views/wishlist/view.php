<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
    <?php if(!empty($session['wishlist'])): ?>
        <div id="wish" class="table-responsive{-sm|-md|-lg|-xl}">
        <h2 class="review-payment">위시리스트</h2>
            <table class="table table-hover table-striped">
                <thead class= "cart_menu3">
                <tr>
                    <th>이름</th>
                    <th></th>
                     <th>크기</th>
                    <th>가격</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['wishlist'] as $id => $item):?>
               
                    <tr>
                        <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a></td>
                        <td><?= $item['size']?></td>
                        <td>$<?= $item['price']?></td>
                        <td> <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $id])?>"  data-id="<?= $id?>" class="btn btn-warning add-to-cart2"><i class="fa fa-shopping-cart"></i>장바구니에 담기</a></td>
                        <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item2"  aria-hidden="true"></span></td>
                    </tr>
                    
                <?php endforeach?>
              
                </tbody>
                
            </table>
       
        </div>
                <button type="button" class="btn btn-warning" onclick="clearWishlist()">위시리스트 지우기</button>
        <hr/>

       
    <?php else: ?>
        <h3>위시리스트가 비어 있습니다</h3>
    <?php endif;?>
</div>

 

