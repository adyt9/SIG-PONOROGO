<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_wisata extends CI_Model
{
    private $tbl_wisata = 'tb_wisata';
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll()
    {
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_wisata.id_kategori');
        if (isset($_POST)) {
            if (array_key_exists('data', $_POST)) {

                $this->db->where_in('tb_wisata.id_kategori', @$_POST['data']);
            }
        }
        return $this->db->get($this->tbl_wisata)->result();
    }

    public function getAllByName($data = false)
    {
        $this->db->select('*,tb_wisata.deskripsi as des_wisata,tb_icon.icon as iconx');
        if (isset($_POST)) {
            if (array_key_exists('data', $_POST)) {

                $this->db->where_in('tb_wisata.id_kategori', @$_POST['data']);
            }
        }
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_wisata.id_kategori', 'left');
        $this->db->join('tb_icon', 'tb_icon.id_icon=tb_kategori.icon', 'left');
        return $this->db->get($this->tbl_wisata)->result();
    }

    public function query($query)
    {
        return $this->db->query($query);
    }
    public function g_wisata_by_id($id)
    {
        $res = $this->db->query("SELECT *,tb_wisata.deskripsi as wisata_deskripsi FROM {$this->tbl_wisata} LEFT JOIN tb_kategori ON tb_wisata.id_kategori = tb_kategori.id_kategori WHERE tb_wisata.id_wisata = {$id}");
        return $res->result();
    }
    public function update_wisata($data, $id)
    {
        $query = $this->db->where('id_wisata', $id);
        $this->db->update($this->tbl_wisata, $data);
        return $query->affected_rows();
    }
}
