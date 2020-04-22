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
    	$userAdmin = User::where(['role' => 'admin'])->count();
    	$userStaff = User::where(['role' => 'staff'])->count();
    	$fakultas = Fakultas::count();
    	$jurusan = Jurusan::count();
    	$ruangan = Ruangan::count();
    	$barang = Barang::count();
     	return view('Layouts.main', compact('userAdmin','userStaff','fakultas','jurusan','ruangan','barang'));
    }

    function dashboard(){
    	$userAdmin = User::where(['role' => 'admin'])->count();
    	$userStaff = User::where(['role' => 'staff'])->count();
    	$fakultas = Fakultas::count();
    	$jurusan = Jurusan::count();
    	$ruangan = Ruangan::count();
    	$barang = Barang::count();
     	return view('dashboard', compact('userAdmin','userStaff','fakultas','jurusan','ruangan','barang'));
    }
}
