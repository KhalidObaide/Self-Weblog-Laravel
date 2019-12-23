<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
	// Index GET Page
	public function index_g(){
		// Getting All Arts 
		$all_arts = DB::table('posts') -> get();
		$all_arts = json_decode(json_encode($all_arts), true);
		
		return view('main.index', ['all_arts' => $all_arts]);
	}


	// Admin GET Page
	public function admin_g(){
		return view('main.admin');
	}


	// Art Get Page
	public function art_g($id){
		// Getting The Art By Id
		$all_arts = DB::table('posts') -> get();
		$all_arts = json_decode(json_encode($all_arts), true);
		
		foreach($all_arts as $art){
			if($art['id'] == $id){
				$got = true; 
				$arty = $art;
				break;
			}else{
				$got = false;
			}
		}

		// After We Got The Art return the view for it 
		if ($got){
			$title = $arty['title'];
			$art = $arty['art'];
			$time_added = $arty['time_added'];

			return view('main.art', ['title' => $title, 'art' => $art, 'time_added'=>$time_added]);


		}else{
			// Raise 404
			return 'We Didnt Find The Art';
		}
	}	


	
	// Post POST Page
	public function post_p(Request $request){
		$title = $request->title;
		$art = $request->art; 
		$time_added = ''. date("Y/m/d");
		
		// Convert Flat Text To Text with new lines
		$textAr = explode("\n", $art);
		$art = "";
		foreach ($textAr as $line) {
			$art = $art . $line . '<br>';
		}
		$art = ''. str_replace("\r", "", $art);


		//Save Data To Table (posts)
		DB::table('posts')->insert(
			[
				'title' => $title,
				'art' => $art,
				'time_added' => $time_added
			]
		);
			

		// Return Something 
		return 'Added !';
	}
}
