<?php

namespace App\Http\Controllers\User;

class HomeController
{
    public function index()
    {
        return view('user.home');
    }
}
