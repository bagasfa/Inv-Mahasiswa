<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    // Show Data + Search
    public function index(Request $request){

    	$data = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('Fakultas.index', compact('data'));
    }

    // Tambah Data
    public function add(Request $request){
    	$fakultas = new Fakultas;
    	$fakultas->nama_fakultas = $request->nama_fakultas;
    	$fakultas->save();
    	return redirect('/fakultas')->with('message', 'Data Fakultas berhasil ditambahkan!');
    }

    // Hapus Data
    public function delete($id){
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();
        return redirect('/fakultas')->with('message', 'Data Fakultas berhasil dihapus!');
    }

    // Menuju Halaman Edit Data
    public function edit($id){
        $fakultas = Fakultas::findOrFail($id);
        return view('Fakultas.edit', compact('fakultas'));
    }

    // Edit Data
    public function update($id, Request $request){
        $fakultas = Fakultas::find($id);
        $fakultas->nama_fakultas = $request->nama_fakultas;
        $fakultas->save();
        return redirect('/fakultas')->with('message', 'Data Fakultas berhasil diupdate!');
    }
}
