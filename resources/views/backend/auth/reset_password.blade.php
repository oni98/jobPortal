@extends('backend.layout.app_auth')
@section('title', '')
@section('content')
    <div class="urlbox text-left register-form">
        <a class="home-redirect" href="{{ url('/') }}"><i class="fa fa-home"></i> Go Home (প্রথম পেজে যান)</a>
        <h2 class="text-center text-primary">Reset your password</h2>
        <h6 class="text-center">পাসওয়ার্ড পরিবর্তন করুন</h6>
        <form action="{{ route('set-new-password') }}" method="POST">
            @csrf
            <input class="form-control" type="hidden" name="phone" id="email-for-pass" value="{{ $phone }}">
            <div class="card-body">
                <div class="form-group"> <label for="email-for-pass">Verification Code<small>( ভেরিফিকেশন কোডটি লিখুন
                            )</small></label>
                    <input class="form-control" type="text" name="code" id="email-for-pass" required=""
                        value="{{ old('code') }}">
                </div>
                <div class="form-group"> <label for="email-for-pass">New Password<small>( নতুন পাসওয়ার্ড লিখুন
                            )</small></label>
                    <input class="form-control" type="password" name="password" id="email-for-pass" required="">
                </div>
                <div class="form-group">
                    <label for="email-for-pass">Confirm Password<small>( নতুন পাসওয়ার্ডটি পুনরায় লিখুন )</small></label>
                    <input class="form-control" type="password" name="password_confirmation" id="email-for-pass"
                        required="">
                </div>
                <button class="btn btn-primary mb-2" type="submit">Send Code<span class="small"> (প্রবেশ
                        করুন)</span></button>
        </form>
        <div class="d-flex justify-content-center">
            <a class="text-dark" href="{{ route('login') }}">Back to Login<span class="small"> (লগইনে ফিরে যান)</span></a>
        </div>
    </div>
    </div>
    </div>
@endsection
