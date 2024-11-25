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

        
        return redirect()->to('/add_course')->with('success', 'Course added successfully');
    }
    public function display()
    {
        $courseModel = new CourseModel();
        $data['courses'] = $courseModel->getAllCourses(); 

        return view('course_management', $data); 
    }
    public function delete()
    {
        $courseModel = new CourseModel();
        $courseId = $this->request->getPost('course_id'); // Get the course ID from POST data

        // Perform deletion in the database
        $courseModel->delete($courseId);

        // Redirect back to the course list page or wherever appropriate
        return redirect()->to('/courses');
    }

    public function search()
    {
        $courseModel = new CourseModel();

        // Get the course code from the GET request
        $courseCode = $this->request->getGet('course_code');

        // Fetch courses based on course code
        $data['courses'] = $courseModel->like('course_code', $courseCode)->findAll();

        return view('course_management', $data);
    }
}
