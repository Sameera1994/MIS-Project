<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'telephone', 'access_level'];

      // Search function to find users based on a query
      public function searchAdmin($query)
      {
          return $this->like('name', $query)
                      ->orLike('email', $query)
                      ->orLike('telephone', $query)
                      ->orLike('access_level', $query)
                      ->findAll();
      }

}
