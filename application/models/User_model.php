<?php
// create user model
class User_model extends CI_Model
{
    // create method returner user
    public function getUser(): array
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }
}
