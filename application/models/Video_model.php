<?php defined('BASEPATH') or exit('No direct script access allowed');

class Video_model extends CI_Model
{
    private $_table = "tb_video";

    public $judul;
    public $deskripsi;
    public $url;

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
        return $this->db->get_where($this->_table, ["id_video" => $id])->row();
    }

    /**
     * save
     * Method ini akan kita gunakan untuk menyimpan data
     * @return void
     */
    public function save()
    {
        $post            = $this->input->post();
        $this->judul     = $post['judul'];
        $this->deskripsi = $post['deskripsi'];
        $this->url       = $post['url'];
        $this->Log_model->save('Menambahkan 1 buah video ');
        return $this->db->insert($this->_table, $this);
    }

    /**
     * update
     * Method ini akan kita gunakan untuk memperbarui data
     * @return void
     */
    public function update()
    {
        $post            = $this->input->post();
        $this->id_video     = $post['id_video'];
        $this->judul     = $post['judul'];
        $this->deskripsi = $post['deskripsi'];
        $this->url       = $post['url'];

        $this->Log_model->save('Memperbarui Video dengan id ' . $post['id_video']);
        return $this->db->update($this->_table, $this, array('id_video' => $post['id_video']));
    }

    /**
     * delete
     * Method ini akan kita gunakan untuk memperbarui data
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->Log_model->save('Menghapus admin dengan id ' . $id);
        return $this->db->delete($this->_table, array("id_video" => $id));
    }


    /**
     * count
     * method ini akan kita gunakan untuk mendapatkan jumlah data
     * @return void
     */
    public function count()
    {
        return $this->db->get($this->_table)->num_rows();
    }
}
