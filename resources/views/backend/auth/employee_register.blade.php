@extends('backend.layout.app_auth')
@section('title', 'Employee Register')
@section('content')
    <div class="urlbox text-left register-form">
        <a class="home-redirect" href="{{ url('/') }}"><i class="fa fa-home"></i> Go Back (পিছনে যান)</a>
        <a class="text-dark float-left" href="{{ url('/') }}"><i class="fa fa-long-arrow-alt-left"></i></a>
        <h1 class="text-center text-primary">Sign up</h1>
        <h6 class="text-center">নতুন একাউন্ট খুলুন</h6>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name (নাম)</label>
                <input type="text" class="form-control" name="name" id="exampleInputName1"
                    placeholder="Enter Your Name (নাম লিখুন)">
            </div>
            <div class="form-group">
                <label for="exampleInputPhone1">Phone (মোবাইল)</label>
                <input type="tel" class="form-control" name="phone" id="exampleInputPhone1" pattern="[0-9]{11}"
                    placeholder="Enter Phone No. (মোবাইল নাম্বার লিখুন)">
                <span class="small">eg: 01xxxxxxxxx</span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password (পাসওয়ার্ড)</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password (পাসওয়ার্ড দিন)">
            </div>
            <input type="hidden" name="role" value="employee">
            <button type="submit" class="btn btn-primary mb-2">Submit <span class="small">(প্রবেশ করুন)</span></button>
        </form>
        <div class="d-flex justify-content-between">
            <a class="text-dark" href="{{ url('login') }}">Already have an Account <span class="small">(যদি আপনার একাউন্ট
                    থেকে থাকে)</span></a>
        </div>
    </div>
@endsection
