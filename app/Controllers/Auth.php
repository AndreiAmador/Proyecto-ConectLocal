<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserProfileModel;
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
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($email) || empty($password)) {
            return redirect()->to('/auth/register')->with('error', 'Todos los campos son obligatorios');
        }

        $model = new UserModel();

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

        // Obtener el ID del usuario recién registrado
        $userId = $model->getInsertID();

        // Cargar el perfil vacío inicialmente (sin foto)
        $profileModel = new UserProfileModel();
        $profileModel->saveProfile($userId, [
            'bio' => '',
            'phone' => '',
            'social_link' => '',
            'photo' => ''  // Sin foto aún
        ]);

        return redirect()->to('/auth/login')->with('success', 'Registro exitoso, ahora puedes iniciar sesión');
    }

    // Mostrar el formulario de perfil
    public function profile()
    {
        $userId = session()->get('user_id');  // Obtener el ID del usuario logueado
        $profileModel = new UserProfileModel();
        $profile = $profileModel->getProfileByUserId($userId);

        return view('profile', ['profile' => $profile]);
    }

    // Guardar el perfil del usuario (incluyendo la foto)
    public function saveProfile()
    {
        $userId = session()->get('user_id');
        $data = [
            'bio' => $this->request->getPost('bio'),
            'phone' => $this->request->getPost('phone'),
            'social_link' => $this->request->getPost('social_link'),
            'photo' => '',  // Inicialmente vacía
        ];

        // Subir la foto si el usuario la ha proporcionado
        if ($this->request->getFile('photo')->isValid()) {
            $photo = $this->request->getFile('photo');
            $newName = $photo->getRandomName();  // Generar un nombre único
            $photo->move(WRITEPATH . 'uploads', $newName);  // Mover la foto a la carpeta de subidas

            // Actualizar el campo 'photo' con la ruta de la imagen
            $data['photo'] = WRITEPATH . 'uploads/' . $newName;
        }

        // Guardar el perfil actualizado
        $profileModel = new UserProfileModel();
        $profileModel->saveProfile($userId, $data);

        return redirect()->to('/profile')->with('success', 'Perfil actualizado exitosamente');
    }
}
