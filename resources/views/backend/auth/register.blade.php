@extends('backend.layout.app_auth')
@section('title', '')
@section('content')
    <div class="urlbox text-left register-form">
        <a class="home-redirect" href="{{ url('/') }}"><i class="fa fa-home"></i> Go Back (পিছনে যান)</a>
        <a class="text-dark float-left" href="{{ url('/') }}"><i class="fa fa-long-arrow-alt-left"></i></a>
        <h1 class="text-center text-primary">Sign up</h1>
        <h6 class="text-center">নতুন একাউন্ট খুলুন</h6>
        <div> <a href="{{ url('register/employer') }}">আপনি কি চাকরি দিতে চান?</a> </div>
        <div> <a href="{{ url('register/employee') }}">আপনি কি চাকরি খুঁজতে চান?</a> </div>
    </div>
@endsection
