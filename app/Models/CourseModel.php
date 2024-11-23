<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $allowedFields = ['course_name', 'course_code', 'credits', 'department', 'instructor', 'course_description'];
}
