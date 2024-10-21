<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['name', 'email', 'username', 'password', 'confirmPassword', 'profileImage', 'status', 'created_on', 'updated_on'];
}
