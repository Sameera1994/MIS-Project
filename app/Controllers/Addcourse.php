<?php

namespace App\Controllers;

class Addcourse extends BaseController
{
    public function index(): string
    {
        return view('add_course');
    }
}
