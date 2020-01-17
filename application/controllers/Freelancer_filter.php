<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Freelancer_filter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('freelancer_filter_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Freelancer - JasaLancer | Temukan Freelancer Terbaikmu di sini ';
        // fetch_filter_type('product_brand'); product_brand nama filed database
        $data['skill'] = $this->freelancer_filter_model->fetch_filter_type('skill');
        $data['kota'] = $this->freelancer_filter_model->fetch_filter_type('nama_kota');
        $data['tipe'] = $this->freelancer_filter_model->fetch_filter_type('tipe_freelancer');
        

        $this->load->view('templates-depan/header', $data);
        $this->load->view('freelancer_filter_view', $data);
        $this->load->view('templates-depan/footer');
    }

    public function fetch_data()
    {
        sleep(1);
        $skill = $this->input->post('skill');
        $kota = $this->input->post('kota');
        $tipe = $this->input->post('tipe');
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->freelancer_filter_model->count_all($skill, $kota, $tipe);
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'product_list'   => $this->freelancer_filter_model->fetch_data($config["per_page"], $start, $skill, $kota, $tipe)
  );
        echo json_encode($output);
    }
}