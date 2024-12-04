<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Courses extends Controller
{
    public function index()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        echo view('dashboard/index_user');

    }

    public function logout(){
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
