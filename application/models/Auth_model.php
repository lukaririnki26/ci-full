<?php
// create user model
class Auth_model extends CI_Model
{
    // create property sweet alert script
    private $notactivated = "<script>
        Swal.fire({
            icon: 'error',
            title: 'Email',
            text: 'Has not activated.'
        });
        </script>";
    //  create property sweet alert script
    private $notlogin = "<script>
        Swal.fire({
            icon: 'error',
            title: 'Login',
            text: 'Failed.'
        });
        </script>";
    // create method insert to database
    public function insertData()
    {
        // prepare value sql insert
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash(htmlspecialchars($this->input->post('password1', true)), PASSWORD_DEFAULT),
            'role_id' => '2',
            'is_active' => '0',
            'date_created' => time()
        ];
        // launch insert to database
        $this->db->insert('user', $data);
    }
    // create method returner alert insert succesful
    public function getAlertInsert(): string
    {
        // prepare sweet alert script
        $alert = "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration',
            text: 'Succesful.'
        });
        </script>";
        // return value
        return $alert;
    }
    // create method returner alert insert succesful
    public function getAlertLogoutTrue(): string
    {
        // prepare sweet alert script
        $alert = "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Logout',
            text: 'Succesful.'
        });
        </script>";
        // return value
        return $alert;
    }
    // create method login
    public function loginUser()
    {
        // prepare value form
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        // get single user from database
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // login verification
        // checking user value
        if ($user != null) {
            // checking user active status 
            if ($user['is_active'] == 1) {
                // checking user password matches
                if (password_verify($password, $user['password'])) {
                    // prepare data
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role_id']
                    ];
                    // set user session
                    $this->session->set_userdata($data);
                    // user level hierarki
                    if ($user['role_id'] == 1) {
                        // redirect uri
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        // redirect uri
                        redirect('user');
                    }
                } else {
                    // send flashdata(alert)
                    $this->session->set_flashdata('not-login', $this->notlogin);
                    // redirect uri
                    redirect('auth');
                }
            } else {
                // set flashdata(alert)
                $this->session->set_flashdata('not-activated', $this->notactivated);
                // redirect uri
                redirect('auth');
            }
        } else {
            // prepare message value
            $message = '<small class="text-danger pl-3">Email has not registered.</small>';
            // set flashdata(message)
            $this->session->set_flashdata('not-registered', $message);
            // redirect uri
            redirect('auth');
        }
    }
}
