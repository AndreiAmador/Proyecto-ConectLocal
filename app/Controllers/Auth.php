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
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        // Obtener el ID del usuario recién registrado
        $userId = $model->getInsertID();

        // Iniciar sesión automáticamente después del registro
        session()->set('loggedIn', true);
        session()->set('username', $username);
        session()->set('user_id', $userId);

        // Redirigir directamente al formulario de perfil
        return redirect()->to('/profile/edit');
    }

    // Mostrar el formulario de login
    public function login()
    {
        return view('login');
    }

    // Procesar el formulario de login
    public function loginPost()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('loggedIn', true);
            session()->set('username', $user['username']);
            session()->set('user_id', $user['id']);

            $profileModel = new UserProfileModel();
            $profile = $profileModel->getProfileByUserId($user['id']);

            if ($profile) {
                return redirect()->to('/profile');
            } else {
                return redirect()->to('/profile/edit');
            }
        } else {
            return redirect()->to('/auth/login')->with('error', 'Credenciales incorrectas');
        }
    }

    // Mostrar el perfil del usuario
    public function profile()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $profileModel = new UserProfileModel();
        $profile = $profileModel->getProfileByUserId($userId);

        if (!$profile) {
            return redirect()->to('/profile/edit');
        }

        return view('profile', ['profile' => $profile]);
    }

    // Mostrar el formulario de edición de perfil
    public function editProfile()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $profileModel = new UserProfileModel();
        $profile = $profileModel->getProfileByUserId($userId);

        return view('edit_profile', ['profile' => $profile ?? []]);
    }

    // Guardar el perfil del usuario
    public function saveProfile()
    {
        if (!session()->get('loggedIn')) {
            return redirect()->to('/auth/login');
        }

        $userId = session()->get('user_id');
        $profileModel = new UserProfileModel();
        
        // Obtener perfil actual para mantener la foto si no se sube nueva
        $currentProfile = $profileModel->getProfileByUserId($userId);
        $currentPhoto = $currentProfile['photo'] ?? '';

        $data = [
            'bio' => $this->request->getPost('bio'),
            'phone' => $this->request->getPost('phone'),
            'social_link' => $this->request->getPost('social_link'),
            'photo' => $currentPhoto // Si no se sube una nueva foto, se mantiene la actual
        ];

        // Manejar subida de foto
        $photoFile = $this->request->getFile('photo');
        if ($photoFile && $photoFile->isValid() && !$photoFile->hasMoved()) {
            // Usar FCPATH para acceder a la carpeta pública 'uploads/profiles/'
            $uploadPath = FCPATH . 'public/uploads/profiles/';
            
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            // Obtener un nombre aleatorio para la foto
            $newName = $photoFile->getRandomName();
            if ($photoFile->move($uploadPath, $newName)) {
                // Guardar la ruta de la imagen
                $data['photo'] = 'uploads/profiles/' . $newName;
            }
        }

        // Guardar el perfil actualizado
        $profileModel->saveProfile($userId, $data);

        return redirect()->to('/profile');
    }
public function logout()
{
    // Destruir la sesión
    session()->destroy();

    // Redirigir al usuario a la página de login con un mensaje de éxito
    return redirect()->to('/auth/login')->with('success', 'Sesión cerrada exitosamente');
}

}
