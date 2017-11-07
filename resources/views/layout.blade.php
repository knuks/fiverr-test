<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fiverr Test App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	@yield('page-style')
	
</head>
<body style="background-color:#ffffff;">
	<header class="container-fluid" role="banner" style="padding-left:1em;background-color:#f5f5f5">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<img src="http://logos.logoinlogo.com/Travel-and-Hotel-Tourism-Comment-Financial-Hand-people-Logos-271582801821.png" alt="" class="img-responsive" style="height:5em">
			</div>
			<div class="col-lg-9  col-lg-pull-2 col-md-9 col-sm-12 col-xs-12">
				<h2>Fiverr Test App</h2>
			</div>
		</div>
	</header>
	@include('partials.nav')
	@include('partials.slider')
	<div class="container">
		@yield('content')
	</div>
	<script src="{{asset('js/app.js')}}" charset="utf-8"></script>
	@yield('page-script')
</body>
</html>
