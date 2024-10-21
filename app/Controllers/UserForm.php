<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class UserForm extends Controller
{
    public function index()
    {
        echo view('dashboard/user_form');

        $model = new DocumentModel();
        
        $data['documents'] = $model->findAll(); // Fetch all document

        return view('document/index', $data);
    }

    }
}
