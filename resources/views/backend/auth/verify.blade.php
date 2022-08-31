@extends('backend.layout.app_auth')
@section('title', '')
@section('content')
    <div class="urlbox text-left register-form">
        <a class="home-redirect" href="{{ url('/') }}"><i class="fa fa-home"></i> Go Home (প্রথম পেজে যান)</a>
        <h6 class="text-center text-primary">Please enter the 6-digit verification code we sent via SMS</p>
            <p class="text-center text-dark">আপনার মোবাইলে যাওয়া ৬-ডিজিটের কোডটি বসান
        </h6>
        <form class="d-flex justify-content-center" action="{{ route('verification') }}" method="post">
            @csrf
            <input name="phone" type="hidden" value="{{ $phone }}">
            <input type="text" name="otp_code" maxLength="6" size="6" min="0" max="9" />
            <button type="submit" class="btn btn-primary btn-embossed ml-2">Verify <small>( ভেরিফাই করুন )</small></button>
        </form>
        <div class="mt-2">
            Didn't receive the code? <small>( কোনো কোড পাননি?)</small> <br />
            <a href="{{ route('otp.resend', $phone) }}">Send code again <small>(আবার কোড পাঠান)</small></a><br />
        </div>
    </div>
@endsection
