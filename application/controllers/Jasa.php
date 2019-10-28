<?php

class Jasa extends CI_Controller
{
    // ini tidak butuh jika sudah diatur di config > autoloads >$autoload['libraries'] = array('database');
    public function __construct()
    {
        // aturan dari CI, jika ingin load semua database
        parent::__construct();
        // $this->load->database();
        $this->load->model('Jasa_model');
    }



    public function index()
    {
        $data['judul'] = 'Cari Jasa - JasaLancer | Temukan jasa yang kamu inginkan di sini ';
        // kirim data dari Mahasiswa_model
        $data['jasa'] = $this->Jasa_model->getAllJasa();

        $this->load->view('templates/header', $data);
        $this->load->view('jasa/index', $data);

        $this->load->view('templates/footer');
    }
}
