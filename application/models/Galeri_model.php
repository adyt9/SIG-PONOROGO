<?php defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{
    private $_table = "tb_galeri";

    public $id_galeri;
    public $judul;
    public $deskripsi;
    public $nama_file = 'default.jpg';

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

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_galeri" => $id])->row();
    }

    /**
     * save
     * Method ini akan kita gunakan untuk menyimpan data
     * @return void
     */
    public function save($file_name)
    {
        $post = $this->input->post();
        $this->judul = $post['judul'];
        $this->deskripsi = $post['deskripsi'];
        $this->nama_file = $file_name;
        $this->Log_model->save('Menambahkan 1 buah gambar ');
        return $this->db->insert($this->_table, $this);
    }

    /**
     * update
     * Method ini akan kita gunakan untuk memperbarui data
     * @return void
     */
    public function update($file_name)
    {
        $post = $this->input->post();
        $this->id_galeri = $post['id_galeri'];
        $this->judul = $post['judul'];
        $this->deskripsi = $post['deskripsi'];

        if ($file_name) {
            $this->nama_file = $file_name;
        } else {
            $this->nama_file = $_POST['gambar_'];
        }

        $this->Log_model->save('Memperbarui galeri dengan id ' . $post['id_galeri']);
        return $this->db->update($this->_table, $this, array('id_galeri' => $post['id_galeri']));
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
        return $this->db->delete($this->_table, array("id_galeri" => $id));
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
