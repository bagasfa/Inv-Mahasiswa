<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use App\Jurusan;
use App\Ruangan;
use App\Barang;
use App\User;

class PagesController extends Controller
{	
	function index(){
    	$fakultas = Fakultas::all();
    	$jurusan = Jurusan::all();
    	$ruangan = Ruangan::all();
    	$barang = Barang::all();
     	return view('Layouts.main', compact('fakultas','jurusan','ruangan','barang'));
    }

    function dashboard(){
    	$userAdmin = User::where(['role' => 'admin'])->count();
    	$userStaff = User::where(['role' => 'staff'])->count();
    	$fakultas = Fakultas::count();
    	$jurusan = Jurusan::count();
    	$ruangan = Ruangan::count();
    	$barang = Barang::count();
        $user = User::all();

        // History Add Data
        $his_add = Barang::orderByDesc('created_at')->limit('10')->get();
        // History Update Data
        $his_edit = Barang::orderByDesc('updated_at')->limit('10')->get()->where('updated_by', !NULL);

     	return view('dashboard', compact('user', 'userAdmin','userStaff','fakultas','jurusan','ruangan','barang','his_add','his_edit'));
    }
}
