<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentAndSyllabusModel extends Model
{
    protected $table      = 'departmentandsyllabus';
    protected $primaryKey = 'id';

    protected $allowedFields = ['department_id', 'syllabus_id'];
}
