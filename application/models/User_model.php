<?php
// create user model
class User_model extends CI_Model
{
    // create method returner user
    public function getUser(): array
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }
    public function editUser($old)
    {
        $name = $this->input->post('name');
        $email = $this->session->userdata('email');
        $img = $_FILES['img']['name'];

        if ($img) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img')) {
                if ($old != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old);
                }
                $newimg = $this->upload->data('file_name');
                $this->db->set('image', $newimg);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been changed.</div>');
        redirect('user');
    }
}
