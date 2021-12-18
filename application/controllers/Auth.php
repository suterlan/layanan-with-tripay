<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //not_login();
        $this->load->model('M_Member');
    }

    public function messageAlert($type, $title)
    {
        $messageAlert = "
            setTimeout(function(){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 5000,
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
        if ($this->session->userdata('email')) {
            redirect('member');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'AZ | Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $member = $this->db->get_where('member', ['email' => $email])->row_array();
        //cek jika terdapat email member
        if ($member) {
            if ($member['is_active'] == 1) {    //cek jika member aktive
                if (password_verify($password, $member['password'])) {     //cek jika password sama antara inputan dan di db
                    #siapkan data member
                    $data = [
                        'email'     => $member['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('member');
                } else {
                    $this->session->set_tempdata('messageAlert', $this->messageAlert('error', 'Wrong password!'), 1);
                    redirect('auth');
                }
            } else {
                $this->session->set_tempdata('messageAlert', $this->messageAlert('warning', 'This email has not been activated'), 1);
                redirect('auth');
            }
        } else {
            //jika tidak terdapat
            $this->session->set_tempdata('messageAlert', $this->messageAlert('warning', 'Email is not registered!'), 1);
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('member');
        }


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches'   => 'Password dont match!',
            'min_length'    => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'AZ | Registration';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama'          => htmlspecialchars($this->input->post('nama', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'image'         => 'default.png',
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active'     => 1,
                'date_created'  => time()
            ];
            $this->M_Member->insert($data);
            $this->session->set_tempdata('messageAlert', $this->messageAlert('success', 'Your acount has been created'), 1);
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_tempdata('messageAlert', $this->messageAlert('success', 'You have been logged out!'), 1);
        redirect('Auth');
    }
}
