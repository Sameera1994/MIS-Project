<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Reports extends Controller
{
    public function index()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 
        
        return view('dashboard/reports/reports');

    }

    public function logout(){
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
