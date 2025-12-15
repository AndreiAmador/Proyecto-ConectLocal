<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';  // Nombre de la tabla
    protected $primaryKey = 'id';     // Clave primaria de la tabla

    protected $returnType     = 'array'; // El tipo de retorno de los resultados
    protected $useTimestamps  = true;   // Usar timestamps
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    protected $allowedFields = ['username', 'email', 'password']; // Campos permitidos

    // Método para obtener un usuario por su nombre de usuario
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
