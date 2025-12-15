<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserProfileModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function register()
    {
        return view('register');
    }

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

        $model->save([
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        $userId = $model->getInsertID();

        session()->set('loggedIn', true);
        session()->set('username', $username);
        session()->set('user_id', $userId);

        return redirect()->to('/profile/edit');
    }

    public function login()
    {
        return view('login');
    }

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
            'photo' => $currentPhoto
        ];

        // Manejar subida de foto
        $photoFile = $this->request->getFile('photo');
        if ($photoFile && $photoFile->isValid() && !$photoFile->hasMoved()) {
            $uploadPath = WRITEPATH . 'uploads/';
            
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $newName = $photoFile->getRandomName();
            if ($photoFile->move($uploadPath, $newName)) {
                $data['photo'] = 'uploads/' . $newName;
            }
        }

        $profileModel->saveProfile($userId, $data);

        return redirect()->to('/profile');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}