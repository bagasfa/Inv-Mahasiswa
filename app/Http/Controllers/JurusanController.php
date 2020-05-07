<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jurusan;
use App\Fakultas;


class JurusanController extends Controller
{
    // Search dengan Parameter Nama Fakultas
    public function search(Request $request){
    	$fakultas = Fakultas::all();
        $search = $request->search;
        $searchFakultas = DB::table('Fakultas')
        					->select('id')
                            ->where('nama_fakultas', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $data = DB::table('Jurusan')->where('id_fakultas', '=', $src)->paginate(10);

            return view('Jurusan.index', compact('data','fakultas'));
        }
    }

    // Show Data
    public function index(Request $request){
    	$data = Jurusan::paginate(10);
        $fakultas = Fakultas::all();
        $counter = Jurusan::count();

        return view('Jurusan.index', compact('data','fakultas','counter'));
    }

    // Tambah Data
    public function add(Request $request){
        $validateData = $request->validate([
            'nama_jurusan' => 'required|unique:jurusan,nama_jurusan|max:255'
        ]);

    	$jurusan = new Jurusan;
    	$jurusan->id_fakultas = $request->id_fakultas;
    	$jurusan->nama_jurusan = $request->nama_jurusan;
    	$jurusan->save();
    	return redirect('/jurusan')->with('message', 'Data Jurusan berhasil ditambahkan!');
    }

    // Hapus Data
    public function delete($id){
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect('/jurusan')->with('message', 'Data Jurusan berhasil dihapus!');
    }

    // Menuju Halaman Edit Data
    public function edit($id){
        $jurusan = Jurusan::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('Jurusan.edit', compact('jurusan','fakultas'));
    }

    // Edit Data
    public function update($id, Request $request){
        $jurusan = Jurusan::find($id);
        $validateData = $request->validate([
            'nama_jurusan' => 'required|unique:jurusan,nama_jurusan,'.$jurusan->id.'|max:255'
        ]);

        $jurusan->id_fakultas = $request->id_fakultas;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();
        return redirect('/jurusan')->with('message', 'Data Jurusan berhasil diupdate!');
    }
}
