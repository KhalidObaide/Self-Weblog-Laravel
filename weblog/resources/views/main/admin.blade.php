@extends('base')
@section('title') Admin @endsection
@section('body')

<!-- New Post Form -->
<div class="container">
  <h2>Post A Post</h2>
  <p>Write Now And Publish Now</p>
  <form action="/post/" method="post">
	@csrf
    <div class="form-group">
      <label for="usr">Title:</label>
      <input type="text" class="form-control" id="usr" name="title">
    </div>

    <div class="form-group">
      <label for="comment">Article:</label>
      <textarea class="form-control" rows="5" id="comment" name="art" style="resize : vertical"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Post Now</button>
  </form>
</div>



<br><br><br>
<!-- Check The Comments For Every Post -->
<div class="container">
  <h2>Comments</h2>


@foreach($all_comments as $comment)
  <div class="card bg-dark" style="margin-bottom : 25px; color:white; width:350px; display : inline-block; vertical-align: top;">
    <div class="card-body">
      <h4 class="card-title">{{$comment['name']}}</h4>
	<kbd>{{$comment['art']}}</kbd>
      <p class="card-text">{!! $comment['comment'] !!}</p>
      <a href="/delete_comment/{{$comment['id']}}/" class="btn btn-danger">Delete</a>
    </div>
  </div>
  
@endforeach


</div>




<br><br><br>
<!-- Inbox -->

<div class="container">
  <h2> Your Inbox : </h2>

  <div class="card bg-primary text-white">
	<div class="card-body" >
		<p>from <b>Khalid Obaide</b></p>
		<p>Hello Khalid Obaide, I love your Contact And Articals Thank You</p>
		<a href="#" class="btn btn-danger">Delete</a>
		<a href="#" class="btn btn-success">Answer</a>
	</div>
  </div>
  
  <br><br>

  <div class="card bg-primary text-white">
	<div class="card-body" >
		<p>from <b>Aziz Hakim</b></p>
		<p>
			How Are you Bro I am A big fan of you. And Watch every single stream 
			you put on.
		</p>
		<a href="#" class="btn btn-danger">Delete</a>
		<a href="#" class="btn btn-success">Answer</a>
	</div>
  </div>



</div>

<!-- Copyright reserved -->
<br><br><br>
<center>Made By <b>Khalid Obaide</b></center>
@endsection
