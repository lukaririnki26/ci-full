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
        // prepare data 
        $data['title'] = 'My Profile';
        $data['user'] = $this->User_model->getUser();
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->User_model->getUser();
        $img = $data['user']['image'];
        // set rules form validation
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
        // form run
        if ($this->form_validation->run() == false) {

            // load view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/edit');
            $this->load->view('templates/footer');
        } else {
            $this->User_model->editUser($img);
        }
    }
}
