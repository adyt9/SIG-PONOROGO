<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['username'])) {
			redirect('Auth');
		}
		$this->load->model("Fasilitas_model");
		$this->load->library('form_validation');
	}

	/**
	 * index
	 * Untuk menampilkan data galeri
	 * Pada method ini, kita akan mengambil data dari model dengan memanggil method product_model->getAll().
	 * Lalu kita me-rendernya ke dalam view galeri/fasilitas/list.
	 * @return void
	 */
	public function index()
	{
		$data["title"] = 'Fasilitas';
		$data["data_fasilitas"] = $this->Fasilitas_model->getAll();
		$this->load->view("admin/fasilitas/list", $data);
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
		$data["title"] = 'Tambah Fasilitas';

		$validation = $this->form_validation;

		$rules = [
			[
				'field' => 'fasilitas',
				'rules' => 'required'
			],
			[
				'field' => 'alamat',
				'rules' => 'required'
			]
		];

		$validation->set_rules($rules);

		if ($validation->run()) {
			$file = $this->do_upload();
			$this->Fasilitas_model->save($file['file_name']);
			$this->session->set_flashdata('stsMessage', 'Data Berhasil disimpan');
			redirect('Fasilitas');
		}

		$this->load->view("admin/fasilitas/new_form", $data);
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

		$data["title"] = 'Edit Fasilitas';
		if (!isset($id)) redirect('galeri');
		$validation = $this->form_validation;

		$rules = [
			[
				'field' => 'fasilitas',
				'rules' => 'required'
			],
			[
				'field' => 'alamat',
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
			$this->Fasilitas_model->update($file_name);
			$this->session->set_flashdata('stsMessage', 'Data Berhasil diupdate');
			redirect('Fasilitas');
		}
		$data["data_fasilitas"] = $this->Fasilitas_model->getById($id);
		if (!$data["data_fasilitas"]) show_404();

		$this->load->view("admin/fasilitas/edit_form", $data);
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
		$fasilitasRow = $this->Fasilitas_model->getById($id);
		$this->delete_file($fasilitasRow->gambar_fasilitas);
		if ($this->Fasilitas_model->delete($id)) {
			redirect('Fasilitas');
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
