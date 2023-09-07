<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class)->with('category');
    }
}
