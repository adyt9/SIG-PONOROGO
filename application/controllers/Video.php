<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['username'])) {
			redirect('Auth');
		}
		$this->load->model("Video_model");
		$this->load->library('form_validation');
	}

	/**
	 * index
	 * Untuk menampilkan data galeri
	 * Pada method ini, kita akan mengambil data dari model dengan memanggil method product_model->getAll().
	 * Lalu kita me-rendernya ke dalam view video/video/list.
	 * @return void
	 */
	public function index()
	{
		$data["title"] = 'Video';
		$data["data_video"] = $this->Video_model->getAll();
		$this->load->view("admin/video/list", $data);
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
		$data["title"] = 'Tambah Video';

		$validation = $this->form_validation;

		$rules = [
			[
				'field' => 'judul',
				'rules' => 'required'
			],
			[
				'field' => 'deskripsi',
				'rules' => 'required'
			],
			[
				'field' => 'url',
				'rules' => 'required'
			]
		];

		$validation->set_rules($rules);

		if ($validation->run()) {
			$this->Video_model->save();
			$this->session->set_flashdata('stsMessage', 'Data Berhasil disimpan');
			redirect('Video');
		}

		$this->load->view("admin/video/new_form", $data);
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

		$data["title"] = 'Edit Video';
		if (!isset($id)) redirect('Video');
		$validation = $this->form_validation;
		$rules = [
			[
				'field' => 'judul',
				'rules' => 'required'
			],
			[
				'field' => 'deskripsi',
				'rules' => 'required'
			],
			[
				'field' => 'url',
				'rules' => 'required'
			]
		];


		$validation->set_rules($rules);

		if ($validation->run()) {
			$this->Video_model->update();
			$this->session->set_flashdata('stsMessage', 'Data Berhasil diupdate');
			redirect('Video');
		}
		$data["data_video"] = $this->Video_model->getById($id);
		if (!$data["data_video"]) show_404();

		$this->load->view("admin/video/edit_form", $data);
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

		if ($this->Video_model->delete($id)) {
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
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data'];
		}
		return false;
	}
}
