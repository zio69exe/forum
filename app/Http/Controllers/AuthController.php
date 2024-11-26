<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //


    public function login(){
        return view('auths.login');
    }

    public function postlogin(Request $request){

           // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }else{
            return redirect()->back()->with('error', 'Login gagal. Periksa email dan password Anda.');
        }
    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
