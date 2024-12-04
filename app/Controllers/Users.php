<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{

    public function __construct()
    {
        helper('form');

    }
    public function index()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new UserModel();
        
        $data['user'] = $model->findAll(); // Fetch all document
        return view('dashboard/users/index_user', $data);

    }

    public function logout(){
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }


    public function create()
    {
        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        return view('dashboard/users/create_user'); // Return the form to create a new document
    }

    public function store()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new UserModel();

        if (!$this->validate([
            'name'   => 'required',
            'email' => 'required',
            'username'   => 'required',
            'department' => 'required',
            'password' => 'required',            
            'confirmPassword'   => 'required|matches[password]',


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
  
        ]);

        return redirect()->to('users/index');
    }


    public function edit($uid)
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new UserModel();
        $data['user'] = $model->find($uid);

        return view('dashboard/users/edit_user', $data); 
    }



    public function update($uid)
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new UserModel();

        if (!$this->validate([
            'name'   => 'required',
            'email' => 'required',
            'username'   => 'required',
            'department' => 'required',
            'password' => 'required',
            'confirmPassword'   => 'required|matches[password]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $model->update($uid, [
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'username'   => $this->request->getPost('username'),
            'department'   => $this->request->getPost('department'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            // 'confirmPassword'   => $this->request->getPost('confirmPassword'),
        ]);

        return redirect()->to('/users/index');
    }

    public function delete($uid)
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new UserModel();
        $model->delete($uid);

        return redirect()->to('/users/index'); 
    }

    public function search()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 
        
        // Load the model
        $userModel = new UserModel();
        
        // Get the search query from the GET request
        $query = urldecode($this->request->getVar('query'));

        // Fetch the search results from the model
        $data['user'] = $userModel->searchUser($query);

        // Load the view and pass the search results
        return view('dashboard/users/index_user', $data);
    }

    

}
