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

@foreach($all_contacts as $contact)
  <div class="card bg-primary text-white">
	<div class="card-body" >
		<p>from <b>{{$contact['name']}}</b></p>
		<p>{!! $contact['subject'] !!}</p>
		<a href="/delete_contact/{{$contact['id']}}/" class="btn btn-danger">Delete</a>
		<a href="/answer/{{$contact['id']}}/" class="btn btn-success">Answer</a>
	</div>
  </div>
<br><br>
@endforeach

</div>

<!-- Copyright reserved -->
<br><br><br>
<center>Made By <b>Khalid Obaide</b></center>
@endsection
