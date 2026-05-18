<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function googleLogin()
    {
        return redirect('/');
    }

    public function googleCallback()
    {
        return redirect('/');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}