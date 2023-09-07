<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::with('subcategories')->get();
        return view('backend.category.view_category', compact('categories'));
    }

    public function add()
    {
        return view('backend.category.add_category');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:categories',
           'discount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->discount = $request->discount;
        $category->status = 1;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/category/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(339, 347)->save($image_url);

            $category->image = $image_url;
        }

        $category->save();

        notify()->success("Category Added","Success");
        return redirect()->route('admin.view.category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.add_category', compact('category'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
            'discount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->discount = $request->discount;
        $category->status = 1;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/category/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(346, 240)->save($image_url);
            if(!empty($category->image)){
                unlink($category->image);
            }

            $category->image = $image_url;
        }

        $category->save();

        notify()->success("Category Updated","Success");
        return redirect()->route('admin.view.category');
    }

    public function status(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        if(!empty($category->image)){
            unlink($category->image);
        }
        $category->delete();
        notify()->success("Category Deleted","Success");
        return redirect()->route('admin.view.category');
    }
}
