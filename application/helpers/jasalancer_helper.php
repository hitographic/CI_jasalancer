<?php

function is_logged_in()
{
    // instansiasi CI
    // memanggil helper
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        // memanggil segemnt controller/ menu
        $menu = $ci->uri->segment(1);
        // query tabel menu
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];


        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
            ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    // logika : lihat DATABASE, jika role_id = 1 maka menu_id = 1;2;3
    // sedangkan role_id = 2 maka menu_id = 2 saja!
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    // cek kondisi jika ada isinya dan tampilkan
    // dan return/balikan/tukar nilai function di view>role-access
    if ($result->num_rows()>0) {
        return "checked='checked'";
    }

    // contoh query lain
    // $ci->db->get_where('user_access_menu',[
    //     'role_id' => $role_id,
    //     'menu_id' => $menu_id
    // ]);
}