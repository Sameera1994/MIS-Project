<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RegisterModel;

class Register extends Controller
{

    public $registerModel;
    public $session;
    public $email;

    public function __construct()
    {
        helper('form');
        helper('date');
        $this->registerModel = new RegisterModel();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();

    }
    public function index()
    {
        $data=[];
        $data['validation'] = null;
        $this->session->setTempdata(null);

        
        if($this->request->getMethod() == 'POST'){

            $rules = [
                'name' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Name is required',
                    'min_length' => 'Name must be at least 3 characters long',
                    'max_length' => 'Name cannot exceed 50 characters'
                ]
            ],
            'department' => [
                'rules' => 'required',
                'errors' => ['required' => 'Please select a department']
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please enter a valid email address',
                    'is_unique' => 'Email is already registered',
                    // 'regex_match' => 'Please enter a valid university email address'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|is_unique[user.username]',
                'errors' => [
                    'required' => 'Registration number is required',
                    'min_length' => 'Registration number must be at least 5 characters long',
                    'is_unique' => 'This registration number is already registered'
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
            'confirmPassword' => [
                'rules' => 'required|matches[password]',
                
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters long',
                    'matches'=> 'Confirm password must be matched to password',
                ]
            ],
            
            ];

            if ($this->validate($rules)) {
                $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
                $userdata=[
                    'name'=> $this->request->getVar('name'),
                    'email'=> $this->request->getVar('email'),
                    'username'=> $this->request->getVar('username'),
                    'department'=> $this->request->getVar('department'),
                    'password'=> password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'uniid'=> $uniid,
                    'activation_date'=> date('Y-m-d H:i:s'),
                ];

                if($this->registerModel->createUser($userdata)){
                    $to = $this->request->getVar('email');
                    $subject = 'Account Activation link';
                    $href = base_url("register/activate/" . $uniid);
                    $message = "Hi " . esc($this->request->getVar('username')) . ", <br><br> Thanks, your account has been created successfully. Please click following link to activate your account. <br>$href <br><br> Thank you!";
                    
                
                
                
                    $this->email->setTo($to);
                    $this->email->setFrom('chamalidilka1998@gmail.com','Chamaali');
                    $this->email->setSubject($subject);
                    $this->email->setMessage($message);

        
                    if($this->email->send())
                    {
                        // echo 'Account Created successfully. Check your emails and activate your account';
                       
                        $this->session->setTempdata('success', 'Account Created successfully. Check your emails and activate your account', 3);
                        return redirect()->to(current_url());
                        
                
                    }
                    else{
                        $this->session->setTempdata('error', 'Account Created successfully. Sorry unable to send activation link', 3);
                        return redirect()->to(current_url());
                        // echo 'Account Created successfully. Sorry unable to send activation link';
                    // $data = $this->email->printDebugger(['headers']);
                    // print_r($data);
                    }
                }
                else{
                    $this->session->setTempdata('error', 'Sorry, unable to create an account, Try again', 3);
                    return redirect()->to(current_url());
                    // echo 'Sorry, unable to create an account, Try again';
                }
                

            }else{
                $data['validation'] = $this->validator;
                // echo 'Validation Error Message';
            }
        }
        
        else{

            // echo $this->request->getMethod();
            // echo 'This is not post method';

        }

        return view('register_view', $data);
    }



    public function activate($uniid=null){

        // echo "hey, there";

        $data=[];

        if(!empty($uniid)){
            $userdata = $this->registerModel->verifyUniid($uniid);
            $regTime=$userdata['activation_date'];
            if($userdata){
                
                if ($this->verifyExpiryTime($regTime)) {
                    $currStatus=$userdata['status'];
                    if($currStatus=='innactive'){
                        $status = $this->registerModel->updateStatus($uniid);

                        if($status=true){
                            $data['success'] = 'Account activated successfully';
                        }
                    }
                    else{
                    $data['success'] = 'Your account is already active.';

                    }
                } else {
                    $data['error'] = 'Sorry, Activation link was expired.';
                
                }
                
            }
            else{
                $data['error'] = 'Sorry, We are unable to find your record.';

            }

        }
        else{
            $data['error'] = 'Sorry, Unable to process your request.';
        }

        return view('activate_view', $data);
    }


   public function verifyExpiryTime($regTime){
        $currTime= now();
        $regTime = strtotime($regTime);
        $diffTime = (int)$currTime-(int)$regTime;
        if(3600>$diffTime){
            return true;
        }
        else{
            return false;
        }
   }

}
