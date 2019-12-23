<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// Helper Functions 

function _to_html($text){		
	// Convert Flat Text To Text with new lines
	$textAr = explode("\n", $text);
	$text = "";
	foreach ($textAr as $line) {
		$text = $text . $line . '<br>';
	}
	$text = ''. str_replace("\r", "", $text);
	
	return $text;
}


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
		$all_comments = json_decode(json_encode(DB::table('comments') -> get()), true);
		$all_posts = json_decode(json_encode(DB::table('posts')->get()), true);

		$i = 0;
		foreach($all_comments as $comment){
			foreach($all_posts as $post){
				if ($comment['to'] == ''.$post['id']){
					$all_comments[$i]['art'] = $post['title'];	
				}
			}
			$i -= -1;	
		}
		
		return view('main.admin', ['all_comments' => $all_comments]);
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
			$all_comments = DB::table('comments') -> get();
			$all_comments = json_decode(json_encode($all_comments), true);
			
			$got_comments = [];
			foreach($all_comments as $comment){
				if ($comment['to'] == ''.$id){
					array_push($got_comments, $comment);
				}
			}


			$title = $arty['title'];
			$art = $arty['art'];
			$time_added = $arty['time_added'];
			$id = $arty['id'];

			return view('main.art', ['title' => $title, 'art' => $art, 'time_added'=>$time_added, 'id' => $id, 'got_comments' => $got_comments]);
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
		
		$art = str_replace("\r", "<br>", $art);

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


	public function comment_p(Request $request, $id){
		// Getting All Arts
		$all_arts = DB::table('posts')->get();
		$all_arts = json_decode(json_encode($all_arts), true);

		
		foreach($all_arts as $art){
			
			if ($art['id'] == $id){
				$got = true;
				$arty = $art;
				break;
			}else{
				$got = false;
			}
		}


		if($got){
			$name = $request -> name;
			$email = $request -> email;
			$comment = $request -> comment;
			$time_added = ''. date("Y/m/d");
			$to = $arty['id'];

			// Convert the comment from flat text to text 
			$comment = str_replace("\r", "<br>", $comment);
			
			// Saving to Table (comments)
			DB::table('comments')->insert([
				'name' => $name,
				'email' => $email,
				'comment' => $comment,
				'time_added' => $time_added,
				'to' => $to
			]);

			
			return 'Thank You, You Commented !';
		}else{
			return 'This Article is no longer available';
		}
		
	}
}
