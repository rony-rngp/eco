<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    public static function getShippingCharges($district, $total_weight)
    {
        $shipping_details = ShippingCharge::where('district', $district)->first();

        if ($total_weight > 0 && $shipping_details != null){
            if ($total_weight > 0 && $total_weight <= 500){
                $shipping_charges = $shipping_details['0_500g'];
            }elseif ($total_weight > 500 && $total_weight <= 1000){
                $shipping_charges = $shipping_details['501_1000g'];
            }elseif ($total_weight > 1000 && $total_weight <= 2000){
                $shipping_charges = $shipping_details['1001_2000g'];
            }elseif ($total_weight > 2000 && $total_weight <= 5000){
                $shipping_charges = $shipping_details['2001_5000g'];
            }elseif ($total_weight > 5000){
                $shipping_charges = $shipping_details['above_5000g'];
            }else{
                $shipping_charges = 0;
            }
        }else{
            $shipping_charges = 0;
        }

        return $shipping_charges;
    }
}
