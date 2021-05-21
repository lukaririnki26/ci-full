<?php

function logged_in()
{
    $myapp = get_instance();
    if (!$myapp->session->userdata('email')) {
        redirect('');
    } else {
        $menu = $myapp->uri->segment(1);
        $role = $myapp->session->userdata('role');
        $menu = $myapp->db->get_where('app_menu', ['menu' => $menu])->row_array();
        $menuid = $menu['id'];
        $access = $myapp->db->get_where('app_access_menu', [
            'role_id' => $role,
            'menu_id' => $menuid
        ]);
        if ($access->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
function access_check($roleid, $menuid)
{
    $myapp = get_instance();
    $access = $myapp->db->get_where('app_access_menu', [
        'role_id' => $roleid,
        'menu_id' => $menuid
    ]);
    if ($access->num_rows() > 0) {
        return 'checked';
    }
}
