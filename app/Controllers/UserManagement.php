<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class UserManagement extends Controller
{
    public function index()
    {
        echo view('dashboard/user_management');

    }
}
