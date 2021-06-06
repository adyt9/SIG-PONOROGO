<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_model extends CI_Model
{
    private $_table = "tb_wisata";

    public $id_wisata;
    public $nama_wisata;
    public $alamat_wisata;
    public $deskripsi;
    public $latitude;
    public $longitude;
    public $id_admin;
    public $id_gambar = 'default.jpg';
    public $id_kategori;
    public $id_fasilitas;



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
        $this->db->select('*,tb_wisata.deskripsi as deskripsi_wisata,tb_icon.icon as icon_name ', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_wisata.id_kategori', 'left');
        $this->db->join('tb_icon', 'tb_icon.id_icon=tb_kategori.icon');
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
        return $this->db->get_where($this->_table, ["id_wisata" => $id])->row();
    }

    /**
     * save
     * Method ini akan kita gunakan untuk menyimpan data
     * @return void
     */
    public function save($file_name)
    {
        $post                = $this->input->post();
        $this->nama_wisata   = $post['nama_wisata'];
        $this->alamat_wisata = $post['alamat'];
        $this->deskripsi     = $post['deskripsi'];
        $this->latitude      = $post['lat'];
        $this->longitude     = $post['lng'];
        $this->buka     = $post['buka'];
        $this->tutup     = $post['tutup'];
        $this->kontak     = $post['kontak'];
        $this->id_gambar     = $post['gambar'];
        $this->id_fasilitas   = $post['fasilitas'];
        $this->id_kategori   = $post['id_kategori'];
        $this->id_admin   = $_SESSION['id_admin'];
        $this->facebook = $post['facebook'];
        $this->twitter = $post['twitter'];
        $this->instagram = $post['twitter'];

        if ($file_name != '') {
            $this->id_gambar = $file_name;
        }

        $this->Log_model->save('Menambahkan 1 buah data wisata ');
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
        $this->id_wisata   = $post['id_wisata'];
        $this->nama_wisata   = $post['nama_wisata'];
        $this->alamat_wisata = $post['alamat'];
        $this->deskripsi     = $post['deskripsi'];
        $this->latitude      = $post['lat'];
        $this->longitude     = $post['lng'];
        $this->buka     = $post['buka'];
        $this->tutup     = $post['tutup'];
        $this->kontak     = $post['kontak'];
        $this->id_fasilitas   = $post['fasilitas'];
        $this->id_kategori   = $post['id_kategori'];
        $this->id_admin   = $_SESSION['id_admin'];
        $this->facebook = $post['facebook'];
        $this->twitter = $post['twitter'];
        $this->instagram = $post['twitter'];
        if ($file_name) {
            $this->id_gambar = $file_name;
        } else {
            $this->id_gambar = $post['gambar_'];
        }

        $this->Log_model->save('Memperbarui galeri dengan id ' . $post['id_wisata']);
        return $this->db->update($this->_table, $this, array('id_wisata' => $post['id_wisata']));
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
        return $this->db->delete($this->_table, array("id_wisata" => $id));
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
