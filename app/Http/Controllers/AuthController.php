<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function index(){
    	return view('Auth.login');
    }

    public function postLogin(Request $request){
    	if(Auth::attempt($request->only('email','password'))){
    		return redirect('/dashboard');
    	}
    	// Message salah
    	return redirect('/login')->with('errors', 'Username atau Password anda Salah!');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/login');
    }
}
