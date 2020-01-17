<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        // sebagai pangaman agar tidak bisa masuk langsung lewat controller di url
        parent::__construct();
        // menggunakan helper
        is_logged_in();
        
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        // if (!$this->session->userdata('email')) {
        //     redirect('auth');
    }

    public function index()
    {
        $data['title'] = 'Pengaturan Menu';
        // ambil data session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query data menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', ' ditambahkan');
            redirect('menu');
        }
    }

    public function hapusMenu($id)
    {
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('Menu_model');
        
        // $id disini diambil dari $id di atas
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', ' dihapus');
        redirect('menu');
    }

    public function editMenu($id)
    {
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('Menu_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['title'] = 'Ubah nama menu';
        $data['peoples']= $this->db->get_where('user_menu', ['id'=> $id])->row_array();
        // membuat manual jurusan,seharusnya di model
        

        $this->form_validation->set_rules('menu', 'Menu', 'required');
    


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // WARNING nama file harus CASE SENSITIVE!!!
            $this->Menu_model->ubahDataMahasiswa();
            $this->session->set_flashdata('message', ' diubah');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        // ambil data session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // alias menu_model
        $this->load->model('Menu_model', 'menu');

        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', ' ditambahkan');
            redirect('menu/submenu');
        }
    }

    public function hapusSubMenu($id)
    {
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('Menu_model');
        
        // $id disini diambil dari $id di atas
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('message', ' dihapus');
        redirect('menu/submenu');
    }

    public function editSubMenu($id)
    {
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('Menu_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['title'] = 'Ubah nama menu';
        $data['datasubmenu']= $this->db->get_where('user_sub_menu', ['id'=> $id])->row_array();
        // $data['submenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // membuat manual jurusan,seharusnya di model
        

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
    


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubahSubMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            // WARNING nama file harus CASE SENSITIVE!!!
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            // $this->Menu_model->ubahSubMenu();
            $this->session->set_flashdata('message', ' diubah');
            redirect('menu/submenu');
        }
    }
}