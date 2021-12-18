<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    private $table = 'transaksi';

    function getAll()
    {
        $this->db->select('transaksi.*, member.nama, member.no_hp, layanan.nama_layanan');
        $this->db->from($this->table);
        $this->db->join('member', 'member.id = transaksi.id_member');
        $this->db->join('layanan', 'layanan.id = transaksi.id_layanan');
        // $this->db->order_by('transaksi.date_trans', 'DESC');
        $query = $this->db->get();
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
    function update($where)
    {
        $this->db->set('status', 'dibayar');
        $this->db->where($where);
        $this->db->update($this->table);
    }
    function delete($where)
    {
        $this->db->delete($this->table, ['id' => $where]);
    }
}
