<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_suratekspedisi extends CI_Controller 
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
        $data['kurir'] = $this->Surat_model->getKurir();
        $this->load->library('mypdf');
        $data['surat_ekspedisi'] = $this->Surat_model->getAllSuratPerjalanan();
        $this->mypdf->generate('surat_perjalanan/laporan_ekspedisi', $data, 'laporan-surat-ekspedisi', 'A4', 'portrait');
    }
}