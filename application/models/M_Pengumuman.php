<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Pengumuman extends CI_Model
{
    private $table = 'pengumuman';

    function getAll()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    function getById($where)
    {
        $query = $this->db->get_where($this->table, ['id' => $where])->row();
        return $query;
    }
}