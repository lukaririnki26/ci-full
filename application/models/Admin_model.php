<?php
// create user model
class Admin_model extends CI_Model
{
    //  create method returner user
    public function getUser(): array
    {
        return  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }
    //  create method returner menu by id
    public function getMenuByID($id): array
    {
        return  $this->db->get_where('app_menu', ['id' => $id])->row_array();
    }
    //   create method returner menu
    public function getMenu(): array
    {
        return  $this->db->get('app_menu')->result_array();
    }

    // add new menu
    public function addMenu()
    {
        // prepare data from post
        $menu = htmlspecialchars($this->input->post('menu', true));
        // prepare data sql
        $data = [
            'id' => null,
            'menu' => $menu
        ];
        // insert to db
        $this->db->insert('app_menu', $data);
    }
    // edit menu
    public function editMenu($id)
    {
        // prepare data
        $data = [
            'menu' => htmlspecialchars($this->input->post('menu', true))
        ];
        // update data
        $this->db->update('app_menu', $data, ['id' => $id]);
    }
    // delete menu
    public function delMenu($id)
    {
        $this->db->delete('app_menu', ['id' => $id]);
    }
    //   create method returner menu
    public function getSubMenu(): array
    {
        $sql = "
        SELECT app_sub_menu.id, app_menu.menu, app_sub_menu.title,app_sub_menu.url,app_sub_menu.icon,app_sub_menu.is_active 
        FROM app_sub_menu JOIN app_menu 
        ON app_menu.id=app_sub_menu.menu_id ";
        return  $this->db->query($sql)->result_array();
    }
    //  create method returner menu by id
    public function getSubMenuByID($id): array
    {
        return  $this->db->get_where('app_sub_menu', ['id' => $id])->row_array();
    }
    // add new sub menu
    public function addSubMenu()
    {
        // prepare data from post
        $menu_id = htmlspecialchars($this->input->post('menuref', true));
        $title = htmlspecialchars($this->input->post('title', true));
        $url = htmlspecialchars($this->input->post('url', true));
        $icon = htmlspecialchars($this->input->post('icon', true));
        $active = htmlspecialchars($this->input->post('active', true));
        // prepare data sql
        $data = [
            'id' => null,
            'menu_id' => $menu_id,
            'title' => $title,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $active
        ];
        // insert to db
        $this->db->insert('app_sub_menu', $data);
    }
    // edit submenu
    public function editSubMenu($id)
    {
        // prepare data
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'menu_id' => htmlspecialchars($this->input->post('menuref', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'is_active' => htmlspecialchars($this->input->post('active', true))
        ];
        // update data
        $this->db->update('app_sub_menu', $data, ['id' => $id]);
    }
    // delete submenu
    public function delSubMenu($id)
    {
        $this->db->delete('app_sub_menu', ['id' => $id]);
    }
    //   create method returner menu
    public function getRole(): array
    {
        return  $this->db->get('role')->result_array();
    }
    //  create method returner role by id
    public function getRoleByID($id): array
    {
        return  $this->db->get_where('role', ['id' => $id])->row_array();
    }
    // add new role
    public function addRole()
    {
        // prepare data from post
        $role = htmlspecialchars($this->input->post('role', true));
        // prepare data sql
        $data = [
            'role' => $role
        ];
        // insert to db
        $this->db->insert('role', $data);
    }
    // edit role
    public function editRole($id)
    {
        // prepare data
        $data = [
            'role' => htmlspecialchars($this->input->post('role', true))
        ];
        // update data
        $this->db->update('role', $data, ['id' => $id]);
    }
    // delete role
    public function delRole($id)
    {
        $this->db->delete('role', ['id' => $id]);
    }
}
