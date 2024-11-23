<?php

namespace App\Controllers;

class Course extends BaseController
{
    public function index(): string
    {
        return view('course');
    }
}
