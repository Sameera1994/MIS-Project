<?php

namespace App\Controllers;

use App\Models\CourseModel;
use CodeIgniter\Controller;

class CourseController extends Controller
{
    public function add()
    {
        $courseModel = new CourseModel();

        
        $courseName = $this->request->getPost('courseName');
        $courseCode = $this->request->getPost('courseCode');
        $credits = $this->request->getPost('credits');
        $department = $this->request->getPost('department');
        $instructor = $this->request->getPost('instructor');
        $courseDescription = $this->request->getPost('courseDescription');

        
        $data = [
            'course_name' => $courseName,
            'course_code' => $courseCode,
            'credits' => $credits,
            'department' => $department,
            'instructor' => $instructor,
            'course_description' => $courseDescription
        ];

        
        $courseModel->insert($data);

        
        return redirect()->to('http://localhost/new-project/public/add_course')->with('success', 'Course added successfully');
    }
}
