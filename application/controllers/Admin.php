<?php defined('BASEPATH') or exit('No direct script access allowed');
// create controller extends CI
class Admin extends CI_Controller
{
    // create constructor
    public function __construct()
    {
        // re-init construct
        parent::__construct();
        // call auth model
        $this->load->model('Admin_model');
        logged_in();
        $this->load->library('encryption');
        $this->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => 'hekelplo1'
            )
        );
    }
    // create method default
    public function index()
    {
        // prepare data
        $data['title'] = 'Dashboard';
        $data['user'] = $this->Admin_model->getUser();
        // laod view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
    // method menu
    public function menu()
    {
        // get data segment
        $uri3 = $this->uri->segment(3);
        $uri4 = $this->uri->segment(4);
        // replace && decrypt segment4
        $uri4 = str_replace(['_', '-', '~'], ['=', '+', '/'], $uri4);
        $uri4 = $this->encryption->decrypt($uri4);

        // prepare data
        $data['title'] = 'Menu Management';
        $data['user'] = $this->Admin_model->getUser();
        $data['menu'] = $this->Admin_model->getMenu();
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        if ($uri3 != null) {
            // if uri3 is add
            if ($uri3 == 'add') {
                // set rules form validation
                $this->form_validation->set_rules('menu', 'Menu', 'trim|required|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
                // if turning error
                if ($this->form_validation->run() == false) {
                    $this->load->view('admin/addmenu');
                }
                // if turning succes
                else {
                    // set flash for alert
                    $this->Admin_model->addMenu();
                    $this->session->set_flashdata('flash', ' Menu~added.');
                    redirect('admin/menu');
                }
            } elseif ($uri3 == 'edit') {
                // chechk uri 4
                if ($uri4 != null) {
                    // set rules form validation
                    $this->form_validation->set_rules('menu', 'Menu', 'trim|required|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
                    // if turning error
                    if ($this->form_validation->run() == false) {
                        $data['menubyid'] = $this->Admin_model->getMenuByID($uri4);
                        $this->load->view('admin/editmenu', $data);
                    }
                    // if turning succes
                    else {
                        // set flash for alert
                        $this->Admin_model->editMenu($uri4);
                        $this->session->set_flashdata('flash', 'Menu~edited.');
                        redirect('admin/menu');
                    }
                }
                // if uri4 null
                else {

                    redirect('admin/menu');
                }
            } elseif ($uri3 == 'del') {
                if ($uri4 != null) {
                    // set flash for alert
                    $this->Admin_model->delMenu($uri4);
                    $this->session->set_flashdata('flash', 'Menu~deleted.');
                    redirect('admin/menu');
                }
                // if uri4 not found 
                else {
                    redirect('admin/menu');
                }
            }
            // if uri3 ref not found 
            else {
                redirect('admin/menu');
            }
        }
        // if uri 3 null
        else {
            $this->load->view('admin/menu');
        }
        $this->load->view('templates/footer');
    }
    // method submenu
    public function submenu()
    {
        // get segment data
        $uri3 = $this->uri->segment(3);
        $uri4 = $this->uri->segment(4);
        // replace && decrypt id
        $uri4 = str_replace(['_', '-', '~'], ['=', '+', '/'], $uri4);
        $uri4 = $this->encryption->decrypt($uri4);
        // prepare data
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->Admin_model->getUser();
        $data['submenu'] = $this->Admin_model->getSubMenu();
        $data['menu'] = $this->Admin_model->getMenu();
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        if ($uri3 != null) {
            // if uri3 is add
            if ($uri3 == 'add') {
                // set rules form validation
                $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
                $this->form_validation->set_rules('url', 'Url', 'trim|required');
                $this->form_validation->set_rules('icon', 'Icon', 'trim|required');
                // if turning error
                if ($this->form_validation->run() == false) {
                    $this->load->view('admin/addsubmenu');
                }
                // if turning succes
                else {
                    // set flash for alert
                    $this->Admin_model->addSubMenu();
                    $this->session->set_flashdata('flash', 'Sub Menu~added.');
                    redirect('admin/submenu');
                }
            } elseif ($uri3 == 'edit') {
                // set rules form validation
                $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
                $this->form_validation->set_rules('url', 'Url', 'trim|required');
                $this->form_validation->set_rules('icon', 'Icon', 'trim|required');
                // if turning error
                if ($this->form_validation->run() == false) {
                    $data['submenu'] = $this->Admin_model->getSubMenuByID($uri4);
                    $data['menubyid'] = $this->Admin_model->getMenuByID($data['submenu']['menu_id']);
                    $this->load->view('admin/editsubmenu', $data);
                }
                // if turning succes
                else {
                    // set flash for alert
                    $this->Admin_model->editSubMenu($uri4);
                    $this->session->set_flashdata('flash', 'Sub Menu~edited.');
                    redirect('admin/submenu');
                }
            } elseif ($uri3 == 'del') {
                // set flash for alert
                $this->Admin_model->delSubMenu($uri4);
                $this->session->set_flashdata('flash', 'Sub Menu~deleted.');
                redirect('admin/submenu');
            }
        }
        // if uri not found
        else {
            $this->load->view('admin/submenu');
        }
        $this->load->view('templates/footer');
    }
    //create method role
    public function role()
    {
        // get data segment
        $uri3 = $this->uri->segment(3);
        $uri4 = $this->uri->segment(4);
        // replace && decrypt segment4
        $uri5 = $uri4;
        $uri4 = str_replace(['_', '-', '~'], ['=', '+', '/'], $uri4);
        $uri4 = $this->encryption->decrypt($uri4);

        // prepare data
        $data['title'] = 'Role Management';
        $data['user'] = $this->Admin_model->getUser();
        $data['role'] = $this->Admin_model->getRole();
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        if ($uri3 != null) {
            // if uri3 is add
            if ($uri3 == 'add') {
                // set rules form validation
                $this->form_validation->set_rules('role', 'Role', 'trim|required|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
                // if turning error
                if ($this->form_validation->run() == false) {
                    $this->load->view('admin/addrole');
                }
                // if turning succes
                else {
                    // set flash for alert
                    $this->Admin_model->addRole();
                    $this->session->set_flashdata('flash', 'Role~added.');
                    redirect('admin/role');
                }
            } elseif ($uri3 == 'edit') {
                // chechk uri 4
                if ($uri4 != null) {
                    // set rules form validation
                    $this->form_validation->set_rules('role', 'Role', 'trim|required|alpha_numeric_spaces', ['alpha_numeric_spaces' => 'Illegal characters not allowed.']);
                    // if turning error
                    if ($this->form_validation->run() == false) {
                        $data['rolebyid'] = $this->Admin_model->getRoleByID($uri4);
                        $this->load->view('admin/editrole', $data);
                    }
                    // if turning succes
                    else {
                        // set flash for alert
                        $this->Admin_model->editRole($uri4);
                        $this->session->set_flashdata('flash', 'Role~edited.');
                        redirect('admin/role');
                    }
                }
                // if uri4 null
                else {

                    redirect('admin/role');
                }
            } elseif ($uri3 == 'del') {
                if ($uri4 != null) {
                    // set flash for alert
                    $this->Admin_model->delRole($uri4);
                    $this->session->set_flashdata('flash', 'Role~deleted.');
                    redirect('admin/role');
                }
                // if uri4 not found 
                else {
                    redirect('admin/role');
                }
            } elseif ($uri3 == 'access') {
                if ($uri5 != null) {
                    // set flash for alert
                    $data['menu'] = $this->Admin_model->getMenu();
                    $data['role'] = $this->Admin_model->getRoleByID($uri5);
                    $this->load->view('admin/roleaccess', $data);
                }
                // if uri4 not found 
                else {
                    redirect('admin/role');
                }
            }
            // if uri3 ref not found 
            else {
                redirect('admin/role');
            }
        }
        // if uri 3 null
        else {
            $this->load->view('admin/role');
        }
        $this->load->view('templates/footer');
    }
    // create method change access()
    public function changeAccess()
    {
        $menuid = $this->input->post('menuId');
        $roleid = $this->input->post('roleId');
        $data = [
            'role_id' => $roleid,
            'menu_id' => $menuid
        ];
        $res = $this->db->get_where('app_access_menu', $data);
        if ($res->num_rows() < 1) {
            $this->db->insert('app_access_menu', $data);
        } else {
            $this->db->delete('app_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Acces Changed.</div>');
    }
}
