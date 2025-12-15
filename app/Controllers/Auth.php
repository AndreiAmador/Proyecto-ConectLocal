<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    // Mostrar el formulario de registro
    public function register()
    {
        return view('register');
    }

    // Procesar el formulario de registro
    public function registerPost()
    {
        // Obtener los datos del formulario
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validar que los campos no estén vacíos
        if (empty($username) || empty($email) || empty($password)) {
            return redirect()->to('/auth/register')->with('error', 'Todos los campos son obligatorios');
        }

        $model = new UserModel();

        // Verificar si el nombre de usuario ya está registrado
        if ($model->where('username', $username)->first()) {
            return redirect()->to('/auth/register')->with('error', 'El nombre de usuario ya está registrado');
        }

        // Verificar si el correo electrónico ya está registrado
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

    // Mostrar el formulario de login
    public function login()
    {
        return view('login');
    }

    // Procesar el formulario de login
    public function loginPost()
    {
        // Obtener los datos del formulario
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Crear una instancia del modelo UserModel
        $model = new UserModel();

        // Verificar si el usuario existe
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Si las credenciales son correctas, iniciar sesión
            session()->set('loggedIn', true);
            session()->set('username', $user['username']);

            // Redirigir al dashboard o área protegida
            return redirect()->to('/dashboard');  // Cambia '/dashboard' por la ruta que desees
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error
            return redirect()->to('/auth/login')->with('error', 'Credenciales incorrectas');
        }
    }
}
