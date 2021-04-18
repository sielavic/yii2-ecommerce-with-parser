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
    <?php if(!empty($session['cart'])): ?>
        <div class="table-responsive{-sm|-md|-lg|-xl}">
        <h2 class="review-payment">검토 &amp; 지불</h2>
            <table class="table table-hover table-striped">
               <thead class= "cart_menu">
                <tr>
                    <th>이름</th>
                    <th></th>
                    <th>크기</th>
                    <th>수량</th>
                    <th>가격</th>
                    <th>합계</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['cart'] as $id => $item):?>
                    <tr>
                        <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a></td>
                        <td><?= $item['size']?></td>
                        <td><?= $item['qty']?></td>
                        <td>$<?= $item['price']?></td>
                        <td>$<?= $item['qty'] * $item['price']?></td>
                        <td class="big"><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item3" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach?>
                <tr>
                    <td></td>
                    <td></td>
                    <td ><p class="cart_total_price">합계: </p></td>
                    <td><p class="cart_total_price"><?= $session['cart.qty']?></p></td>
                    <td></td>
                    <td><p class="cart_total_price">$<?= $session['cart.sum']?></p></td>
                    <td></td>
                </tr>   
                </tbody>
            </table>
        </div>
        <hr/>
        <script
    src=""> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
        <?php $form = ActiveForm::begin([ 'id' => 'checkout-form',])?>
        <?= $form->field($order, 'name')->textInput(['placeholder' => '당신의 이름'])->label(false)?>
        <?= $form->field($order, 'email')->textInput(['placeholder' => '이메일'])->label(false)?>
        <?= $form->field($order, 'phone')->textInput(['placeholder' => '전화'])->label(false)?>
        <?= $form->field($order, 'address')->textInput(['placeholder' => '주소'])->label(false)?> 
     <!-- <div id="paypal-button-container"></div>  --> 
        <div id="paypal-button-container"></div>
        <!-- <?= Html::submitButton('', ['class' => 'btn pay'])?>  -->
        <?php ActiveForm::end()?>
         <!--   <?php debug($order)?>  -->
        <script>
    paypal.Buttons({
    locale: 'en_US',
    style: {
                size: 'large',
                color:  'blue',
                shape:  'rect',
                label:  'checkout',
                height: 40           
            },
onInit:  function(data, actions) {
    actions.disable(); 
    actionStatus = actions;
},
onClick: function() {
    let ordername = document.querySelector('#order-name').value;
    let isValid = ordername.length >= 3;
    
    let orderemail = document.querySelector('#order-email').value;
    let isValid2 = orderemail.length >= 3;
    
    let orderphone = document.querySelector('#order-phone').value;
    let isValid3 = orderphone.length >= 3;
    
    let orderaddress = document.querySelector('#order-address').value;
    let isValid4 = orderaddress.length >= 3;
    
    if (isValid, isValid2, isValid3, isValid4) {
        actionStatus.enable();
    }else{
    alert('주문할 연락처 정보가 부족합니다');
    } 
},
    

    
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?= $session['cart.sum']?>
          }
        }]
      });
    },
     onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
      console.log(details);
        const $form = $('#checkout-form');
        const formData = $form.serializeArray();
      //  formData.push({
      //    name: 'transactionId',
     //     value: details.id
      //  });
        formData.push({
          name: 'order_id',
          value: data.order_id
        });
       // formData.push({
       //   name: 'status',
       //   value: details.status
       // });
      $.ajax({
          method: 'post',
          url: '<?php echo \yii\helpers\Url::to(['/cart/view', 'order_id' => $order->id])?>',
          data: formData,
          success: function (res) {
            // This function shows a transaction success message to your buyer.
            alert("<?php echo Yii::t('app', 'Thanks for your business') ?>");
            window.location.href = '';
          }
        })
        // This function shows a transaction success message to your buyer.

       alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
 
  }).render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.
  </script>
        
        
    <?php else: ?>
        <h3>장바구니가 비어 있습니다</h3>
    <?php endif;?>
</div>
