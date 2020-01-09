<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('NIK', 'NIK', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if($this->form_validation->run() == False) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
        //    kalau sukses / tidak error
            $this->_login();
        }

    }

    private function _login()
    {
        $nik = $this->input->post('NIK');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['NIK'=> $nik] )->row_array();
        // var_dump($user);
        // die;

        if($user) {

            // jika usernya aktif
            if($user['is_active'] == 1) {
                
                // cek password
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'NIK' => $user['NIK'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    redirect('dashboard');

                    // if ($user['role_id'] == 1) {
                    //     redirect('dashboard');
                    // } else {
                    //     redirect('user'); // masuk halaman user
                    // }
                    

                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Wrong Password
                      </div>');
                    redirect('auth');
                }

            } 
            else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                This NIK not Active, Please Contact the Leader
                 </div>');
                redirect('auth');
            }


        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            NIK not registered / wrong email and password
          </div>');
            redirect('auth');
        }

    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('NIK', 'NIK', 'required|trim|is_unique[user.NIK]', [
            'is_unique' => 'This NIK has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password do not match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }

        else {
            $data = [
                'name' => $this->input->post('name'),
                'NIK' => $this->input->post('NIK'),
                // 'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' =>1
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Congratulations! your account has been created. Please Login
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('NIK');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have been logged out
      </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Access Blocked';

        $data['user'] = $this->db->get_where('user', ['NIK' => $this->session->userdata('NIK')])->row_array();

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('auth/404', $data);
        $this->load->view('templates/footer');
    }

}
