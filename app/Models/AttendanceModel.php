<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'attendance_id';
    protected $allowedFields = [
        'department',
        'batch',
        'semester',
        'subject',
        'lecture_date',
        'student_username',
        'attendance'
    ];

    // Get unique departments for dropdown
    public function getDepartments()
    {
        return $this->distinct()
                    ->select('department')
                    ->where('department IS NOT NULL')
                    ->orderBy('department', 'ASC')
                    ->findAll();
    }

    // Get unique batches for dropdown
    public function getBatches()
    {
        return $this->distinct()
                    ->select('batch')
                    ->where('batch IS NOT NULL')
                    ->orderBy('batch', 'ASC')
                    ->findAll();
    }

    // Get unique semesters for dropdown
    public function getSemesters()
    {
        return $this->distinct()
                    ->select('semester')
                    ->where('semester IS NOT NULL')
                    ->orderBy('semester', 'ASC')
                    ->findAll();
    }

    // Get unique subjects for dropdown
    public function getSubjects()
    {
        return $this->distinct()
                    ->select('subject')
                    ->where('subject IS NOT NULL')
                    ->orderBy('subject', 'ASC')
                    ->findAll();
    }

    // Get attendance data based on filters
    public function getAttendanceData($department, $batch, $semester, $subject)
    {
        return $this->select('lecture_date, student_username, attendance')
                    ->where('department', $department)
                    ->where('batch', $batch)
                    ->where('semester', $semester)
                    ->where('subject', $subject)
                    ->orderBy('lecture_date', 'DESC')
                    ->findAll();
    }

    // Get unique dates for selected filters
    public function getDates($department, $batch, $semester, $subject)
    {
        return $this->distinct()
                    ->select('lecture_date')
                    ->where('department', $department)
                    ->where('batch', $batch)
                    ->where('semester', $semester)
                    ->where('subject', $subject)
                    ->orderBy('lecture_date', 'DESC')
                    ->findAll();
    }

    public function calculateAttendancePercentage($department, $batch, $semester, $subject, $username = null)
    {
        $builder = $this->select('COUNT(*) as total, SUM(attendance) as present')
                       ->where('department', $department)
                       ->where('batch', $batch)
                       ->where('semester', $semester)
                       ->where('subject', $subject);

        // Add username filter if provided
        if ($username) {
            $builder->where('student_username', $username);
        }

        $result = $builder->get()->getRow();
        
        if ($result->total > 0) {
            $presentPercentage = ($result->present / $result->total) * 100;
            $absentPercentage = 100 - $presentPercentage;
            
            return [
                'present' => round($presentPercentage, 1),
                'absent' => round($absentPercentage, 1),
                'total_classes' => $result->total,
                'classes_attended' => $result->present
            ];
        }
        
        return [
            'present' => 0,
            'absent' => 0,
            'total_classes' => 0,
            'classes_attended' => 0
        ];
    }
}