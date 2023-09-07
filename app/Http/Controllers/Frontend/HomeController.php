<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['new_products'] = Product::where('status', 1)->latest()->take(10)->get();
        $data['featured_products'] = Product::where('status', 1)->where('is_featured', 1)->latest()->take(10)->get();
        $data['rand_products'] = Product::where('status', 1)->inRandomOrder()->take(10)->get();
        $data['page_name'] = 'index';
        return view('frontend.home', $data);
    }

}
