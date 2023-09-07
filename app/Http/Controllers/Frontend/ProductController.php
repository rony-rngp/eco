<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function root_category_product($id, $slug, Request $request)
    {
        if($request->ajax()){
            $slug = $request->slug;
            $id = $request->id;
            $category_count = Category::where('slug', $slug)->where('id', $id)->where('status', 1)->count();
            if($category_count > 0){
                $category_details = Category::with('subcategories')->where(['slug'=>$slug, 'id'=>$id])->first();
                $category_id = $category_details->id;

                /*$subcategory_id = Array();
                $subsubcategory_id = Array();
                foreach ($category_details->subcategories as $subcategory){
                    $subcategory_id[] = $subcategory['id'];
                    foreach ($subcategory->subsubcategories as $subsubcategory){
                        $subsubcategory_id[] = $subsubcategory['id'];
                    }
                }*/

                if($category_details->subcategory == NULL){
                    $category_products = Product::where('category_id', $category_details->id)->where('status', 1);
                }else{
                    foreach ($category_details->subcategories as $subcategory){
                        if($subcategory->subsubcategories == NULL){
                            $category_products = Product::where('category_id', $category_details->id)->where('subcategory_id', $subcategory['id'])->where('status', 1);
                        }else{
                            foreach ($subcategory->subsubcategories as $subsubcategory){
                                $category_products = Product::with('brand')->where('status', 1)->where('category_id', $category_id)->where('subcategory_id', $subcategory['id'])->where('subsubcategory_id', $subsubcategory['id']);
                            }
                        }
                    }
                }


                //If Fabric filter is selected
                if (isset($_GET['fabric']) && !empty($_GET['fabric'])) {
                    $category_products->whereIn('fabric', $_GET['fabric']);
                }
                if (isset($_GET['sleeve']) && !empty($_GET['sleeve'])) {
                    $category_products->whereIn('sleeve', $_GET['sleeve']);
                }
                if (isset($_GET['pattern']) && !empty($_GET['pattern'])) {
                    $category_products->whereIn('pattern', $_GET['pattern']);
                }
                if (isset($_GET['fit']) && !empty($_GET['fit'])) {
                    $category_products->whereIn('fit', $_GET['fit']);
                }
                if (isset($_GET['occassion']) && !empty($_GET['occassion'])) {
                    $category_products->whereIn('occassion', $_GET['occassion']);
                }

                //If sort option selected by user
                if(isset($_GET['sort']) && !empty($_GET['sort'])){
                    if($_GET['sort'] == "product_name_a_z"){
                        $category_products->orderBy('name', 'asc');
                    }elseif ($_GET['sort'] == "product_name_z_a"){
                        $category_products->orderBy('name', 'desc');
                    }elseif ($_GET['sort'] == "price_lowest"){
                        $category_products->orderBy('price', 'asc');
                    }elseif ($_GET['sort'] == "price_highest"){
                        $category_products->orderBy('price', 'desc');
                    }
                }

                $category_products = $category_products->latest()->paginate(32);

                return view('frontend.product.ajax_category_wise', compact('category_products', 'id', 'slug'));

            }else {
                abort(404);
            }

        }


        $category_count = Category::where('slug', $slug)->where('id', $id)->where('status', 1)->count();
        if($category_count > 0){
            $category_details = Category::with('subcategories')->where(['slug'=>$slug, 'id'=>$id])->first();
            $category_id = $category_details->id;

            /*$subcategory_id = Array();
            $subsubcategory_id = Array();
            foreach ($category_details->subcategories as $subcategory){
                $subcategory_id[] = $subcategory['id'];
                foreach ($subcategory->subsubcategories as $subsubcategory){
                    $subsubcategory_id[] = $subsubcategory['id'];
                }
            }*/

            if($category_details->subcategory == NULL){
                $category_products = Product::where('category_id', $category_details->id)->where('status', 1)->latest()->paginate(32);
            }else{
                foreach ($category_details->subcategories as $subcategory){
                    if($subcategory->subsubcategories == NULL){
                        $category_products = Product::where('category_id', $category_details->id)->where('subcategory_id', $subcategory['id'])->where('status', 1)->latest()->paginate(32);
                    }else{
                        foreach ($subcategory->subsubcategories as $subsubcategory){
                            $category_products = Product::with('brand')->where('status', 1)->where('category_id', $category_id)->where('subcategory_id', $subcategory['id'])->where('subsubcategory_id', $subsubcategory['id'])->latest()->paginate(32);
                        }
                    }
                }
            }



            //----Filters------
            $data['fabric_array'] = array('Cotton', 'Polyester', 'Wool');
            $data['sleeve_array'] = array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
            $data['pattern_array'] = array('Checked', 'Plain', 'Printed', 'Self', 'Solid');
            $data['fit_array'] = array('Regular', 'Slim');
            $data['occassion_array'] = array('Casual', 'Formal');
            $data['page_name'] = "listing";


            return view('frontend.product.category_wise', $data, compact('category_products', 'id', 'slug'));

        }else {
            abort(404);
        }
    }

    public function sub_category_product($id, $slug, Request $request)
    {

        if($request->ajax()){
            $slug = $request->slug;
            $id = $request->id;

            $category_products = Product::where('subsubcategory_id', $id)->where('status',1);

            //If Fabric filter is selected
            if (isset($_GET['fabric']) && !empty($_GET['fabric'])) {
                $category_products->whereIn('fabric', $_GET['fabric']);
            }
            if (isset($_GET['sleeve']) && !empty($_GET['sleeve'])) {
                $category_products->whereIn('sleeve', $_GET['sleeve']);
            }
            if (isset($_GET['pattern']) && !empty($_GET['pattern'])) {
                $category_products->whereIn('pattern', $_GET['pattern']);
            }
            if (isset($_GET['fit']) && !empty($_GET['fit'])) {
                $category_products->whereIn('fit', $_GET['fit']);
            }
            if (isset($_GET['occassion']) && !empty($_GET['occassion'])) {
                $category_products->whereIn('occassion', $_GET['occassion']);
            }

            //If sort option selected by user
            if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort'] == "product_name_a_z"){
                    $category_products->orderBy('name', 'asc');
                }elseif ($_GET['sort'] == "product_name_z_a"){
                    $category_products->orderBy('name', 'desc');
                }elseif ($_GET['sort'] == "price_lowest"){
                    $category_products->orderBy('price', 'asc');
                }elseif ($_GET['sort'] == "price_highest"){
                    $category_products->orderBy('price', 'desc');
                }
            }

            $category_products = $category_products->latest()->paginate(30);

            return view('frontend.product.ajax_category_wise', compact('category_products', 'id', 'slug'));

        }


        //----Filters------
        $data['fabric_array'] = array('Cotton', 'Polyester', 'Wool');
        $data['sleeve_array'] = array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
        $data['pattern_array'] = array('Checked', 'Plain', 'Printed', 'Self', 'Solid');
        $data['fit_array'] = array('Regular', 'Slim');
        $data['occassion_array'] = array('Casual', 'Formal');
        $data['page_name'] = "listing";
        $data['page_sub'] = "listing_sub";
        $category_products = Product::where('subsubcategory_id', $id)->where('status',1)->latest()->paginate(30);
        return view('frontend.product.category_wise', $data, compact('category_products', 'slug', 'id'));
    }

    public function single_product($id, $slug)
    {
        $product = Product::with(['attributes', 'images'])->where('id', $id)->where('slug', $slug)->firstOrFail();
        $attribute = ProductAttribute::where('product_id', $product->id)->where('status', 1)->first();
        if(!empty($attribute)){
            $total_stocks = ProductAttribute::where('product_id', $product->id)->where('status', 1)->sum('stock');
        }else{
            $total_stocks = $product->stock;
        }

        $page_name = 'single_product';
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->inRandomOrder()->take(10)->get();
        return view('frontend.product.single_product', compact('product', 'page_name', 'total_stocks', 'related_products'));
    }

    public function get_product_price(Request $request)
    {
        $discounted_attr_price = Product::getDiscountedAttrPrice($request->product_id, $request->attribute_id);
        return response()->json($discounted_attr_price);
    }

    public function search(Request $request)
    {
        if($request->ajax()){
            $search = $request->search;
            $products = Product::where('name', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%");
            //If sort option selected by user
            if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort'] == "product_name_a_z"){
                    $products->orderBy('name', 'asc');
                }elseif ($_GET['sort'] == "product_name_z_a"){
                    $products->orderBy('name', 'desc');
                }elseif ($_GET['sort'] == "price_lowest"){
                    $products->orderBy('price', 'asc');
                }elseif ($_GET['sort'] == "price_highest"){
                    $products->orderBy('price', 'desc');
                }
            }
            $products = $products->latest()->paginate(32);
            return view('frontend.product.ajax_search', compact('products', 'search'));
        }


        $search = $request->search;
        $page_name = 'search';
        $products = Product::where('name', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->latest()->paginate(32);
        return view('frontend.product.search', compact('products', 'search', 'page_name'));
    }
}
