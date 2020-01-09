<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
        if(!$this->session->userdata('role_id') == 3){
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['title'] = "Data User Admin";
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo " ". $data['user']['name'];
        $data['user_role'] = $this->Role_model->getRoleUser();
        $data['data_user'] = $this->Role_model->getDataUser();

        $data['role'] = $this->Role_model->getRole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('role/index', $data);
        $this->load->view('templates/footer');
    }

    public function set_user()
    {
        $this->Role_model->setUser();
        $this->session->set_flashdata('message', 'Di-Update');
            redirect('role');
    }
}
