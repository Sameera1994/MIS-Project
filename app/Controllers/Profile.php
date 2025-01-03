<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class Profile extends Controller
{
    protected $profileModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->session = session();
        $this->validation = \Config\Services::validation();
        
        // Ensure only logged-in users can access profiles
        if (!$this->session->get('logged_user')) {
            return redirect()->to(base_url('login'));
        }

        $this->profileModel = new ProfileModel();
    }

    // Load the profiles page
    public function index()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to(base_url().'login');
        } 

        // Get the logged-in user's ID from the session
        $userId = $this->session->get('logged_user');

        // Retrieve user data using the ID
        $userData = $this->profileModel->getUserById($userId);

        // If no user data found, redirect to login
        if (!$userData) {
            $this->session->destroy();
            return redirect()->to(base_url('login'));
        }

        return view('home/profile', ['user' => $userData]);
    }

    public function logout()
    {
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    // Handle form submission
    public function updateProfile()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to(base_url().'login');
        } 

        // Get the logged-in user's ID from the session
        $userId = $this->session->get('logged_user');

        // Validate input
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'username' => 'required',
            'deparment' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // If validation fails, return to profiles with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Prepare update data
        $updateData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'department' => $this->request->getPost('deparment'),
            'status' => $this->request->getPost('status') ?? 'active', // Default status
        ];

        // Attempt to update profile
        if ($this->profileModel->updateProfile($userId, $updateData)) {
            // Set success message
            $this->session->setFlashdata('success', 'Profile updated successfully!');
        } else {
            // Set error message if update fails
            $this->session->setFlashdata('error', 'Failed to update profile. Please try again.');
        }

        // Redirect back to profile
        return redirect()->to(base_url('profiles'));
    }

    // Handle profile image upload
    public function uploadProfileImage()
    {
        if (!session()->has('logged_user')) {
            return redirect()->to(base_url().'login');
        } 

        // Validate user is logged in
        $userId = $this->session->get('logged_user');
        if (!$userId) {
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
        $this->profileModel->updateProfileImage($userId, $imagePath);

        // Return success response
        return $this->response->setJSON([
            'success' => true, 
            'image_path' => base_url($imagePath)
        ]);
    }
}