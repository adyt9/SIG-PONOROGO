<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
    
    private $tabel_admin = 'tb_admin';
    
    public function __construct()
    {
        parent::__construct();
    }
    public function login($username,$password)
    {
        return $this->db->query("SELECT * FROM {$this->tabel_admin} where username='{$username}' AND password='{$password}' limit 1")->row_array();
    }
    
}
