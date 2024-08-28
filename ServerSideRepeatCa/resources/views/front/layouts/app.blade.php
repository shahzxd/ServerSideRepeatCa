<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pro Soccer - Football Club </title>
    <meta name="description" content="Pro Soccer - Football Club Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.">
    <meta name="keywords" content="prosoccer, football, club, soccer, bootstrap">
    <meta name="author">
    <!-- ==============================================
    Favicons
    =============================================== -->
    <link rel="shortcut icon" href="{{asset('front/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('front/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('front/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('front/images/apple-touch-icon-114x114.png')}}">
    <!-- ==============================================
    CSS
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/magnific-popup.css')}}">


    <!-- ==============================================
    Google Fonts
    =============================================== -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

    <!-- ==============================================
    Custom Stylesheet
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" />



    <script type="text/javascript" src="{{asset('front/js/modernizr.min.js')}}"></script>



</head>

<body>




<!-- NAVBAR SECTION -->
@include('front.layouts.navbar')

@yield('content')

<!-- CLIENT SECTION -->
@include('front.layouts.client-section')


<!-- FOOTER SECTION -->
@include('front.layouts.footer')





<script type="text/javascript" src="{{asset('front/js/jquery.min.js')}}"></script>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?sensor=false&amp;ver=4.1.5'></script>
<script type='text/javascript' src='{{asset('front/js/jqBootstrapValidation.js')}}'></script>
<script type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>

<script type="text/javascript" src="{{asset('front/js/script.js')}}"></script>


@stack('scripts')

</body>

</html>
