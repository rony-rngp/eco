<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function totalCartItems(){
    $totalCartItems = Cart::count();
    return $totalCartItems;
}

function totalAmount(){
    $contents = Cart::content();
    $total_amount = 0;
    foreach ($contents as $content){
        if ($content->options->attribute_id){
            $discounted_attr_price = \App\Model\Product::getDiscountedAttrPrice($content->id, $content->options->attribute_id);
            $d_price = $discounted_attr_price['discounted_attr_price'];
            if($d_price > 0){
                $price = $discounted_attr_price['discounted_attr_price'];
            }else{
                $price = $discounted_attr_price['product_main_attr_price'];
            }
        }else{
            $discounted_product_price = \App\Model\Product::getDiscountedPrice($content->id);
            $d_price = $discounted_product_price['discounted_price'];
            if($d_price > 0){
                $price = $discounted_product_price['discounted_price'];
            }else{
                $price = $discounted_product_price['product_main_price'];
            }
        }

        $total_amount += $price*$content->qty;
    }
    return $total_amount;
}

