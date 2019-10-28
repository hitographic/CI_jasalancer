<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Freelancer extends CI_Controller
{
    // ini tidak butuh jika sudah diatur di config > autoloads >$autoload['libraries'] = array('database');
    public function __construct()
    {
        // aturan dari CI, jika ingin load semua database
        parent::__construct();
        // $this->load->database();
        $this->load->library('session');
        $this->load->model('Freelancer_model');
    }


    public function index()
    {

        // ini kalau gak ada yg diklik
        // $data['mahasiswa'] = $this->Freelancer_model->getAllMahasiswa();
        // // ini jalan kalau ada yg dicari
        // if( $this->input->post('keyword')){
        //     $data['mahasiswa'] = $this->Freelancer_model->cariDataMahasiswa();
        // }


        $data['judul'] = 'Freelacer - JasaLancer | Temukan Freelancer Terbaikmu di sini ';
        // kirim data dari Freelancer_Model
        $data['freelancer'] = $this->Freelancer_model->getAllfreelancer();
        if( $this->input->post('keyword')){
            $data['freelancer'] = $this->Freelancer_model->cariDataFreelancer();
        }
        // $data['skill'] = $this->Freelancer_model->getAllFreelancer('skill');
        // $data['kota'] = $this->Freelancer_model->getAllFreelancer('kota');
        // $data['tipe_freelancer'] = $this->Freelancer_model->getAllFreelancer('tipe_freelancer');
        $this->load->view('templates/header', $data);
        $this->load->view('freelancer/index', $data);
        $this->load->view('templates/footer');
    }


//     public function fetch_data()
//     {
//         sleep(1);
//         $skill = $this->input->post('skill');
//         $kota = $this->input->post('kota');
//         $tipe_freelancer = $this->input->post('tipe_freelancer');
//         $this->load->library('pagination');
//         $config = array();
//         $config['base_url'] = '#';
//         $config['total_rows'] = $this->product_filter_model->count_all( $skill, $kota, $tipe_freelancer);
//         $config['per_page'] = 8;
//         $config['uri_segment'] = 3;
//         $config['use_page_numbers'] = true;
//         $config['full_tag_open'] = '<ul class="pagination">';
//         $config['full_tag_close'] = '</ul>';
//         $config['first_tag_open'] = '<li>';
//         $config['first_tag_close'] = '</li>';
//         $config['last_tag_open'] = '<li>';
//         $config['last_tag_close'] = '</li>';
//         $config['next_link'] = '&gt;';
//         $config['next_tag_open'] = '<li>';
//         $config['next_tag_close'] = '</li>';
//         $config['prev_link'] = '&lt;';
//         $config['prev_tag_open'] = '<li>';
//         $config['prev_tag_close'] = '</li>';
//         $config['cur_tag_open'] = "<li class='active'><a href='#'>";
//         $config['cur_tag_close'] = '</a></li>';
//         $config['num_tag_open'] = '<li>';
//         $config['num_tag_close'] = '</li>';
//         $config['num_links'] = 3;
//         $this->pagination->initialize($config);
//         $page = $this->uri->segment(3);
//         $start = ($page - 1) * $config['per_page'];
//         $output = array(
//    'pagination_link'  => $this->pagination->create_links(),
//    'product_list'   => $this->freelancer_model->fetch_data($config["per_page"], $start, $skill, $kota, $tipe_freelancer)
//   );
//         echo json_encode($output);
//     }
  



//     public function profil()
//     {
//         $data['judul'] = 'Freelacer - JasaLancer | Temukan Freelancer Terbaikmu di sini ';
//         // kirim data dari Freelancer_Model
//         $data['freelancer'] = $this->Freelancer_model->getAllFreelancer();
        
//         $this->load->view('templates/header-hitam', $data);
//         $this->load->view('freelancer/profil', $data);
//         $this->load->view('templates/footer');
//     }
}
