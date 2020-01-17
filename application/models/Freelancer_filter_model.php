<?php

class Freelancer_filter_model extends CI_Model
{
    public function fetch_filter_type($type)
    {
        // $this->db->distinct();
        // $this->db->select($type);
        // $this->db->from('product');
        // $this->db->where('product_status', '1');
        // return $this->db->get();

        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('profil');
        $this->db->join('user', 'user.id = profil.id_user', 'inner');
        $this->db->join('skill', 'skill.id = profil.id_skill', 'inner');
        $this->db->join('kota', 'kota.id = profil.id_kota', 'inner');
        $this->db->where('role_id', 2);
        return $this->db->get();
    }

    public function make_query($skill, $kota, $tipe)
    {
        $query = "
  SELECT * FROM profil 
  INNER JOIN user ON user.id = profil.id_user
  INNER JOIN skill ON skill.id = profil.id_skill
  INNER JOIN kota ON kota.id = profil.id_kota
  WHERE role_id = '2' 
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

        if (isset($tipe)) {
            $tipe_filter = implode("','", $tipe);
            $query .= "
    AND tipe_freelancer IN('".$tipe_filter."')
   ";
        }
        return $query;
    }

    public function count_all($skill, $kota, $tipe)
    {
        $query = $this->make_query($skill, $kota, $tipe);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    public function fetch_data($limit, $start, $skill, $kota, $tipe)
    {
        $query = $this->make_query($skill, $kota, $tipe);

        $query .= ' LIMIT '.$start.', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $output .= '
    <div class="col-sm-4 col-lg-3 col-md-3">
     <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
      <img src="'.base_url().'assets/img/profile'. $row['image'] .'" alt="" class="img-responsive" >
      <p align="center"><strong><a href="#">'. $row['name'] .'</a></strong></p>
      <h4 style="text-align:center;" class="text-danger" >'. $row['prof_skill'] .'</h4>
      <p>Camera : '. $row['prof_sum'].' MP<br />
      Brand : '. $row['skill'] .' <br />
      RAM : '. $row['kota'] .' GB<br />
      Storage : '. $row['tipe_freelancer'] .' GB </p>
     </div>
    </div>
    ';
            }
        } else {
            $output = '<h3>No Data Found</h3>';
        }
        return $output;
    }
}