<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['username'])) {
			redirect('Auth');
		}
		$this->load->model("kategori_model");
		$this->load->model("M_Icon");
		$this->load->library('form_validation');
	}

	/**
	 * index
	 * Untuk menampilkan data kategori
	 * Pada method ini, kita akan mengambil data dari model dengan memanggil method product_model->getAll().
	 * Lalu kita me-rendernya ke dalam view admin/kategori/list.
	 * @return void
	 */
	public function index()
	{
		$data["title"] = 'Kategori';
		$data["kategori"] = $this->kategori_model->getAll();
		$this->load->view("admin/kategori/list", $data);
	}

	/**
	 * add
	 * untuk menyimpan data kategori, jika validasi berhasil maka method ini akan berfungsi sebagai method untuk menyimpan data
	 * Method ini bertugas untuk menampilkan form add dan menyimpan data ke database. Tentunya dengan memanggil method save() yang ada pada model.
	 * Namun, sebelum memanggil method save(), kita lakukan validasi terlebih dahulu dengan mengeksekusi method run() pada objek $validation.
	 * Jika berhasil, maka pesan "Berhasil disimpan" akan ditampilkan.
	 * @return void
	 */
	public function add()
	{
		$data["icons"] = $this->M_Icon->getAll();
		$data["title"] = 'Tambah Kategori';

		$validation = $this->form_validation;

		$rules = [
			[
				'field' => 'kategori',
				'rules' => 'required'
			],
			[
				'field' => 'deskripsi',
				'rules' => 'required'
			]
		];

		$validation->set_rules($rules);

		if ($validation->run()) {
			$this->kategori_model->save();
			$this->session->set_flashdata('stsMessage', 'Data Berhasil disimpan');
			redirect('Kategori');
		}

		$this->load->view("admin/kategori/new_form", $data);
	}

	/**
	 * edit
	 * untuk memperbarui data kategori, jika validasi berhasil maka method ini akan berfungsi sebagai method untuk memperbarui data
	 * Hampir sama dengan method add(), method edit() juga bertugas untuk menampilkan form dan menyimpan data.
	 * @param  mixed $id
	 * @return void
	 */
	public function edit($id = null)
	{

		$data["icons"] = $this->M_Icon->getAll();
		$data["title"] = 'Edit Kategori';
		if (!isset($id)) redirect('Kategori');
		$validation = $this->form_validation;
		$rules = [
			[
				'field' => 'kategori',
				'rules' => 'required'
			],
			[
				'field' => 'deskripsi',
				'rules' => 'required'
			]
		];

		$validation->set_rules($rules);

		if ($validation->run()) {
			$this->kategori_model->update();
			$this->session->set_flashdata('stsMessage', 'Data Berhasil diupdate');
			redirect('Kategori');
		}
		$data["kategori"] = $this->kategori_model->getById($id);
		if (!$data["kategori"]) show_404();

		$this->load->view("admin/kategori/edit_form", $data);
	}

	/**
	 * delete
	 * untuk menghapus data
	 * Prinsipnya hampir sama seperti method edit(), method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.
	 * Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman Kategori.
	 * @param  mixed $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->kategori_model->delete($id)) {
			redirect('Kategori');
		}
	}
}
