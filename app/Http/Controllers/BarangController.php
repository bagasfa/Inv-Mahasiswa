<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Barang;
use App\Ruangan;
use App\User;

class BarangController extends Controller
{
    // Show Data + Search
    public function index(Request $request){
    	$barang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        $ruangan = Ruangan::all();
        $user = User::all();

        return view('Barang.index', compact('ruangan', 'barang', 'user'));
    }

    // Tambah Data
    public function add(Request $request){
    	$barang = new Barang;
    	$barang->id_ruangan = $request->id_ruangan;
    	$barang->nama_barang = $request->nama_barang;
    	$barang->total = $request->total;
    	$barang->broken = $request->broken;
    	$barang->created_by = $request->created_by;
    	$barang->save();
    	return redirect('/barang')->with('message', 'Data Barang berhasil ditambahkan!');
    }

    // Hapus Data
    public function delete($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/barang')->with('message', 'Data Barang berhasil dihapus!');
    }

    // Menuju Halaman Edit
    public function edit($id){
        $barang = Barang::findOrFail($id);
        $ruangan = Ruangan::all();
        return view('Barang.edit', compact('ruangan', 'barang'));
    }

    // Edit Data
    public function update($id, Request $request){
        $barang = Barang::findOrFail($id);
        $barang->id_ruangan = $request->id_ruangan;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        $barang->save();
        return redirect('/barang')->with('message', 'Data Barang berhasil diupdate!');
    }

    // Export Data Ke Excel
    public function exportXLSX(){
        return Excel::download(new BarangExport, 'Barang-'.date("d-m-Y").'.xlsx')->with('message', 'Data Barang berhasil di-Export!');
    }
}
