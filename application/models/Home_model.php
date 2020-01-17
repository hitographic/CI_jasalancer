<?php

class Home_model extends CI_model
{
    public function getDataFreelancer()
    {
        $this->db->join('user', 'user.id = profil.id_user', 'inner');
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        $this->db->where('role_id', 2);
        return $this->db->get('profil')->result_array();
    }
}