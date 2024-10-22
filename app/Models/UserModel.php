<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['name', 'email', 'username', 'password', 'confirmPassword', 'profileImage', 'status', 'created_on', 'updated_on'];

      // Search function to find users based on a query
      public function searchUser($query)
      {
          return $this->like('name', $query)
                      ->orLike('email', $query)
                      ->orLike('username', $query)
                      ->findAll();
      }

}
