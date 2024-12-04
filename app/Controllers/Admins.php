<?php

namespace App\Controllers;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class Admins extends Controller
{
    public function index()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new AdminModel();
        
        $data['admin'] = $model->findAll(); // Fetch all document
        return view('dashboard/admins/index_admin', $data);

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

        return view('dashboard/admins/create_admin'); // Return the form to create a new document
    }

    public function store()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new AdminModel();

        if (!$this->validate([
            'name'   => 'required',
            'email' => 'required',
            'telephone'   => 'required',
            'access_level' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save data
        $model->save([
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'telephone'   => $this->request->getPost('telephone'),
            'access_level'   => $this->request->getPost('access_level'),
            
  
        ]);

        return redirect()->to('/admins/index');
    }


    public function edit($id)
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new AdminModel();
        $data['admin'] = $model->find($id);

        return view('dashboard/admins/edit_admin', $data); 
    }



    public function update($id)
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new AdminModel();

        if (!$this->validate([
            'name'   => 'required',
            'email' => 'required',
            'telephone'   => 'required',
            'access_level' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $model->update($id, [
            'name'   => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'telephone'   => $this->request->getPost('telephone'),
            'access_level'   => $this->request->getPost('access_level'),
            ]);

        return redirect()->to('/admins/index');
    }

    public function delete($id)
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        $model = new AdminModel();
        $model->delete($id);

        return redirect()->to('/admins/index'); 
    }

    public function search()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 
        
        // Load the model
        $adminModel = new AdminModel();
        
        // Get the search query from the GET request
        $query = urldecode($this->request->getVar('query'));

        // Fetch the search results from the model
        $data['admin'] = $adminModel->searchAdmin($query);

        // Load the view and pass the search results
        return view('dashboard/admins/index_admin', $data);
    }

    

}
