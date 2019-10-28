<?php 

class Jasa_model extends CI_model
{
    public function getAlljasa()
    {
        // $query = $this->db->get('Nama database');
        $this->db->select('*');
        $this->db->from('user u, jasa j, kota k, skill s');
        $this->db->where('u.id = j.id_user');
        $this->db->where('k.id = u.id_kota');
        $this->db->where('s.id = u.id_skill');
        $query = $this->db->get()->result_array();;
        return $query;

     
    }
}





?>