<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use App\Models\Customer;
use App\Models\Seller;
use Apps\Models\Store;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('credentials')){
            return redirect('/product');
        }else{
            return view('login.index');
        }
    }

    public function login(Request $request){
        $emailInput = $request->email;
        $passwordInput = $request->password;

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $users = User::where('email', $emailInput)->get(); // originally Login::
        if(count($users) == 0){
            return redirect('/')->with('status', 'Login credentials are Invalid!');
        }else{
            foreach($users as $user){
                if($emailInput == $user->email && $passwordInput == $user->password){
                    session()->put('credentials', $user->email);
                    $customer = Customer::where('user_id', $user->id)->get();
                    foreach($customer as $cust){
                        session()->put('custId', $cust->id);
                        session()->put('custName', $cust->firstName . ' ' . $cust->lastName);
                    }
                    $sellers = Seller::where('user_id', $user->id)->get();
                    foreach($sellers as $seller){
                        $storeId = $seller->store->id;
                        session()->put('storeId', $storeId);
                    }
                    return redirect('/product');
                }else{
                    return redirect('/')->with('status', 'Login credentials are Invalid!');
                }
            }
        }
    }

    public function logout()
    {
        if(session()->has('credentials')){
            session()->pull('credentials');
            session()->pull('custId');
            session()->pull('custName');
            session()->pull('storeId');
            return redirect('/');
        }else{
            return redirect('/product');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}
