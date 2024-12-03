<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Courses extends Controller
{
    public function index()
    {
        echo view('dashboard/index_user');

    }
}
