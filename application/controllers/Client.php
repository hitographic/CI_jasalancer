<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        // sebagai pangaman agar tidak bisa masuk langsung lewat controller di url
        parent::__construct();
        // menggunakan helper
        is_logged_in();
        $this->load->model('freelancer_model');
        // if (!$this->session->userdata('email')) {
        //     redirect('auth');
    }
    
    public function index()
    {
        $data['title'] = 'Profil | JasaLancer';
        // ambil data session
        // $data['profil'] =
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['profil'] = $this->Freelancer_model->getAllFreelancer();
        $data['profil'] = $this->db->get_where('profil', ['email' => $this->session->userdata('email')])->row_array();
       
        $this->load->model('freelancer_model');
        $data['kota'] = $this->freelancer_model->getKota()->row_array();
       
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('client/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        //  membuat nama model alternatif bisa 'Peoples_model' atau 'peoples'
        $this->load->model('Freelancer_model');
        $data['title'] = 'Edit Profil';
        
        $data['kota'] = $this->db->get('kota')->result_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profil'] = $this->db->get_where('profil', ['email' => $this->session->userdata('email')])->row_array();
        // $data['tipe'] = $this->db->get('tipe_freelancer')->result_array();
        // $data['peoples']= $this->db->get_where('user_menu', ['id'=> $id])->row_array(); BUKAN INI
        // membuat manual jurusan,seharusnya di model
        
        
        
        // ambil data session
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); BUKAN INI
        // $data['profil'] = $this->Freelancer_model->getAllFreelancer(); BUKAN INI
        // rules
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        
        // form validation
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('client/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = $this->input->post('id');
            $name = $this->input->post('name');
            $idKota = $this->input->post('kota');
            $id = $this->input->post('id');
            $email = $this->input->post('email');
            // $dataku = array(
            //     // 'name' => $this->input->post('name'),
            //     'name' => $name,
            //     'email' => $email
                
            // );
            $relasi = array(
                // 'name' => $this->input->post('name'),
                'email' => $email,
                'id_kota' => $idKota,
                'id_user' => $id,
                'alamat' => $this->input->post('alamat'),
                'kontak' => $this->input->post('kontak'),
                'prof_sum' => $this->input->post('prof_sum'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                
                
            );
            
            $this->db->where('email', $email);
            // $this->db->where('id', $id);
            $this->db->update('profil', $relasi);
            
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                // setting preferences
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048'; //max 2 mb / 2048 kb
                $config['upload_path'] = './assets/img/profile/';

                // mengirim ke libarary
                $this->load->library('upload', $config);
                
                //1. jika berhasil mengupload image
                if ($this->upload->do_upload('image')) {
                    // agar foto yang lama terhapus saat user menguplad foto baru
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH.'assets/img/profile/'.$old_image);
                    }
                    // 2.ambil dulu nama gambar yg baru
                    // 2.1. file_name harus seprti ini, tidak ada alternatif nama
                    $new_image = $this->upload->data('file_name');
                    // 3. kalau ada gambarnya, maka diisi ke database
                    $this->db->set('image', $new_image);
                } else {
                    // ngecek error
                    echo $this->upload->display_errors('');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diupdate</div>');
            redirect('client');
        }
    }

    

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        // ambil data session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        // current password rules
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        
        // form validation
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('client/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            // $data['user']['password'] mengambil data password dari user
            if (!password_verify($current_password, $data['user']['password'])) {
                // jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('client/changepassword');
            } else {
                if ($current_password == $new_password) {
                    // jika password sama dengan password sebelumnya
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak boleh sama dengan password sebelumnya!</div>');
                    redirect('client/changepassword');
                } else {
                    // password yang sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti</div>');
                    redirect('client/changepassword');
                }
            }
        }
    }
}