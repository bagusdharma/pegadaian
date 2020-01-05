<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_surat extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Surat_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
    }

    public function filter($id)
    {
        
    }
}