<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\Subscriber;
use App\Model\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::with(['category', 'subcategory', 'sub_subcategory'])->latest()->get();
        return view('backend.product.view', compact('products'));
    }

    public function add()
    {
        $data['root_categories'] = Category::where('status', 1)->get();
        $data['brands'] = Brand::where('status', 1)->get();
        //----Filters------
        $data['fabric_array'] = array('Cotton', 'Polyester', 'Wool');
        $data['sleeve_array'] = array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
        $data['pattern_array'] = array('Checked', 'Plain', 'Printed', 'Self', 'Solid');
        $data['fit_array'] = array('Regular', 'Slim');
        $data['occassion_array'] = array('Casual', 'Formal');
        return view('backend.product.add', $data);
    }

    public function get_subcategory(Request $request)
    {
        $sub_categories = SubCategory::where('category_id', $request->category_id)->where('status', 1)->get();
        return response()->json($sub_categories);
    }

    public function get_sub_subcategory(Request $request)
    {
        $sub_subcategories = SubSubCategory::where('subcategory_id', $request->subcategory_id)->get();
        return response()->json($sub_subcategories);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:products',
            'color' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'weight' => 'required',
            'description' => 'required',
            'main_image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->code = $request->code;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->fabric = $request->fabric;
        $product->sleeve = $request->sleeve;
        $product->pattern = $request->pattern;
        $product->fit = $request->fit;
        $product->occassion = $request->occassion;
        $product->stock = $request->stock;
        $product->is_featured = 0;
        $product->status = 1;
        $image = $request->file('main_image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/product/main_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(917, 1000)->save($image_url);

            $product->main_image = $image_url;
        }


        $product->save();

        $subscribers = Subscriber::where('status', 1)->get();
        foreach ($subscribers as $subscriber){
            $email = $subscriber->email;
            $data = [
                'email' => $email,
                'product_details' => $product,
            ];
            Mail::send('backend.emails.new_product_notify', $data, function ($messege) use ($email){
                $messege->to($email)->subject('New Product Available - Flipmart');
            });
        }

        notify()->success('Product Added', 'Success');
        return redirect()->route('admin.view.product');

    }

    public function edit($id)
    {
        $data['root_categories'] = Category::where('status', 1)->get();
        $data['brands'] = Brand::where('status', 1)->get();
        //----Filters------
        $data['fabric_array'] = array('Cotton', 'Polyester', 'Wool');
        $data['sleeve_array'] = array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
        $data['pattern_array'] = array('Checked', 'Plain', 'Printed', 'Self', 'Solid');
        $data['fit_array'] = array('Regular', 'Slim');
        $data['occassion_array'] = array('Casual', 'Formal');
        $data['product'] = Product::find($id);

        $data['sub_categories'] = SubCategory::where('category_id', $data['product']->category_id)->get();

        $data['sub_subcategories'] = SubSubCategory::where('subcategory_id', $data['product']->subcategory_id)->get();

        return view('backend.product.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:products,code,'.$id,
            'color' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'weight' => 'required',
            'description' => 'required',
            'main_image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->code = $request->code;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->fabric = $request->fabric;
        $product->sleeve = $request->sleeve;
        $product->pattern = $request->pattern;
        $product->fit = $request->fit;
        $product->occassion = $request->occassion;
        $product->stock = $request->stock;

        $image = $request->file('main_image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/product/main_image/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(917, 1000)->save($image_url);
            if(file_exists($product->main_image)){
                unlink($product->main_image);
            }
            $product->main_image = $image_url;
        }

        $product->save();

        notify()->success('Product Updated', 'Success');
        return redirect()->route('admin.view.product');
    }

    public function status(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['messege'=>'success']);
    }

    public function destroy($id)
    {
        $product = Product::with('images')->find($id);
        if(file_exists($product->main_image)){
            unlink($product->main_image);
        }

        foreach ($product->images as $product_image){
            if (file_exists($product_image->image)) {
                unlink($product_image->image);
            }
            $product_image->delete();
        }

        $product->delete();
        notify()->success('Product Deleted', 'Success');
        return redirect()->back();
    }
}
