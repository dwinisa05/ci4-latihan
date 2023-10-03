<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function logout()
    {
        return "Logout";
    }
}
