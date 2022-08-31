<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - lagbe.co</title>
    <link rel="stylesheet" href="{{asset('assets/backend/auth/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/auth/css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/auth/css/fontawesome-all.css')}}">
</head>
<body>
<div class="container">

    @include('backend.partials.message')
    @yield('content')

</div>

<script src="{{asset('assets/backend/auth/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/backend/auth/js/popper.min.js')}}"></script>
<script src="{{asset('assets/backend/auth/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/auth/js/fontawesome-all.js')}}"></script>

</body>
</html>
