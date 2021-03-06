<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FakultasImport;
use App\Fakultas;

class FakultasController extends Controller
{
    // Show Data + Search
    public function index(Request $request){

    	$data = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->sortable()->paginate(10);
        $counter = Fakultas::count();

        return view('Fakultas.index', compact('data','counter'));
    }

    // Tambah Data
    public function add(Request $request){
        $validateData = $request->validate([
            'nama_fakultas' => 'required|unique:fakultas,nama_fakultas|max:255'
        ]);

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
        $validateData = $request->validate([
            'nama_fakultas' => 'required|unique:fakultas,nama_fakultas,'.$fakultas->id.'|max:255'
        ]);
        
        $fakultas->nama_fakultas = $request->nama_fakultas;
        $fakultas->save();
        return redirect('/fakultas')->with('message', 'Data Fakultas berhasil diupdate!');
    }

    public function import(Request $request){
        $validateData = $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');
        $filename = date('dmYhis').'-'.$file->getClientOriginalName();
        $file->move('uploads/Fakultas',$filename);
        Excel::import(new FakultasImport, public_path('/uploads/Fakultas/'.$filename));

        return redirect('/fakultas')->with('message', 'Data Fakultas Berhasil Di Import!');
    }
}
