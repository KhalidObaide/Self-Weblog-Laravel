<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
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


function check($have, $need, $table){
	$all_table = DB::table($table)->get();
	$all_table = json_decode(json_encode($all_table), true);

	foreach($all_table as $row){
		if ($row[$need] == $have){
			$got = true;
			$got_need = $row;
			break;
		}else{
			$got = false;
		}
	}

	if($got){
		return $got_need;
	}else{
		return false;
	}

}
class MainController extends Controller
{
	// Index GET Page
	public function index_g(){
		// Getting All Arts 
		$all_arts = DB::table('posts') -> get();
		$all_arts = json_decode(json_encode($all_arts), true);
		$admin = json_decode(json_encode(DB::table('admin')->get()), true)[0];

		return view('main.index', ['all_arts' => $all_arts, 'admin' => $admin]);
	}



	// Admin GET Page
	public function admin_g(){
		$cookie = Cookie::get("admin");
		if ($cookie == false){
			return '<script>window.location.href="http://127.0.0.1:8000/login"</script>';

		}


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

		$all_contacts = DB::table('contacts')->get();
		$all_contacts = json_decode(json_encode($all_contacts), true);
		$all_posts = json_decode(json_encode(DB::table('posts')->get()), true);

		$admin = DB::table('admin')->get();
		$admin = json_decode(json_encode($admin), true);
		$admin = $admin[0];
		$admin['intro'] = str_replace('<br>', '&#13;&#10;', $admin['intro']);
		
		return view('main.admin', [
			'all_posts'=>$all_posts,
			'all_comments' => $all_comments,
			'all_contacts' => $all_contacts,
			'admin' => $admin
		]);
	}




	// Art Get Page
	public function art_g($id){	
		$check = check($id, 'id', 'posts');
		if ($check == false){
			return 'We Didnt Find The Art';
		}

		// After We Got The Art return the view for it 
		
		$all_comments = DB::table('comments') -> get();
		$all_comments = json_decode(json_encode($all_comments), true);
		
		$got_comments = [];
		foreach($all_comments as $comment){
			if ($comment['to'] == ''.$id){
				array_push($got_comments, $comment);
			}
		}

		$title = $check['title'];
		$art = $check['art'];
		$time_added = $check['time_added'];
		$id = $check['id'];

		return view('main.art', ['title' => $title, 'art' => $art, 'time_added'=>$time_added, 'id' => $id, 'got_comments' => $got_comments]);

	}	


	
	// Post POST Page
	public function post_p(Request $request){
		$title = $request->title;
		$art = $request->art; 
		$time_added = ''. date("Y/m/d");
		
		$art = _to_html($art);

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
		$check = check($id, 'id', 'posts');
		if ($check == false){
			return 'This Article Is No Longer Here ';
		}


		
		$name = $request -> name;
		$email = $request -> email;
		$comment = $request -> comment;
		$time_added = ''. date("Y/m/d");
		$to = $request->id;

		// Convert the comment from flat text to text 
		$comment = _to_html($comment);
			
		// Saving to Table (comments)
		DB::table('comments')->insert([
			'name' => $name,
			'email' => $email,
			'comment' => $comment,
			'time_added' => $time_added,
			'to' => $to
		]);
	
		return 'Thank You, You Commented!';
		
	}


	public function delete_comment($id){	
		$check = check($id, 'id' , 'comments');
		if($check == false){
			return 'This Comment Already Deleted';
		}
		DB::table('comments')->delete($id);
		return 'Deleted';

	}

	
	public function contact_p(Request $request){
		DB::table('contacts')->insert([
			'name' => $request['name'],
			'email' => $request['email'],
			'subject' => _to_html($request['subject']),
			'time_added' => date("Y/m/d")
		]);

		return 'Thank you, <br> We Will Contact you As soon As possible ';
	}


	public function delete_contact($id){
		$check = check($id, 'id', 'contacts');
		if ($check == false){
			return 'This Comment Already Deleted';
		}

		DB::table('contacts') -> delete($id);
		return 'Deleted';

	}


	public function answer_g($id){
		$check = check($id, 'id', 'contacts');
		if ($check == false){
			return 'This Comments Deleted Or Does Not Exist';
		}

		return view('main.answer', ['contact' => $check]);
	}


	public function answer_p(Request $request){
		$check = check($request->id, 'id', 'contacts');
		if ($check == false){
			return 'Some Problem Going On';
		}


		// Delete It From Inbox 
		DB::table('contacts')->delete($request->id);
		// I let You Send The Email 
		return 'Answered';
	}


	public function delete_post($id){
		$check = check($id, 'id', 'posts');
	       	if ($check == false){
			return 'This Post Already Deleted ';
		}

		DB::table('posts')->delete($id);
		return 'Deleted ';	
		
	}

	

	public function edit_post_g($id){
		$check = check($id, 'id', 'posts');
		if ($check == false){
			return 'This Article Does Not Exist';
		}

		$check['art'] = str_replace('<br>', '', $check['art']);

		return view('main.edit_post', ['post' => $check]);

	}


	public function edit_post_p(Request $request){

		$check = check($request->id, 'id', 'posts');
		if($check == false){
			return 'This Article Does Not Exist';
		}
		
		$check['art'] = _to_html($request->art);
		$check['title'] = $request->title;
		
		DB::table('posts')->where('id', $request->id)->update([
			'art' => $check['art'],
			'title' => $check['title']
		]);	
		
		return 'Updated ';

	}



	public function edit_profile(Request $request){	
		DB::table('admin')->where('id', '1')->update([
			'name' => $request->name,
			'intro' => _to_html($request->intro)
		]);
		
		return 'Updated';
	}

	public function login(Request $request){
		$admin = json_decode(json_encode(DB::table('admin')->get()),true)[0];
		if ($request->username == $admin['username'] && $request->password == $admin['password']){

			// Start Sessions 
			Cookie::queue('admin', 'true', 60*24*30 /* One Month */ );

			// Return Something (Admin Page)
			return '<script>window.location.href="http://127.0.0.1:8000/admin"</script>';
		}else{
			return 'Wrong Password or username, Try Again !';
		}	
		
	}


	public function login_g(){
		return view('main.login');
	}

	public function logout(){
		Cookie::queue(Cookie::forget('admin'));
		return 'Logged Out';
	}



	// TEST functions 
	/*
	public function set($val, Request $request){
		$name = "ss";

		Cookie::queue($name, $val, 5);
		return 'Set';
	}

	public function get(Request $request){
		$value = Cookie::get('ss');
		return $value;
	}

	public function del(){
		Cookie::queue(Cookie::forget('admin'));

		return 'Logged Out';
	}
	 */

	
}
