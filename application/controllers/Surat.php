<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Surat Masuk dan Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        $data['surat'] = $this->Surat_model->getAllSurat();
        // $data['nomor_surat'] = $this->Surat_model->getNomorSurat();
        
        // $data['jenis_surat'] = $this->db->get('jenis-surat')->result_array();
        // $data['kode_bagian'] = $this->db->get('kode-bagian-unit')->result_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk_suratkeluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('no_berkas', 'Nomor Surat', 'required|numeric|is_unique[surat_baru.no_berkas]', array(
            'is_unique' => 'Nomor Surat Sudah dipakai'
        ));
        $this->form_validation->set_rules('full_number', 'Full Surat', 'required');
        $this->form_validation->set_rules('alamat_surat', 'Alamat Surat', 'required');
        $this->form_validation->set_rules('perihal_surat', 'Perihal', 'required');
        $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');

       
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_gagal', 'Input Data Surat');
            redirect('surat'); 
        } else {
            $this->Surat_model->tambahSurat();
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('surat');
        }
    }

    public function hapus($id)
    {
        $this->Surat_model->hapusSurat($id);
        $this->session->set_flashdata('message', 'Dihapus');
            redirect('surat');
    }

    public function detail($id)
    {
        $data['getId'] = $this->Surat_model->getSuratKeluarById($id);   
    }

    public function edit()
    {
        $this->form_validation->set_rules('no_berkas', 'Full Surat', 'required');
        $this->form_validation->set_rules('full_number', 'Full Surat', 'required');
        $this->form_validation->set_rules('alamat_surat', 'Alamat Surat', 'required');
        $this->form_validation->set_rules('perihal_surat', 'Perihal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_gagal', 'Input Data Surat');
            redirect('surat'); 
        } else {
            $this->Surat_model->editSurat();
            $this->session->set_flashdata('message', 'Di-Update');
            redirect('surat');
        }
    }

}