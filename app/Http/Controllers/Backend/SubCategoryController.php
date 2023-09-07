<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    public function show()
    {
        $subcategories = SubCategory::with(['category'])->get();
        return view('backend.subcategory.view', compact('subcategories'));
    }

    public function add()
    {
        $root_categories = Category::where('status', 1)->get();
        return view('backend.subcategory.add', compact('root_categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'discount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);


        $sub_category = new SubCategory();
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->slug = Str::slug($request->name);
        $sub_category->discount = $request->discount;
        $sub_category->status = 1;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/sub_category/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(750, 418)->save($image_url);

            $sub_category->image = $image_url;
        }

        $sub_category->save();

        notify()->success("Sub Category Added","Success");
        return redirect()->route('admin.view.subcategory');
    }

    public function edit($id)
    {
        $root_categories = Category::where('status', 1)->get();
        $sub_category = SubCategory::find($id);
        return view('backend.subcategory.edit', compact('root_categories', 'sub_category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'discount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);


        $sub_category = SubCategory::find($id);
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->slug = Str::slug($request->name);
        $sub_category->discount = $request->discount;
        $sub_category->status = 1;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/sub_category/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(750, 418)->save($image_url);
            if(!empty($sub_category->image)){
                unlink($sub_category->image);
            }
            $sub_category->image = $image_url;
        }

        $sub_category->save();

        notify()->success("Sub Category Updated","Success");
        return redirect()->route('admin.view.subcategory');
    }

    public function status(Request $request)
    {
        $sub_category = SubCategory::find($request->id);
        $sub_category->status = $request->status;
        $sub_category->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy($id)
    {
        $sub_category = SubCategory::find($id);
        if(!empty($sub_category->image)){
            unlink($sub_category->image);
        }
        $sub_category->delete();
        notify()->success("Sub Category Deleted","Success");
        return redirect()->route('admin.view.subcategory');
    }
}
