<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'department';
    protected $primaryKey = 'department_id';
    protected $allowedFields = ['department_name', 'syllabus_id'];

    // Define relationship with Syllabus
    public function syllabus()
    {
        return $this->belongsTo(SyllabusModel::class, 'syllabus_id');
    }
}