<?php
namespace App\Controllers;

class User
{
    public function login()
    {
        return view('login');
    }

    public function auth()
    {
        return 'recieved';
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
