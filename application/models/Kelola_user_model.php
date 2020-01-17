<?php

class Kelola_user_model extends CI_Model
{
    public function getAllPeoples()
    {
        return $this->db->get('user')->result_array();
    }
    public function getPeoples($limit, $start, $keyword = null)
    {
        // pencarian daro controller
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('user', $limit, $start)->result_array();
    }
    
    public function countAllPeoples()
    {
        return $this->db->get('user')->num_rows();
    }
    public function getAllMahasiswa()
    {
        // $query = $this->db->get('Mahasiswa');
        return $this->db->get('mahasiswa')->result_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            // mirip 'nama' => $_POST['nama'],
            'nama' => $this->input->post('nama', true),
            'nrp' => $this->input->post('nrp', true),
            'email' => $this->input->post('email', true),
            'jurusan' => $this->input->post('jurusan', true),

        ];
    
        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        // ada dua cara 1.
        // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa');
        // 2.
        $this->db->delete('mahasiswa', ['id' => $id]);
    }

    // public function getMahasiswaById($id)
    // {
    //     //mengambil data hanya satu baris database
    //     // menghasilkan row dalam entuk arraydi dari database
    //     return $this->db->get_where('mahasiswa', ['id'=> $id])->row_array();
    // }

    // public function ubahDataMahasiswa()
    // {
    //     $id = $this->input->post('id');

    //     $data = [
    //         // mirip 'nama' => $_POST['nama'],
    //         'name' => $this->input->post('nama', true),
    //         'email' => $this->input->post('email', true),
           
    //     ];
    //     $this->db->where('id', $id);
    //     $this->db->update('user', $data);
    // }
    public function cariDataMahasiswa()
    {
        // mengambil keyword
        $keyword = $this->input->post('keyword', true);
        // untuk mencari %like keyword sql
        $this->db->like('nama', $keyword);
        // cara menambah $like dengan or_like
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}