<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function agentRegisterForm(){
        return view('backend.auth.agent_register_form');
    }

    public function userRegisterForm(){
        return view('backend.auth.user_register_form');
    }
}
