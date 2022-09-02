@extends('backend.layout.app_auth')
@section('title', 'Forgot Password')
@section('content')
    <div class="urlbox text-left register-form">
        <a class="home-redirect" href="{{ url('/') }}"><i class="fa fa-home"></i> Go Home (প্রথম পেজে যান)</a>
        <h2 class="text-center text-primary">Forgot your password?</h2>
        <h6 class="text-center">পাসওয়ার্ড ভুলে গেছেন?</h6>
        <ol class="list-unstyled ml-3">
            <li><span class="text-primary text-medium">1. </span><small>Enter your phone number below ( নীচে আপনার মোবাইল
                    নাম্বারটি লিখুন )</small></li>
            <li><span class="text-primary text-medium">2. </span><small>Our system will send you a code ( আপনার মোবাইলে একটি
                    কোড যাবে )</small></li>
            <li><span class="text-primary text-medium">3. </span><small>Use the code to reset your password ( কোডটি বসিয়ে
                    আপনার নতুন পাসওয়ার্ডটি দিন </small></li>
        </ol>
        <form action="{{ route('reset-verification') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group"> <label for="email-for-pass">Enter your phone Number <small>( আপনার মোবাইল নাম্বারটি
                            লিখুন )</small></label>
                    <input class="form-control" type="text" id="email-for-pass" required="" name="phone">
                    <small class="form-text text-muted">Enter the phone you used during the registration ( যেই নাম্বার দিয়ে
                        রেজিষ্ট্রেশন করেছেন, সেটি লিখুন )</small>
                </div>
            </div>
            <button class="btn btn-primary mb-2" type="submit">Send Code<span class="small"> (প্রবেশ করুন)</span></button>
        </form>
        <div class="d-flex justify-content-center">
            <a class="text-dark" href="{{ route('login') }}">Back to Login<span class="small"> (লগইনে ফিরে যান)</span></a>
        </div>
    </div>
@endsection
