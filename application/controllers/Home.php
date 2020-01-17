<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        // sebagai pangaman agar tidak bisa masuk langsung lewat controller di url
        parent::__construct();
        $this->load->model('Home_model');
        // menggunakan helper
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'JasaLancer | Temukan Freelancer Terbaikmu di sini ';
        $data['freelancer'] = $this->Home_model->getDataFreelancer();

        $this->load->view('templates-depan/header', $data);
        $this->load->view('Home/index');
        $this->load->view('Home/kategori');
        $this->load->view('templates-depan/footer');
    }
}