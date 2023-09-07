<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
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
}
