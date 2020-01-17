<?php

class CariPekerjaan extends CI_Controller
{
    // ini tidak butuh jika sudah diatur di config > autoloads >$autoload['libraries'] = array('database');
    public function __construct()
    {
        // aturan dari CI, jika ingin load semua database
        parent::__construct();
        // $this->load->database();
        $this->load->library('session');
        $this->load->model('Pekerjaan_model');
        $this->load->library('pagination');
    }



    public function index()
    {

        // ini kalau gak ada yg diklik
        // $data['mahasiswa'] = $this->Freelancer_model->getAllMahasiswa();
        // // ini jalan kalau ada yg dicari
        // if( $this->input->post('keyword')){
        //     $data['mahasiswa'] = $this->Freelancer_model->cariDataMahasiswa();
        // }
        $this->load->model('Pekerjaan_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Pekerjaan - JasaLancer | Temukan Freelancer Terbaikmu di sini ';
        $data['kota'] = $this->db->get('kota')->result_array();
        $data['skill'] = $this->db->get('skill')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        
        // kirim data dari Freelancer_Model
        // $data['profil'] = $this->Freelancer_model->getAllFreelancer();
        // $this->load->model('Freelancer_model');
        // if ($this->input->post('keyword')) {
        //     $data['profil'] = $this->Freelancer_model->cariDataFreelancer();
        // }
        // ambil data keyword
        // PENCARIAN
        if ($this->input->post('submit')) {
            // echo $this->input->post('keyword');
            $data['keyword'] = $this->input->post('keyword');

            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            // $data['keyword'] = null;
        }

        // config
        $this->db->join('skill', 'skill.id = pekerjaan.id_skill', 'inner');
        $this->db->join('kota', 'kota.id = pekerjaan.id_kota', 'inner');
        $this->db->join('kategori', 'kategori.id = pekerjaan.id_kategori', 'inner');
        $this->db->join('user', 'user.id = pekerjaan.id_user', 'inner');
        $this->db->like('judul', $data['keyword']);
        $this->db->or_like('nama_kota', $data['keyword']);
        $this->db->or_like('skill', $data['keyword']);
        $this->db->or_like('deskripsi', $data['keyword']);
        $this->db->or_like('n_kategori', $data['keyword']);
        $this->db->or_like('harga', $data['keyword']);
        $this->db->or_like('user.name', $data['keyword']);
        $this->db->where('role_id', 3);
        $this->db->from('pekerjaan');
        //konfigurasi pagination


        
        $config['total_rows'] = $this->db->count_all_results(); //total row
        $data['total_rows'] = $config['total_rows'];
        $config['base_url'] = site_url('Caripekerjaan/index'); //site url
         $config['per_page'] = 5;  //show record per halaman
         $config["uri_segment"] = 3;  // uri parameter
         $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
  
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'Awal';
        $config['last_link']        = 'Akhir';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
  
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model.
        $data['pekerjaan'] = $this->Pekerjaan_model->get_pekerjaan_list($config["per_page"], $data['page'], $data['keyword']);
  
        $data['pagination'] = $this->pagination->create_links();
  
        //load view mahasiswa view
        $this->load->view('templates-depan/header2', $data);
        $this->load->view('CariPekerjaan/index', $data);
        $this->load->view('templates-depan/footer');
    }


    public function show($yes)
    {
        $this->load->model('Pekerjaan_model');
        $data['pekerjaan'] = $this->Pekerjaan_model->getAllCariPekerjaan($yes)->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Detail Data Pekerjaan';
   
        
        $this->load->view('templates-depan/header', $data);
        $this->load->view('CariPekerjaan/detail', $data);
        $this->load->view('templates-depan/footer');
    }
}