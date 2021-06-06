<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['username'])) {
			redirect('Auth');
		}
		$this->load->model("Log_model");
		$this->load->library('form_validation');
	}

	/**
	 * index
	 * Untuk menampilkan data log
	 * Pada method ini, kita akan mengambil data dari model dengan memanggil method product_model->getAll().
	 * Lalu kita me-rendernya ke dalam view admin/log/list.
	 * @return void
	 */
	public function index()
	{
		$data["title"] = 'log';
		$data["log"] = $this->Log_model->getAll();
		$this->load->view("admin/log/list", $data);
	}

	/**
	 * delete
	 * untuk menghapus data
	 * Prinsipnya hampir sama seperti method edit(), method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.
	 * Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman log.
	 * @param  mixed $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->Log_model->delete($id)) {
			redirect('log');
		}
	}
	/**
	 * delete
	 * untuk menghapus data berdasarkan checklist
	 * Prinsipnya hampir sama seperti method edit(), method delete() juga membutuhkan $id untuk menentukan data mana yang akan dihapus.
	 * Apabila data berhasil dihapus, maka kita langsung alihkan (redirect()) menuju ke halaman log.
	 * @param  mixed $id
	 * @return void
	 */
	public function delete_checklist()
	{
		$data = $_POST['data'];
		$data = json_decode($data, true);
		$this->Log_model->delete_checklist($data);
	}
}
