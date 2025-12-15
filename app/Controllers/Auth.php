<?php

namespace App\Controllers;

use App\Models\UserModel;  // Asegúrate de importar correctamente el modelo
use CodeIgniter\Controller;

class Auth extends Controller
{
    // Mostrar formulario de registro
    public function register()
    {
        return view('register');  // Carga la vista 'register.php'
    }

    // Procesar el registro de un usuario (POST)
    public function registerPost()
    {
        // Obtener los datos del formulario
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validar que las contraseñas coincidan
        if ($password !== $confirmPassword) {
            return redirect()->to('/auth/register')->with('error', 'Las contraseñas no coinciden');
        }

        $model = new UserModel();  // Crear una instancia del modelo

        // Verificar si el nombre de usuario ya está registrado
        if ($model->getUserByUsername($username)) {
            return redirect()->to('/auth/register')->with('error', 'El nombre de usuario ya está registrado');
        }

        // Registrar al nuevo usuario (guardar en la base de datos)
        $model->save([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),  // Encriptar la contraseña
        ]);

        return redirect()->to('/auth/login')->with('success', 'Registro exitoso, ahora puedes iniciar sesión');
    }
}
