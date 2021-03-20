<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
           <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img')}}/favicon.ico">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<!-- google fonts -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- all css here -->
		{{-- <link rel="stylesheet" href="{{mix('frontend/all.css')}}"> --}}
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{asset('frontend/all.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/materialdesignicons.min.css')}}">
		{{-- <!-- animate css -->
        <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="{{asset('frontend/css/materialdesignicons.min.css')}}">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="{{asset('frontend/css/jquery.simpleLens.css')}}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.min.css')}}">
		<!-- nivo.slider css -->
        <link rel="stylesheet" href="{{asset('frontend/css/nivo-slider.css')}}">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
		<!-- style css -->
		<link rel="stylesheet" href="{{asset('frontend/style.css')}}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
		<!-- modernizr js -->
        <script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script> --}}
    </head>
    <body>
		<div id="app2">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
     <![endif]-->

     <top-header></top-header>

     <router-view></router-view>

       {{-- <index-comps></index-comps> --}}
		
{{-- @include('frontend.partial.slider') --}}
 {{-- collection and promotional post --}}
 {{-- featured product will be here --}}
{{-- deal of the week here --}}
{{-- product showing using tabs --}}
{{-- blog sectiion here --}}

<footer-down></footer-down>



      {{-- single product modal here --}}

		
	</div>


		<!-- all js here -->
        <script src="{{asset('js/app2.js')}}"></script>
		<!-- jquery latest version -->
        <script src="{{asset('frontend/js/vendor/jquery-1.12.3.min.js')}}"></script>
        
		<!-- bootstrap js -->
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
		<!-- owl.carousel js -->
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
		<!-- meanmenu js -->
        <script src="{{asset('frontend/js/jquery.meanmenu.js')}}"></script>
		{{-- <!-- countdown JS -->
        <script src="{{asset('frontend/js/countdown.js')}}"></script> --}}
		<!-- nivo.slider JS -->
        <script src="{{asset('frontend/js/jquery.nivo.slider.pack.js')}}"></script>
		<!-- simpleLens JS -->
        <script src="{{asset('frontend/js/jquery.simpleLens.min.js')}}"></script>
		<!-- jquery-ui js -->
        <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
		<!-- load-more js -->
        <script src="{{asset('frontend/js/load-more.js')}}"></script>
		<!-- plugins js -->
        <script src="{{asset('frontend/js/plugins.js')}}"></script>
		<!-- main js -->
        <script src="{{asset('frontend/js/main.js')}}"></script>
	
		
    </body>
</html>
