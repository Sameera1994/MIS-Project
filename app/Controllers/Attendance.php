<?php

namespace App\Controllers;

use App\Models\AttendanceModel;

class Attendance extends BaseController
{
    protected $attendanceModel;

    public function __construct()
    {
        $this->attendanceModel = new AttendanceModel();
    }

    public function index()
    {
        $data = [
            'departments' => $this->attendanceModel->getDepartments(),
            'batches' => $this->attendanceModel->getBatches(),
            'semesters' => $this->attendanceModel->getSemesters(),
            'subjects' => $this->attendanceModel->getSubjects()
        ];
        
        return view('dashboard/reports/attendance', $data);
    }

    

    public function getAttendanceData()
    {
        $department = $this->request->getPost('department');
        $batch = $this->request->getPost('batch');
        $semester = $this->request->getPost('semester');
        $subject = $this->request->getPost('subject');
        $username = $this->request->getPost('username');

        $attendanceData = $this->attendanceModel->getAttendanceData(
            $department, 
            $batch, 
            $semester, 
            $subject
        );
        
        $dates = $this->attendanceModel->getDates(
            $department, 
            $batch, 
            $semester, 
            $subject
        );

        $percentageData = $this->attendanceModel->calculateAttendancePercentage(
            $department,
            $batch,
            $semester,
            $subject,
            $username
        );

        return $this->response->setJSON([
            'attendanceData' => $attendanceData,
            'dates' => $dates,
            'percentageData' => $percentageData
        ]);
    }
}