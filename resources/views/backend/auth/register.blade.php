@extends('backend.layout.app_auth')
@section('title', 'Register')
@section('content')
    <div class="urlbox text-left register-form">
        <a class="home-redirect" href="{{ url('/') }}"><i class="fa fa-home"></i> Go Back (পিছনে যান)</a>
        <a class="text-dark float-left" href="{{ url('/') }}"><i class="fa fa-long-arrow-alt-left"></i></a>
        <h1 class="text-center text-primary">Sign up</h1>
        <h6 class="text-center pt-3">নতুন একাউন্ট খুলুন</h6>
        <div class="row my-5">
            <div class="col-md-6"> <a class="btn btn-primary" href="{{ url('register/employer') }}">আমি চাকরি দিতে চাই</a> </div>
            <div class="col-md-6"> <a class="btn btn-primary" href="{{ url('register/employee') }}"> আমি চাকরি করতে চাই</a> </div>
        </div>
        
    </div>
@endsection
