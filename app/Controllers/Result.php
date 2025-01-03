<?php

namespace App\Controllers;

use App\Models\ResultModel;

class Result extends BaseController
{
    protected $resultModel;

    public function __construct()
    {
        $this->resultModel = new ResultModel();
    }

    public function index()
    {
        $data = [
            'departments' => $this->resultModel->getDepartments(),
            'batches' => $this->resultModel->getBatches(),
            'semesters' => $this->resultModel->getSemesters(),
            'subjects' => $this->resultModel->getSubjects()
        ];
        
        return view('dashboard/reports/result', $data);
    }

    public function getResultData()
    {
        // Validate request
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['error' => 'Invalid request']);
        }

        $department = $this->request->getPost('department');
        $batch = $this->request->getPost('batch');
        $semester = $this->request->getPost('semester');
        $subject = $this->request->getPost('subject');

        // Validate inputs
        if (!$department || !$batch || !$semester || !$subject) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Missing required fields']);
        }

        $resultData = $this->resultModel->getResultData(
            $department, 
            $batch, 
            $semester, 
            $subject
        );
        
        return $this->response->setJSON([
            'resultData' => $resultData
        ]);
    }
}