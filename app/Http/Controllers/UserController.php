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
        $counter = User::count();

        return view('User.index', compact('user','counter'));
    }

    // Tambah Data
    public function add(Request $request){
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
    	return redirect('/user')->with('message', 'Data User berhasil ditambahkan!');
    }

    // Hapus Data
    public function delete($id){
        $image = User::where('id', $id)->first();
        File::delete('uploads/user/'.$image->foto);
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
        $validateData = $request->validate([
            'email' => 'required|unique:user,email,'.$user->id,
            'foto' => 'image|mimes:jpeg,png,jpg|max:8192'
        ]);

        $user->nama_user = $request->nama_user;
    	$user->email = $request->email;
        $user->role = $request->role;
        if( $request->foto){
            $upFoto = 'user-'.date('dmYhis').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move('uploads/user', $upFoto);
            $user->foto = $upFoto;
        }

        if($request->password == $user->password){
            $user->save();
            return redirect('/user')->with('error', 'Tidak ada perubahan pada Password!');
        }else{
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/user')->with('message', 'Data berhasil diubah!');
        }
    }
}
