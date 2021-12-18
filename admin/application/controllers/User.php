<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_User');
    }

    public function index()
    {
        $data = [
            'view'      => 'user/index',
            'nav'       => 'navbar',
            'userData'      => $this->M_User->getAll()
        ];
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/main_content', $data);
    }
    public function addUser()
    {
        // run validation form
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique'  => 'Username sudah ada! Gunakan kombinasi huruf & angka'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches'  => 'Pastikan password sama!',
            'min_length'    => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim');

        // cek validasi form 
        if ($this->form_validation->run() == false) {
            $data = [
                'view'      => 'user/index',
                'nav'       => 'navbar',
                'userData'      => $this->M_User->getAll()
            ];
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
            $this->load->view('templates/main_content', $data);
        } else {

            // send data post to model
            $data = [
                'nama'          => htmlspecialchars($this->input->post('nama', true)),
                'username'      => htmlspecialchars($this->input->post('username', true)),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image'         => 'default-admin.png',
                'role_id'       => 1
            ];
            $this->M_User->insert($data);
            $setMessage = new Message();
            $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('success', 'User berhasil ditambah'), 1);
            redirect('user');
        }
    }
    public function editUser()
    {
        $where = $this->input->post('id');
        echo json_encode($this->M_User->getById($where));
    }
    public function updateUser()
    {

        $pass = $this->input->post('password');
        if (empty($pass)) {
            $data = [
                'nama'          => $this->input->post('nama'),
                'username'      => $this->input->post('username'),
            ];
        } else {
            $data = [
                'nama'          => $this->input->post('nama'),
                'username'      => $this->input->post('username'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
        }
        $where = [
            'id'    => $this->input->post('id')
        ];
        $this->M_User->update($where, $data);
        $setMessage = new message();
        $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('success', 'Berhasil diubah'), 1);
        redirect('user');
    }

    public function deleteUser()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $where = $this->input->post('id');
        if ($where == $data['user']['id']) {
            $setMessage = new message();
            $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('info', 'User sedang aktif'), 1);
            redirect('user');
        } else {
            echo json_encode($this->M_User->delete($where));
        }
    }
}
