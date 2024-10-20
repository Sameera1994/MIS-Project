<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        echo view('header/header');


        // Load the header (if you have one)
        echo view('home/home');
        
        // Load the footer
        echo view('footer/footer');
    }
}
