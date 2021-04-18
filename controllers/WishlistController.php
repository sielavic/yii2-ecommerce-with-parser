<?php


namespace app\controllers;
use app\models\Product;
use app\models\Wishlist;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;



class WishlistController extends AppController{

    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session =Yii::$app->session;
        $session->open();
        $wishlist = new Wishlist();
        $wishlist->addToWishlist($product);
        if( !Yii::$app->request->isAjax ){
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        return $this->render('wishlist-modal', compact('session'));
    }

    public function actionClear(){
       
        $session =Yii::$app->session;
        $session->open();
        $session->remove('wishlist');
        $session->remove('wishlist.qty');
        $this->layout = false;
        
        return $this->render('wishlist-modal', compact('session'));
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $wishlist = new Wishlist();
        $wishlist->recalc($id);
        $this->layout = false;
        return $this->render('wishlist-modal', compact('session'));
    }



   public function actionDelWish(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $wishlist = new Wishlist();
        $wishlist->recalc($id);
        $this->layout = false;
        
        return $this->render('view', compact('session'));
    }



    public function actionShow(){
        $session =Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('wishlist-modal', compact('session'));
    }
    
    
    
    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Whishlist');
         $order = new Order();
        if( $order->load(Yii::$app->request->post()) ){
            $order->qty = $session['wishlist.qty'];
            $order->sum = $session['wishlist.sum'];
            if($order->save()){
                $this->saveOrderItems($session['wishlist'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['username@mail.ru' => 'shop.yii2'])
                    ->setTo($order->email)
                    ->setSubject('Заказ')
                    ->send();
                $session->remove('wishlist');
                $session->remove('wishlist.qty');
                $session->remove('wishlist.sum');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }
        return $this->render('view', compact('session', 'order'));
    }

  
    
    
    

    
    
    }
