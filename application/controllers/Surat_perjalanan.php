<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_perjalanan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
        // if($this->session->userdata('role_id') == 2){
        //     redirect('auth/blocked');
        // }
    }

    public function index()
    {
        $data['title'] = 'Surat Ekspedisi';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        $data['surat_perjalanan'] = $this->Surat_model->getAllSuratPerjalanan();
        
        $data['kurir'] = $this->Surat_model->getKurir();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_perjalanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if($this->session->userdata('role_id') == 2){
            redirect('auth/blocked');
        }
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat Pengiriman', 'required');
        $this->form_validation->set_rules('isi_surat', 'Isi Surat', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('surat_perjalanan'); 
        } else {
            $this->Surat_model->tambahSuratPerjalanan();
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('surat_perjalanan');
        }
    }

    public function hapus($id)
    {
        if($this->session->userdata('role_id') == 2){
            redirect('auth/blocked');
        }
        $this->Surat_model->hapusSuratPerjalanan($id);
        $this->session->set_flashdata('message', 'Dihapus');
            redirect('surat_perjalanan');
    }

    public function inputResi()
    {
        if($this->session->userdata('role_id') == 2){
            redirect('auth/blocked');
        }
        $this->form_validation->set_rules('no_resi', 'No Resi', 'required');
        $this->form_validation->set_rules('kurir_id', 'Kurir ID', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('surat_perjalanan'); 
        } else {
            $this->Surat_model->inputResiPerjalanan();
            $this->session->set_flashdata('message', 'Di-update');
            redirect('surat_perjalanan');
        }
    }

    public function detail($id)
    {
        
        $data['getId'] = $this->Surat_model->getSuratPerjalananById($id);   
    }

    public function edit()
    {
        if($this->session->userdata('role_id') == 2){
            redirect('auth/blocked');
        }
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat Pengiriman', 'required');
        $this->form_validation->set_rules('isi_surat', 'Isi Surat', 'required');
        $this->form_validation->set_rules('tujuan_pengiriman', 'Tujuan Pengiriman', 'required');

        $this->Surat_model->editSuratPerjalanan();
        $this->session->set_flashdata('message', 'Di-Update');
            redirect('surat_perjalanan');
    }

}
