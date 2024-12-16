<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $table = 'semester';
    protected $primaryKey = 'semester_id';
    protected $allowedFields = ['department_id', 'semester_number'];

    // Define relationship with Department
    public function department()
    {
        return $this->belongsTo(DepartmentModel::class, 'department_id');
    }

    // Define relationship with Subjects
    public function subjects()
    {
        return $this->hasMany(SubjectModel::class, 'semester_id');
    }
}