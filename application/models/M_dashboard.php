<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    public function getData($data = array())
    {
        if(array_key_exists('order_by', $data)) $this->db->order_by($data['order_by']['field'],$data['order_by']['sort']);
        $query = $this->db->get($data['table']);
        return $query->result();
    }
}