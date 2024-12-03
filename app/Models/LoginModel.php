<?php

namespace App\Models;
use \CodeIgniter\Model;

class LoginModel extends Model
{
    public function verifyUsername($username)
    {
        $builder = $this->db->table('user');
        $builder->select('uniid, status, password');
        $builder->where('username', $username);
        $result = $builder->get();
        
        if($result->getNumRows() === 1){
            return (array) $result->getRow();
        }
        
        return false;
    }

    public function verifyAdminUsername($username)
    {
        $builder = $this->db->table('admin');
        $builder->select('id, name, email, telephone, password, access_level');
        $builder->where('email', $username); // Using email for admin login
        $result = $builder->get();
        
        if($result->getNumRows() === 1){
            return (array) $result->getRow();
        }
        
        return false;
    }
}