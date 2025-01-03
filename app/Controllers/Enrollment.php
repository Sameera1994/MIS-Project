<?php

namespace App\Controllers;

use App\Models\AttendanceModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Enrollment extends Controller
{

    // public function index(){
    //     return view('dashboard/reports/reports');

    // }

    public function index()
    {
        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $userModel = new UserModel();
        
        // Get department data
        $departments = $userModel->getDepartmentPercentages();
        
        // Prepare data for view
        $data = [
            'departments' => $departments
        ];
        
        // Load the view with department data
        return view('dashboard/reports/enrollment', $data);
       
    }


}
