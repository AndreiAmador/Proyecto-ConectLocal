<?php

namespace App\Models; // Asegúrate de que el namespace sea App\Models

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';    // La clave primaria de la tabla

    protected $returnType     = 'array'; // Tipo de retorno para los resultados
    protected $useSoftDeletes = true;    // Si quieres usar borrado lógico

    protected $allowedFields = ['username', 'email', 'password']; // Campos que se pueden insertar/actualizar

    // Configurar las fechas de creación y actualización
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Si usas borrado lógico, configura el campo de eliminación
    protected $deletedField  = 'deleted_at';

    // Métodos adicionales si los necesitas

    // Ejemplo: Obtener un usuario por nombre de usuario
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
