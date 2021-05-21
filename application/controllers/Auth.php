<?php defined('BASEPATH') or exit('No direct script access allowed');
// create controller extends CI
class Auth extends CI_Controller
{
    // create constructor
    public function __construct()
    {
        // re-init construct
        parent::__construct();
        // call auth model
        $this->load->model('Auth_model');
    }

    // create method index as default method
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        // prepare data of document
        $data['title'] = 'Login';
        // set rules form validation
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        // form validation caught illegal action
        if ($this->form_validation->run() == false) {
            // load all views registration
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
        // form validation uncaught illegal action
        else {
            $this->Auth_model->loginUser();
        }
    }
    // create method registration
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        // prepare data of document
        $data['title'] = 'Register';
        // set rules form validation
        $this->form_validation->set_rules('name', 'Name', 'required|trim|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email has already used.']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[3]', ['matches' => 'Password not matches.', 'min_length' => 'Password too short.']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]|min_length[3]');
        // form validation caught illegal action
        if ($this->form_validation->run() == false) {
            // load all views registration
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }
        // form validation uncaught illegal action
        else {
            // launch method insert on model
            $this->Auth_model->insertData();
            // get alert from model
            $alert = $this->Auth_model->getAlertInsert();
            // set flashdata(session)
            $this->session->set_flashdata('alert', $alert);
            // redirect uri
            redirect('');
        }
    }
    public function logout()
    {
        // unset user session
        $this->session->unset_userdata('email');
        // get alert from model
        $alert = $this->Auth_model->getAlertLogoutTrue();
        // set flashdata(session)
        $this->session->set_flashdata('alert-logout-true', $alert);
        // redirect uri
        redirect('');
    }
    public function blocked()
    {
        $this->load->model('User_model');
        $data['title'] = 'Acces Forbidden 403';
        $data['user'] = $this->User_model->getUser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer');
    }
}
