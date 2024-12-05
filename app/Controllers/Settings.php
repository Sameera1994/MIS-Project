<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\SettingModel;

class Settings extends Controller
{
    protected $settingModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->session = session();
        $this->validation = \Config\Services::validation();
        
        // Ensure only logged-in admins can access settings
        if (!$this->session->get('logged_admin')) {
            return redirect()->to(base_url('login'));
        }

        $this->settingModel = new SettingModel();
    }

    // Load the settings page
    public function index()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        // Get the logged-in admin's ID from the session
        $adminId = $this->session->get('logged_admin');

        // Retrieve admin data using the ID
        $adminData = $this->settingModel->getAdminById($adminId);

        // If no admin data found, redirect to login
        if (!$adminData) {
            $this->session->destroy();
            return redirect()->to(base_url('login'));
        }

        return view('dashboard/settings/settings', ['admin' => $adminData]);
    }


    public function logout(){
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    // Handle form submission
    public function updateProfile()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        // Get the logged-in admin's ID from the session
        $adminId = $this->session->get('logged_admin');

        // Validate input
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'telephone' => 'required|numeric|min_length[10]|max_length[15]'
        ];

        if (!$this->validate($validationRules)) {
            // If validation fails, return to settings with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get form data
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $telephone = $this->request->getPost('telephone');

        // Attempt to update profile
        if ($this->settingModel->updateProfile($adminId, $name, $email, $telephone)) {
            // Set success message
            $this->session->setFlashdata('success', 'Profile updated successfully!');
        } else {
            // Set error message if update fails
            $this->session->setFlashdata('error', 'Failed to update profile. Please try again.');
        }

        // Redirect back to settings
        return redirect()->to(base_url('settings'));
    }

    // Handle profile image upload
    public function uploadProfileImage()
    {

        if (!session()->has('logged_admin')) {
            return redirect()->to(base_url().'login');
        } 

        // Validate admin is logged in
        $adminId = $this->session->get('logged_admin');
        if (!$adminId) {
            return $this->response->setJSON(['error' => 'Unauthorized access']);
        }

        // Validation rules for file upload
        $validationRules = [
            'profileImage' => [
                'rules' => 'uploaded[profileImage]|max_size[profileImage,2048]|is_image[profileImage]|mime_in[profileImage,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'uploaded' => 'Please select an image to upload.',
                    'max_size' => 'Image size must be under 2MB.',
                    'is_image' => 'Please upload a valid image file.',
                    'mime_in' => 'Only JPG, JPEG, PNG, and WebP images are allowed.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'error' => $this->validator->getErrors()
            ]);
        }

        $file = $this->request->getFile('profileImage');

        if (!$file->isValid()) {
            return $this->response->setJSON(['error' => 'Invalid file upload']);
        }

        // Generate a unique filename
        $newName = $file->getRandomName();
        
        // Define upload directory (create in public/uploads/profileImages/)
        $uploadPath = 'uploads/profileImages/';
        
        // Move uploaded file
        $file->move(FCPATH . $uploadPath, $newName);

        // Update database with new image path
        $imagePath = $uploadPath . $file->getName();
        $this->settingModel->updateProfileImage($adminId, $imagePath);

        // Return success response
        return $this->response->setJSON([
            'success' => true, 
            'image_path' => base_url($imagePath)
        ]);
    }
}