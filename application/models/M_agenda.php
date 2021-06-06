<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_agenda extends CI_Model {
    private $tbl_agenda = 'tb_agenda';
    public function __construct()
    {
        parent::__construct();
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_agenda()
    {
        $query = "SELECT *,CONCAT_WS(' - ',DATE_FORMAT(tanggal_mulai,'%d/%m/%Y'),DATE_FORMAT(tanggal_mulai,'%d/%m/%Y')) as tanggal FROM tb_agenda";
        return $query;
    }
    public function g_agenda_by_id($id)
    {
        $res = $this->db->query("SELECT *,CONCAT_WS(' - ',DATE_FORMAT(tanggal_mulai,'%m/%d/%Y'),DATE_FORMAT(tanggal_berakhir,'%m/%d/%Y')) as tanggal FROM {$this->tbl_agenda} WHERE {$this->tbl_agenda}.id_agenda = {$id}");
        return $res->result();
    }
    public function update_agenda($data,$id)
    {
        $query = $this->db->where('id_agenda', $id);
        $this->db->update($this->tbl_agenda, $data);
        return $query->affected_rows();
        
    }
        
}