<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['username'])) {
			redirect('Auth');
		}
		$this->load->model("Wisata_model");
		$this->load->model("Fasilitas_model");
		$this->load->model("Galeri_model");
		$this->load->model("Video_model");
		$this->load->library('form_validation');
	}

	/**
	 * index
	 * Untuk menampilkan data dashboard
	 * Pada method ini, kita akan mengambil data dari model dengan memanggil method product_model->getAll().
	 * Lalu kita me-rendernya ke dalam view dashboard/dashboard/list.
	 * @return void
	 */
	public function index()
	{
		$data["title"] = 'Dashboard';
		$data["total_wisata"] = $this->Wisata_model->count();
		$data["total_fasilitas"] = $this->Fasilitas_model->count();
		$data["total_galeri"] = $this->Galeri_model->count();
		$data["total_video"] = $this->Video_model->count();
		$this->load->view("admin/dashboard/index", $data);
	}
}
