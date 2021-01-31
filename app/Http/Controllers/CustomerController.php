<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', ['customer' => $customer]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $notification = array(
            'message' => 'Customer updated successfully!',
            'alert-type' => 'success'
        );
        return redirect('/checkout')->with($notification);
    }

    public function index(string $store)
    {
        $store_ = \App\Models\Store::find($store);
        $orders = \App\Models\Order::orderBy('created_at', 'DESC')->where('store_id', $store)->get();
        return view('stores.customers.index', [
            'store' => $store_,
            'orders' => $orders
        ]);
    }
}
