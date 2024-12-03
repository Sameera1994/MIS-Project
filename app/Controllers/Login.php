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
        $data=[];
        $data['validation'] = null;
        $this->session->setTempdata(null);

        if($this->request->getMethod()=='POST'){
            $rules=[
                'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Registration number is required',
                    // 'min_length' => 'Registration number must be at least 5 characters long',
                    // 'is_unique' => 'This registration number is already registered'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters long',
                    // 'regex_match' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character'
                ]
            ],
            ];

            if ($this->validate($rules)) {

                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                    
                $userdata = $this->loginModel->verifyUsername($username);

                if ($userdata) {
                    if(password_verify($password, $userdata['password'])) {
                        
                        if($userdata['status']=='active'){
                            $this->session->setTempdata('success', 'Loggin successful !', 3);
                            $this->session->set('logged_user', $userdata['uniid']);
                            return redirect()->to(base_url('home'));

                        }else{
                            $this->session->setTempdata('error', 'Please Activate your account, Please contact Admin', 3);
                             return redirect()->to(current_url());


                        }
                    }else{
                        $this->session->setTempdata('error', 'Password incorrect', 3);
                        echo $password, $userdata['password'];
                        // return redirect()->to(current_url());
                    }                 

                }else {
                    $this->session->setTempdata('error', 'Username does not exist.', 3);
                    return redirect()->to(current_url());
                }
                
                
            
            }else {
                $data['validation']=$this->validator;
            }
            
        }else{
            
        }
        return view('login_view', $data);
    }
}