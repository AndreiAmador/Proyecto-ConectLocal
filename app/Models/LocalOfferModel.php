<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalOfferModel extends Model
{
    protected $table = 'local_offers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title', 'category', 'description', 'price', 'image_url', 'location'];
    
    // IMPORTANTE: Desactivar timestamps porque ya enviamos created_at manualmente
    protected $useTimestamps = false;

    public function getAllOffers($limit = 20)
    {
        return $this->select('local_offers.*, users.username')
                    ->join('users', 'users.id = local_offers.user_id')
                    ->orderBy('created_at', 'DESC')
                    ->findAll($limit);
    }

    public function getOffersByUser($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getOfferById($offerId)
    {
        return $this->find($offerId);
    }

    public function createOffer($userId, $data)
    {
        $data['user_id'] = $userId;
        return $this->insert($data);
    }

    public function updateOffer($offerId, $userId, $data)
    {
        return $this->where('id', $offerId)
                    ->where('user_id', $userId)
                    ->set($data)
                    ->update();
    }

    public function deleteOffer($offerId, $userId)
    {
        return $this->where('id', $offerId)
                    ->where('user_id', $userId)
                    ->delete();
    }
}