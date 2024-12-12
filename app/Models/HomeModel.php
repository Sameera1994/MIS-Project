<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uniid';
    protected $allowedFields = [
        'username', 
        'name', 
        'email', 
        'profileImage', 
        'department', 
        'status'
    ];

    public function getUserProfile($userId)
    {
        try {
            $result = $this->where('uniid', $userId)->first();
            
            // Add debugging
            if (!$result) {
                log_message('error', 'No user found with ID: ' . $userId);
            }
            
            return $result;
        } catch (\Exception $e) {
            log_message('error', 'Database error: ' . $e->getMessage());
            return null;
        }
    }


}