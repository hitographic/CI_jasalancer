<?php

class Jasa_model extends CI_model
{
    public function getAllCariJasa($yes)
    {
        // $this->db->select('jasa.id, judul, deskripsi, harga, foto_jasa,id_user');
        $this->db->join('kota', 'kota.id = jasa.id_kota', 'inner');
        $this->db->join('user', 'user.id = jasa.id_user', 'inner');
        $this->db->join('skill', 'skill.id = jasa.id_skill', 'inner');
        $this->db->where('role_id', 2);
        return $this->db->get_where('jasa', ['jasa.id' => $yes]);
    }
    public function getAllJasa($id)
    {
        $this->db->join('user', 'jasa.id_user = user.id ', 'left');
        // $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        // $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->get_where('jasa', [ 'id_user' == $id ])->row_array();
    }
    public function cariDataJasa()
    {
        // mengambil keyword
        $keyword = $this->input->post('keyword', true);
        // untuk mencari %like keyword sql
        $this->db->join('user', 'user.id = jasa.id_user', 'inner');
        $this->db->join('skill', 'skill.id = jasa.id_skill', 'inner');
        
        $this->db->like('judul', $keyword);
        // cara menambah $like dengan or_like
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->where('role_id', 2);
        return $this->db->get('jasa')->result_array();
    }

    public function get_jasa_list($limit, $start, $keyword = null)
    {
        // pencarian dari controller
        if ($keyword) {
            $this->db->join('user', 'user.id = jasa.id_user', 'inner');
            $this->db->join('kota', 'kota.id = jasa.id_kota', 'inner');
            $this->db->join('skill', 'skill.id = jasa.id_skill', 'inner');
            $this->db->like('judul', $keyword);
            $this->db->or_like('nama_kota', $keyword);
            $this->db->or_like('skill', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->or_like('harga', $keyword);
            $this->db->or_like('user.name', $keyword);
            $this->db->where('role_id', 2);
            return $this->db->get('jasa')->result_array();
        }
        $this->db->select('jasa.id, judul, deskripsi, harga, name, nama_kota, skill, foto_jasa');
        $this->db->join('skill', 'skill.id = jasa.id_skill', 'inner');
        $this->db->join('user', 'user.id = jasa.id_user', 'inner');
        $this->db->join('kota', 'kota.id = jasa.id_kota', 'inner');
        $this->db->where('role_id', 2);
        $query = $this->db->get('jasa', $limit, $start)->result_array();
        return $query;
    }

    public function tambahDataJasa($id_user, $email)
    {
        $data = [
            // mirip 'nama' => $_POST['nama'],

            'id_user' => $id_user,
            'email' => $email,
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),

        ];
    
        $this->db->insert('jasa', $data);
    }
}