<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function loginPost()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Usuario autenticado correctamente
            session()->set('loggedIn', true);
            session()->set('username', $user['username']);
            return redirect()->to('/dashboard');  // Redirige al dashboard o área protegida
        } else {
            // Error en el inicio de sesión
            return redirect()->to('/auth/login')->with('error', 'Credenciales incorrectas');
        }
    }

    public function registerPost()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->to('/auth/register')->with('error', 'Las contraseñas no coinciden');
        }

        $model = new UserModel();

        // Verifica si el usuario ya existe
        if ($model->getUserByUsername($username)) {
            return redirect()->to('/auth/register')->with('error', 'El nombre de usuario ya está registrado');
        }

        // Crea el nuevo usuario
        $model->save([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/auth/login')->with('success', 'Registro exitoso, ahora puedes iniciar sesión');
    }
}
