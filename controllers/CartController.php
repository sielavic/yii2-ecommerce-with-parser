<?php
namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;
//use app\models\Property;
//use app\models\PropertyValues;
//use app\models\ValueProducr;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class CartController extends AppController{
    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);  
        if( !Yii::$app->request->isAjax ){
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear(){
        $session =Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow(){
        $session =Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Cart');
        $order = new Order();
        if($order->load(Yii::$app->request->post())){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
           // debug($order);
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', '주문이 수락되었습니다. 매니저가 곧 연락을 드릴 것입니다.');
                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['username@mail.ru' => 'shop.yii2'])
                    ->setTo($order->email)
                    ->setSubject('Заказ')
                    ->send();
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', '결제 오류');
            }
        }
        return $this->render('view', compact('session', 'order'));
    }
   protected function saveOrderItems($items, $order_id){
        foreach($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->size = $item['size'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }



 public function actionSubmitPayment($order_id)
    {
        $where = ['id' => $order_id, 'status' => Order::STATUS_DRAFT];
        if (!isGuest()){
            $where['created_by'] = currUserId();
        }
        $order = Order::findOne($where);
        if (!$order){
            throw new NotFoundHttpException();
        }
        $req = Yii::$app->request;
        $paypalOrderId = $req->post('order_id');
       // $exists = Order::find()->andWhere(['paypal_order_id' => $paypalOrderId])->exists();
       // if ($exists) {
         //   throw new BadRequestHttpException();
      //  }

        $environment = new SandboxEnvironment(Yii::$app->params['paypalClientId'], Yii::$app->params['paypalSecret']);
        $client = new PayPalHttpClient($environment);

      //  $response = $client->execute(new OrdersGetRequest($paypalOrderId));

        // @TODO Save the response information in logs
       
        if ($response->statusCode === 200) {
           // $order->paypal_order_id = $paypalOrderId;
            $paidAmount = 0;
            foreach ($response->result->purchase_units as $purchase_unit) {
                if ($purchase_unit->amount->currency_code === 'USD') {
                    $paidAmount += $purchase_unit->amount->value;
                }
            }
            if ($paidAmount === (float)$order->sum && $response->result->status === 'COMPLETED') {
                $order->status = Order::STATUS_PAID;
            }
           // $order->transaction_id = $response->result->purchase_units[0]->payments->captures[0]->id;
            if  ($order->save()) {
                if (!$order->sendEmailToVendor()) {
                    Yii::error("Email to the vendor is not sent");
                }
                if (!$order->sendEmailToCustomer()) {
                    Yii::error("Email to the customer is not sent");
                }

                return [
                    'success' => true
                ];
            } else {
                Yii::error("Order was not saved. Data: ".VarDumper::dumpAsString($order->toArray()).
                    '. Errors: '.VarDumper::dumpAsString($order->errors));
            }
        }

        throw new BadRequestHttpException();
}

} 
