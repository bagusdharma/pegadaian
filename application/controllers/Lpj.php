<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpj extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lpj_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'LPJ The Gade';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "rindu ". $data['user']['name'];
        $data['termin'] = $this->db->get('termin_kegiatan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lpj/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_termin()
    {
        $this->form_validation->set_rules('nama_termin', 'Nama Termin Kegiatan', 'required');
        // $this->form_validation->set_rules('asrama_id', 'Asrama', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('lpj'); 
        } else {
            $this->Lpj_model->tambahTermin();
            $this->session->set_flashdata('message_termin', 'Ditambahkan');
            redirect('lpj');
        }
    }

    public function tambah_lpj()
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('surat_otorisasi', 'Surat Otorisasi Kegiatan', 'required');
        // $this->form_validation->set_rules('asrama_id', 'Asrama', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('lpj/all_lpj'); 
        } else {
            $this->Lpj_model->tambahLpj();
            $this->session->set_flashdata('message_lpj', 'Ditambahkan');
            redirect('lpj/all_lpj');
        }
    }

    public function all_lpj()
    {
        $data['title'] = 'All LPJ The Gade';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "rindu ". $data['user']['name'];
        $data['lpj'] = $this->db->get('lpj')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lpj/all_lpj', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_lpj($id)
    {
        $this->Lpj_model->hapusLpj($id);
        $this->session->set_flashdata('message_lpj', 'Dihapus');
            redirect('lpj/all_lpj');
    }

    public function edit_lpj()
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('surat_otorisasi', 'Surat Otorisasi Kegiatan', 'required');
        // $this->form_validation->set_rules('asrama_id', 'Asrama', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('lpj/all_lpj'); 
        } else {
            $this->Lpj_model->editLpj();
            $this->session->set_flashdata('message_lpj', 'Di-Update');
            redirect('lpj/all_lpj');
        }
    }

    public function detail_kegiatan()
    {
        $data['title'] = 'Detail Termin Kegiatan';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "rindu ". $data['user']['name'];
        $data['lpj'] = $this->db->get('lpj')->result_array();
        $data['termin'] = $this->db->get('termin_kegiatan')->result_array();
        $data['detail_kegiatan'] = $this->Lpj_model->getKegiatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lpj/detail_kegiatan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kegiatan()
    {
        $this->form_validation->set_rules('nama_kegiatan_id', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('termin_id', 'Termin Kegiatan', 'required');
        // $this->form_validation->set_rules('asrama_id', 'Asrama', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('lpj/detail_kegiatan'); 
        } else {
            $this->Lpj_model->tambahKegiatan();
            $this->session->set_flashdata('message_kegiatan', 'Ditambahkan');
            redirect('lpj/detail_kegiatan');
        }
    }

    public function biaya_kegiatan()
    {
        $data['title'] = 'Biaya Termin Kegiatan';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo " ". $data['user']['name'];
        $data['lpj'] = $this->db->get('lpj')->result_array();
        $data['termin'] = $this->db->get('termin_kegiatan')->result_array();
        $data['detail_kegiatan'] = $this->Lpj_model->getKegiatan();
        $data['biaya_kegiatan'] = $this->Lpj_model->getBiayaKegiatan();
        $data['item'] = $this->db->get('item_biaya_rekap')->result_array();

        $data['total_biaya'] = $this->Lpj_model->getTotalBiaya();

        $data['total_biaya_item'] = $this->Lpj_model->getTotalBiayaItem();

        $data['data_uri_kegiatan'] = $this->Lpj_model->uriKegiatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lpj/biaya_kegiatan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_rekap_kegiatan()
    {
        $this->form_validation->set_rules('kegiatan_id', 'Nama Kegiatan', 'required');
        // $this->form_validation->set_rules('termin_id', 'Termin Kegiatan', 'required');
        $this->form_validation->set_rules('item_biaya_id', 'Item Biaya Kegiatan', 'required');
        $this->form_validation->set_rules('nama_biaya_kegiatan', 'Nama Biaya Kegiatan', 'required');
        $this->form_validation->set_rules('harga_item_kegiatan', 'Harga Item Kegiatan', 'required');

        // $this->form_validation->set_rules('asrama_id', 'Asrama', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            redirect('lpj'); 
        } else {
            $this->Lpj_model->tambahRekapBiaya();
            $this->session->set_flashdata('message_biaya', 'Ditambahkan');
            redirect('lpj');
        }
    }

    public function total_biaya()
    {
        $this->Lpj_model->getTotalBiaya();
        redirect('lpj/biaya_kegiatan');
    }
}
