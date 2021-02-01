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


        session()->put('custName', $customer->firstName . ' ' . $customer->lastName);

        $notification = array(
            'message' => 'Customer updated successfully!',
            'alert-type' => 'success'
        );
        return redirect('/checkout')->with($notification);
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param string $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index(string $store)
    {
        if (session()->has('credentials')) {
            $store_ = \App\Models\Store::find($store);
            $orders = $store_->orders()->get()->sortByDesc('created_at');
            return view('stores.customers.index', [
                'store' => $store_,
                'orders' => $orders
            ]);
        } else {
            return redirect('/');
        }
    }

    public function search()
    {
        $term = request()->input('term');
    }
}
