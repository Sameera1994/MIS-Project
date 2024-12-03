<?php

namespace App\Models;
use \CodeIgniter\Model;


class LoginModel extends Model{

    public function verifyUsername($username){
        $builder = $this->db->table ('user');
        $builder->select('uniid,status,password') ;
        $builder->where('username',$username);
        $result = $builder->get();
        if($result->getNumRows() === 1){
            $data = (array) $result->getRow();
            return $data;
        }
        else{
            
            return false;
        }
    }



    

}