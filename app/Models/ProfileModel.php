<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uniid';
    protected $allowedFields = [
        'name', 
        'email', 
        'department',
        'username', 
        'profileImage',
        'status',
        'password'
    ];

    // Fetch user profile data by ID
    public function getUserById($uniid)
    {
        // Add an additional check to ensure the ID is not null or empty
        if (empty($uniid)) {
            return null;
        }
        return $this->where('uniid', $uniid)->first();
    }

    // Update user profile with more flexible parameters
    public function updateProfile($uniid, $data)
    {
        // Validate that required data is present
        if (!$uniid || empty($data)) {
            log_message('error', 'Invalid update attempt: missing ID or data');
            return false;
        }

        // Filter the data to only include allowed fields
        $filteredData = array_intersect_key($data, array_flip($this->allowedFields));

        try {
            // Perform the update
            return $this->update($uniid, $filteredData);
        } catch (\Exception $e) {
            // Log the error if update fails
            log_message('error', 'Profile update failed: ' . $e->getMessage());
            return false;
        }
    }

    // Method to update profile image
    public function updateProfileImage($uniid, $imagePath)
    {
        // Validate inputs
        if (empty($uniid) || empty($imagePath)) {
            log_message('error', 'Invalid profile image update attempt');
            return false;
        }

        return $this->update($uniid, ['profileImage' => $imagePath]);
    }
}