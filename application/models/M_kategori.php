<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    private $tbl_kategori = 'tb_kategori';
    public function __construct()
    {
        parent::__construct();
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_kategori_by_id($id)
    {
        $res = $this->db->query("SELECT * FROM {$this->tbl_kategori} WHERE id_kategori = {$id}");
        return $res->result();
    }
    public function update_kategori($data, $id)
    {
        $query = $this->db->where('id_kategori', $id);
        $this->db->update($this->tbl_kategori, $data);
        return $query->affected_rows();
    }
    public function get()
    {
        $this->db->get($this->tbl_kategori)->reuslt;
    }
}
