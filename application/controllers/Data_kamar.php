<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kamar extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kamar_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Kamar';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        $data['asrama'] = $this->db->get('asrama')->result_array();
        // echo "hai ". $data['user']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_kamar/index', $data);
        $this->load->view('templates/footer');
    }

    public function asrama_a()
    {
        $data['title'] = 'Data Kamar Asrama A';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "hai ". $data['user']['name'];
        $data['kamarA'] = $this->Kamar_model->getAllAsramaA();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_kamar/asrama_a', $data);
        $this->load->view('templates/footer');
    }

    public function asrama_b()
    {
        $data['title'] = 'Data Kamar Asrama B';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "hai ". $data['user']['name'];
        $data['kamarB'] = $this->Kamar_model->getAllAsramaB();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_kamar/asrama_b', $data);
        $this->load->view('templates/footer');
    }

    public function asrama_c()
    {
        $data['title'] = 'Data Kamar Asrama C';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "hai ". $data['user']['name'];
        $data['kamarC'] = $this->Kamar_model->getAllAsramaC();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_kamar/asrama_c', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kamar()
    {
        $this->form_validation->set_rules('no_kamar', 'Nomor Kamar', 'required');
        $this->form_validation->set_rules('asrama_id', 'Asrama', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('data_kamar'); 
        } else {
            $this->Kamar_model->tambahKamar();
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('data_kamar');
        }
    }

    public function ambilKamarA()
    {
        $this->Kamar_model->ambilKamar();
        redirect('data_kamar/asrama_a');
    }

    public function resetKamarA()
    {
        $this->Kamar_model->resetKamar();
		redirect('data_kamar/asrama_a');
    }

    public function ambilKamarB()
    {
        $this->Kamar_model->ambilKamar();
        redirect('data_kamar/asrama_b');
    }

    public function resetKamarB()
    {
        $this->Kamar_model->resetKamar();
		redirect('data_kamar/asrama_b');
    }

    public function ambilKamarC()
    {
        $this->Kamar_model->ambilKamar();
        redirect('data_kamar/asrama_c');
    }

    public function resetKamarC()
    {
        $this->Kamar_model->resetKamar();
		redirect('data_kamar/asrama_c');
    }

}
