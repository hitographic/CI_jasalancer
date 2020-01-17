<?php

class Pekerjaan_model extends CI_model
{
    public function getAllCariPekerjaan($yes)
    {
        // $this->db->select('jasa.id, judul, deskripsi, harga, foto_jasa,id_user');
        $this->db->join('kategori', 'kategori.id = pekerjaan.id_kategori', 'inner');
        $this->db->join('kota', 'kota.id = pekerjaan.id_kota', 'inner');
        $this->db->join('user', 'user.id = pekerjaan.id_user', 'inner');
        $this->db->join('skill', 'skill.id = pekerjaan.id_skill', 'inner');
    
        $this->db->where('role_id', 3);
        return $this->db->get_where('pekerjaan', ['pekerjaan.id' => $yes]);
    }
    public function getAllJasa($id)
    {
        $this->db->join('user', 'pekerjaan.id_user = user.id ', 'left');
        // $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        // $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->get_where('pekerjaan', [ 'id_user' == $id ])->row_array();
    }
    public function cariDataPekerjaan()
    {
        // mengambil keyword
        $keyword = $this->input->post('keyword', true);
        // untuk mencari %like keyword sql
        $this->db->join('user', 'user.id = Pekerjaan.id_user', 'inner');
        $this->db->join('skill', 'skill.id = Pekerjaan.id_skill', 'inner');
        
        $this->db->like('judul', $keyword);
        // cara menambah $like dengan or_like
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->where('role_id', 3);
        return $this->db->get('Pekerjaan')->result_array();
    }

    public function get_pekerjaan_list($limit, $start, $keyword = null)
    {
        // pencarian dari controller
        if ($keyword) {
            $this->db->join('user', 'user.id = pekerjaan.id_user', 'inner');
            $this->db->join('kota', 'kota.id = pekerjaan.id_kota', 'inner');
            $this->db->join('skill', 'skill.id = pekerjaan.id_skill', 'inner');
            $this->db->join('kategori', 'kategori.id = pekerjaan.id_kategori', 'inner');
            $this->db->like('judul', $keyword);
            $this->db->or_like('nama_kota', $keyword);
            $this->db->or_like('n_kategori', $keyword);
            $this->db->or_like('skill', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->or_like('harga', $keyword);
            $this->db->or_like('user.name', $keyword);
            $this->db->where('role_id', 3);
            return $this->db->get('pekerjaan')->result_array();
        }
        $this->db->select('pekerjaan.id, judul, deskripsi, harga, name, nama_kota, skill, foto_pekerjaan, n_kategori');
        $this->db->join('skill', 'skill.id = pekerjaan.id_skill', 'inner');
        $this->db->join('user', 'user.id = pekerjaan.id_user', 'inner');
        $this->db->join('kota', 'kota.id = pekerjaan.id_kota', 'inner');
        $this->db->join('kategori', 'kategori.id = pekerjaan.id_kategori', 'inner');
        $this->db->where('role_id', 3);
        $query = $this->db->get('pekerjaan', $limit, $start)->result_array();
        return $query;
    }
}