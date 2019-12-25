@extends('base')
@section('title') Edit Post | {{$admin['name']}}@endsection 
@section('body')

<br><br><br>
<div class="container">
  <h2>Edit Post   <b>{{$post['title']}}</b></h2>
  <p>It will be update right now.</p>
  <form action="/edit_post/" method="post">
  @csrf
  <input type="hidden" value="{{$post['id']}}" name="id"/>
    <div class="form-group">
      <label for="usr">Title:</label>
      <input type="text" class="form-control" id="usr" name="title" value="{{$post['title']}}">
    </div>

    <div class="form-group">
      <label for="comment">Content:</label>
      <textarea class="form-control" rows="5" id="comment" name="art" style="resize : vertical">{{$post['art']}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Now</button>
  </form>
</div>



@endsection

