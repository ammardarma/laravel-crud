<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $datas = $request->validate([
            'username' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required'
        ]);
        $admin = new admin();
        $admin->username =$request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return back()->with('message', 'Account created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logUser(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = admin::where('email', '=', $request->email)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)){
              return redirect('/');
            } 
        }
    }

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }
}
