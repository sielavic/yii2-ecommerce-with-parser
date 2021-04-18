<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive{-sm|-md|-lg|-xl}">
        <table class="table table-hover table-striped">
            <thead>
                <tr class= "cart_menu">
                    <th>이름</th>
                    <th></th>
                     <th>크기</th>
                    <th>수량</th>
                    <th>가격</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item):?>
                <tr>
                    <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                    <td><h4><?= $item['name']?></h4></td>
                    <td><p><?= $item['size']?></p></td>
		    <td><p><?= $item['qty']?></p></td>
                    <td><p>$<?= $item['price']?></p></td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach?>
                <tr>
                    <td></td>
                   <td></td>
                    <td ><p class="cart_total_price">합계: <p></td>
                    <td ><p class="cart_total_price"><?= $session['cart.qty']?></p></td>
                    <td><p class="cart_total_price">$<?= $session['cart.sum']?></p></td>
                    <td></td> 
                </tr> 
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>장바구니가 비어 있습니다</h3>
<?php endif;?>
