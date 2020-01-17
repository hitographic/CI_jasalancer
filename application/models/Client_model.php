<?php

class Freelancer_model extends CI_model
{
    public function getKota()
    {
        
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        return $this->db->get_where('profil', ['email' => $this->session->userdata('email')]);
      
    }
}