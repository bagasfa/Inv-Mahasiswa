<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	// Show Data + Search
    public function index(Request $request){
    	$user = User::when($request->search, function($query) use($request){
            $query->where('nama_user', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('User.index', compact('user'));
    }

    // Tambah Data
    public function add(Request $request){
    	$user = new User;
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->role = $request->role;
    	$user->save();
    	return redirect('/user')->with('message', 'Data User berhasil ditambahkan!');
    }

    // Hapus Data
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('message', 'Data User berhasil dihapus!');
    }

    // Menuju Halaman Edit
    public function edit($id){
        $user = User::findOrFail($id);
        return view('User.edit', compact('user'));
    }

    // Edit Data
    public function update($id, Request $request){
        $user = User::findOrFail($id);
        $user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->role = $request->role;
        $user->save();
        return redirect('/user')->with('message', 'Data User berhasil diupdate!');
    }
}
