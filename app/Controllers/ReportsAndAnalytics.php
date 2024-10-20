<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class ReportsAndAnalytics extends Controller
{
    public function index()
    {
        echo view('dashboard/reports_and_analytics');

    }
}
