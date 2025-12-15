<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table      = 'user_profiles';   // Nombre de la tabla
    protected $primaryKey = 'id';              // Clave primaria
    protected $allowedFields = ['user_id', 'bio', 'phone', 'social_link', 'photo']; // Campos permitidos

    // Método para obtener el perfil por ID de usuario
    public function getProfileByUserId($userId)
    {
        return $this->where('user_id', $userId)->first();  // Devuelve el perfil del usuario por ID
    }

    // Método para guardar o actualizar el perfil del usuario
    public function saveProfile($userId, $data)
    {
        $data['user_id'] = $userId;  // Establecer el ID del usuario en los datos
        return $this->save($data);  // Guardar el perfil en la base de datos
    }
}
