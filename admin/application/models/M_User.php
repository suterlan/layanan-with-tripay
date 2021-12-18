<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_User extends CI_Model
{
    private $table = 'user';

    function getAll()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    function getById($where)
    {
        return $this->db->get_where($this->table, ['id' => $where])->row();
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
    function delete($where)
    {
        $this->db->delete($this->table, ['id' => $where]);
    }
}
