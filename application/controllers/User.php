<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if(!$this->session->userdata('NIK')){
            redirect('auth');
        }
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();
        // echo "rindu ". $data['user']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        // $data['title'] = 'Edit Profile';
        // $data['user'] = $this->db->get_where('NIK', ['NIK' => $this->session->userdata('NIK')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[user.email]', [
            'is_unique' => 'This Email has already registered'
        ]); 
        $name = $this->input->post('name');   
        $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('NIK', $this->session->userdata('NIK'));
            $this->db->update('user');

            $this->session->set_flashdata('message', 'Di-Update');
            redirect('user');
    }

    public function change_password()
    {
        // $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        
        $pass_user = $this->db->get_where('user', ['NIK'=> $this->session->userdata('NIK')] )->row_array();
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');

        if(!password_verify($current_password, $pass_user['password'])) {
            $this->session->set_flashdata('message_error', 'Wrong Current Password');
            redirect('user');
        } else {
            if($current_password === $new_password) {
                $this->session->set_flashdata('message_error', 'New Password cannot be the same as current password');
                redirect('user');
            }
            else {
                // password benar dan sesuai
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                
                $this->db->set('password', $password_hash);
                $this->db->where('NIK', $this->session->userdata('NIK'));
                $this->db->update('user');

                $this->session->set_flashdata('message_update', 'Password Telah di-Update');
                redirect('user');
            }
        }

    

    }

}
