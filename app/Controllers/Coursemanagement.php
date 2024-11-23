<?php

namespace App\Controllers;

class Coursemanagement extends BaseController
{
    public function index(): string
    {
        return view('course_management');
    }
}
