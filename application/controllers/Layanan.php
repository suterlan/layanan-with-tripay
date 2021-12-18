<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Member');
        $this->load->model('M_Layanan');
    }
    
     public function index(){
        //  Semua layanan
        $data['title'] =  'AZ-Media | Layanan';
        $data['layanan'] = $this->M_Layanan->getAll();
        $data['member'] = $this->db->get_where('member', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/layanan/layanan', $data);
        $this->load->view('member/templates/footer');
    }

    public function layananVideo()
    {
        $data['title'] =  'AZ-Media | Layanan';
        $data['layanan'] = $this->M_Layanan->getLayananVideo();
        $data['member'] = $this->db->get_where('member', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/layanan/layanan-video', $data);
        $this->load->view('member/templates/footer');
    }

    public function layananWebsite()
    {
        $data['title'] =  'AZ-Media | Layanan';
        $data['layanan'] = $this->M_Layanan->getLayananWebsite();
        $data['member'] = $this->db->get_where('member', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/layanan/layanan-website', $data);
        $this->load->view('member/templates/footer');
    }

    public function layananSosial()
    {
        $data['title'] =  'AZ-Media | Layanan';
        $data['layanan'] = $this->M_Layanan->getLayananSosial();
        $data['member'] = $this->db->get_where('member', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/layanan/layanan-sosial', $data);
        $this->load->view('member/templates/footer');
    }
}
