<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class)->where('status',1)->with('subsubcategories');
    }
}
