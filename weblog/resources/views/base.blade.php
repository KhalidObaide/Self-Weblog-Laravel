@extends('style')


@section('rest')
<!DOCTYPE html>
<html>
<head>
	<title> @yield('title') | KhalidObaide</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


	<!-- End Of Bootstrap -->

</head>
<body>

	@yield('body')

</body>
</html>
@endsection
