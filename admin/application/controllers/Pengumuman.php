<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Pengumuman');
    }
    public function index()
    {
        $data = array(
            'view'          => 'pengumuman/index',
            'nav'           => 'navbar',
            'pengumuman'    => $this->M_Pengumuman->getAll()
        );
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/main_content', $data);
    }

    public function addPengumuman()
    {
        $this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required|trim');
        $this->form_validation->set_rules('text_pengumuman', 'Isi Pengumuman', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array(
                'view'          => 'pengumuman/index',
                'nav'           => 'navbar',
                'pengumuman'    => $this->M_Pengumuman->getAll()
            );
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/main_content', $data);
        } else {
            $data = [
                'id'                    => $this->input->post('id'),
                'judul_pengumuman'      => $this->input->post('judul_pengumuman'),
                'text_pengumuman'       => $this->input->post('text_pengumuman'),
            ];
            $this->M_Pengumuman->insert($data);
            $setMessage = new message();
            $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('success', 'Pengumuman berhasil ditambah'), 1);
            redirect('pengumuman');
        }
    }

    public function editPengumuman()
    {
        $where = $this->input->post('id');
        echo json_encode($this->M_Pengumuman->getById($where));
    }

    public function updatePengumuman()
    {
        $this->form_validation->set_rules('judul_pengumuman', 'Nama Pengumuman', 'required|trim');
        $this->form_validation->set_rules('text_pengumuman', 'Isi Pengumuman', 'required');

        if ($this->form_validation->run() == false) {
            $data = array(
                'view'          => 'pengumuman/index',
                'nav'           => 'navbar',
                'pengumuman'    => $this->M_Pengumuman->getAll()
            );
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/main_content', $data);
        } else {
            $data = [
                'id'                    => $this->input->post('id'),
                'judul_pengumuman'      => $this->input->post('judul_pengumuman'),
                'text_pengumuman'       => $this->input->post('text_pengumuman'),
            ];
            $where = [
                'id'    => $this->input->post('id')
            ];
            $this->M_Pengumuman->update($data, $where);
            $setMessage = new message();
            $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('success', 'Data Pengumuman berhasil diubah'), 1);
            redirect('pengumuman');
        }
    }

    public function deletePengumuman()
    {
        $where = $this->input->post('id');
        echo json_encode($this->M_Pengumuman->delete($where));
    }
}