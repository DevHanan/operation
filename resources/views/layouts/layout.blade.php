<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="token" content="{{csrf_token()}}">
    @include('includes.head')
</head>
<body>
    <!-- start preloader -->
    <div class="preloader">
        <div class="sk-spinner sk-spinner-rotating-plane"></div>
    </div>
    <!-- end preloader -->
<header id="header">
    @include('includes.header')
</header>
    <div class="container">
        @yield('content')
    </div>
<br><br><br><br><br>
    <footer>
        @include('includes.footer')
    </footer>


    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/wow.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.singlePageNav.min.js')}}"></script>
    <script src="{{URL::asset('js/custom.js')}}"></script>
</body>