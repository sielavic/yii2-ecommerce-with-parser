<?php


namespace app\models;
use yii\db\ActiveRecord;


$array = array();

$name = array();

$napoln = array();



class Wishlist extends ActiveRecord{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function addToWishlist($product, $qty = 1){
        $mainImg = $product->getImage();
        
         foreach ($product->valueProduct as $prop){
        $napoln[$prop->property->id][] = $prop->id;
    }

    $product->propertyValue = $napoln;
    
        if(isset($_SESSION['wishlist'][$product->id])){
            $_SESSION['wishlist'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['wishlist'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'size' => $prop->value,
                'img' => $mainImg->getUrl('x50')
            ];
        }
        $_SESSION['wishlist.qty'] = isset($_SESSION['wishlist.qty']) ? $_SESSION['wishlist.qty'] + $qty : $qty;
        
    }

    public function recalc($id){
        if(!isset($_SESSION['wishlist'][$id])) return false;
        $qtyMinus = $_SESSION['wishlist'][$id]['qty'];
        
        $_SESSION['wishlist.qty'] -= $qtyMinus;
        
        unset($_SESSION['wishlist'][$id]);
    }

} 
