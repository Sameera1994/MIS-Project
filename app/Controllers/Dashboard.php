<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // echo view('dashboard/vertical_navigation');
        echo view('dashboard/dashboard');

    }
}
