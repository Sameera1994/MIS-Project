<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table = 'result';
    protected $primaryKey = 'result_id';
    protected $allowedFields = [
        'department',
        'batch',
        'semester',
        'subject',
        'student_username',
        'result'
    ];

    public function getDepartments()
    {
        return $this->distinct()
                    ->select('department')
                    ->where('department IS NOT NULL')
                    ->orderBy('department', 'ASC')
                    ->findAll();
    }

    public function getBatches()
    {
        return $this->distinct()
                    ->select('batch')
                    ->where('batch IS NOT NULL')
                    ->orderBy('batch', 'ASC')
                    ->findAll();
    }

    public function getSemesters()
    {
        return $this->distinct()
                    ->select('semester')
                    ->where('semester IS NOT NULL')
                    ->orderBy('semester', 'ASC')
                    ->findAll();
    }

    public function getSubjects()
    {
        return $this->distinct()
                    ->select('subject')
                    ->where('subject IS NOT NULL')
                    ->orderBy('subject', 'ASC')
                    ->findAll();
    }

    public function getResultData($department, $batch, $semester, $subject)
    {
        return $this->select('student_username, result')
                    ->where('department', $department)
                    ->where('batch', $batch)
                    ->where('semester', $semester)
                    ->where('subject', $subject)
                    ->orderBy('student_username', 'ASC')  // Fixed the orderBy clause
                    ->findAll();
    }
}