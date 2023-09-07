<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\ShippingCharge;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function show()
    {
        $shipping_charges = ShippingCharge::all();
        return view('backend.shipping.view_shipping', compact('shipping_charges'));
    }

    public function edit($id)
    {
        $shipping = ShippingCharge::findOrFail($id);
        return view('backend.shipping.edit_shipping', compact('shipping'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            '0_500g' => 'required|numeric',
            '501_1000g' => 'required|numeric',
            '1001_2000g' => 'required|numeric',
            '2001_5000g' => 'required|numeric',
            'above_5000g' => 'required|numeric'
        ]);
        $shipping = ShippingCharge::find($id);
        $shipping['0_500g'] = $request['0_500g'];
        $shipping['501_1000g'] = $request['501_1000g'];
        $shipping['1001_2000g'] = $request['1001_2000g'];
        $shipping['2001_5000g'] = $request['2001_5000g'];
        $shipping['above_5000g'] = $request['above_5000g'];
        $shipping->save();

        notify()->success('Shipping Updated :)', 'Success');
        return redirect()->route('admin.view.shipping');

    }

    public function status(Request $request)
    {
        $shipping = ShippingCharge::find($request->id);
        $shipping->status = $request->status;
        $shipping->save();
        return response()->json(['messege' => 'success']);
    }
}
