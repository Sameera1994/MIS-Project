<?php
namespace App\Models;
use CodeIgniter\Model;

class RegisterModel extends Model {
    public function createUser($data) {
        $builder=$this->db->table('user');
        $res = $builder->insert($data);

        if ($this->db->affectedRows()==1) {
            return true;
        }else{
            return false;
        }
    }

    public function verifyUniid ($id){
        $builder = $this->db->table ('user');
        $builder->select('activation_date,uniid,status') ;
        $builder->where('uniid',$id);
        $result = $builder->get();
        if($result->getNumRows() === 1){
            // echo $builder->countAll();
            // echo $result->getNumRows();
            $data = (array) $result->getRow();
            return $data;
        }
        else{
            // echo $builder->countAll();
            return false;
            // echo "false";
        }
    }


    public function updateStatus($uniid){
        $builder = $this->db->table ('user');
        $builder->where('uniid',$uniid);

        $builder->update(['status' => 'active']);
        if($this->db->affectedRows()==1){
            return true;
        }
        else{
            return false;
        }
    }
}