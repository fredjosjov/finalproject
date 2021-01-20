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

    //Login still not done
    public function login(Request $request)
    {
        $userinput = $request->input('username');
        $password = $request->input('password');

        $custId = \App\Models\Customer::all('id');
        $custName = \App\Models\Customer::all('firstName');

        $users = \App\Models\Login::where('username', $userinput)->get();

        if(count($users) > 0){
            foreach($users as $user){
                if($user->username == $userinput && $user->password == $password){
                    foreach($custName as $name){
                        session()->put('custName', $name->firstName);
                    }
                    foreach($custId as $id){
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
