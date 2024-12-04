<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 
        // echo view('dashboard/vertical_navigation');
        echo view('dashboard/dashboard');

    }

    public function logout(){
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
