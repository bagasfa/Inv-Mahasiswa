<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{	
	// Landing Page
    function landingPage(){
    	return view('Layouts.main');
    }

    function dashboard(){
    	return view('dashboard');
    }
}
