<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\SmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $root = 'backend.auth.';
    public function registerPage(){
        return view($this->root.'register');
    }

    public function register(Request $request, SmsService $sms){
        $request->validate([
            'phone' => 'required|unique:users'
        ],[
            'phone.required' => 'Phone No. Can not be empty ( কোনো মোবাইল নাম্বার প্রবেশ করানো হয় নি )',
            'phone.unique' => 'This number has already been used ( এই নাম্বার দিয়ে পূর্বে একাউন্ট খোলা হয়েছে)',
        ]);

        $register = new User();
        $register->name = $request->name;
        $register->phone = $request->phone;
        $register->password = bcrypt($request->password);
        $register->otp = substr(number_format(time() * rand(),0,'',''),0,6);
        if($register->save()){
            if($request->role){
                $register->assignRole($request->role);
            }

            $sms->setOtpCode($register->otp);
            $sms->setTemplate("OTP code = %otp%, please use to verify");
            $sms->sendSms($register->phone);

                if (empty($register->phone_verified_at)){
                    return redirect()->route('verify', ['phone'=>$register->phone]);
                }
            return redirect('/register');
        }
    }

    public function login(){
        if (Auth::check()){
            return redirect('dashboard');
        }
        return view($this->root.'login');
    }

   public function sendResetVarificationCode(Request $request, SmsService $sms){
       if (Auth::check()){
           return redirect('dashboard');
       }
        $user = User::where('phone', $request->phone)->first();
        if(!empty($user)){
            $user->otp = substr(number_format(time() * rand(),0,'',''),0,6);
            if($user->save()){
                $sms->setOtpCode($user->otp);
                $sms->setTemplate("OTP code = %otp%, please use to verify");
                $sms->sendSms($user->phone);

                return redirect()->route('reset-password', ['phone'=>$user->phone]);
            }
        }
        return redirect()->back()->withErrors("We couldn't find any existing account ( এই নাম্বার দিয়ে কোনো একাউন্ট খোলা হয় নি)");
    }

    public function resetPassword(Request $request){
        $phone = $request->phone;
        return view($this->root.'reset_password', ['phone'=>$phone]);
    }

    public function setNewPassword(Request $request){

        $request->validate([
            'code'=> 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = User::where('phone', $request->phone)->first();

        if($request->code != $user->otp){
            return redirect()->back()->withErrors("Wrong Verification Code");
        }

        $user->password = bcrypt($request->password);

        if($user->save()){
            Auth::login($user); // login user automatically
            return redirect('dashboard');
        }

        return redirect()->back()->withErrors("Something wrong");

    }

    public function forgotPassword(){
        if (Auth::check()){
            return redirect('dashboard');
        }
        return view($this->root.'forgot_password');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'phone' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('phone', $request->phone)->first();
        if (!empty($user)){
            if (empty($user->phone_verified_at)){
                return redirect()->route('verify', ['phone'=>$user->phone]);
            }
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ]);
    }

    public function verify(Request $request){
        $phone = $request->phone;
        return view($this->root.'verify', ['phone'=>$phone]);
    }

    public function verification(Request $request){
        $phone = $request->phone;
        $otp = $request->otp_code;

        $user = User::where('phone',$phone)->first();
        if ($user->otp == $otp){
            $user->phone_verified_at = Carbon::now();
            $user->otp = '';
            if ($user->save()){
                Auth::login($user); // login user automatically
                return redirect('backend.dashboard');
            }
        }
        return redirect()->route('verify', ['phone'=>$phone]);
    }

    public function resendOtp(SmsService $sms,$phone){
        $user = User::where('phone',$phone)->first();
        if (!empty($user)){
            $user->otp = substr(number_format(time() * rand(),0,'',''),0,6);
            if ($user->save()){
                $sms->setOtpCode($user->otp);
                $sms->setTemplate("OTP code = %otp%, please use to verify");
                $sms->sendSms($phone);

                return redirect()->route('verify', ['phone'=>$phone]);
            }

        }
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

}
