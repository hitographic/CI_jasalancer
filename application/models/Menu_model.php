<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                   ";

        // return ke controller
        return $this->db->query($query)->result_array();
    }

    // public function getMahasiswaById($id)
    // {
    //     //mengambil data hanya satu baris database
    //     // menghasilkan row dalam entuk arraydi dari database
    //     return $this->db->get_where('user_menu', ['id'=> $id])->row_array();
    // }

    public function ubahDataMahasiswa()
    {
        $id = $this->input->post('id');

        $data = [
            // mirip 'nama' => $_POST['nama'],
            'menu' => $this->input->post('menu', true),
          

        ];
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }

    public function ubahSubMenu()
    {
        $id = $this->input->post('id');

        $data = [
            // mirip 'nama' => $_POST['nama'],
        
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true)
          

        ];
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }
}