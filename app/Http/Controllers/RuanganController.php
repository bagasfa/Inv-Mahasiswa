<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Jurusan;

class RuanganController extends Controller
{
    public function index(Request $request){

    	$ruangan = Ruangan::when($request->search, function($query) use($request){
            $query->where('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        $jurusan = Jurusan::all();

        return view('Ruangan.index', compact('ruangan', 'jurusan'));
    }

    public function add(Request $request){
    	$ruangan = new Ruangan;
    	$ruangan->id_jurusan = $request->id_jurusan;
    	$ruangan->nama_ruangan = $request->nama_ruangan;
    	$ruangan->save();
    	return redirect('/ruangan');
    }

    public function delete($id){
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        return redirect('/ruangan');
    }

    public function edit($id){
        $ruangan = Ruangan::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('Ruangan.edit', compact('ruangan', 'jurusan'));
    }

    public function update($id, Request $request){
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->id_jurusan = $request->id_jurusan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->save();
        return redirect('/ruangan');
    }
}
