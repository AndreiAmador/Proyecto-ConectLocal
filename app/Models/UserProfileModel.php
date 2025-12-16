<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'bio', 'phone', 'social_link', 'photo'];

    public function getProfileByUserId($userId)
    {
        return $this->where('user_id', $userId)->first();
    }

    public function saveProfile($userId, $data)
    {
        $existing = $this->where('user_id', $userId)->first();
        
        if ($existing) {
            return $this->update($existing['id'], $data);
        } else {
            $data['user_id'] = $userId;
            return $this->insert($data);
        }
    }
}