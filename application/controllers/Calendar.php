<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
        // if($this->session->userdata('role_id') == 2){
        //     redirect('auth/blocked');
        // }
        $this->load->model('Calendar_model');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Calendar Event';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "hai ". $data['user']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('calendar/index', $data);
        $this->load->view('templates/footer');
    }

    public function load()
    {
        $event_data = $this->Calendar_model->fetch_all_event();
        foreach($event_data->result_array() as $row)
        {
            $data[] = array(
                'id' => $row['id_event'],
                'title' => $row['title'],
                'color' => $row['color'],
                'start' => $row['start_date'],
                'end' => $row['end_date']
            );
        }
        echo json_encode($data);
    }

    public function insert()
    {
        if($this->session->userdata('role_id') == 2){
            redirect('auth/blocked');
        }
        if($this->input->post('title'))
        {
            $data = array(
                'title' => $this->input->post('title'),
                'color' => $this->input->post('color'),
                'start_date' => $this->input->post('start'),
                'end_date' => $this->input->post('end')
            );
            $this->Calendar_model->insert_event($data);
        }
        redirect('calendar');
    }

    public function update()
    {
        if($this->session->userdata('role_id') == 2){
            redirect('auth/blocked');
        }
        if($this->input->post('id'))
        {
            $data = array(
                'title' => $this->input->post('title'),
                'start_date' => $this->input->post('start'),
                'end_date' => $this->input->post('end'),
            );
            $this->Calendar_model->update_event($data, $this->input->post('id'));
        }
    }

    public function delete()
    {
        if($this->session->userdata('role_id') == 2){
            redirect('auth/blocked');
        }
        if($this->input->post('id'))
        {
            $this->Calendar_model->delete_event($this->input->post('id'));
        }
    }

}