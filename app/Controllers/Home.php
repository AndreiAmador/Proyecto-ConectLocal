<?php

namespace App\Controllers;

use App\Models\ServicePostModel;
use App\Models\LocalOfferModel;

class Home extends BaseController
{
    public function index()
    {
        // Obtener servicios publicados
        $postModel = new ServicePostModel();
        $posts = $postModel->getAllPosts(5);
        
        // Obtener ofertas locales
        $offerModel = new LocalOfferModel();
        $offers = $offerModel->getAllOffers(5);

        return view('welcome_message', [
            'posts' => $posts,
            'offers' => $offers
        ]);
    }
}