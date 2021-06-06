<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
	public function __construct()
	{
		parent::__construct();
	}

	public function index2()
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori LEFT JOIN tb_icon ON tb_kategori.icon=tb_icon.id_icon");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA PONOROGO<hr/>";
		$data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";

		$this->load->view("user/head2", $data);
		// $this->load->view("user/menu", $data);
		$this->load->view("user/beranda2", $data);
		$this->load->view("user/footer2", $data);
	}
	public function index()
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_slider = $this->M_wisata->query("SELECT * FROM tb_slider");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori LEFT JOIN tb_icon ON tb_kategori.icon=tb_icon.id_icon");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['data_slider'] = $data_slider->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";

		$this->load->view("front/beranda", $data);
	}

	public function peta()
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas LEFT JOIN tb_icon ON tb_fasilitas.id_icon=tb_icon.id_icon");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data['data_wisata'] = $this->M_wisata->getAll(@$_SESSION['data_check']);
		$data['data_wisata_by_nama'] = $this->M_wisata->getAllByName(@$_SESSION['data_check']);
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";

		$this->load->view("front/peta", $data);
	}
	public function getPetaByChecklist()
	{
		$datas = json_decode($_POST['data'], true);
		$data['data_wisata'] = $this->M_wisata->getAll($datas);
		$data['data_wisata_by_nama'] = $this->M_wisata->getAllByName($datas);
		echo json_encode($data);
	}
	public function galeri()
	{
		$data = array(
			"judul"          =>  "Galeri",
			"nama_brand"     =>  "Visit Ponorogo",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_galeri = $this->M_wisata->query("SELECT * FROM tb_galeri");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['data_galeri'] = $data_galeri->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Berikut adalah pilihan foto dari editor untuk membangun wawasan serta mengedukasi pengunjung terkait budaya lokal Kab Ponorogo";
		// $this->load->view("user/head2", $data);
		// //$this->load->view("user/menu",$data);
		// $this->load->view("user/galeri", $data);
		// $this->load->view("user/footer2", $data);
		$this->load->view("front/galeri", $data);
	}
	public function galeri2()
	{
		$data = array(
			"judul"          =>  "Galeri",
			"nama_brand"     =>  "Visit Ponorogo",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_galeri = $this->M_wisata->query("SELECT * FROM tb_galeri");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['data_galeri'] = $data_galeri->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Berikut adalah pilihan foto dari editor untuk membangun wawasan serta mengedukasi pengunjung terkait budaya lokal Kab Ponorogo";
		$this->load->view("user/head2", $data);
		//$this->load->view("user/menu",$data);
		$this->load->view("user/galeri", $data);
		$this->load->view("user/footer2", $data);
	}
	public function videos()
	{
		$data = array(
			"judul"          =>  "Galeri",
			"nama_brand"     =>  "Visit Ponorogo",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_video = $this->M_wisata->query("SELECT * FROM tb_video");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['data_video'] = $data_video->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Berikut adalah pilihan foto dari editor untuk membangun wawasan serta mengedukasi pengunjung terkait budaya lokal Kab Ponorogo";
		// $this->load->view("user/head2", $data);
		// //$this->load->view("user/menu",$data);
		// $this->load->view("user/videos", $data);
		// $this->load->view("user/footer2", $data);
		$this->load->view("front/videos", $data);
	}
	public function videos2()
	{
		$data = array(
			"judul"          =>  "Galeri",
			"nama_brand"     =>  "Visit Ponorogo",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_video = $this->M_wisata->query("SELECT * FROM tb_video");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['data_video'] = $data_video->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Berikut adalah pilihan foto dari editor untuk membangun wawasan serta mengedukasi pengunjung terkait budaya lokal Kab Ponorogo";
		$this->load->view("user/head2", $data);
		//$this->load->view("user/menu",$data);
		$this->load->view("user/videos", $data);
		$this->load->view("user/footer2", $data);
	}
	public function search()
	{
		$data = array(
			"judul"          =>  "Galeri",
			"nama_brand"     =>  "Visit Ponorogo",
		);
		$search = $this->input->post('search');
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata WHERE nama_wisata LIKE '%{$search}%'");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda WHERE judul_agenda LIKE '%{$search}%'");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_video = $this->M_wisata->query("SELECT * FROM tb_video WHERE judul LIKE '%{$search}%'");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['data_video'] = $data_video->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Berikut adalah daftar pencarian anda terkait budaya lokal Kab Ponorogo";
		$this->load->view("user/head2", $data);
		//$this->load->view("user/menu",$data);
		$this->load->view("user/search", $data);
		$this->load->view("user/footer2", $data);
	}
	public function kontak()
	{
		$data = array(
			"judul"          =>  "Kontak",
			"nama_brand"     =>  "Visit Ponorogo",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_dinas = $this->M_wisata->query("SELECT * FROM tb_dinas");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['data_dinas'] = $data_dinas->result();
		$this->load->view("front/aboutus", $data);
	}
	public function kontak2()
	{
		$data = array(
			"judul"          =>  "Kontak",
			"nama_brand"     =>  "Visit Ponorogo",
		);
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_dinas = $this->M_wisata->query("SELECT * FROM tb_dinas");
		$data['data_kategori'] = $data_kategori->result();
		$data['data_dinas'] = $data_dinas->result();
		$this->load->view("user/head2", $data);
		$this->load->view("user/kontak", $data);
		$this->load->view("user/footer2", $data);
	}
	public function wisata($id_kategori)
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_wisata_by_nama = $this->M_wisata->query("SELECT *,tb_wisata.deskripsi as des_wisata,tb_icon.icon as iconx FROM tb_wisata INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori LEFT JOIN tb_icon ON tb_icon.id_icon = tb_kategori.icon WHERE tb_kategori.id_kategori = '{$id_kategori}'");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_wisata_by_nama'] = $data_wisata_by_nama->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";

		$this->load->view("front/wisata", $data);
	}
	public function wisata2($id_kategori)
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data_wisata_by_nama = $this->M_wisata->query("SELECT *,tb_wisata.deskripsi as des_wisata,tb_icon.icon as iconx FROM tb_wisata LEFT JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori LEFT JOIN tb_icon ON tb_icon.id_icon = tb_kategori.icon WHERE tb_kategori.id_kategori = '{$id_kategori}'");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_wisata_by_nama'] = $data_wisata_by_nama->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";
		$this->load->view("user/head2", $data);
		//$this->load->view("user/menu",$data);
		$this->load->view("user/wisata", $data);
		$this->load->view("user/footer2", $data);
	}

	// public function peta2()
	// {
	//     $data = array(
	//         "judul"          =>  "Visit Ponorogo",
	//         "nama_brand"     =>  "Visit Ponorogo",
	//         "halaman_index"  =>  "Dashboard",
	//     );
	//     $data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata");
	//     $data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
	//     $data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas LEFT JOIN tb_icon ON tb_fasilitas.id_icon=tb_icon.id_icon");
	//     $data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
	//     $data_wisata_by_nama = $this->M_wisata->query("SELECT *,tb_wisata.deskripsi as des_wisata,tb_icon.icon as iconx FROM tb_wisata LEFT JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori LEFT JOIN tb_icon ON tb_icon.id_icon = tb_kategori.icon");
	//     $data['data_wisata'] = $data_wisata->result();
	//     $data['data_wisata_by_nama'] = $data_wisata_by_nama->result();
	//     $data['data_agenda'] = $data_agenda->result();
	//     $data['data_fasilitas'] = $data_fasilitas->result();
	//     $data['data_kategori'] = $data_kategori->result();
	//     $data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
	//     $data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";
	//     $this->load->view("user/head2", $data);
	//     //$this->load->view("user/menu",$data);
	//     $this->load->view("user/peta", $data);
	//     $this->load->view("user/footer2", $data);
	// }
	// public function agenda()
	// {
	//     $data = array(
	//         "judul"          =>  "Visit Ponorogo",
	//         "nama_brand"     =>  "Visit Ponorogo",
	//         "halaman_index"  =>  "Dashboard",
	//     );
	//     $data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
	//     $data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
	//     $data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
	//     $data['data_agenda'] = $data_agenda->result();
	//     $data['data_fasilitas'] = $data_fasilitas->result();
	//     $data['data_kategori'] = $data_kategori->result();
	//     $data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
	//     $data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";
	//     $this->load->view("user/head2", $data);
	//     //$this->load->view("user/menu",$data);
	//     $this->load->view("user/agenda", $data);
	//     $this->load->view("user/footer2", $data);
	// }
	public function getAgendaById()
	{
		$a = $this->input->post('data');
		$b = array();
		for ($i = 0; $i < count($a); $i++) {
			array_push($b, $a[$i]['id_agenda']);
		}
		$this->db->or_where_in('id_agenda', $b);
		$res = $this->db->get('tb_agenda');
		echo json_encode($res->result());
	}
	public function fasilitas()
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas LEFT JOIN tb_icon ON tb_fasilitas.id_icon=tb_icon.id_icon");
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data['data_agenda'] = $data_agenda->result();
		$data['data_wisata'] = $data_wisata->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$data['data_kategori'] = $data_kategori->result();
		$data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
		$data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";
		// $this->load->view("user/head2", $data);
		// //$this->load->view("user/menu",$data);
		// $this->load->view("user/fasilitas", $data);
		// $this->load->view("user/footer2", $data);

		$this->load->view("front/fasilitas", $data);
	}

	// public function fasilitas2()
	// {
	//     $data = array(
	//         "judul"          =>  "Visit Ponorogo",
	//         "nama_brand"     =>  "Visit Ponorogo",
	//         "halaman_index"  =>  "Dashboard",
	//     );
	//     $data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
	//     $data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas LEFT JOIN tb_icon ON tb_fasilitas.id_icon=tb_icon.id_icon");
	//     $data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
	//     $data['data_agenda'] = $data_agenda->result();
	//     $data['data_fasilitas'] = $data_fasilitas->result();
	//     $data['data_kategori'] = $data_kategori->result();
	//     $data['text_cover'][] = "SELAMAT DATANG DI SISTEM INFORMASI <br/>WISATA KOTA Ponorogo<hr/>";
	//     $data['text_cover'][] = "Telusuri Jejak Keindahan Alam Nusantara Disini";
	//     $this->load->view("user/head2", $data);
	//     //$this->load->view("user/menu",$data);
	//     $this->load->view("user/fasilitas", $data);
	//     $this->load->view("user/footer2", $data);
	// }

	public function detail_wisata($id_wisata)
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_wisata.id_kategori");
		$data['data_wisata'] = $data_wisata->result();
		$data['detail_wisata'] = $this->M_wisata->g_wisata_by_id($id_wisata);
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data['data_kategori'] = $data_kategori->result();
		$this->load->view("front/detail", $data);
	}
	public function detail_wisata2($id_wisata)
	{
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data['data_wisata'] = $this->M_wisata->g_wisata_by_id($id_wisata);
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data['data_kategori'] = $data_kategori->result();
		$this->load->view("user/head2", $data);
		//$this->load->view("user/menu",$data);
		$this->load->view("user/detail2", $data);
		$this->load->view("user/footer2", $data);
	}
	public function detail_agenda($id_wisata)
	{
		$this->load->model('M_agenda');
		$data = array(
			"judul"          =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data['data_agenda'] = $this->M_agenda->g_agenda_by_id($id_wisata);
		$data_kategori = $this->M_wisata->query("SELECT * FROM tb_kategori");
		$data['data_kategori'] = $data_kategori->result();
		$this->load->view("user/head2", $data);
		//$this->load->view("user/menu",$data);
		$this->load->view("user/detail_agenda2", $data);
		$this->load->view("user/footer2", $data);
	}
	public function informasi_wisata()
	{
		$data = array(
			"judul"          =>  "Informasi Wisata",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data_wisata = $this->M_wisata->query("SELECT * FROM tb_wisata");
		$data_agenda = $this->M_wisata->query("SELECT * FROM tb_agenda");
		$data_fasilitas = $this->M_wisata->query("SELECT * FROM tb_fasilitas");
		$data['data_wisata'] = $data_wisata->result();
		$data['data_agenda'] = $data_agenda->result();
		$data['data_fasilitas'] = $data_fasilitas->result();
		$this->load->view("user/head", $data);
		$this->load->view("user/menu", $data);
		$this->load->view("user/beranda", $data);
		$this->load->view("user/footer", $data);
	}
	public function info_detail($tbl, $id)
	{

		if ($tbl == 'fasi') :
			$field_id = 'id_fasilitas';
			$tbls     = 'tb_fasilitas';
			$page     = 'detail_fasilitas';
		endif;
		if ($tbl == 'wisata') :
			$field_id = 'id_wisata';
			$tbls     = 'tb_wisata';
			$page     = 'detail';
		endif;
		if ($tbl == 'agenda') :
			$field_id = 'id_agenda';
			$tbls     = 'tb_agenda';
			$page     = 'detail_agenda';
		endif;
		$data = array(
			"judul"          =>  "Informasi Wisata",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);

		$this->load->model('M_user');
		$data['data_'] = $this->M_user->g_data_by_id($tbls, $field_id, $id);

		$this->load->view("user/head", $data);
		$this->load->view("user/menu", $data);
		$this->load->view("user/{$page}", $data);
		$this->load->view("user/footer", $data);
	}
	public function video()
	{
		$data = array(
			"judul"          =>  "Video",
			"nama_brand"     =>  "Visit Ponorogo",
			"halaman_index"  =>  "Dashboard",
		);
		$data['video'] = $this->db->get('tb_video')->result();
		$this->load->view("user/head", $data);
		$this->load->view("user/menu", $data);
		$this->load->view("user/video", $data);
		$this->load->view("user/footer", $data);
	}
	public function getDataWisata()
	{
		$res = $this->db->get('tb_wisata')->result();
		echo json_encode($res);
	}
}
