<?php

class Freelancer_model extends CI_model
{
    // public function getAllFreelancer()
    // {
    //     // $query = $this->db->get('Nama database');
    // $this->db->distinct();
    //     $this->db->select('*');
    //     $this->db->from('user u, profil p, kota k, skill s');
    //     $this->db->where('u.id = p.id_user');
    //     $this->db->where('k.id = u.id_kota');
    //     $this->db->where('s.id = u.id_skill');
    //     $query = $this->db->get()->result_array();;
    //     return $query;

     
    // }

    public function getAllFreelancer()
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('profil');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function cariDataFreelancer()
    {
        // mengambil keyword
        $keyword = $this->input->post('keyword', true);
        // untuk mencari %like keyword sql
        $this->db->like('nama', $keyword);
        // cara menambah $like dengan or_like
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('id_skill', $keyword);
        $this->db->or_like('id_kota', $keyword);
        $this->db->or_like('tipe_freelancer', $keyword);
        return $this->db->get('profil')->result_array();
    }


    // public function getAllMahasiswa()
    // {
    //     // $query = $this->db->get('Mahasiswa');
    //     return $this->db->get('mahasiswa')->result_array();

    // }

    // public function cariDataMahasiswa()
    // {
    //     // mengambil keyword
    //     $keyword = $this->input->post('keyword', true);
    //     // untuk mencari %like keyword sql
    //     $this->db->like('nama', $keyword);
    //     // cara menambah $like dengan or_like
    //     $this->db->or_like('nrp', $keyword);
    //     $this->db->or_like('jurusan', $keyword);
    //     $this->db->or_like('email', $keyword);
    //     return $this->db->get('mahasiswa')->result_array();
    // }

//     public function make_query( $skill, $kota, $tipe_freelancer)
//     {
//         $query = "
//         SELECT * FROM user u, profil p, kota k, skill s
//         WHERE u.id = p.id_user AND k.id = u.id_kota AND s.id = u.id_skill
//         ";

//         if (isset($skill)) {
//             $skill_filter = implode("','", $skill);
//             $query .= "
//             AND skill IN('".$skill_filter."')
//         ";
//         }

//         if (isset($kota)) {
//             $kota_filter = implode("','", $kota);
//             $query .= "
//             AND kota IN('".$kota_filter."')
//         ";
//         }

//         if (isset($tipe_freelancer)) {
//             $tipe_freelancer_filter = implode("','", $tipe_freelancer);
//             $query .= "
//             AND tipe_freelancer IN('".$tipe_freelancer_filter."')
//         ";
//         }
//         return $query;
//     }

//     public function count_all($skill, $kota, $tipe_freelancer)
//     {
//         $query = $this->make_query($skill, $kota, $tipe_freelancer);
//         $data = $this->db->query($query);
//         return $data->num_rows();
//     }

//     public function fetch_data($limit, $start, $skill, $kota, $tipe_freelancer)
//     {
//         $query = $this->make_query( $skill, $kota, $tipe_freelancer);

//         $query .= ' LIMIT '.$start.', ' . $limit;

//         $data = $this->db->query($query);

//         $output = '';
//         if ($data->num_rows() > 0) {
//             foreach ($data->result_array() as $row) {
//                 $output .= '
//                 <div class="col-sm-4 col-lg-3 col-md-3">
//                 <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
//                 <img src="'.base_url().'img/'. $row['foto'] .'" alt="" class="img-responsive" >
//                 <p align="center"><strong><a href="#">'. $row['kota'] .'</a></strong></p>
//                 <h4 style="text-align:center;" class="text-danger" >'. $row['skill'] .'</h4>
//                 </div>
//                 </div>
//                 ';
//             }
//         } else {
//             $output = '<h3>Data tidak ditemukan</h3>';
//         }
//         return $output;
//     }

}