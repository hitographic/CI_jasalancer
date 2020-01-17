<?php

class Pekerjaan extends CI_Controller
{
    // ini tidak butuh jika sudah diatur di config > autoloads >$autoload['libraries'] = array('database');
    public function __construct()
    {
        // aturan dari CI, jika ingin load semua database
        parent::__construct();
        // $this->load->database();
        $this->load->model('Pekerjaan_model');
        $this->load->library('form_validation');
        $this->load->library('grocery_CRUD');
    }
    public function index()
    {
        // load database di satu method jika hanya butuh load database di satu methos saja, jika ingin banyak maka menggunakan construct
        // $this->load->database();
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        // $this->load->model('Pekerjaan_model');
        // $id = $this->input->post('id');
        $data['title'] = 'Kelola Pekerjaan';
        // $data['Pekerjaan'] = $this->Pekerjaan_model->getAllPekerjaan($id);
        // $data['pekerjaan'] = $this->db->get_where('pekerjaan', ['email' => $this->session->userdata('email')])->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // ini kalau gak ada yg diklik
        $email = $this->session->userdata('email');
        $id_user = $this->session->userdata('id');

      
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->where('pekerjaan.email', $this->session->userdata('email'));
        $crud->set_table('pekerjaan');
        $crud->display_as('id_kota', 'Kota')
        ->display_as('id_skill', 'Skill')
        ->display_as('id_kategori', 'Kategori')
        ->set_subject('pekerjaan');
        $crud->columns('judul', 'deskripsi', 'foto_pekerjaan', 'harga', 'id_kota');
        $crud->add_fields(array('email','id_user','judul', 'deskripsi', 'harga', 'id_kota', 'id_skill', 'id_kategori', 'foto_pekerjaan'));
        $crud->edit_fields(array('judul', 'deskripsi', 'harga', 'id_kota', 'id_skill', 'id_kategori', 'foto_pekerjaan'));

        $crud->field_type('email', 'hidden', $email);
        $crud->field_type('id_user', 'hidden', $id_user);
        
        $crud->set_relation('id_kota', 'kota', 'nama_kota');
        $crud->set_relation('id_skill', 'skill', 'skill');
        $crud->set_relation('id_kategori', 'kategori', 'n_kategori');
        // $crud->set_relation('id_user', 'user', 'id');
        
        // $crud->set_relation('user_id', 'users', 'username');
        $crud->set_field_upload('foto_pekerjaan', 'assets/img/pekerjaan');


        $crud->set_rules('id_kota', 'Kota', 'required');
        $crud->set_rules('id_skill', 'Skill', 'required');
        $crud->set_rules('id_kategori', 'Kategori', 'required');
        $crud->set_rules('judul', 'Judul', 'required');
        $crud->set_rules('deskripsi', 'Deskripsi', 'required');
        $crud->set_rules('harga', 'Harga', 'numeric');
        $crud->set_rules('foto_pekerjaan', 'Foto', 'required');

        $crud->set_language("indonesian");
        
        // $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)), site_url(strtolower(__CLASS__."/multigrids")));
        $output = $crud->render();
      
        $this->_example_output($output);

        //     if ($this->input->post('keyword')) {
    //         $data['Pekerjaan'] = $this->Pekerjaan_model->cariDataPekerjaan();
    //     }

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('Pekerjaan/index', $data);
    //     $this->load->view('templates/footer');
    }

    public function _example_output($output = null)
    {
        $data['title'] = 'Kelola Jasa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pekerjaan/index2', $output);
        $this->load->view('templates/footer2');
    }


    public function tambah()
    {
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('Pekerjaan_model');
        $data['title'] = 'tambah Pekerjaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['Pekerjaan'] = $this->db->get('Pekerjaan')->row_array();
        $data['kota'] = $this->db->get('kota')->result_array();
        $data['skill'] = $this->db->get('skill')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        // $data['peoples'] = $this->db->get_where('profil', ['email' => $this->session->userdata('email')])->row_array();
        // $data['tipe'] = $this->db->get('tipe_freelancer')->result_array();
        // $data['peoples']= $this->db->get_where('user_menu', ['id'=> $id])->row_array(); BUKAN INI
        // membuat manual jurusan,seharusnya di model
     
     
     
        // ambil data session
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); BUKAN INI
        // $data['profil'] = $this->Freelancer_model->getAllFreelancer(); BUKAN INI
        // rules
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('skill', 'Skill', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
     
        // form validation
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Pekerjaan/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = $this->input->post('id');
            // $name = $this->input->post('name');
            $id = $this->input->post('id');
            $id_kota = $this->input->post('id_kota');
            $is_skill = $this->input->post('is_skill');
            $id_kategori = $this->input->post('is_kategori');
            $email = $this->input->post('email');
            // $dataku = array(
            //     // 'name' => $this->input->post('name'),
            //     'name' => $name,
            //     'email' => $email
             
            // );
            $relasi = array(
             // 'name' => $this->input->post('name'),
            //  'email' => $email,
             'id_user' => $id,
             'id_kota' => $id_kota,
             'id_skill' => $id_skill,
             'id_kategori' => $id_kategori,
             'email' => $email,
             'judul' => $this->input->post('judul'),
             'deskripsi' => $this->input->post('deskripsi'),
             'harga' => $this->input->post('harga'),
            //  'tgl_lahir' => $this->input->post('tgl_lahir'),
            //  'tipe_freelancer' => $this->input->post('tipe'),
             
         );
         
        
         
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                // setting preferences
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048'; //max 2 mb / 2048 kb
                $config['upload_path'] = './assets/img/Pekerjaan/';

                // mengirim ke libarary
                $this->load->library('upload', $config);
             
                //1. jika berhasil mengupload image
                if ($this->upload->do_upload('image')) {
                    // agar foto yang lama terhapus saat user menguplad foto baru
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH.'assets/img/Pekerjaan/'.$old_image);
                    }
                    // 2.ambil dulu nama gambar yg baru
                    // 2.1. file_name harus seprti ini, tidak ada alternatif nama
                    $new_image = $this->upload->data('file_name');
                    // 3. kalau ada gambarnya, maka diisi ke database
                    $this->db->set('foto_Pekerjaan', $new_image);
                } else {
                    // ngecek error
                    echo $this->upload->display_errors('');
                }
            }

            // $this->db->where('email', $email);
            // $this->db->where('id', $id);
            // $this->db->update('profil', $relasi);
            // $this->db->set('name', $name);
            // $this->db->where('email', $email);
            $this->db->where('email', $email);
            $this->db->update('Pekerjaan', $relasi);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pekerjaan berhasil ditambah</div>');
            redirect('Pekerjaan');
        }
    }

    public function hapus($id)
    {
        // $id disini diambil dari $id di atas
        $this->db->delete('Pekerjaan', ['id' => $id]);
        $this->session->set_flashdata('message', ' Dihapus');
        redirect('Pekerjaan');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Data Pekerjaan';
        $data['peoples'] = $this->db->get_where('Pekerjaan', ['id'=> $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Pekerjaan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('Pekerjaan_model');
        $data['title'] = 'Ubah Pekerjaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['peoples'] = $this->db->get_where('Pekerjaan', ['email' => $this->session->userdata('email')])->row_array();
        // $data['Pekerjaan'] = $this->db->get('Pekerjaan');
        $data['peoples'] = $this->db->get_where('pekerjaan', ['id'=> $id])->row_array();
        $data['kota'] = $this->db->get('kota')->result_array();
        $data['skill'] = $this->db->get('skill')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        // $data['peoples'] = $this->db->get_where('profil', ['email' => $this->session->userdata('email')])->row_array();
        // $data['tipe'] = $this->db->get('tipe_freelancer')->result_array();
        // $data['peoples']= $this->db->get_where('user_menu', ['id'=> $id])->row_array(); BUKAN INI
        // membuat manual jurusan,seharusnya di model
     
     
     
        // ambil data session
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); BUKAN INI
        // $data['profil'] = $this->Freelancer_model->getAllFreelancer(); BUKAN INI
        // rules
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('skill', 'Skill', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('kategori', 'Kota', 'required');
     
        // form validation
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Pekerjaan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = $this->input->post('id');
            // $name = $this->input->post('name');
            $id = $this->input->post('id');
            $id_kota = $this->input->post('id_kota');
            $is_skill = $this->input->post('id_skill');
            $id_kategori = $this->input->post('id_kategori');
           
    
           
            // $dataku = array(
            //     // 'name' => $this->input->post('name'),
            //     'name' => $name,
            //     'email' => $email
             
            // );
            $relasi = array(
             // 'name' => $this->input->post('name'),
            //  'email' => $email,
             'id_kota' => $id_kota,
             'id_skill' => $id_skill,
             'id_kategori' => $id_kategori,
             'judul' => $this->input->post('judul'),
             'deskripsi' => $this->input->post('deskripsi'),
             'harga' => $this->input->post('harga'),
            //  'tgl_lahir' => $this->input->post('tgl_lahir'),
            //  'tipe_freelancer' => $this->input->post('tipe'),
             
         );
         
        
         
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                // setting preferences
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048'; //max 2 mb / 2048 kb
                $config['upload_path'] = './assets/img/Pekerjaan/';

                // mengirim ke libarary
                $this->load->library('upload', $config);
             
                //1. jika berhasil mengupload image
                if ($this->upload->do_upload('image')) {
                    // agar foto yang lama terhapus saat user menguplad foto baru
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH.'assets/img/Pekerjaan/'.$old_image);
                    }
                    // 2.ambil dulu nama gambar yg baru
                    // 2.1. file_name harus seprti ini, tidak ada alternatif nama
                    $new_image = $this->upload->data('file_name');
                    // 3. kalau ada gambarnya, maka diisi ke database
                    $this->db->set('foto_Pekerjaan', $new_image);
                } else {
                    // ngecek error
                    echo $this->upload->display_errors('');
                }
            }

            // $this->db->where('email', $email);
            // $this->db->where('id', $id);
            // $this->db->update('profil', $relasi);
            // $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('Pekerjaan', $relasi);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pekerjaan berhasil diupdate</div>');
            redirect('pekerjaan');
        }
    }
}