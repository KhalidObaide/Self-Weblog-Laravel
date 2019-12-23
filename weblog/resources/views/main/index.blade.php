@extends('base')
@section('title') Home @endsection 
@section('body')
<br><br><br>


<!-- Who Am I -->
<div class="container">
	<h3> Who Am I ? </h3>
	<div class="card bg-dark" style="color: white;">
		<p style="margin : 10px;">
		Hello I am Khalid Obaide. The Owner Of this weblog. <br>
		I really thank you for comming in and enjoying my artices go ahead and leave a comment if you think i am awsome if not just go ahead and again drop a like or comment below. <br>

		Thanks Guys I really love to post more and more things but there is no such time for me to do that so ... 
		<br>
		And Again Khalid Obaide the Owner Of this Weblog  
		</p>
	</div>
</div>



<!-- Best Of ME -->
<br><br><br>
<div class="container">
	<h3>Best Of Me :</h3>

	<br>
	<div class="card bg-success" style="margin-bottom : 20px;">
		<h4 style="color : white; margin : 10px;">About The World ?</h4>
		<a href="#"class="btn btn-info" style="width : 120px; position : absolute; right : 6px; top: 6px; color : white;">Read Now</a>
	</div>	

	<div class="card bg-success" style="margin-bottom : 20px;">
		<h4 style="color : white; margin : 10px;">Why Islam?</h4>
		<a href="#"class="btn btn-info" style="width : 120px; position : absolute; right : 6px; top: 6px; color : white;">Read Now</a>
	</div>


</div>


<br><br><br>
<!-- Contact Me -->
<div class="container">
	<h3>Contact Me : </h3>
	<br>

<div class="containerr">
  <form action="/action_page.php">
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
