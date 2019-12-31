<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'calendar';
        $this->load->model('Event_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Calendar Event';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        
        $data_calendar = $this->Event_model->get_list($this->table);
		$calendar = array();
		foreach ($data_calendar as $val) 
		{
			$calendar[] = array(
				'id_calendar' 	=> intval($val->id_calendar), 
				'title_calendar' => $val->title_calendar, 
				'description' => trim($val->description), 
				'start' => date_format( date_create($val->start_date) ,"Y-m-d H:i:s"),
				'end' 	=> date_format( date_create($val->end_date) ,"Y-m-d H:i:s"),
				'color' => $val->color,
			);
		}

		// $data = array();
		$data['get_data'] = json_encode($calendar);
		// $this->load->view('calendar', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('calendar_event/index', $data);
        $this->load->view('templates/footer');
    }

    public function save()
	{
		$response = array();
		$this->form_validation->set_rules('title', 'Title cant be empty ', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$param = $this->input->post();
			$id_calendar = $param['id_calendar'];
			unset($param['id_calendar']);

			if($id_calendar == 0)
			{
				$param['create_at']   	= date('Y-m-d H:i:s');
				$insert = $this->Event_model->insert($this->table, $param);

				if ($insert > 0) 
				{
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id_calendar'] = $insert;
				}
				else
				{
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}
			}
			else
			{	
				$where = [ 'id_calendar'  => $id_calendar];
				$param['modified_at']   	= date('Y-m-d H:i:s');
				$update = $this->Event_model->update($this->table, $param, $where);

				if ($update > 0) 
				{
					$response['status'] = TRUE;
					$response['notif']	= 'Success add calendar';
					$response['id_calendar'] = $id_calendar;
				}
				else
				{
					$response['status'] = FALSE;
					$response['notif']	= 'Server wrong, please save again';
				}

			}
		}
		else
		{
			$response['status'] = FALSE;
			$response['notif']	= validation_errors();
		}

		// echo json_encode($response);
	}

	public function delete()
	{
		$response 		= array();
		$id_calendar 	= $this->input->post('id');
		if(!empty($id_calendar))
		{
			$where = ['id_calendar' => $id_calendar];
			$delete = $this->Event_model->delete($this->table, $where);

			if ($delete > 0) 
			{
				$response['status'] = TRUE;
				$response['notif']	= 'Success delete calendar';
			}
			else
			{
				$response['status'] = FALSE;
				$response['notif']	= 'Server wrong, please save again';
			}
		}
		else
		{
			$response['status'] = FALSE;
			$response['notif']	= 'Data not found';
		}

		// echo json_encode($response);
	}
}