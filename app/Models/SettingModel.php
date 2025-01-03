<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 
        'email', 
        'telephone', 
        'profileImage'
    ];
    // Fetch user profile data by ID
    public function getAdminById($id)
    {
        return $this->where('id', $id)->first();
    }

    // Update user profile with additional validation
    public function updateProfile($id, $name, $email, $telephone)
    {
        // Prepare data for update
        $data = [
            'name' => $name,
            'email' => $email,
            'telephone' => $telephone,
        ];

        try {
            // Perform the update
            return $this->update($id, $data);
        } catch (\Exception $e) {
            // Log the error if update fails
            log_message('error', 'Profile update failed: ' . $e->getMessage());
            return false;
        }
    }

    // public function updateProfile($id, $data)
    // {
    //     try {
    //         return $this->update($id, $data);
    //     } catch (\Exception $e) {
    //         log_message('error', 'Profile update failed: ' . $e->getMessage());
    //         return false;
    //     }
    // }

    // Method to update profile image
    public function updateProfileImage($id, $imagePath)
    {
        return $this->update($id, ['profileImage' => $imagePath]);
    }
}