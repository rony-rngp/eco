<?php

namespace App\Model;

use App\Library\SslCommerz\SslCommerzNotification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SSLCommerz extends Model
{
    public static function getPayment($order, $contents){
        $post_data = array();
        $post_data['total_amount'] = $order->grand_total; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $order->transaction_id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->first_name.' '.$order->last_name;
        $post_data['cus_email'] = $order->email;
        $post_data['cus_add1'] = $order->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = $order->division;
        $post_data['cus_state'] = $order->district;
        $post_data['cus_postcode'] = $order->zip_code;
        $post_data['cus_country'] = $order->country;
        $post_data['cus_phone'] = $order->mobile;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $order->first_name.' '.$order->last_name;
        $post_data['ship_add1'] = $order->address;
        $post_data['ship_add2'] = "";
        $post_data['ship_city'] = $order->division;
        $post_data['ship_state'] = $order->district;
        $post_data['ship_postcode'] = $order->zip_code;
        $post_data['ship_phone'] = $order->mobile;
        $post_data['ship_country'] = $order->country;

        foreach ($contents as $content){
            $product = Product::find($content->id);
            $post_data['shipping_method'] = "NO";
            $post_data['product_name'] = $product->name;
            $post_data['product_category'] = $product->category->name;
            $post_data['product_profile'] = $product->name;
        }


        # OPTIONAL PARAMETERS
        # OPTIONAL PARAMETERS
        $post_data['value_a'] = csrf_token();
        $post_data['value_b'] = Auth::user()->id;
        $post_data['value_c'] = $order->id;
        $post_data['value_d'] = $order->grand_total;
        ;


        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
}
