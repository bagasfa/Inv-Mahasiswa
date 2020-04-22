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
        $validateData = $request->validate([
            'email' => 'required|unique:user,email',
            'password' => 'required|min:8',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:8192'
        ]);
        $upFoto = 'user-'.date('dmYhis').'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move('uploads/user', $upFoto);
        
        $user = new User;
        $user->nama_user = $request->nama_user;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->foto = $upFoto;
        $user->save();
        return redirect('/login')->with('message', 'Registrasi berhasil!');
    }

    // Proses Login
    public function postLogin(Request $request){
        // Checking Email dan Password
    	if(Auth::attempt($request->only('email','password'))){
            // Jika Berhasil Login
    		return redirect('/dashboard')->with('message', 'Welcome :)');
    	}
    	// Email atau Password salah
    	return redirect('/login')->with('bye', 'Email atau Password anda Salah!');
    }

    // Proses Logout
    public function logout(){
    	Auth::logout();
    	return redirect('/login')->with('bye', 'Goodbye :(');
    }
}
