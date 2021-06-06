<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
    CONST FORM_TIDAK_LENGKAP = 0;
    CONST FORM_BERHASIL_DISIMPAN = 1;
    CONST FORM_TIDAK_BERHASIL_DISIMPAN = 2;
    private $tb_kategori = 'tb_kategori';
    private $tb_dinas = 'tb_dinas';
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if(!$this->session->has_userdata('username','id_admin')){
            redirect("Auth");
        }
        
    }
	public function index()
	{
	    $data = array(
	        "judul"          =>  "Data Dinas Parawisata Kota Bima",
	        "nama_brand"     =>  "Visit Bima",
	        "halaman_index"  =>  "Data Kategori",
	        "sub_text_form"  =>  "Mohon Lengkapi Data Pada Form Yang Sudah Tersedia. Khusus Yang Bertanda Bintang Bersifat Wajib Diisi",
	    );
	    $data['jumlah_dt_wisata'] = $this->db->get('tb_wisata')->num_rows();
	    $data['jumlah_dt_agenda'] = $this->db->get('tb_agenda')->num_rows();
	    $data['jumlah_dt_fasilitas'] = $this->db->get('tb_fasilitas')->num_rows();
	    
	    $this->load->view("dashboard/head",$data);
	    $this->load->view("dashboard/menu",$data);
	    $this->load->view("dashboard/tentang_kami",$data);
	    $this->load->view("dashboard/footer",$data);
	}
	/* 
	 * Dashboard/Wisata
	 * CRDU */
	/**
	 * @method g_wisata
	 * @return string
	 * @desc Mendapatkan data wisata
	 */
	public function g_dinas()
	{
	    $res = $this->db->get('tb_dinas');
	    echo json_encode($res->result());
	}
	public function g_kategori_by_id()
	{
	    $this->load->model('M_kategori');
	    $id = $this->input->post("ids");
	    $res = $this->M_kategori->g_kategori_by_id($id);
	    echo json_encode($res);
	}
	public function d_kategori()
	{
	    $this->load->model('M_kategori');
	    $id = $this->input->post('id');
	    $this->M_kategori->query("DELETE FROM {$this->tb_kategori} WHERE id_kategori='{$id}'");
	}
	public function i_about(){
	    $jumlah_data_dinas = $this->db->get('tb_dinas')->num_rows();
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
	    $this->form_validation->set_rules('nama_instansi','Nama Instansi','required');
	    $this->form_validation->set_rules('no_telp','No Telp','required');
	    $this->form_validation->set_rules('email','Email','required');
	    $this->form_validation->set_rules('fb','Facebook','required');
	    $this->form_validation->set_rules('wa','Whatsapp','required');
	    $this->form_validation->set_rules('ig','Instagram','required');
	    $this->form_validation->set_rules('yt','Youtube','required');
	    /*  */
        $data = array(
            'deskripsi'           =>  $this->input->post('deskripsi'),
            'nama_instansi'           =>  $this->input->post('nama_instansi'),
            'no_telp'           =>  $this->input->post('no_telp'),
            'email'           =>  $this->input->post('email'),
            'fb'           =>  $this->input->post('fb'),
            'wa'           =>  $this->input->post('wa'),
            'ig'           =>  $this->input->post('ig'),
            'yt'           =>  $this->input->post('yt')
        );
        
        if($this->form_validation->run()==FALSE){
            echo self::FORM_TIDAK_LENGKAP;
        }else{
            $this->db->query("DELETE FROM ".$this->tb_dinas);
            $query = $this->db->insert($this->tb_dinas,$data);
            if($query){
                echo self::FORM_BERHASIL_DISIMPAN;
            }else{
                echo self::FORM_TIDAK_BERHASIL_DISIMPAN;
            }
        }
	}
	public function u_kategori(){
	    $this->load->model('M_kategori');
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('kategori','Kategori','required');
	    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
	    $data = array(
	        'nama_kategori'      =>  $this->input->post('kategori'),
	        'deskripsi'           =>  $this->input->post('deskripsi'),
	        'icon'           =>  $this->input->post('icon'),
	    );
	    $id = $this->input->post('id_kategori');
	    if($this->form_validation->run()==FALSE){
	        echo self::FORM_TIDAK_LENGKAP;
	    }else{
	        $query = $this->M_kategori->update_kategori($data,$id);
	        if($query >= 0){
	            echo self::FORM_BERHASIL_DISIMPAN;
	        }else{
	            echo self::FORM_TIDAK_BERHASIL_DISIMPAN;
	        }
	    }
	    /*  */
	    
	    
	}
	/* CRUD Kategori
	 * 
	 *  */
}
