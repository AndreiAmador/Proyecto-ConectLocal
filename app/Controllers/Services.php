<?php

namespace App\Controllers;

use App\Models\ServicePostModel;
use CodeIgniter\Controller;

class Services extends Controller
{
    // Mostrar formulario para crear publicación
    public function create()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        return view('services_create');
    }

    // Guardar nueva publicación
    public function store()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new ServicePostModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'image_url' => $this->request->getPost('image_url')
        ];

        $model->createPost($userId, $data);

        return redirect()->to('/')->with('success', 'Publicación creada exitosamente');
    }

    // Listar publicaciones del usuario
    public function myPosts()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new ServicePostModel();
        $posts = $model->getPostsByUser($userId);

        return view('services_my_posts', ['posts' => $posts]);
    }

    // Editar publicación
    public function edit($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new ServicePostModel();
        $post = $model->getPostById($id);

        if (!$post || $post['user_id'] != $userId) {
            return redirect()->to('/services/my-posts')->with('error', 'Publicación no encontrada');
        }

        return view('services_edit', ['post' => $post]);
    }

    // Actualizar publicación
    public function update($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new ServicePostModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'image_url' => $this->request->getPost('image_url')
        ];

        $model->updatePost($id, $userId, $data);

        return redirect()->to('/services/my-posts')->with('success', 'Publicación actualizada exitosamente');
    }

    // Eliminar publicación
    public function delete($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new ServicePostModel();
        $post = $model->getPostById($id);

        if (!$post || $post['user_id'] != $userId) {
            return redirect()->to('/services/my-posts')->with('error', 'Publicación no encontrada');
        }

        $model->deletePost($id, $userId);

        return redirect()->to('/services/my-posts')->with('success', 'Publicación eliminada exitosamente');
    }
}