<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends Controller
{
    public $loginModel;
    public $session;

    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [];
        $data['validation'] = null;
        $this->session->setTempdata(null);

        if($this->request->getMethod() == 'POST'){
            $rules = [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username is required'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password is required',
                        // 'min_length' => 'Password must be at least 8 characters long'
                    ]
                ],
            ];

            if ($this->validate($rules)) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                
                // Check user login
                $userdata = $this->loginModel->verifyUsername($username);
                
                // Check admin login if user not found
                if (!$userdata) {
                    $userdata = $this->loginModel->verifyAdminUsername($username);
                }

                if ($userdata) {
                    if(password_verify($password, $userdata['password'])) {
                        // Determine login type and redirect
                        if (isset($userdata['access_level'])) {
                            // Admin login
                            $this->session->set('logged_admin', $userdata['id']);
                            $this->session->setTempdata('success', 'Admin login successful!', 3);
                            return redirect()->to(base_url('dashboard'));
                        } else {
                            // User login
                            if($userdata['status'] == 'active'){
                                $this->session->set('logged_user', $userdata['uniid']);
                                $this->session->setTempdata('success', 'Login successful!', 3);
                                return redirect()->to(base_url('home'));
                            } else {
                                $this->session->setTempdata('error', 'Please activate your account, contact Admin', 3);
                                return redirect()->to(current_url());
                            }
                        }
                    } else {
                        $this->session->setTempdata('error', 'Password incorrect', 3);
                        return redirect()->to(current_url());
                    }                 
                } else {
                    $this->session->setTempdata('error', 'Username does not exist', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('login_view', $data);
    }
}