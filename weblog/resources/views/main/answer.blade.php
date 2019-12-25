@extends('base')
@section('title') Answer | {{$admin['name']}} @endsection 
@section('body')

<br><br>


<!-- New Post Form -->
<div class="container">
  <h2>Answer To {{$contact['name']}}</h2>
  <p>It will be sent right now.</p>
  <form action="/answer/{{$contact['id']}}/" method="post">
  @csrf
  <input type="hidden" value="{{$contact['id']}}" name="id"/>
    <div class="form-group">
      <label for="usr">Subject:</label>
      <input type="text" class="form-control" id="usr" name="head">
    </div>

    <div class="form-group">
      <label for="comment">Content:</label>
      <textarea class="form-control" rows="5" id="comment" name="body" style="resize : vertical"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Now</button>
  </form>
</div>

@endsection
