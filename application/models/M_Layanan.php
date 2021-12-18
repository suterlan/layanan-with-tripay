<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Layanan extends CI_Model
{
    private $table = 'layanan';

    function getAll()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getLayananVideo()
    {
        return $this->db->get_where($this->table, ['nama_layanan' => 'Video Promotion'])->row_array();
    }

    public function getLayananWebsite()
    {
        return $this->db->get_where($this->table, ['nama_layanan' => 'Website'])->row_array();
    }

    public function getLayananSosial()
    {
        return $this->db->get_where($this->table, ['nama_layanan' => 'Social Media Management'])->row_array();
    }
    public function getLayananById($where)
    {
        return $this->db->get_where($this->table, ['id' => $where])->row_array();
    }
}
