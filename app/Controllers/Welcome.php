<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    public function index()
    {

        
        echo view('welcome/welcome');

    }
}
