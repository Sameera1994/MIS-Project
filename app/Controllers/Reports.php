<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Reports extends Controller
{
    public function index()
    {
        return view('dashboard/reports/reports');

    }
}
