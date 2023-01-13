<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class AuthController extends BaseController {
    public function login()
    {
        $title = "Login Page";

        $data = [
            'title' => $title,
            'config' => config('Auth'),
        ];

        return view('pages/auth/login', $data);
    }

    public function register()
    {
        $title = "Register Page";

        $data = [
            'title' => $title,
        ];

        return view('pages/auth/register', $data);
    }
}