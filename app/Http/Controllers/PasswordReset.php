<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PasswordReset extends Controller
{
    public function reset()
    {
        return view('password-reset');
    }
    public function setpassword($email, $token)
    {
        return view('new-password');
    }
}
