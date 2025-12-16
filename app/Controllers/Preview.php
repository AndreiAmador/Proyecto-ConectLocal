<?php

namespace App\Controllers;

class Preview extends BaseController
{
    public function index()
    {
        return view('home', ['title' => 'Inicio']);
    }

    public function login()
    {
        return view('login', ['title' => 'Login']);
    }
}