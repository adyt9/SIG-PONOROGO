<?php defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas_model extends CI_Model
{
    private $_table = "tb_fasilitas";

    public $nama_fasilitas;
    public $gambar_fasilitas;
    public $alamat;
    public $latitude;
    public $longitude;
    public $deskripsi;
    public $id_admin;
    public $kontak;
    public $id_icon;


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
        return $this->db->get_where($this->_table, ["id_fasilitas" => $id])->row();
    }

    /**
     * save
     * Method ini akan kita gunakan untuk menyimpan data
     * @return void
     */
    public function save($file_name)
    {
        $post                   = $this->input->post();
        $this->nama_fasilitas   = $post['fasilitas'];
        $this->alamat           = $post['alamat'];
        $this->deskripsi        = $post['deskripsi'];
        $this->kontak           = $post['kontak'];
        $this->latitude         = $post['lat'];
        $this->longitude        = $post['lng'];
        $this->gambar_fasilitas = $file_name;

        $this->Log_model->save('Menambahkan 1 buah data fasilitas ');
        return $this->db->insert($this->_table, $this);
    }

    /**
     * update
     * Method ini akan kita gunakan untuk memperbarui data
     * @return void
     */
    public function update($file_name)
    {
        $post                   = $this->input->post();
        $this->nama_fasilitas   = $post['fasilitas'];
        $this->alamat           = $post['alamat'];
        $this->deskripsi        = $post['deskripsi'];
        $this->kontak           = $post['kontak'];
        $this->latitude         = $post['lat'];
        $this->longitude        = $post['lng'];
        $this->gambar_fasilitas = $file_name;

        if ($file_name) {
            $this->gambar_fasilitas = $file_name;
        } else {
            $this->gambar_fasilitas = $_POST['gambar_'];
        }

        $this->Log_model->save('Memperbarui galeri dengan id ' . $post['id_fasilitas']);
        return $this->db->update($this->_table, $this, array('id_fasilitas' => $post['id_fasilitas']));
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
        return $this->db->delete($this->_table, array("id_fasilitas" => $id));
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
