<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        // memanggil methos constructor yang ada di controller CI
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // cegah user/admin balik lagi ke menu login/auth
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login | Jasalancer";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // ketika validas login sukses
            // methodnya private
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // menyeleksi jika ada user dengan email yang telah terdaftar
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya(email) ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id' => $user['id']
                    ];
                    // menyimpan data ke session, untuk mengambilnya ada di controler User
                    $this->session->set_userdata($data);
                    // ke halaman user
                    // membuat kondisi jika admin/user
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('freelancer');
                    } else {
                        redirect('client');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktifkan</div>');
                redirect('auth');
            }

            //jika usernya(email) tidak ada
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar</div>');
            redirect('auth');
        }
    }

    
    public function registration()
    {
        // memberi rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // is_unique[user.email] mengecek unique table yang ada di table user > email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match',
            'min_lenght' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('inlineRadioOptions', 'checkbox', 'required|trim');
        // form validasi manual tanpa autoloader
        // $this->load->libarary('form_validation');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jasalancer | Registrasi";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            // membuat default di database
            $email = $this->input->post('email', true);
            $data = [
              
                
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('inlineRadioOptions', true),
                'is_active' => 0,
                'date_created' => time()
            ];


            // siapkan token
            // base64_encode -> mengubah symbol jadi karakter
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()

            ];

            $relasi = [
                // 'name' => $this->input->post('name'),
                'email' => $email,
                
            ];
            


            //data disiapkan dan input ke table user
            $this->db->insert('profil', $relasi);
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            // kirim ke email dengan akses modefier prvate
            $this->_sendEmail($token, 'verify');

            // kasih pesan flash
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akunmu telah dibuat, silahkan aktivasi di email</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' =>'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'jasalancer@gmail.com',
            'smtp_pass' =>'S4veth3w0rld',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' =>'utf-8',
            'newline' => "\r\n"
        ];
        // panggil libary email
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('jasalancer@gmail.com', 'Jasalancer | Freelancer Website');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account :
                <a href="'.base_url().'auth/verify?email='.$this->input->post('email').'&token='.urlencode($token).'">Activate</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your account :
                <a href="'.base_url().'auth/resetpassword?email='.$this->input->post('email').'&token='.urlencode($token).'">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token'=>$token])->row_array();

            if ($user_token) {
                if (time()-$user_token['date_created'] < (60*60*24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email'=>$email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$email.' telah aktif, silahkan login</div>');
                    redirect('auth');
                } else {
                    // menghapus user & token
                    $this->db->delete('user', ['email'=> $email]);
                    $this->db->delete('user_token', ['email'=> $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">token invalid</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">account activation failed : wrong email</div>');
            redirect('auth');
        }
    }



    public function logout()
    {
        // tugasnya membersihkan session sambil mengembalikan ke halaman login
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">you have been logout</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Emaill', 'trim|required|valid_email');
        if ($this->form_validation->run()==false) {
            $data['title'] = "Forgot Password";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', [
                'email' => $email,
                'is_active' => 1
            
            ])->row_array();

            if ($user) {
                // bikin token
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                     'date_created' => time()
                
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">please check email to reset your password</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email is not registered or activated</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // kalau mau pake model
        // $user = $this->user->getUserByEmail();
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token'=> $token])->row_array();
            if ($user_token) {
                // set seession/mengirim sesssion ke sistem nanti diambil memakai ->userdata di views change-password
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failes! wrong token</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failes! wrong email</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        // akses denied untuk user ynag langsung mengetikkan perintah di controller
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }


        $this->form_validation->set_rules('password1', "Password", 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', "Repeat Password", 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run()==false) {
            $data['title'] = "Change Password";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            // enkripsi password
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            // bersihkan session
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login</div>');
            redirect('auth');
        }
    }
}