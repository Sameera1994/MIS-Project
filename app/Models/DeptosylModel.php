<?php

namespace App\Models;

use CodeIgniter\Model;

class DeptosylModel extends Model
{
    protected $table = 'departmentandsyllabus';
    protected $allowedFields = ['department_id', 'syllabus_id'];

    // Method to get syllabuses for a specific department
    public function getSyllabusesByDepartment($department_id)
    {
        return $this->select('syllabus.syllabus_id, syllabus.syllabus_name, syllabus.syllabus_year')
            ->join('syllabus', 'syllabus.syllabus_id = departmentandsyllabus.syllabus_id')
            ->where('departmentandsyllabus.department_id', $department_id)
            ->findAll();
    }
}