<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    // Halaman Login
    public function index(){
    	return view('Auth.login');
    }

    // Registrasi User Baru Sebagai Staff
    public function register(Request $request){
        $user = new User;
        $user->nama_user = $request->nama_user;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('/')->with('message', 'Registrasi berhasil!');
    }

    // Proses Login
    public function postLogin(Request $request){
        // Checking Email dan Password
    	if(Auth::attempt($request->only('email','password'))){
            // Jika Berhasil Login
    		return redirect('/dashboard')->with('message', 'Welcome :)');
    	}
    	// Email atau Password salah
    	return redirect('/')->with('errors', 'Email atau Password anda Salah!');
    }

    // Proses Logout
    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
