<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartmentModel;
use App\Models\SubjectModel;
use App\Models\SyllabusModel;

class Courses extends Controller
{
   // Method to retrieve and display all syllabuses
   public function index()
   {
       // Initialize Syllabus Model
       $syllabusModel = new SyllabusModel();

       // Retrieve all syllabuses
       $syllabuses = $syllabusModel->findAll();

       // Pass syllabuses to the view
       return view('dashboard/courses/index_syllabus', [
           'syllabuses' => $syllabuses
       ]);
   }

   public function syllabus_department()
   {
       // Get the active tab from the query parameter
       $activeTab = $this->request->getGet('tab') ?? 'old';

       // Initialize models
       $departmentModel = new DepartmentModel();
       $syllabusModel = new SyllabusModel();

       // Get the syllabus based on the selected tab
       $syllabus = $syllabusModel->where('syllabus_name', ucfirst($activeTab) . ' Syllabus')->first();
       
       if (!$syllabus) {
           // Handle case where syllabus is not found
           return view('dashboard/courses/index_department', [
               'activeTab' => $activeTab,
               'departments' => []
           ]);
       }

       // Retrieve departments for the selected syllabus with syllabus name
       $departments = $departmentModel
           ->select('department.department_id, department.department_name, syllabus.syllabus_name')
           ->join('syllabus', 'syllabus.syllabus_id = department.syllabus_id')
           ->where('department.syllabus_id', $syllabus['syllabus_id'])
           ->findAll();

       // Pass data to the view
       return view('dashboard/courses/index_department', [
           'activeTab' => $activeTab,
           'departments' => $departments
       ]);
   }
    public function department_subject($department_id)
    {
        // Initialize models
        $subjectModel = new SubjectModel();
        $departmentModel = new DepartmentModel();

        // Get department details
        $department = $departmentModel->find($department_id);

        // Retrieve subjects grouped by semester
        $subjects = $subjectModel
            ->select('subject.subject_id, subject.subject_name, semester.semester_number')
            ->join('semester', 'semester.semester_id = subject.semester_id')
            ->where('semester.department_id', $department_id)
            ->orderBy('semester.semester_number')
            ->findAll();

        // Group subjects by semester
        $semesterSubjects = [];
        foreach ($subjects as $subject) {
            $semesterSubjects[$subject['semester_number']][] = $subject;
        }

        // Pass data to the view
        return view('dashboard/courses/index_subject', [
            'department' => $department,
            'semesterSubjects' => $semesterSubjects
        ]);
    }
}