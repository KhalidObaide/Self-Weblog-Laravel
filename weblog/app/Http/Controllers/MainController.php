<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
	// Index GET Page
	public function index_g(){
		return view('main.index');
	}

	// Admin 
	public function admin_g(){
		return view('main.admin');
	}
}
