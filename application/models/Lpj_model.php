<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpj_model extends CI_Model 
{
    public function tambahTermin()
    {
        $data = [
            'nama_termin' => $this->input->post('nama_termin', true)
        ];

        $this->db->insert('termin_kegiatan', $data);
    }

    public function tambahLpj()
    {
        $data = [
            'nama_kegiatan' => $this->input->post('nama_kegiatan', true),
            'surat_otorisasi' => $this->input->post('surat_otorisasi', true)
        ];

        $this->db->insert('lpj', $data);
    }

    public function hapusLpj($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('lpj', ['id_lpj' => $id]);
    }

    public function editLpj()
    {
        $data = [
            'nama_kegiatan' => $this->input->post('nama_kegiatan', true),
            'surat_otorisasi' => $this->input->post('surat_otorisasi', true)
        ];
        
        $this->db->where('id_lpj', $this->input->post('id_lpj'));
        $this->db->update('lpj', $data);
    }

    public function tambahKegiatan()
    {
        $data = [
            'nama_kegiatan_id' => $this->input->post('nama_kegiatan_id', true),
            'termin_id' => $this->input->post('termin_id', true)
        ];

        $this->db->insert('kegiatan_lpj', $data);
    }

    public function getKegiatan()
    {
        $query = "SELECT DISTINCT `kegiatan_lpj`.`id_kegiatan`, `lpj`.`nama_kegiatan`, `termin_kegiatan`.`nama_termin` FROM `kegiatan_lpj` 
                    LEFT JOIN `lpj` ON `lpj`.`id_lpj` = `kegiatan_lpj`.`nama_kegiatan_id`
                    LEFT JOIN `termin_kegiatan` ON `termin_kegiatan`.`id_termin` = `kegiatan_lpj`.`termin_id`
                    LEFT JOIN `rekap_biaya` ON `rekap_biaya`.`kegiatan_id` = `kegiatan_lpj`.`id_kegiatan`
                    ";
        // $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
        return $this->db->query($query)->result_array();
    }

    public function tambahRekapBiaya()
    {
        $data = [
            // 'nama_kegiatan_id' => $this->input->post('nama_kegiatan_id', true),
            // 'termin_id' => $this->input->post('termin_id', true),
            'kegiatan_id' => $this->input->post('kegiatan_id', true),
            'item_biaya_id' => $this->input->post('item_biaya_id', true),
            'nama_biaya_kegiatan' => $this->input->post('nama_biaya_kegiatan', true),
            'harga_item_kegiatan' => $this->input->post('harga_item_kegiatan', true)
        ];

        $this->db->insert('rekap_biaya', $data);
    }

    public function getBiayaKegiatan()
    {
        $query = "SELECT *
                    FROM `rekap_biaya` 
                    -- JOIN `lpj` ON `lpj`.`id_lpj` = `rekap_biaya`.`nama_kegiatan_id`
                    JOIN `kegiatan_lpj` ON `kegiatan_lpj`.`id_kegiatan` = `rekap_biaya`.`kegiatan_id`
                    -- JOIN `termin_kegiatan` ON `termin_kegiatan`.`id_termin` = `rekap_biaya`.`termin_id`
                    JOIN `item_biaya_rekap` ON `item_biaya_rekap`.`id_item` = `rekap_biaya`.`item_biaya_id`
                    ";
        // $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
        return $this->db->query($query)->result_array();
    }

    public function getTotalBiaya()
    {
        $idKegiatan = $this->uri->segment(3);
        $query = "SELECT SUM(harga_item_kegiatan) AS total
                FROM `rekap_biaya` 
                WHERE `kegiatan_id` = $idKegiatan
                GROUP BY `rekap_biaya`.`kegiatan_id`
        ";
        // $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;

        return $this->db->query($query)->result_array();
    }

    public function getTotalBiayaItem()
    {
        $idKegiatan = $this->uri->segment(3);
        $query = "SELECT DISTINCT `rekap_biaya`.`item_biaya_id`, `rekap_biaya`.`kegiatan_id`, SUM(harga_item_kegiatan) AS total_item
                FROM `rekap_biaya` 
                WHERE `kegiatan_id` = $idKegiatan
                GROUP BY `rekap_biaya`.`item_biaya_id` 
        ";

        return $this->db->query($query)->result_array();
        // $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
    }

    public function uriKegiatan()
    {
        // $id = $this->uri->segment(3);
        // echo json_encode($id);
        // die;
        return $this->uri->segment(3);
    }
}

