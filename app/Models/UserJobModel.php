<?php

namespace App\Models;

use CodeIgniter\Model;

class UserJobModel extends Model
{
    protected $table = 'user_jobs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'job_title', 'job_image', 'description'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getJobsByUserId($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getJobById($jobId, $userId = null)
    {
        $query = $this->where('id', $jobId);
        if ($userId) {
            $query->where('user_id', $userId);
        }
        return $query->first();
    }

    public function saveJob($userId, $data)
    {
        $data['user_id'] = $userId;
        return $this->insert($data);
    }

    public function updateJob($jobId, $userId, $data)
    {
        return $this->where('id', $jobId)
                    ->where('user_id', $userId)
                    ->set($data)
                    ->update();
    }

    public function deleteJob($jobId, $userId)
    {
        return $this->where('id', $jobId)
                    ->where('user_id', $userId)
                    ->delete();
    }
}