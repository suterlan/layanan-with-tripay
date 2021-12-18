<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TripayCallback extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_Transaksi');
    }

    protected $privateKey = 'UPVst-NKMFE-mQllV-Tzmpu-szViL';

    public function handle($request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return 'Invalid signature';
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return 'Invalid callback event, no action was taken';
        }

        $data = json_decode($json, true);
        $reference = $data['reference'];

        $transaksi = $this->M_Transaksi->getById($reference);
        //     ->where('status', 'UNPAID')
        //     ->first();

        if (!$transaksi) {
            return 'transaksi not found or current status is not UNPAID';
        }

        if ((int) $data['total_amount'] !== (int) $transaksi['total_amount']) {
            return 'Invalid amount';
        }
    }
}
