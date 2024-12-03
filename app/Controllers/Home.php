<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {

        if (!session()->has('logged_user')) {
            return redirect()->to(base_url().'login');
        } 

        // echo 'hi';
        // $result= session()->has('logged_user');
        // echo $result;

        echo view('header/header');


        // Load the header (if you have one)
        echo view('home/home');
        
        // Load the footer
        echo view('footer/footer');
    }

    public function logout(){
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
