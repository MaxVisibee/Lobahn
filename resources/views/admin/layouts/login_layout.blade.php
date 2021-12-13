<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>{{ $siteSetting->site_name? $siteSetting->site_name:'Lobahn' }} | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="{{asset('/backend/css/material/app.min.css')}}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<div class="material-loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
			</svg>
			<div class="message">Loading...</div>
		</div>
	</div>
	<!-- end #page-loader -->
	
    @yield('content')
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('/backend/js/app.min.js')}}"></script>
	<script src="{{asset('/backend/js/theme/material.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>