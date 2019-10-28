<?php 


class Gate extends CI_Controller
{
    public function login()
    {
        $data['judul'] = 'Login - JasaLancer | Temukan Freelancer Terbaikmu di sini ';

    
        $this->load->view('gate/login', $data);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $data['judul'] = 'Register- JasaLancer | Temukan Freelancer Terbaikmu di sini ';

    
        $this->load->view('gate/register', $data);
        $this->load->view('templates/footer');
    }
}
?>