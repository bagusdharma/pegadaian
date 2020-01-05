<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model 
{
    public function getAllSuratKeluar()
    {
        $this->db->order_by("no_surat", "DESC");
        // $data = $this->db->get('surat-keluar')->result_array();
        return $this->db->get('surat-keluar')->result_array();
        // echo json_encode($data);
        // die;
    }

    public function getNomorSurat()
    {
        // $nomorId = $this->db->get_where('surat_keluar', ['id' => $nomorId])->row_array();

        $query = "SELECT `surat-keluar`.`no_surat` as `nomor_surat`, `jenis-surat`.`kode_jenis` as `jenis_surat`, `kode-bagian-unit`.`kode_bagian` as `kode` FROM `surat-keluar` 
                    JOIN `jenis-surat` ON `surat-keluar`.`jenis_id` = `jenis-surat`.`id`
                    JOIN `kode-bagian-unit` ON `surat-keluar`.`bagian_id` = `kode-bagian-unit`.`id` 
                 ";
        
        //  $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
        return $this->db->query($query)->result_array(); 
        //  var_dump($data);
        //  die;
    }

    public function tambahSuratKeluar()
    {
        $data = [
            'no_surat' => $this->input->post('no_surat', true),
            'jenis_id' => $this->input->post('jenis_id', true),
            'bagian_id' => $this->input->post('bagian_id', true),
            'alamat_tujuan' => $this->input->post('alamat_tujuan', true),
            'tanggal_surat' => date("Y-m-d"),
            'perihal' => $this->input->post('perihal', true)
        ];

        $this->db->insert('surat-keluar', $data);
    }

    public function hapusSuratKeluar($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('surat-keluar', ['id' => $id]);
    }

    public function getSuratKeluarById($id)
    {
        return $this->db->get_where('surat-keluar', ['id' => $id])->row_array();
    }

    public function editSuratKeluar()
    {
        $data = [
            'no_surat' => $this->input->post('no_surat'),
            'jenis_id' => $this->input->post('jenis_id'),
            'bagian_id' => $this->input->post('bagian_id'),
            'alamat_tujuan' => $this->input->post('alamat_tujuan'),
            'tanggal_surat' => date("Y-m-d"),
            'perihal' => $this->input->post('perihal', true)
        ];
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat-keluar', $data);
    }


    //    SURAT PERJALANAN MODEL 

    public function getAllSuratPerjalanan()
    {
        $this->db->order_by("tanggal_pengiriman", "DESC");
        // $data = $this->db->get('surat_perjalanan')->result_array();
        return $this->db->get('surat_perjalanan')->result_array();
        // echo json_encode($data);
        // die;
    }

    public function getKurir()
    {
        $query = "SELECT `kurir`.`id`, `kurir`.`nama_kurir` as `nama_kurir`, `gambar`.`filepath` as `gambar_kurir` FROM `kurir` 
        JOIN `gambar` ON `kurir`.`gambar_id` = `gambar`.`id`
         ";

        // $data = $this->db->query($query)->result_array();
        return $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
    }

    public function tambahSuratPerjalanan()
    {
        $data = [
            'tanggal_pengiriman' => date("Y-m-d"),
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman', true),
            'isi_surat' => $this->input->post('isi_surat', true),
            'tujuan_pengiriman' => $this->input->post('tujuan_pengiriman', true)
        ];

        $this->db->insert('surat_perjalanan', $data);
    }

    public function hapusSuratPerjalanan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('surat_perjalanan', ['id' => $id]);
    }

    public function inputResiPerjalanan()
    {
        $data = [
            'no_resi' => $this->input->post('no_resi', true),
            'kurir_id' => $this->input->post('kurir_id', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_perjalanan', $data);
    }

    public function getSuratPerjalananById($id)
    {
        return $this->db->get_where('surat_perjalanan', ['id' => $id])->row_array();
    }

    public function editSuratPerjalanan()
    {
        $data = [
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman'),
            'isi_surat' => $this->input->post('isi_surat'),
            'tujuan_pengiriman' => $this->input->post('tujuan_pengiriman')
        ];
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_perjalanan', $data);
    }

    //    SURAT Masuk MODEL 

    public function getAllSuratMasuk()
    {
        $this->db->order_by("no_berkas", "DESC");
        // $data = $this->db->get('surat-keluar')->result_array();
        return $this->db->get('surat_masuk')->result_array();
        // echo json_encode($data);
        // die;
    }

    public function tambahSuratMasuk()
    {
        $data = [
            'no_berkas' => $this->input->post('no_berkas', true),
            'full_number' => $this->input->post('full_number', true),
            'pengirim_berkas' => $this->input->post('pengirim_berkas', true),
            'tanggal_suratmasuk' => date("Y-m-d"),
            'perihal_suratmasuk' => $this->input->post('perihal_suratmasuk', true)
        ];

        $this->db->insert('surat_masuk', $data);
    }


// New Gabungan Surat Keluar dan Surat Masuk

    public function getAllSurat()
    {
        $this->db->order_by("no_berkas", "DESC");
        // $data = $this->db->get('surat-keluar')->result_array();
        return $this->db->get('surat_baru')->result_array();
        // echo json_encode($data);
        // die;
    }

    public function tambahSurat()
    {
        $data = [
            'no_berkas' => $this->input->post('no_berkas', true),
            'full_number' => $this->input->post('full_number', true),
            'alamat_surat' => $this->input->post('alamat_surat', true),
            'tanggal_surat' => date("Y-m-d"),
            'perihal_surat' => $this->input->post('perihal_surat', true),
            'jenis_surat' => $this->input->post('jenis_surat', true)
        ];

        $this->db->insert('surat_baru', $data);
    }

    public function hapusSurat($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('surat_baru', ['id_surat' => $id]);
    }

    public function editSurat()
    {
        $data = [
            'no_berkas' => $this->input->post('no_berkas', true),
            'full_number' => $this->input->post('full_number', true),
            'alamat_surat' => $this->input->post('alamat_surat', true),
            'perihal_surat' => $this->input->post('perihal_surat', true)
        ];
        
        $this->db->where('id_surat', $this->input->post('id_surat'));
        $this->db->update('surat_baru', $data);
    }
}
