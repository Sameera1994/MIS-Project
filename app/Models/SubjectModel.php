<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    protected $allowedFields = ['subject_code', 'subject_name', 'semester_id', 'department_id', 'syllabus_id'];

    /**
     * Fetch subjects grouped by semester for a specific department and syllabus.
     *
     * @param int $department_id
     * @param int $syllabus_id
     * @return array
     */
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

    /**
     * Fetch a subject by its ID.
     *
     * @param int $subject_id
     * @return array|null
     */
    public function getSubjectById($subject_id)
    {
        return $this->find($subject_id);
    }

    /**
     * Delete a subject by its ID.
     *
     * @param int $subject_id
     * @return bool
     */
    public function deleteSubject($subject_id)
    {
        return $this->delete($subject_id);
    }

    /**
     * Update a subject's details.
     *
     * @param int $subject_id
     * @param array $data
     * @return bool
     */
    public function updateSubject($subject_id, array $data)
    {
        return $this->update($subject_id, $data);
    }

    /**
     * Fetch all subjects for a specific semester.
     *
     * @param int $semester_id
     * @param int $department_id
     * @param int $syllabus_id
     * @return array
     */
    public function getSubjectsBySemesterId($semester_id, $department_id, $syllabus_id)
    {
        return $this->select('subject_id, subject_code, subject_name')
            ->where('semester_id', $semester_id)
            ->where('department_id', $department_id)
            ->where('syllabus_id', $syllabus_id)
            ->findAll();
    }

    /**
     * Fetch subjects based on a search query.
     *
     * @param string $query
     * @param int $department_id
     * @param int $syllabus_id
     * @return array
     */
    public function searchSubjects($query, $department_id, $syllabus_id)
    {
        return $this->like('subject_code', $query)
            ->orLike('subject_name', $query)
            ->where('department_id', $department_id)
            ->where('syllabus_id', $syllabus_id)
            ->findAll();
    }

    /**
     * Check if a subject exists based on subject code and syllabus.
     *
     * @param string $subject_code
     * @param int $syllabus_id
     * @return bool
     */
    public function isSubjectExists($subject_code, $syllabus_id)
    {
        return $this->where('subject_code', $subject_code)
            ->where('syllabus_id', $syllabus_id)
            ->countAllResults() > 0;
    }
}
