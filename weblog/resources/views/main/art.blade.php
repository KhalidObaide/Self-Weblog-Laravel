@extends('base')
@section('title') About Afghanistan @endsection 
@section('body')


<br><br>
<div class="container">
	<h1>{{ $title }}</h1>
	by <b>Khalid Obaide</b> , {{ $time_added }}
	<br><br>
	<div class="card">
	<p style="margin : 10px;">
		{!! $art !!}
	</p>
	</div>	

</div>

<br><br><br>
<div class="container">
	<h3> Comments </h3>
	

	<div class="card bg-dark" style="color : white; margin-bottom : 20px;">
	<p style="margin : 5px;">
		<b>Aziz Hakim</b><br>
		Helo World I love Your Articles Keep Goign 	
	</div>


	<div class="card bg-dark" style="color : white; margin-bottom : 20px;">
	<p style="margin : 5px">
	<b> Rashid Sijid</b><br>
	This was the Best Article in the world just made of two word but a very big meaning
	</p>
	</div>
</div>

<!-- Comment -->
<br><br><br>
<div class="container">
	<h3>Add Comment : </h3>
	<br>

<div class="containerr">
  <form action="/action_page.php">
    <label for="fname">Full Name</label>
    <input class="sm-ipt" type="text" id="fname" name="name" placeholder="Your name..">

    <label for="lname">Email</label>
    <input type="email" class="sm-ipt" id="lname" name="email" placeholder="Your Email..">

    <label for="subject">Comment</label>
    <textarea id="subject" class="sm-ipt" name="subject" placeholder="Write something.." style="height:200px"></textarea>


<br><br>
    <input type="submit" value="Submit" class="cta-btn">
  </form>
</div>

	
</div>

<br><br><br><br>


<!-- Copyright reserved -->
<center>Made By <b>Khalid Obaide</b></center>



</div>

@endsection
