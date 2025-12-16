<?php

namespace App\Controllers;

use App\Models\LocalOfferModel;
use CodeIgniter\Controller;

class LocalOffers extends Controller
{
    // Mostrar formulario para crear oferta local
    public function create()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        return view('local_offers_create');
    }

    // Guardar nueva oferta local (MODIFICADO CON QUERY BUILDER)
    public function store()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        
        // Usar Query Builder directamente
        $db = \Config\Database::connect();
        
        $data = [
            'user_id' => $userId,
            'title' => $this->request->getPost('title') ?? '',
            'category' => $this->request->getPost('category') ?? 'Otros',
            'description' => $this->request->getPost('description') ?? '',
            'price' => floatval($this->request->getPost('price') ?? 0),
            'image_url' => $this->request->getPost('image_url') ?? '',
            'location' => $this->request->getPost('location') ?? '',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // Validación simple
        if (empty($data['title']) || empty($data['description']) || empty($data['location'])) {
            return redirect()->to('/local-offers/create')->with('error', 'Título, descripción y ubicación son obligatorios');
        }
        
        // Insertar directamente
        try {
            $db->table('local_offers')->insert($data);
            return redirect()->to('/')->with('success', 'Oferta local publicada exitosamente');
        } catch (\Exception $e) {
            return redirect()->to('/local-offers/create')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Listar ofertas del usuario
    public function myOffers()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new LocalOfferModel();
        $offers = $model->getOffersByUser($userId);

        return view('local_offers_my', ['offers' => $offers]);
    }

    // Editar oferta
    public function edit($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new LocalOfferModel();
        $offer = $model->getOfferById($id);

        if (!$offer || $offer['user_id'] != $userId) {
            return redirect()->to('/local-offers/my-offers')->with('error', 'Oferta no encontrada');
        }

        return view('local_offers_edit', ['offer' => $offer]);
    }

    // Actualizar oferta
    public function update($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new LocalOfferModel();

        // Verificar que la oferta existe y pertenece al usuario
        $existingOffer = $model->getOfferById($id);
        if (!$existingOffer || $existingOffer['user_id'] != $userId) {
            return redirect()->to('/local-offers/my-offers')->with('error', 'Oferta no encontrada');
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'image_url' => $this->request->getPost('image_url'),
            'location' => $this->request->getPost('location')
        ];

        $model->updateOffer($id, $userId, $data);

        return redirect()->to('/local-offers/my-offers')->with('success', 'Oferta actualizada exitosamente');
    }

    // Eliminar oferta
    public function delete($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new LocalOfferModel();
        
        // Verificar que la oferta existe y pertenece al usuario
        $existingOffer = $model->getOfferById($id);
        if (!$existingOffer || $existingOffer['user_id'] != $userId) {
            return redirect()->to('/local-offers/my-offers')->with('error', 'Oferta no encontrada');
        }

        $model->deleteOffer($id, $userId);

        return redirect()->to('/local-offers/my-offers')->with('success', 'Oferta eliminada exitosamente');
    }
}