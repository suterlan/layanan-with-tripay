<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Member extends CI_Model
{
    private $table = 'member';

    function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    function update($where, $data)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
}
