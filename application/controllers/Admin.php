<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect('Auth');
        }
        $this->load->model("Admin_model");
        $this->load->library('form_validation');
    }

    public function rules(){
        return [
            [
                'field' => 'username',
                'lable' => 'Username',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Username  tidak boleh kosong',
                ),
            ],
            [
                'field' => 'email',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Password tidak boleh kosong',
                    'matches' => 'Password tidak cocok'
                ),
            ],
            [
                'field' => 're_password',
                'lable' => 'Password Konfirmasi',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'Password konfirmasi tidak boleh kosong',
                    'matches' => 'Password tidak cocok'
                ),
            ],
            [
                'field' => 'role',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Role tidak boleh kosong',
                ),
            ],
            
        ];
    }
    /**
     * index
     * Untuk menampilkan data Admin
     * Pada method ini, kita akan mengambil data dari model dengan memanggil method product_model->getAll().
     * Lalu kita me-rendernya ke dalam view admin/Admin/list.
     * @return void
     */
    public function index()
    {
        $data["title"] = 'Admin';
        $data["data_admin"] = $this->Admin_model->getAll();
        $this->load->view("admin/admin/list", $data);
    }

    /**
     * add
     * untuk menyimpan data Admin, jika validasi berhasil maka method ini akan berfungsi sebagai method untuk menyimpan data
     * Method ini bertugas untuk menampilkan form add dan menyimpan data ke database. Tentunya dengan memanggil method save() yang ada pada model.
     * Namun, sebelum memanggil method save(), kita lakukan validasi terlebih dahulu dengan mengeksekusi method run() pada objek $validation.
     * Jika berhasil, maka pesan "Berhasil disimpan" akan ditampilkan.
     * @return void
     */
    public function add()
    {
        $data["title"] = 'Tambah Admin';
        $data["error"] = '';

        // $validation = $this->form_validation;

        // $validation->set_rules($this->rules());

        // if ($validation->run()) {

        

        // }

        $this->load->view("admin/admin/new_form", $data);
    }

    /**
     * edit
     * untuk memperbarui data Admin, jika validasi berhasil maka method ini akan berfungsi sebagai method untuk memperbarui data
     * Hampir sama dengan method add(), method edit() juga bertugas untuk menampilkan form dan menyimpan data.
     * @param  mixed $id
     * @return void
     */

    public function add_save(){
        $data["title"] = 'Tambah Admin';
        $file = $this->do_upload();
        if(array_key_exists('error',$file)){
             $this->session->set_flashdata('stsUpload', $file['error']);
             $data['error'] = $file['error'];
        } else{

            $this->Admin_model->save($file['file_name']);
            $this->session->set_flashdata('stsMessage', 'Data Berhasil disimpan');
            redirect('Admin');
        }
        $this->load->view("admin/admin/new_form", $data);
    }

    public function edit($id = null)
    {

        $data["title"] = 'Edit Admin';
        if (!isset($id)) redirect('Admin');
        $validation = $this->form_validation;

        $validation->set_rules($this->rules());

        if ($validation->run()) {
            $file = $this->do_upload();
            
            $this->Admin_model->update($file['file_name']);
            $this->session->set_flashdata('stsMessage', 'Data Berhasil diupdate');
            redirect('Admin');
        }
        $data["data_admin"] = $this->Admin_model->getById($id);
        if (!$data["data_admin"]) show_404();

        $this->load->view("admin/admin/edit_form", $data);
    }

    /**
     * delete
     * untuk menghapus data
     * Prinsipnya hampir sama seperti method edit(), method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.
     * Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman Admin.
     * @param  mixed $id
     * @return void
     */
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->Admin_model->delete($id)) {
            redirect('Admin');
        }
    }
    /**
     * do_upload
     * untuk mengupload file gambar
     * @return void
     */
    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_profil')) {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data'];
        }else{
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }
}