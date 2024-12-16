<?php

namespace App\Models;

use CodeIgniter\Model;

class SyllabusModel extends Model
{
    protected $table = 'syllabus';
    protected $primaryKey = 'syllabus_id';
    protected $allowedFields = ['syllabus_name', 'syllabus_name'];

    // Define relationship with Departments
    public function departments()
    {
        return $this->hasMany(DepartmentModel::class, 'syllabus_id');
    }

    // Method to get syllabus by name
    public function getSyllabusByName($name)
    {
        return $this->where('syllabus_name', $name)->first();
    }

    // Method to list all syllabuses
    public function listSyllabuses()
    {
        return $this->findAll();
    }

    // Method to count departments in a syllabus
    public function countDepartments($syllabusId)
    {
        return $this->db->table('department')
            ->where('syllabus_id', $syllabusId)
            ->countAllResults();
    }
}