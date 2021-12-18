<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    }

    public function messageAlert($type, $title)
    {
        $messageAlert = "
            setTimeout(function(){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true
                });
                Toast.fire({
                    type: '" . $type . "',
                    title: '" . $title . "'
                })
            }, 20);
            ";
        return $messageAlert;
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'AZ | Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //cek jika terdapat username user
        if ($user) {
            if (password_verify($password, $user['password'])) {     //cek jika password sama antara inputan dan di db
                #siapkan data user
                $data = [
                    'username'     => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_tempdata('messageAlert', $this->messageAlert('error', 'Wrong password!'), 1);
                redirect('auth');
            }
        } else {
            //jika tidak terdapat
            $this->session->set_tempdata('messageAlert', $this->messageAlert('warning', 'Username is not available'), 1);
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_tempdata('messageAlert', $this->messageAlert('success', 'You have been logged out!'), 1);
        redirect('auth');
    }
}
