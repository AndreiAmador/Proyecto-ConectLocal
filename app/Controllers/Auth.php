<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    // Mostrar el formulario de registro
    public function register()
    {
        return view('register');  // Muestra la vista del formulario de registro
    }

    // Procesar el formulario de registro
    public function registerPost()
    {
        // Obtener los datos del formulario
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validar que los campos no estén vacíos (si lo deseas)
        if (empty($username) || empty($email) || empty($password)) {
            return redirect()->to('/auth/register')->with('error', 'Todos los campos son obligatorios');
        }

        // Crear una nueva instancia del modelo UserModel
        $model = new UserModel();

        // Verificar si el nombre de usuario o el correo electrónico ya están registrados
        if ($model->where('username', $username)->first()) {
            return redirect()->to('/auth/register')->with('error', 'El nombre de usuario ya está registrado');
        }

        if ($model->where('email', $email)->first()) {
            return redirect()->to('/auth/register')->with('error', 'El correo electrónico ya está registrado');
        }

        // Registrar el nuevo usuario
        $model->save([
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),  // Encriptar la contraseña
        ]);

        // Redirigir al usuario al login con un mensaje de éxito
        return redirect()->to('/auth/login')->with('success', 'Registro exitoso, ahora puedes iniciar sesión');
    }
}