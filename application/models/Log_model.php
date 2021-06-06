<?php defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{
    private $_table = "tb_log";

    public $id;
    public $id_admin;
    public $aktifitas;

    /**
     * getAll
     * Method ini akan kita gunakan untuk mendapatkan semua data
     * @return void
     */
    public function getAll()
    {
        $this->db->join('tb_admin', 'tb_admin.id_admin=tb_log.id_admin', 'left');
        return $this->db->get($this->_table)->result();
    }

    /**
     * getById
     * Method ini akan kita gunakan untuk mendapatkan data berdasarkan id
     * @param  mixed $id
     * @return void
     */
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    /**
     * save
     * Method ini akan kita gunakan untuk menyimpan data
     * @param  mixed $aktifitas
     * @return void
     */
    public function save($aktifitas)
    {
        $this->id_admin = $_SESSION['id_admin'];
        $this->aktifitas = $aktifitas;
        return $this->db->insert($this->_table, $this);
    }


    /**
     * delete
     * Method ini akan kita gunakan untuk menghapus data
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    public function delete_checklist($ids)
    {
        $this->db->where_in('id', $ids);
        $this->db->delete($this->_table);
    }
}
