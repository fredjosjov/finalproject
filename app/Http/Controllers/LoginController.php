<?php

namespace App\Http\Controllers;

// use App\Models\Login;
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
        return view('login.index');
    }

    public function login(Request $request)
    {
        $userinput = $request->input('email');
        $password = $request->input('password');

        $email = \App\Models\Login::where('email', $userinput)->get();

        if(count($email) > 0){
            foreach($email as $emails){
                if($emails->email == $userinput && $emails->password == $password){
                    $cust = \App\Models\Customer::where('user_id', $emails->id)->get();
                    foreach($cust as $name){
                        session()->put('custName', $name->firstName);
                    }
                    foreach($cust as $id){
                        session()->put('custId', $id->id);
                    }
                    if(session()->has('custId')){
                        return redirect('product');
                    }
                }else{
                    return redirect('login');
                }
            }
        }else{
            return redirect('login');
        }
    }

    public function logout()
    {
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('login');
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
