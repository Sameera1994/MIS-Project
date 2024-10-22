<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserManagement extends Controller
{
    public function index()
    {

        $model = new UserModel();
        
        $data['user'] = $model->findAll(); // Fetch all document
        return view('dashboard/index_user', $data);

    }


    public function create()
    {
        return view('dashboard/create_user'); // Return the form to create a new document
    }

    public function store()
    {
        $model = new UserModel();

        if (!$this->validate([
            'name'   => 'required',
            'email' => 'required',
            'username'   => 'required',
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
            'password' => $this->request->getPost('password'),
            'confirmPassword'   => $this->request->getPost('confirmPassword'),
  
        ]);

        return redirect()->to('/dashboard/index_user');
    }


    public function edit($uid)
    {
        $model = new UserModel();
        $data['user'] = $model->find($uid);

        return view('dashboard/edit_user', $data); 
    }



    public function update($uid)
    {
        $model = new UserModel();

        if (!$this->validate([
            'name'   => 'required',
            'email' => 'required',
            'username'   => 'required',
            'password' => 'required',
            'confirmPassword'   => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $model->update($uid, [
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'username'   => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'confirmPassword'   => $this->request->getPost('confirmPassword'),
        ]);

        return redirect()->to('/dashboard/index_user');
    }

    public function delete($uid)
    {
        $model = new UserModel();
        $model->delete($uid);

        return redirect()->to('/dashboard/index_user'); 
    }

    public function search()
    {
        // Load the model
        $userModel = new UserModel();
        
        // Get the search query from the GET request
        $query = urldecode($this->request->getVar('query'));

        // Fetch the search results from the model
        $data['user'] = $userModel->searchUser($query);

        // Load the view and pass the search results
        return view('dashboard/index_user', $data);
    }

}
