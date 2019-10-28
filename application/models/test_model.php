<?php

class Test_model extends CI_model
{
    // public function getAllFreelancer()
    // {
    //     // $query = $this->db->get('Nama database');
    //     $this->db->select('*');
    //     $this->db->from('user u, profil p, kota k, skill s');
    //     $this->db->where('u.id = p.id_user');
    //     $this->db->where('k.id = u.id_kota');
    //     $this->db->where('s.id = u.id_skill');
    //     $query = $this->db->get()->result_array();;
    //     return $query;

     
    // }

    public function getAllFreelancer($type)
    {
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('user u, profil p, kota k, skill s');
        return $this->db->get();
    }

    public function make_query( $skill, $kota, $tipe_freelancer)
    {
        $query = "
        SELECT * FROM user u, profil p, kota k, skill s
        WHERE u.id = p.id_user AND k.id = u.id_kota AND s.id = u.id_skill
        ";

        if (isset($skill)) {
            $skill_filter = implode("','", $skill);
            $query .= "
            AND skill IN('".$skill_filter."')
        ";
        }

        if (isset($kota)) {
            $kota_filter = implode("','", $kota);
            $query .= "
            AND kota IN('".$kota_filter."')
        ";
        }

        if (isset($tipe_freelancer)) {
            $tipe_freelancer_filter = implode("','", $tipe_freelancer);
            $query .= "
            AND tipe_freelancer IN('".$tipe_freelancer_filter."')
        ";
        }
        return $query;
    }

    public function count_all($skill, $kota, $tipe_freelancer)
    {
        $query = $this->make_query($skill, $kota, $tipe_freelancer);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    public function fetch_data($limit, $start, $skill, $kota, $tipe_freelancer)
    {
        $query = $this->make_query( $skill, $kota, $tipe_freelancer);

        $query .= ' LIMIT '.$start.', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                <img src="'.base_url().'img/'. $row['foto'] .'" alt="" class="img-responsive" >
                <p align="center"><strong><a href="#">'. $row['kota'] .'</a></strong></p>
                <h4 style="text-align:center;" class="text-danger" >asasas'. $row['alamat'] .'</h4>
                </div>
                </div>
                ';
            }
        } else {
            $output = '<h3>Data tidak ditemukan</h3>';
        }
        return $output;
    }

}