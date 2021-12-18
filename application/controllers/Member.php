<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Member');
        $this->load->model('M_Layanan');
        $this->load->model('M_Pengumuman');
    }

    public function index()
    {
        $data['title'] =  'AZ-Media | Member';
        $data['layanan'] = $this->M_Layanan->getAll();
        $data['pengumuman'] = $this->M_Pengumuman->getAll();
        $data['member'] = $this->db->get_where('member', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/dashboard', $data);
        $this->load->view('member/templates/footer');
    }

    public function myProfile()
    {
        $data['title'] =  'AZ-Media | My Profile';
        $data['member'] = $this->db->get_where('member', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/profile/profile', $data);
        $this->load->view('member/templates/footer');
    }
    public function editProfile()
    {
        $data['title'] =  'AZ-Media | Edit Profile';
        $data['member'] = $this->db->get_where('member', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('member/templates/header', $data);
            $this->load->view('member/templates/sidebar', $data);
            $this->load->view('member/templates/topbar', $data);
            $this->load->view('member/profile/profile_edit', $data);
            $this->load->view('member/templates/footer');
        } else {

            // jika upload gambar
            $uploadImage = $_FILES['image']['name'];
            if ($uploadImage) {
                $config['allowed_types'] = 'png|jpg';
                $config['max_size']      = '1048';
                $config['upload_path']   = './assets/member/img/profile/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['member']['image'];
                    $path = FCPATH . '/assets/member/img/profile/' . $old_image;
                    if ($old_image != 'default.png') {
                        chmod($path, 0777);
                        unlink($path);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'nama'      => $this->input->POST('nama'),
                'no_hp'     => $this->input->POST('no_hp'),
                'alamat'    => $this->input->POST('alamat'),
                'image'     => $new_image
            ];
            $where = [
                'email'     => $this->input->POST('email'),
            ];
            $this->M_Member->update($where, $data);
            $setMessage = new Message();
            $this->session->set_tempdata('messageAlert', $setMessage->messageAlert('success', 'Profil anda berhasil diubah'), 1);
            redirect('member/myProfile');
        }
    }
}




// class buat set Notifikasi 
class Message
{
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
}
