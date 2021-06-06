<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {
    private $tbl_galeri = 'tb_galeri';
    public function __construct()
    {
        parent::__construct();
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_galeri_by_id($id)
    {
        $res = $this->db->query("SELECT * FROM {$this->tbl_galeri} WHERE id_galeri = {$id}");
        return $res->result();
    }
    public function update_galeri($data,$id)
    {
        $query = $this->db->where('id_galeri', $id);
        $this->db->update($this->tbl_galeri, $data);
        return $query->affected_rows();
        
    }
        
}