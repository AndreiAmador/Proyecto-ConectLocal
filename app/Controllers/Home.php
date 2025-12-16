<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('home');  // Aquí carga la vista 'home.php'
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