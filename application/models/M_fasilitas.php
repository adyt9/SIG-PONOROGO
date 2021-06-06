<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fasilitas extends CI_Model {
    private $tbl_fasilitas = 'tb_fasilitas';
    public function __construct()
    {
        parent::__construct();
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_fasilitas_by_id($id)
    {
        $res = $this->db->query("SELECT * FROM {$this->tbl_fasilitas} LEFT JOIN tb_icon ON {$this->tbl_fasilitas}.id_icon=tb_icon.id_icon WHERE id_fasilitas = {$id}");
        return $res->result();
    }
    public function update_fasilitas($data,$id)
    {
        $query = $this->db->where('id_fasilitas', $id);
        $this->db->update($this->tbl_fasilitas, $data);
        return $query->affected_rows();
        
    }
        
}