<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Icon extends CI_Model
{
    private $tbl_icon = 'tb_icon';

    public function getAll()
    {
        return $this->db->get($this->tbl_icon)->result();
    }
}
