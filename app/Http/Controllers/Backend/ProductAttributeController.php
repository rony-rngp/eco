<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductAttribute;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductAttributeController extends Controller
{
    public function add($id)
    {
        $product = Product::with('attributes')->find($id);
        return view('backend.product.attributes.add_attribute', compact('product'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'sku.*' => 'required',
            'size.*' => 'required',
            'price.*' => 'required|numeric',
            'stock.*' => 'required|numeric',
        ]);
        foreach ($request->sku as $key => $sku){
            if (!empty($sku)){
                $sku_count = ProductAttribute::where('sku', $sku)->count();
                if($sku_count > 0){
                    notify()->error('Sku already exist!', 'Error');
                    return redirect()->back();
                }
                $size_count = ProductAttribute::where('product_id', $id)->where('size', $request->size[$key])->count();
                if($size_count > 0){
                    notify()->error('Size already exist!', 'Error');
                    return redirect()->back();
                }

                $attribute = new ProductAttribute();
                $attribute->product_id = $id;
                $attribute->sku = $sku;
                $attribute->size = $request->size[$key];
                $attribute->price = $request->price[$key];
                $attribute->stock = $request->stock[$key];
                $attribute->status = 1;
                $attribute->save();

            }
        }
        notify()->success('Attribute Added!', 'Success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        foreach ($request->attr_id as $key => $attr_id){
            $attribute = ProductAttribute::find($attr_id);
            $attribute->price = $request->price[$key];
            $attribute->stock = $request->stock[$key];
            $attribute->save();
        }
        notify()->success('Attribute Updated!', 'Success');
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $attribute = ProductAttribute::find($request->id);
        $attribute->status = $request->status;
        $attribute->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy($id)
    {
        $attribute = ProductAttribute::find($id);
        $attribute->delete();
        notify()->success('Attribute Deleted!', 'Success');
        return redirect()->back();
    }

    public function add_image($id)
    {
        $product = Product::with('images')->find($id);
        return view('backend.product.attributes.add_image', compact('product'));
    }

    public function store_image(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        $img = $request->file('image');
        foreach ($img as $image) {
            if($image){
                $image_name = hexdec(uniqid());
                $ext = strtolower($image->getClientOriginalExtension());
                $image_fill_name = $image_name . '.' . $ext;
                //----Resize Large Image----
                $upload_path = 'public/backend/upload/product/main_image/alt_image/';
                $image_url = $upload_path . $image_fill_name;
                Image::make($image)->resize(917, 1000)->save($image_url);

                $product_image = new ProductImage();
                $product_image->product_id = $id;
                $product_image->image = $image_url;
                $product_image->status = 1;
                $product_image->save();
            }
        }

        notify()->success('Product Added', 'Success');
        return redirect()->back();
    }

    public function status_image(Request $request)
    {
        $product_image = ProductImage::find($request->id);
        $product_image->status = $request->status;
        $product_image->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy_image($id)
    {
        $product_image = ProductImage::find($id);
        if (!empty($product_image->image)) {
            unlink($product_image->image);
        }
        $product_image->delete();
        notify()->success('Image Deleted', 'Success');
        return redirect()->back();
    }

}
