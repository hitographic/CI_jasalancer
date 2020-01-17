<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        // sebagai pangaman agar tidak bisa masuk langsung lewat controller di url
        parent::__construct();
        // menggunakan helper
        is_logged_in();
        // if (!$this->session->userdata('email')) {
        //     redirect('auth');
    }
    
    public function index()
    {
        $data['title'] = 'My Profile';
        // ambil data session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        // ambil data session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // rules
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        
        // form validation
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

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

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">your profile has been updated</div>');
            redirect('user');
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
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            // $data['user']['password'] mengambil data password dari user
            if (!password_verify($current_password, $data['user']['password'])) {
                // jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    // jika password sama dengan password sebelumnya
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
                    redirect('user/changepassword');
                } else {
                    // password yang sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}