<?php 

class Home extends CI_Controller {
    public function index()
    {   
        $data['judul'] = 'JasaLancer | Temukan Freelancer Terbaikmu di sini ';

        $this->load->view('templates/header', $data);
        $this->load->view('Home/index');
        $this->load->view('Home/kategori');
        $this->load->view('templates/footer');

    }
}


?>