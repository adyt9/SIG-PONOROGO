<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $text_logo = "JOGCOM";
	const LOGIN_GAGAL = 0;
	const LOGIN_BERHASIL = 1;
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('M_Auth');
		$this->load->library('session');
	}
	public function index()
	{
		$data = array(
			"judul"          =>  "Login",
			"nama_brand"     =>  $this->text_logo,
		);
		$this->load->view("auth/login", $data);
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->load->model('M_auth');
		$res = $this->M_auth->login($username, $password);
		if(!is_null($res)){
			$this->session->set_userdata($res);
			echo self::LOGIN_BERHASIL;
		} else {
			echo self::LOGIN_GAGAL;
		}
	}
	public function logout()
	{
		session_destroy();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_admin');
		redirect("Auth");
	}

	public function test()
	{
		echo 123;
	}
}
