<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    // Admin Panel
    public function index(Request $request){

    	$data = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('Fakultas.index', compact('data'));
    }

    public function add(Request $request){
    	$fakultas = new Fakultas;
    	$fakultas->nama_fakultas = $request->nama_fakultas;
    	$fakultas->save();
    	return redirect('/fakultas');
    }

    public function delete($id){
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();
        return redirect('/fakultas');
    }
}
