<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        echo view('login/login');

    }

    public function login_post()
    {
        $username = $this->request->getPost('username'); // Retrieve username from form input
        $password = $this->request->getPost('password'); // Retrieve password from form input
    
        // Load the UserModel
        $userModel = new \App\Models\UserModel();
    
        // Fetch the user by username
        $user = $userModel->where('username', $username)->first();
    
        // Check if user exists and password matches
        if ($user && password_verify($password, $user['password'])) {
            // Redirect to home if credentials are correct
            return redirect()->to('/home');
        } else {
            
            // return redirect()->back()->with('error', 'Invalid username or password');
            // echo '<div>Something wrong</div>';
            return redirect()->to('/home');

        }
    }
    
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login/login');
    }






    public function create()
    {
        return view('login/register'); // Return the form to create a new document
    }

    public function store()
    {
        $model = new UserModel();

        if (!$this->validate([
            'name'   => 'required',
            'email' => 'required',
            'username'   => 'required',
            'department'   => 'required',
            'password' => 'required',
            'confirmPassword'   => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save data
        $model->save([
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'username'   => $this->request->getPost('username'),
            'department'   => $this->request->getPost('department'),
            'password' => $this->request->getPost('password'),
            'confirmPassword'   => $this->request->getPost('confirmPassword'),
  
        ]);

        return redirect()->to('/home');
    }
}
