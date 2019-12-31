<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller 
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
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        $data['surat_keluar'] = $this->Surat_model->getAllSuratKeluar();
        $data['nomor_surat'] = $this->Surat_model->getNomorSurat();
        
        $data['jenis_surat'] = $this->db->get('jenis-surat')->result_array();
        $data['kode_bagian'] = $this->db->get('kode-bagian-unit')->result_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        $data['jenis_surat'] = $this->db->get('jenis-surat')->result_array();
        $data['kode_bagian'] = $this->db->get('kode-bagian-unit')->result_array();
        
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|numeric|is_unique[surat-keluar.no_surat]', array(
            'is_unique' => 'Nomor Surat Sudah dipakai'
        ));
        $this->form_validation->set_rules('jenis_id', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('bagian_id', 'Kode Unit Bagian', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_keluar/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Surat_model->tambahSuratKeluar();
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('surat_keluar');
        }
    }

    public function hapus($id)
    {
        $this->Surat_model->hapusSuratKeluar($id);
        $this->session->set_flashdata('message', 'Dihapus');
            redirect('surat_keluar');
    }

    public function detail($id)
    {
        $data['getId'] = $this->Surat_model->getSuratKeluarById($id);   
    }

    public function edit()
    {
        // $data = [
        //     'no_surat' => $this->input->post('no_surat', true),
        //     'jenis_id' => $this->input->post('jenis_id', true),
        //     'bagian_id' => $this->input->post('bagian_id', true),
        //     'alamat_tujuan' => $this->input->post('alamat_tujuan', true),
        //     'tanggal_surat' => date("Y-m-d"),
        //     'perihal' => $this->input->post('perihal', true)
        // ];

        // $this->db->where()
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|numeric|is_unique[surat-keluar.no_surat]', array(
            'is_unique' => 'Nomor Surat Sudah dipakai'
        ));
        $this->form_validation->set_rules('jenis_id', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('bagian_id', 'Kode Unit Bagian', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');

        $this->Surat_model->editSuratKeluar();
        $this->session->set_flashdata('message', 'Di-Update');
            redirect('surat_keluar');
    }

}