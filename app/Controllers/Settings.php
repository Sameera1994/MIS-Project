<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Settings extends Controller
{
    public function index()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        return view('dashboard/settings/settings');

    }

    public function logout(){
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
