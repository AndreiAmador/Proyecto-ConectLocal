<?php

namespace App\Controllers;

use App\Models\ServicePostModel;

class Home extends BaseController
{
    public function index()
    {
        $postModel = new ServicePostModel();
        $posts = $postModel->getAllPosts(10); // Últimas 10 publicaciones

        return view('welcome_message', ['posts' => $posts]);
    }
}