<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function sub_subcategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'subsubcategory_id', 'id');
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public static function getDiscountedPrice($id)
    {
        $productDetails = Product::with('brand', 'category', 'subcategory', 'sub_subcategory')->where('id', $id)->first();
        if($productDetails != ''){

            if($productDetails->discount > 0){
                $discounted_percentage = $productDetails->discount;
                $discounted_price = $productDetails->price - $productDetails->discount/100 * $productDetails->price;
            }elseif(!empty($productDetails->sub_subcategory)){
                if($productDetails->sub_subcategory->discount > 0){
                    $discounted_percentage = $productDetails->sub_subcategory->discount;
                    $discounted_price = $productDetails->price - $productDetails->sub_subcategory->discount/100 * $productDetails->price;
                }else{
                    $discounted_percentage = 0;
                    $discounted_price = 0;
                }

            }elseif(!empty($productDetails->subcategory)){
                if($productDetails->subcategory->discount > 0){
                    $discounted_percentage = $productDetails->subcategory->discount;
                    $discounted_price = $productDetails->price - $productDetails->subcategory->discount/100 * $productDetails->price;
                }else{
                    $discounted_percentage = 0;
                    $discounted_price = 0;
                }

            }elseif(!empty($productDetails->category)){
                if($productDetails->category->discount > 0){
                    $discounted_percentage = $productDetails->category->discount;
                    $discounted_price = $productDetails->price - $productDetails->category->discount/100 * $productDetails->price;
                }else{
                    $discounted_percentage = 0;
                    $discounted_price = 0;
                }

            }else{
                $discounted_percentage = 0;
                $discounted_price = 0;
            }
            $product_main_price = $productDetails->price;


        }else{
            $discounted_percentage = 0;
            $discounted_price = 0;
            $product_main_price = 0;
        }




        return array('discounted_price' => $discounted_price, 'discounted_percentage' => $discounted_percentage, 'product_main_price' => $product_main_price);
    }

    public static function getDiscountedAttrPrice($product_id, $attribute_id)
    {
        $product_attr_price = ProductAttribute::where('product_id', $product_id)->where('id', $attribute_id)->first();
        $productDetails = Product::with('category', 'subcategory', 'sub_subcategory')->where('id', $product_id)->first();

        if($product_attr_price != ''){
            if($productDetails->discount > 0){
                $discounted_attr_percentage = $productDetails->discount;
                $discounted_attr_price = $product_attr_price->price - $productDetails->discount/100 * $product_attr_price->price;
            }elseif(!empty($productDetails->sub_subcategory)){
                if($productDetails->sub_subcategory->discount > 0){
                    $discounted_attr_percentage = $productDetails->sub_subcategory->discount;
                    $discounted_attr_price = $product_attr_price->price - $productDetails->sub_subcategory->discount/100 * $product_attr_price->price;
                }else{
                    $discounted_attr_percentage = 0;
                    $discounted_attr_price = 0;
                }

            }elseif(!empty($productDetails->subcategory)){
                if($productDetails->subcategory->discount > 0){
                    $discounted_attr_percentage = $productDetails->subcategory->discount;
                    $discounted_attr_price = $product_attr_price->price - $productDetails->subcategory->discount/100 * $product_attr_price->price;
                }else{
                    $discounted_attr_percentage = 0;
                    $discounted_attr_price = 0;
                }

            }elseif(!empty($productDetails->category)){
                if($productDetails->category->discount > 0){
                    $discounted_attr_percentage = $productDetails->category->discount;
                    $discounted_attr_price = $product_attr_price->price - $productDetails->category->discount/100 * $product_attr_price->price;
                }else{
                    $discounted_attr_percentage = 0;
                    $discounted_attr_price = 0;
                }

            }else{
                $discounted_attr_percentage = 0;
                $discounted_attr_price = 0;
            }

            $product_main_attr_price = $product_attr_price->price;
            $stock = $product_attr_price->stock;
        }else{
            $discounted_attr_percentage = 0;
            $discounted_attr_price = 0;
            $product_main_attr_price = 0;
            $stock = 0;
        }


        return array('product_main_attr_price' => $product_main_attr_price, 'discounted_attr_percentage' => $discounted_attr_percentage, 'stock'=>$stock, 'discounted_attr_price'=>$discounted_attr_price);
    }

    public static function getProductImage($product_id){
        $product_image = Product::select('main_image')->where('id', $product_id)->first();
        return $product_image;
    }
}
