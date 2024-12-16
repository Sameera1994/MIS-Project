<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    protected $allowedFields = ['subject_name', 'semester_id'];

    // Define relationship with Semester
    public function semester()
    {
        return $this->belongsTo(SemesterModel::class, 'semester_id');
    }
}