<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // if (!session()->has('logged_user')) {
        //     return redirect()->to(base_url('login'));
        // } 
        // echo view('dashboard/vertical_navigation');
        echo view('dashboard/dashboard');

    }

    public function logout(){
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
