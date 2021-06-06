<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    private $_table = "tb_admin";

    public $id_admin;
    public $username;
    public $password;
    public $gambar = 'default.jpg';
    public $email;
    public $role;

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
        return $this->db->get_where($this->_table, ["id_admin" => $id])->row();
    }

    /**
     * save
     * Method ini akan kita gunakan untuk menyimpan data
     * @return void
     */
    public function save($file_name)
    {
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->email = $post["email"];
        $this->password = md5($post["password"]);
        $this->gambar = $file_name;
        $this->role = $post["role"];
        $this->Log_model->save('Menambahkan admin ' . $this->username);
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
        $this->id_admin = $_POST['id_admin'];
        $this->username = $post["username"];
        $this->email = $post["email"];
        $this->password = md5($post["password"]);
        $this->role = $post["role"];

        if ($file_name) {
            $this->gambar = $file_name;
        } else {
            $this->gambar = $_POST['gambar'];
        }

        $this->Log_model->save('Memperbarui admin dengan id ' . $this->id_admin);
        return $this->db->update($this->_table, $this, array('id_admin' => $post['id_admin']));
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
        return $this->db->delete($this->_table, array("id_admin" => $id));
    }
}
