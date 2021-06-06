<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    private $tbl_admin = 'tb_admin';
    public function __construct()
    {
        parent::__construct();
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_admin_by_id($id)
    {
        $res = $this->db->query("SELECT * FROM {$this->tbl_admin} WHERE id_admin = {$id}");
        return $res->result();
    }
    public function update_admin($data,$id)
    {
        $query = $this->db->where('id_admin', $id);
        $this->db->update($this->tbl_admin, $data);
        return $query->affected_rows();
    }
        
}