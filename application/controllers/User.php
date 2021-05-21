<?php defined('BASEPATH') or exit('No direct script access allowed');
// create controller extends CI
class User extends CI_Controller
{
    // create constructor
    public function __construct()
    {
        // re-init construct
        parent::__construct();
        // call auth model
        $this->load->model('User_model');
        logged_in();
    }
    // create method default
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->User_model->getUser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
}
