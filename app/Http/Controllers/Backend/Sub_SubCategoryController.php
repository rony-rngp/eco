<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Sub_SubCategoryController extends Controller
{
    public function show()
    {
        $sub_subcategories = SubSubCategory::with('subcategory')->get();
        return view('backend.sub_subcategory.view', compact('sub_subcategories'));
    }

    public function add()
    {
        $categories = Category::with('subcategories')->get();
        return view('backend.sub_subcategory.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'subcategory_id' => 'required',
            'name' => 'required',
            'discount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $sub_subcategory = new SubSubCategory();
        $sub_subcategory->subcategory_id = $request->subcategory_id;
        $sub_subcategory->name = $request->name;
        $sub_subcategory->slug = Str::slug($request->name);
        $sub_subcategory->discount = $request->discount;
        $sub_subcategory->status = 1;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/sub_subcategory/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(750, 418)->save($image_url);

            $sub_subcategory->image = $image_url;
        }

        $sub_subcategory->save();

        notify()->success("Sub Sub-Category Added","Success");
        return redirect()->route('admin.view.sub_subcategory');
    }

    public function edit($id)
    {
        $categories = Category::with('subcategories')->get();
        $sub_subcategory = SubSubCategory::find($id);
        return view('backend.sub_subcategory.edit', compact('categories', 'sub_subcategory'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subcategory_id' => 'required',
            'name' => 'required',
            'discount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $sub_subcategory = SubSubCategory::find($id);
        $sub_subcategory->subcategory_id = $request->subcategory_id;
        $sub_subcategory->name = $request->name;
        $sub_subcategory->slug = Str::slug($request->name);
        $sub_subcategory->discount = $request->discount;
        $sub_subcategory->status = 1;
        $image = $request->file('image');
        //Category Image
        if($image){
            $image_name = Str::slug($request->name).(rand(1,99999));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/sub_subcategory/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(750, 418)->save($image_url);
            if(!empty($sub_subcategory->image)){
                unlink($sub_subcategory->image);
            }
            $sub_subcategory->image = $image_url;
        }

        $sub_subcategory->save();

        notify()->success("Sub Sub-Category Updated","Success");
        return redirect()->route('admin.view.sub_subcategory');
    }

    public function status(Request $request)
    {
        $sub_subcategory = SubSubCategory::find($request->id);
        $sub_subcategory->status = $request->status;
        $sub_subcategory->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy($id)
    {
        $sub_subcategory = SubSubCategory::find($id);
        if(!empty($sub_subcategory->image)){
            unlink($sub_subcategory->image);
        }
        $sub_subcategory->delete();
        notify()->success("Sub Sub-Category Deleted","Success");
        return redirect()->route('admin.view.sub_subcategory');
    }
}
