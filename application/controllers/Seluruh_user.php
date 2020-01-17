<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Seluruh_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
      
        $this->load->model('Seluruh_user_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Seluruh User';
        // ambil data session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['kelola'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('seluruh_user/user_list', $data);
        // $this->load->view('templates/footer');
        // $this->template->load('template', 'seluruh_user/user_list');
    }
    
    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Seluruh_user_model->json();
    }

    public function read($id)
    {
        $row = $this->Seluruh_user_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id' => $row->id,
        'name' => $row->name,
        'email' => $row->email,
        'image' => $row->image,
        'password' => $row->password,
        'role_id' => $row->role_id,
        'is_active' => $row->is_active,
        'date_created' => $row->date_created,
        );
            $this->load->view('seluruh_user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('seluruh_user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('seluruh_user/create_action'),
        'id' => set_value('id'),
        'name' => set_value('name'),
        'email' => set_value('email'),
        'image' => set_value('image'),
        'password' => set_value('password'),
        'role_id' => set_value('role_id'),
        'is_active' => set_value('is_active'),
        'date_created' => set_value('date_created'),
    );
        $this->template->load('template', 'seluruh_user/user_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
        'name' => $this->input->post('name', true),
        'email' => $this->input->post('email', true),
        'image' => $this->input->post('image', true),
        'password' => $this->input->post('password', true),
        'role_id' => $this->input->post('role_id', true),
        'is_active' => $this->input->post('is_active', true),
        'date_created' => $this->input->post('date_created', true),
        );

            $this->Seluruh_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('seluruh_user'));
        }
    }
    
    public function update($id)
    {
        $row = $this->Seluruh_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('seluruh_user/update_action'),
        'id' => set_value('id', $row->id),
        'name' => set_value('name', $row->name),
        'email' => set_value('email', $row->email),
        'image' => set_value('image', $row->image),
        'password' => set_value('password', $row->password),
        'role_id' => set_value('role_id', $row->role_id),
        'is_active' => set_value('is_active', $row->is_active),
        'date_created' => set_value('date_created', $row->date_created),
        );
            $this->load->view('seluruh_user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('seluruh_user'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id', true));
        } else {
            $data = array(
        'name' => $this->input->post('name', true),
        'email' => $this->input->post('email', true),
        'image' => $this->input->post('image', true),
        'password' => $this->input->post('password', true),
        'role_id' => $this->input->post('role_id', true),
        'is_active' => $this->input->post('is_active', true),
        'date_created' => $this->input->post('date_created', true),
        );

            $this->Seluruh_user_model->update($this->input->post('id', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('seluruh_user'));
        }
    }
    
    public function delete($id)
    {
        $row = $this->Seluruh_user_model->get_by_id($id);

        if ($row) {
            $this->Seluruh_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('seluruh_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('seluruh_user'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('image', 'image', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('role_id', 'role id', 'trim|required');
        $this->form_validation->set_rules('is_active', 'is active', 'trim|required');
        $this->form_validation->set_rules('date_created', 'date created', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Name");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Image");
        xlsWriteLabel($tablehead, $kolomhead++, "Password");
        xlsWriteLabel($tablehead, $kolomhead++, "Role Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Is Active");
        xlsWriteLabel($tablehead, $kolomhead++, "Date Created");

        foreach ($this->Seluruh_user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->name);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->image);
            xlsWriteLabel($tablebody, $kolombody++, $data->password);
            xlsWriteNumber($tablebody, $kolombody++, $data->role_id);
            xlsWriteNumber($tablebody, $kolombody++, $data->is_active);
            xlsWriteNumber($tablebody, $kolombody++, $data->date_created);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data' => $this->Seluruh_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('seluruh_user/user_doc', $data);
    }
}

/* End of file Seluruh_user.php */
/* Location: ./application/controllers/Seluruh_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-23 12:54:26 */
/* http://harviacode.com */
