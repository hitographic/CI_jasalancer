<?php

class Freelancer_model extends CI_model
{
    public function getKota()
    {
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        return $this->db->get_where('profil', ['email' => $this->session->userdata('email')]);
    }
   

    public function detailFreelancer($id)
    {
        $this->db->join('user', 'user.id = profil.id_user', 'inner');
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        return $this->db->get_where('profil', ['id_user'=> $id])->row_array();
    }

    public function getAllFreelancer()
    {
        $this->db->join('user', 'user.id = profil.id_user', 'inner');
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        $this->db->where('role_id', 2);
        return $this->db->get('profil')->result_array();
    }

    public function cariDataFreelancer()
    {
        // mengambil keyword
        $keyword = $this->input->post('keyword', true);
        // $this->db->join('user', 'user.id = profil.id_user', 'inner');
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        $this->db->join('user', 'user.id = profil.id_user', 'inner');
        // untuk mencari %like keyword sql
        $this->db->like('name', $keyword);
        // cara menambah $like dengan or_like
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('id_skill', $keyword);
        $this->db->or_like('id_kota', $keyword);
        $this->db->or_like('tipe_freelancer', $keyword);
        return $this->db->get('profil')->result_array();
    }

    public function ubahDataFreelancer()
    {
        $id = $this->input->post('id');

        $data = [
            // mirip 'nama' => $_POST['nama'],
            'nama' => $this->input->post('nama', true),
            'nrp' => $this->input->post('nrp', true),
            'email' => $this->input->post('email', true),
            'jurusan' => $this->input->post('jurusan', true),

        ];
        $this->db->where('id', $id);
        $this->db->update('mahasiswa', $data);
    }

    public function get_freelancer_list($limit, $start, $keyword = null)
    {
        // pencarian dari controller
        if ($keyword) {
            $this->db->join('user', 'user.id = profil.id_user', 'inner');
            $this->db->join('skill', 'skill.id = profil.id_skill', 'inner');
            $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
            $this->db->like('user.name', $keyword);
            $this->db->or_like('profil.email', $keyword);
            $this->db->or_like('alamat', $keyword);
            $this->db->or_like('tipe_freelancer', $keyword);
            $this->db->or_like('skill', $keyword);
            $this->db->or_like('nama_kota', $keyword);
            $this->db->where('role_id', 2);
            return $this->db->get('profil')->result_array();
        }
        $this->db->join('skill', 'skill.id = profil.id_skill', 'inner');
        $this->db->join('user', 'user.id = profil.id_user', 'inner');
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        $this->db->where('role_id', 2);
        $query = $this->db->get('profil', $limit, $start)->result_array();
        return $query;
    }
}