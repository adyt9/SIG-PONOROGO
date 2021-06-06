<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['username'])) {
			redirect('Auth');
		}
		$this->load->model("Galeri_model");
		$this->load->library('form_validation');
	}

	/**
	 * index
	 * Untuk menampilkan data galeri
	 * Pada method ini, kita akan mengambil data dari model dengan memanggil method product_model->getAll().
	 * Lalu kita me-rendernya ke dalam view galeri/galeri/list.
	 * @return void
	 */
	public function index()
	{
		$data["title"] = 'Galeri';
		$data["data_galeri"] = $this->Galeri_model->getAll();
		$this->load->view("admin/galeri/list", $data);
	}

	/**
	 * add
	 * untuk menyimpan data galeri, jika validasi berhasil maka method ini akan berfungsi sebagai method untuk menyimpan data
	 * Method ini bertugas untuk menampilkan form add dan menyimpan data ke database. Tentunya dengan memanggil method save() yang ada pada model.
	 * Namun, sebelum memanggil method save(), kita lakukan validasi terlebih dahulu dengan mengeksekusi method run() pada objek $validation.
	 * Jika berhasil, maka pesan "Berhasil disimpan" akan ditampilkan.
	 * @return void
	 */
	public function add()
	{
		$data["title"] = 'Tambah galeri';

		$validation = $this->form_validation;

		$rules = [
			[
				'field' => 'judul',
				'rules' => 'required'
			],
			[
				'field' => 'deskripsi',
				'rules' => 'required'
			]
		];

		$validation->set_rules($rules);

		if ($validation->run()) {
			$file = $this->do_upload();
			$this->Galeri_model->save($file['file_name']);
			$this->session->set_flashdata('stsMessage', 'Data Berhasil disimpan');
			redirect('galeri');
		}

		$this->load->view("admin/galeri/new_form", $data);
	}

	/**
	 * edit
	 * untuk memperbarui data galeri, jika validasi berhasil maka method ini akan berfungsi sebagai method untuk memperbarui data
	 * Hampir sama dengan method add(), method edit() juga bertugas untuk menampilkan form dan menyimpan data.
	 * @param  mixed $id
	 * @return void
	 */
	public function edit($id = null)
	{

		$data["title"] = 'Edit galeri';
		if (!isset($id)) redirect('galeri');
		$validation = $this->form_validation;
		$rules = [
			[
				'field' => 'judul',
				'rules' => 'required'
			],
			[
				'field' => 'deskripsi',
				'rules' => 'required'
			]
		];

		$validation->set_rules($rules);

		if ($validation->run()) {
			$file = $this->do_upload();
			$file_name = '';
			if ($file) {
				$file_name = $file['file_name'];
				$this->delete_file($_POST['gambar_']);
			}
			$this->Galeri_model->update($file_name);
			$this->session->set_flashdata('stsMessage', 'Data Berhasil diupdate');
			redirect('galeri');
		}
		$data["data_galeri"] = $this->Galeri_model->getById($id);
		if (!$data["data_galeri"]) show_404();

		$this->load->view("admin/galeri/edit_form", $data);
	}

	/**
	 * delete
	 * untuk menghapus data
	 * Prinsipnya hampir sama seperti method edit(), method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.
	 * Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman galeri.
	 * @param  mixed $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$galery = $this->Galeri_model->getById($id);
		$this->delete_file($galery->nama_file);
		if ($this->Galeri_model->delete($id)) {
			redirect('galeri');
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
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data'];
		}
		return false;
	}
	public function delete_file($file_name)
	{
		if (unlink('uploads/' . $file_name)) {
			echo "The file has been deleted";
		}
	}
}
