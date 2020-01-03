<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller 
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
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        
        $data['surat_masuk'] = $this->Surat_model->getAllSuratMasuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('no_berkas', 'Nomor Surat Masuk', 'required|numeric|is_unique[surat_masuk.no_berkas]', array(
            'is_unique' => 'Nomor Surat Sudah dipakai'
        ));
        $this->form_validation->set_rules('full_number', 'Full Surat Masuk', 'required');
        $this->form_validation->set_rules('pengirim_berkas', 'Pengirim', 'required');
        $this->form_validation->set_rules('perihal_suratmasuk', 'Perihal', 'required');

       
        if ($this->form_validation->run() == FALSE) {
            redirect('surat_masuk'); 
        } else {
            $this->Surat_model->tambahSuratMasuk();
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('surat_masuk');
        }
    }

    public function hapus($id)
    {
        $this->Surat_model->hapusSuratPerjalanan($id);
        $this->session->set_flashdata('message', 'Dihapus');
            redirect('surat_perjalanan');
    }

    public function inputResi()
    {
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
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat Pengiriman', 'required');
        $this->form_validation->set_rules('isi_surat', 'Isi Surat', 'required');
        $this->form_validation->set_rules('tujuan_pengiriman', 'Tujuan Pengiriman', 'required');

        $this->Surat_model->editSuratPerjalanan();
        $this->session->set_flashdata('message', 'Di-Update');
            redirect('surat_perjalanan');
    }

}
