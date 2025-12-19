<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        // Renderiza la vista test.php que está en app/Views/
        return view('test');
    }
}