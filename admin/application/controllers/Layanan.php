<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Layanan');
    }
    public function index()
    {
        $data = array(
            'view'          => 'layanan/index',
            'nav'           => 'navbar',
            'layanan'       => $this->M_Layanan->getAll()
        );
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/main_content', $data);
    }

    public function addLayanan()
    {
        $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('harga_del', 'Harga Coret', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array(
                'view'          => 'layanan/index',
                'nav'           => 'navbar',
                'layanan'       => $this->M_Layanan->getAll()
            );
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/main_content', $data);
        } else {
            $data = [
                'nama_layanan'      => $this->input->post('nama_layanan'),
                'harga'             => $this->input->post('harga'),
                'harga_del'         => $this->input->post('harga_del'),
                'fitur1'            => $this->input->post('fitur1'),
                'fitur2'            => $this->input->post('fitur2'),
                'fitur3'            => $this->input->post('fitur3'),
                'fitur4'            => $this->input->post('fitur4'),
                'fitur5'            => $this->input->post('fitur5'),
                'fitur6'            => $this->input->post('fitur6'),
                'fitur7'            => $this->input->post('fitur7'),
                'fitur8'            => $this->input->post('fitur8'),
                'fitur9'            => $this->input->post('fitur9'),
                'fitur10'           => $this->input->post('fitur10')
            ];
            $this->M_Layanan->insert($data);
            $setMessage = new message();
            $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('success', 'Layanan berhasil ditambah'), 1);
            redirect('layanan');
        }
    }

    public function editLayanan()
    {
        $where = $this->input->post('id');
        echo json_encode($this->M_Layanan->getById($where));
    }

    public function updateLayanan()
    {
        $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $data = array(
                'view'          => 'layanan/index',
                'nav'           => 'navbar',
                'layanan'       => $this->M_Layanan->getAll()
            );
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/main_content', $data);
        } else {
            $data = [
                'nama_layanan'      => $this->input->post('nama_layanan'),
                'harga'             => $this->input->post('harga'),
                'harga_del'         => $this->input->post('harga_del'),
                'fitur1'            => $this->input->post('fitur1'),
                'fitur2'            => $this->input->post('fitur2'),
                'fitur3'            => $this->input->post('fitur3'),
                'fitur4'            => $this->input->post('fitur4'),
                'fitur5'            => $this->input->post('fitur5'),
                'fitur6'            => $this->input->post('fitur6'),
                'fitur7'            => $this->input->post('fitur7'),
                'fitur8'            => $this->input->post('fitur8'),
                'fitur9'            => $this->input->post('fitur9'),
                'fitur10'           => $this->input->post('fitur10')
            ];
            $where = [
                'id'    => $this->input->post('id')
            ];
            $this->M_Layanan->update($data, $where);
            $setMessage = new message();
            $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('success', 'Data layanan berhasil diubah'), 1);
            redirect('layanan');
        }
    }

    public function deleteLayanan()
    {
        $where = $this->input->post('id');
        echo json_encode($this->M_Layanan->delete($where));
    }
}
