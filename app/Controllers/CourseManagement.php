<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class CourseManagement extends Controller
{
    public function index()
    {
        echo view('dashboard/course_management');

    }
}
