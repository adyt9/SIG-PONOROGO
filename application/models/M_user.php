<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    private $tbl_fasilitas = 'tb_fasilitas';
    public function __construct()
    {
        parent::__construct();
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_data_by_id($tbl,$field,$id)
    {
        $res = $this->db->query("SELECT * FROM $tbl WHERE $field = $id");
        return $res->result();
    }
    public function update_fasilitas($data,$id)
    {
        $query = $this->db->where('id_fasilitas', $id);
        $this->db->update($this->tbl_fasilitas, $data);
        return $query->affected_rows();
        
    }
        
}