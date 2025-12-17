<?php

namespace App\Controllers;

use App\Models\UserJobModel;
use CodeIgniter\Controller;

class Jobs extends Controller
{
    // Mostrar lista de trabajos
    public function index()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new UserJobModel();
        $jobs = $model->getJobsByUserId($userId);

        return view('jobs_index', ['jobs' => $jobs]);
    }

    // Mostrar formulario para crear trabajo
    public function create()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        return view('create');
    }

    // Guardar nuevo trabajo (POST desde formulario)
    public function store()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new UserJobModel();

        $data = [
            'job_title' => $this->request->getPost('job_title'),
            'job_image' => $this->request->getPost('job_image'),
            'description' => $this->request->getPost('description')
        ];

        $model->saveJob($userId, $data);

        return redirect()->to('/jobs')->with('success', 'Trabajo agregado exitosamente');
    }

    // Mostrar formulario para editar trabajo
    public function edit($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new UserJobModel();
        $job = $model->getJobById($id, $userId);

        if (!$job) {
            return redirect()->to('/jobs')->with('error', 'Trabajo no encontrado');
        }

        return view('jobs_edits', ['job' => $job]);
    }

    // Actualizar trabajo (POST desde formulario)
    public function update($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new UserJobModel();

        // Verificar que el trabajo existe y pertenece al usuario
        $existingJob = $model->getJobById($id, $userId);
        if (!$existingJob) {
            return redirect()->to('/jobs')->with('error', 'Trabajo no encontrado');
        }

        $data = [
            'job_title' => $this->request->getPost('job_title'),
            'job_image' => $this->request->getPost('job_image'),
            'description' => $this->request->getPost('description')
        ];

        $model->updateJob($id, $userId, $data);

        return redirect()->to('/jobs')->with('success', 'Trabajo actualizado exitosamente');
    }

    // Eliminar trabajo
    public function delete($id)
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $model = new UserJobModel();

        // Verificar que el trabajo existe y pertenece al usuario
        $existingJob = $model->getJobById($id, $userId);
        if (!$existingJob) {
            return redirect()->to('/jobs')->with('error', 'Trabajo no encontrado');
        }

        $model->deleteJob($id, $userId);

        return redirect()->to('/jobs')->with('success', 'Trabajo eliminado exitosamente');
    }
}