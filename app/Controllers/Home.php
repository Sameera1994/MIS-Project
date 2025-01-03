<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\HomeModel;

class Home extends Controller
{

    protected $homeModel;
    protected $session;

    public function __construct()
    {
        $this->session = session();
        $this->homeModel = new HomeModel();
    }

    public function index()
{
    if (!session()->has('logged_user')) {
        return redirect()->to(base_url().'login');
    } 
      
    $userId = $this->session->get('logged_user');

    $userData = $this->homeModel->getUserProfile($userId);

    // Pass user data to the home view
    return view('home/home', ['user' => $userData]);
}

    public function logout(){
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
