<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->library('session');
    }

    public function register()
    {
        if ($this->session->userdata('user_id')) {
            redirect('order');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

            if($this->form_validation->run() == TRUE){
                $data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );

                if($this->UserModel->register($data)){
                    $this->session->set_flashdata('message', 'Registration Successfully. Please login');
                    redirect("auth/login");
                }else{
                    $this->session->set_flashdata('message', 'registration failed.');
                }
            }
        }
        $this->load->view("auth/register");
    }


    public function login(){
        if($this->session->userdata("user_id")){
            redirect("order");
        }

        if($this->input->post()){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() == TRUE){
                $username  = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->UserModel->login($username, $password);
                if($user){
                    $this->session->set_userdata("user_id", $user["id"]);
                    redirect("order");
                }else{
                    $this->session->set_flashdata('error', "Invalid username or password");
                }
            }
        }

        $this->load->view("auth/login");
    }

    public function logout(){
        $this->session->unset_userdata("user_id");
        redirect("auth/login");
    }
}
