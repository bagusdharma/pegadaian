<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model 
{
    public function getAllAsramaA()
    {
        $query = "SELECT `kamar`.`id`, `kamar`.`no_kamar`, `kamar`.`asrama_id`, `kamar`.`nama_penghuni_kamar`, `kamar`.`status` FROM `kamar` WHERE `asrama_id` = 1";
        return $this->db->query($query)->result_array();
        // $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
    }

    public function getAllAsramaB()
    {
        $query = "SELECT `kamar`.`id`, `kamar`.`no_kamar`, `kamar`.`asrama_id`,`kamar`.`nama_penghuni_kamar`, `kamar`.`status` FROM `kamar` WHERE `asrama_id` = 2";
        return $this->db->query($query)->result_array();
        // $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
    }

    public function getAllAsramaC()
    {
        $query = "SELECT `kamar`.`id`, `kamar`.`no_kamar`, `kamar`.`asrama_id`, `kamar`.`nama_penghuni_kamar`, `kamar`.`status` FROM `kamar` WHERE `asrama_id` = 3";
        return $this->db->query($query)->result_array();
        // $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
    }

    public function tambahKamar()
    {
        $data = [
            'no_kamar' => $this->input->post('no_kamar', true),
            'asrama_id' => $this->input->post('asrama_id', true),
            'status' => 0
        ];

        $this->db->insert('kamar', $data);
    }

    public function ambilKamar()
    {
        $data = [
            'nama_penghuni_kamar' => $this->input->post('nama_penghuni_kamar', true),
            'status' => 1
        ];
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kamar', $data);
    }

    public function resetKamar()
    {
        $data = [
            'nama_penghuni_kamar' => NULL,
            'status' => 0
        ];
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kamar', $data);
    }
}