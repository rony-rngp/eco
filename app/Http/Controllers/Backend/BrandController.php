<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show()
    {
        $brands = Brand::all();
        return view('backend.brand.view', compact('brands'));
    }

    public function add()
    {
        return view('backend.brand.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:2|unique:brands'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->status = 1;
        $brand->save();
        notify()->success('Brand Added', 'Success');
        return redirect()->route('admin.view.brand');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.add', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|min:2|unique:brands,name,'.$id
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->save();
        notify()->success('Brand Updated', 'Success');
        return redirect()->route('admin.view.brand');
    }

    public function status(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->status = $request->status;
        $brand->save();
        return response()->json(['messege' => 'success']);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        notify()->success('Brand Deleted', 'Success');
        return redirect()->route('admin.view.brand');
    }
}
