<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Transaksi');
    }
    // public function index()
    // {
    //     $data = array(
    //         'view'          => 'transaksi/index',
    //         'nav'           => 'navbar',
    //         'transaksi'       => $this->M_Transaksi->getAll()
    //     );
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $this->load->view('templates/main_content', $data);
    // }

    public function index()
    {

        $apiKey = 'DEV-KcP1O0KqkIMtCpg2JRhWTHDX4OjjRyWSghZ1wkz8'; //ganti dengan apikey anda

        $payload = [
            'page'     => 1,
            'per_page' => 25
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/transactions?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        if ($response) {
            $daftar = json_decode($response, true);
            $daftar = $daftar['data'];
            //print_r($detail);
        } else {
            echo json_decode($error);
        }

        $data = array(
            'view'          => 'transaksi/index',
            'nav'           => 'navbar',
            'transaksi'       => $daftar
        );
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/main_content', $data);
    }
}
