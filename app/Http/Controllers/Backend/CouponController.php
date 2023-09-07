<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Coupon;
use App\Model\SubCategory;
use App\Model\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    public function show()
    {
        $coupons = Coupon::latest()->get();
        return view('backend.coupon.view', compact('coupons'));
    }

    public function add()
    {
        $data['root_categories'] = Category::where('status', 1)->get();
        return view('backend.coupon.add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'coupon_option' => 'required',
            'coupon_type' => 'required',
            'amount_type' => 'required',
            'amount' => 'required',
            'expiry_date' => 'required',
        ]);

        if ($request->coupon_option == "Automatic"){
            $coupon_code = Str::random(8);
        }else{
            $coupon_code = $request->coupon_code;
        }

        $coupon = new Coupon();
        $coupon->coupon_option = $request->coupon_option;
        $coupon->coupon_code = $coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->amount_type = $request->amount_type;
        $coupon->amount = $request->amount;
        $coupon->category_id = $request->category_id;
        $coupon->subcategory_id = $request->subcategory_id;
        $coupon->subsubcategory_id = $request->subsubcategory_id;
        $coupon->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        $coupon->status = 1;
        $coupon->save();
        notify()->success('Coupon Added', 'Success');
        return redirect()->route('admin.view.coupon');
    }

    public function edit($id)
    {
        $data['coupon'] = Coupon::find($id);
        $data['root_categories'] = Category::where('status', 1)->get();
        $data['sub_categories'] = SubCategory::where('category_id', $data['coupon']->category_id)->get();
        $data['sub_subcategories'] = SubSubCategory::where('subcategory_id', $data['coupon']->subcategory_id)->get();
        return view('backend.coupon.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'coupon_type' => 'required',
            'amount_type' => 'required',
            'amount' => 'required',
            'expiry_date' => 'required',
        ]);

        if ($request->coupon_option == "Automatic"){
            $coupon_code = Str::random(8);
        }else{
            $coupon_code = $request->coupon_code;
        }

        $coupon = Coupon::find($id);
        $coupon->coupon_type = $request->coupon_type;
        $coupon->amount_type = $request->amount_type;
        $coupon->amount = $request->amount;
        $coupon->category_id = $request->category_id;
        $coupon->subcategory_id = $request->subcategory_id;
        $coupon->subsubcategory_id = $request->subsubcategory_id;
        $coupon->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        $coupon->save();
        notify()->success('Coupon Updated', 'Success');
        return redirect()->route('admin.view.coupon');
    }

    public function destroy($id)
    {
        Coupon::find($id)->delete();
        notify()->success('Coupon Deleted', 'Success');
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->status = $request->status;
        $coupon->save();
        return response()->json(['messege' => 'success']);
    }
}
