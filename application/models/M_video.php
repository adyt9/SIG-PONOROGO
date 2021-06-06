<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_video extends CI_Model {
    private $tbl_video = 'tb_video';
    public function __construct()
    {
        parent::__construct();
    }
    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_video_by_id($id)
    {
        $res = $this->db->query("SELECT * FROM {$this->tbl_video} WHERE id_video = {$id}");
        return $res->result();
    }
    public function update_video($data,$id)
    {
        $query = $this->db->where('id_video', $id);
        $this->db->update($this->tbl_video, $data);
        return $query->affected_rows();
        
    }
        
}