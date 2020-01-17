<?php

class Kelola_user extends CI_Controller
{
    // ini tidak butuh jika sudah diatur di config > autoloads >$autoload['libraries'] = array('database');
    public function __construct()
    {
        // aturan dari CI, jika ingin load semua database
        parent::__construct();
        // $this->load->database();
        $this->load->model('kelola_user_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        // load database di satu method jika hanya butuh load database di satu methos saja, jika ingin banyak maka menggunakan construct
        // $this->load->database();
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('kelola_user_model');
        
        $data['title'] = 'Kelola User';
        $data['peoples'] = $this->db->get('user')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // ini kalau gak ada yg diklik
      

        // <<PAGINATION>>
        // load library
        $this->load->library('pagination');

        // ambil data keyword
        // PENCARIAN
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $this->db->like('name', $data['keyword']);
        $this->db->like('email', $data['keyword']);
        $this->db->from('user');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8;

        // initialize config
        $this->pagination->initialize($config);

        // http://localhost/ci-app/peoples/index/996 <- segment ke-3
        $data['start'] = $this->uri->segment(3);

        // 12 untuk jumlah data yang ingin ditampilkan dan 30 maka data dimulai dari data ke-31
        $data['peoples'] = $this->kelola_user_model->getPeoples($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        } else {
            // WARNING nama file harus CASE SENSITIVE!!!
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', ' Ditambahkan');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        // $id disini diambil dari $id di atas
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('flash', ' Dihapus');
        redirect('kelola_user');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Data User';
        $data['peoples'] = $this->db->get_where('user', ['id'=> $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Form Ubah Data User';
        $data['peoples']= $this->db->get_where('user', ['id'=> $id])->row_array();
        // membuat manual jurusan,seharusnya di model

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelola user/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');

            $data = [
            // mirip 'nama' => $_POST['nama'],
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
           
            ];
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            // WARNING nama file harus CASE SENSITIVE!!!
            $this->session->set_flashdata('flash', ' Diubah');
            redirect('kelola_user');
        }
    }
}