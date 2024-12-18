<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    protected $allowedFields = ['subject_code', 'subject_name', 'semester_id', 'department_id', 'syllabus_id'];

    // Method to get subjects grouped by semester for a specific department and syllabus
    public function getSubjectsBySemester($department_id, $syllabus_id)
    {
        return $this->select('semester.semester_id, semester.semester_number, 
                              subject.subject_id, subject.subject_code, subject.subject_name')
            ->join('semester', 'semester.semester_id = subject.semester_id')
            ->where('subject.department_id', $department_id)
            ->where('subject.syllabus_id', $syllabus_id)
            ->orderBy('semester.semester_number')
            ->findAll();
    }
}