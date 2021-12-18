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
    
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($data, $where)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
    
        function delete($where)
    {
        $this->db->delete($this->table, ['id' => $where]);
    }
}
