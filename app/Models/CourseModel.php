<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['course_name', 'course_code', 'credits', 'department', 'instructor', 'course_description'];

    public function deleteCourse($courseId)
    {
        return $this->delete($courseId);
    }

    public function getAllCourses()
    {
        return $this->findAll();
    }
}
