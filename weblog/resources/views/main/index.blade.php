@extends('base')
@section('title') Home | {{$admin['name']}}@endsection 
@section('body')
<br><br><br>


<!-- Who Am I -->
<div class="container">
	<h3> Who Am I ? </h3>
	<div class="card bg-dark" style="color: white;">
		<p style="margin : 10px;">
			<b>{{$admin['name']}}</b><br>
			{!!$admin['intro']!!}
		</p>
	</div>
</div>



<!-- Best Of ME -->
<br><br><br>
<div class="container">
	<h3>From Me : </h3>
	<br>

	@foreach($all_arts as $art)
	<div class="card bg-success" style="margin-bottom : 20px;">
		<h4 style="color : white; margin : 10px;">{{$art['title']}}</h4>
		<a href="/{{$art['id']}}"class="btn btn-info" style="width : 120px; position : absolute; right : 6px; top: 6px; color : white;">Read Now</a>
	</div>	
	@endforeach

</div>


<br><br><br>
<!-- Contact Me -->
<div class="container">
	<h3>Contact Me : </h3>
	<br>

<div class="containerr">
  <form action="/contact/" method="post">
	@csrf
    <label for="fname">First Name</label>
    <input class="sm-ipt" type="text" id="fname" name="name" placeholder="Your name..">

    <label for="lname">Email</label>
    <input type="email" class="sm-ipt" id="lname" name="email" placeholder="Your Email..">

    <label for="subject">Subject</label>
    <textarea id="subject" class="sm-ipt" name="subject" placeholder="Write something.." style="height:200px"></textarea>


<br><br>
    <input type="submit" value="Submit" class="cta-btn">
  </form>
</div>

	
</div>

<br><br><br><br>


<!-- Copyright reserved -->
<center>Made By <b>Khalid Obaide</b></center>

@endsection 
