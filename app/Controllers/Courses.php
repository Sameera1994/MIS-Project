<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartmentModel;
use App\Models\DeptosylModel;
use App\Models\SubjectModel;
use App\Models\SyllabusModel;

class Courses extends Controller
{
   // Method to retrieve and display all syllabuses
   public function index()
   {
       // Initialize Syllabus Model
       $departmentModel = new DepartmentModel();

       // Retrieve all department
       $department = $departmentModel->findAll();

       // Pass department to the view
       return view('dashboard/courses/index_department', [
           'department' => $department
       ]);
   }


   public function department_syllabus($department_id)
   {
       // Initialize models
       $departmentModel = new DepartmentModel();
       $deptosylModel = new DeptosylModel();

       // Get the department details
       $department = $departmentModel->find($department_id);

       // Get syllabuses for this department
       $syllabuses = $deptosylModel->getSyllabusesByDepartment($department_id);
       
       // Pass data to the view
       return view('dashboard/courses/index_syllabus', [
           'department' => $department,
           'syllabuses' => $syllabuses
       ]);
   }

   public function syllabus_subjects($department_id, $syllabus_id)
    {
        // Initialize models
        $departmentModel = new DepartmentModel();
        $syllabusModel = new SyllabusModel();
        $subjectModel = new SubjectModel();

        // Get department details
        $department = $departmentModel->find($department_id);

        // Get syllabus details
        $syllabus = $syllabusModel->find($syllabus_id);

        // Get subjects grouped by semester
        $subjects = $subjectModel->getSubjectsBySemester($department_id, $syllabus_id);

        // Group subjects by semester
        $subjectsBySemester = [];
        foreach ($subjects as $subject) {
            $subjectsBySemester[$subject['semester_number']][] = $subject;
        }

        // Pass data to the view
        return view('dashboard/courses/index_subject', [
            'department' => $department,
            'syllabus' => $syllabus,
            'subjectsBySemester' => $subjectsBySemester
        ]);
    }

    public function create_department(){

    }

    public function store_department(){

    }

    public function edit_department($department_id){

    }

    public function update_department($department_id){

    }

    public function delete_department($department_id){

    }

    public function search_department(){

    }
   
}