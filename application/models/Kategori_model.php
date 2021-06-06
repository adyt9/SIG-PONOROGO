<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "tb_kategori";

    public $id_kategori;
    public $nama_kategori;
    public $icon = '32';
    public $deskripsi;

    /**
     * __construct
     * mengakses model log_model
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Log_model');
    }
    /**
     * getAll
     * Method ini akan kita gunakan untuk mendapatkan semua data
     * @return void
     */
    public function getAll()
    {
        $this->db->join('tb_icon', 'tb_icon.id_icon=tb_kategori.icon');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    /**
     * save
     * Method ini akan kita gunakan untuk menyimpan data
     * @return void
     */
    public function save()
    {
        $post = $this->input->post();
        $this->nama_kategori = $post["kategori"];
        $this->deskripsi = $post["deskripsi"];
        $this->icon = $post["icon"];
        $this->Log_model->save('Menambahkan satu buah kategori');
        return $this->db->insert($this->_table, $this);
    }

    /**
     * update
     * Method ini akan kita gunakan untuk memperbarui data
     * @return void
     */
    public function update()
    {
        $post = $this->input->post();
        $this->id_kategori = $post["id_kategori"];
        $this->nama_kategori = $post["kategori"];
        $this->deskripsi = $post["deskripsi"];
        $this->icon = $post["icon"];
        $this->Log_model->save('Memperbarui satu buah kategori dengan id ' . $this->id_kategori);
        return $this->db->update($this->_table, $this, array('id_kategori' => $post['id_kategori']));
    }

    /**
     * delete
     * Method ini akan kita gunakan untuk memperbarui data
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->Log_model->save('Menghapus satu buah kategori dengan id ' . $id);
        return $this->db->delete($this->_table, array("id_kategori" => $id));
    }
}
