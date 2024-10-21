<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserManagement extends Controller
{
    public function index()
    {

        $model = new UserModel();
        
        $data['user'] = $model->findAll(); // Fetch all document

    //    echo "<pre>";
    //    print_r($result);
        return view('dashboard/user_management', $data);

    }
}
