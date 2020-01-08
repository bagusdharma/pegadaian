<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model 
{
    public function fetch_all_event()
    {
        $this->db->order_by('id_event');
        return $this->db->get('event');
    }

    public function insert_event($data)
    {
        $this->db->insert('event', $data);
    }

    public function update_event($data, $id)
    {
        $this->db->where('id_event', $id);
        $this->db->update('event', $data);
    }

    public function delete_event($id)
    {
        $this->db->where('id_event', $id);
        $this->db->delete('event');
    }
}
