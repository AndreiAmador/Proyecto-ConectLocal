<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';       // Nombre de la tabla
    protected $primaryKey = 'id';          // Clave primaria
    protected $allowedFields = ['username', 'email', 'password']; // Campos permitidos

    protected $useTimestamps = false; // No necesitamos timestamps
}