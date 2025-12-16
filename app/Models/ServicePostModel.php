<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicePostModel extends Model
{
    protected $table = 'service_posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title', 'category', 'description', 'price', 'image_url'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getAllPosts($limit = 20)
    {
        return $this->select('service_posts.*, users.username')
                    ->join('users', 'users.id = service_posts.user_id')
                    ->orderBy('created_at', 'DESC')
                    ->findAll($limit);
    }

    public function getPostsByUser($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getPostById($postId)
    {
        return $this->find($postId);
    }

    public function createPost($userId, $data)
    {
        $data['user_id'] = $userId;
        return $this->insert($data);
    }

    public function updatePost($postId, $userId, $data)
    {
        return $this->where('id', $postId)
                    ->where('user_id', $userId)
                    ->set($data)
                    ->update();
    }

    public function deletePost($postId, $userId)
    {
        return $this->where('id', $postId)
                    ->where('user_id', $userId)
                    ->delete();
    }
}