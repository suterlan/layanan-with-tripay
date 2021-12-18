<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    private $_table = 'transaksi';

    function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        $query = $this->db->insert($this->_table, $data);
        return $query;
    }
}
