<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Member');
        $this->load->model('M_Layanan');
        $this->load->model('M_Transaksi');
    }

    public function getPaymentChannels($id)
    {

        $apiKey = 'DEV-KcP1O0KqkIMtCpg2JRhWTHDX4OjjRyWSghZ1wkz8'; //ganti dengan apikey anda


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($response) {
            $metodebayar = json_decode($response, true);
            $metodebayar = $metodebayar['data'];
        } else {
            echo json_decode($error);
        }

        $data = [
            'title'         =>  'AZ-Media | Layanan',
            'layanan'       => $this->M_Layanan->getLayananById($id),
            'metodeBayar'   => $metodebayar,
            'member'        => $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/transaksi/checkout', $data);
        $this->load->view('member/templates/footer');
        //print_r($metodebayar);
    }

    public function request()
    {
        $member = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();

        // Triger to Tripay 
        $apiKey       = 'DEV-KcP1O0KqkIMtCpg2JRhWTHDX4OjjRyWSghZ1wkz8'; //ganti dengan apikey anda
        $privateKey   = 'UPVst-NKMFE-mQllV-Tzmpu-szViL'; //ganti dengan private key anda
        $merchantCode = 'T7897'; //ganti dengan kode merchan anda
        $merchantRef  = 'TR-' . time();
        $amount       = $this->input->post('harga');
        $method       = $this->input->post('channel_code');

        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => $member['nama'],
            'customer_email' => $member['email'],
            'customer_phone' => $member['no_hp'],
            'order_items'    => [
                [
                    'name'        => $this->input->post('nama_layanan'),
                    'price'       => $amount,
                    'quantity'    => 1
                ],
            ],
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data)
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($response) {
            $transaksi = json_decode($response, true);
            $transaksi = $transaksi['data'];
        } else {
            echo json_decode($error);
        }
        // end triger to tripay

        // save to database
        $_data = [
            'id_member'     => $this->input->post('id'),
            'id_layanan'    => $this->input->post('id_layanan'),
            'no_ref'        => $transaksi['reference'],
            'date_trans'    => time(),
            'merchant_ref'  => $merchantRef,
            'total_amount'  => $amount,
            'status'        => 'belum dibayar'
        ];
        $this->M_Transaksi->insert($_data);
        redirect('transaksi/detailTransaksi/' . $transaksi['reference']);
    }

    public function detailTransaksi($transaksi)
    {
        $this->input->get($transaksi);

        $apiKey = 'DEV-KcP1O0KqkIMtCpg2JRhWTHDX4OjjRyWSghZ1wkz8'; //ganti dengan apikey anda

        $payload = ['reference'    => $transaksi];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/detail?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($response) {
            $detail = json_decode($response, true);
            $detail = $detail['data'];
            //print_r($detail);
        } else {
            echo json_decode($error);
        }


        $data = [
            'title'         =>  'AZ-Media | Transaksi',
            'layanan'       => $this->M_Layanan->getLayananVideo(),
            'detail'        => $detail,
            'member'        => $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/transaksi/detail-transaksi', $data);
        $this->load->view('member/templates/footer');
    }

    public function riwayat_transaksi()
    {
        $member = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();

        //  API Tripay menampilkan daftar transaksi per member
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
            'title'     => 'AZ-Media | Layanan',
            'member'    => $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array(),
            'layanan'   => $daftar
        );

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/templates/sidebar', $data);
        $this->load->view('member/templates/topbar', $data);
        $this->load->view('member/transaksi/riwayat-transaksi', $data);
        $this->load->view('member/templates/footer');
    }
}
