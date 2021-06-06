<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

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
    private $tb_agenda = 'tb_agenda';
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
	    $this->load->model('M_agenda');
	    $data = array(
	        "judul"          =>  "Data Agenda",
	        "nama_brand"     =>  "Visit Bima",
	        "halaman_index"  =>  "Data Agenda",
	        "sub_text_form"  =>  "Mohon Lengkapi Data Pada Form Yang Sudah Tersedia. Khusus Yang Bertanda Bintang Bersifat Wajib Diisi",
	    );
	    $data['jumlah_dt_wisata'] = $this->db->get('tb_Agenda')->num_rows();
	    $data['jumlah_dt_agenda'] = $this->db->get('tb_agenda')->num_rows();
	    $data['jumlah_dt_fasilitas'] = $this->db->get('tb_fasilitas')->num_rows();
	    
	    $this->load->view("dashboard/head",$data);
	    $this->load->view("dashboard/menu",$data);
	    $this->load->view("dashboard/agenda",$data);
	    $this->load->view("dashboard/footer",$data);
	}
	/* 
	 * Dashboard/Agenda
	 * CRDU */
	/**
	 * @method g_Agenda
	 * @return string
	 * @desc Mendapatkan data Agenda
	 */
	public function g_agenda()
	{
	        /*Menagkap semua data yang dikirimkan oleh client*/
	        
	        /*Sebagai token yang yang dikrimkan oleh client, dan nantinya akan
	         server kirimkan balik. Gunanya untuk memastikan bahwa user mengklik paging
	         sesuai dengan urutan yang sebenarnya */
	        @$draw=$_REQUEST['draw'];
	        
	        /*Jumlah baris yang akan ditampilkan pada setiap page*/
	        @$length=$_REQUEST['length'];
	        
	        /*Offset yang akan digunakan untuk memberitahu database
	         dari baris mana data yang harus ditampilkan untuk masing masing page
	         */
	        @$start=$_REQUEST['start'];
	        
	        /*Keyword yang diketikan oleh user pada field pencarian*/
	        @$search=$_REQUEST['search']["value"];
	        
	        
	        /*Menghitung total desa didalam database*/
	        $total=$this->db->count_all_results($this->tb_agenda);
	        
	        /*Mempersiapkan array tempat kita akan menampung semua data
	         yang nantinya akan server kirimkan ke client*/
	        $output=array();
	        
	        /*Token yang dikrimkan client, akan dikirim balik ke client*/
	        $output['draw']=$draw;
	        
	        /*
	         $output['recordsTotal'] adalah total data sebelum difilter
	         $output['recordsFiltered'] adalah total data ketika difilter
	         Biasanya kedua duanya bernilai sama, maka kita assignment
	         keduaduanya dengan nilai dari $total
	         */
	        $output['recordsTotal']=$output['recordsFiltered']=$total;
	        
	        /*disini nantinya akan memuat data yang akan kita tampilkan
	         pada table client*/
	        $output['data']=array();
	        
	        
	        /*Jika $search mengandung nilai, berarti user sedang telah
	         memasukan keyword didalam filed pencarian*/
	        if($search!=""){
	            $this->db->like("judul_agenda",$search);
	        }
	        
	        
	        /*Lanjutkan pencarian ke database*/
	        $this->db->limit($length,$start);
	        /*Urutkan dari alphabet paling terkahir*/
	        $this->db->order_by('id_agenda','DESC');
	        $query=$this->db->get($this->tb_agenda);
	        
	        
	        /*Ketika dalam mode pencarian, berarti kita harus mengatur kembali nilai
	         dari 'recordsTotal' dan 'recordsFiltered' sesuai dengan jumlah baris
	         yang mengandung keyword tertentu
	         */
	        if($search!=""){
	            $this->db->like("judul_agenda",$search);
	            $jum=$this->db->get($this->tb_agenda);
	            $output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
	        }
	        
	        
	        $nomor_urut=$start+1;
	        foreach ($query->result_array() as $agenda) {
	            $output['data'][]=array($nomor_urut,$agenda['judul_agenda'],date_format(date_create($agenda['tanggal_mulai']),'M/d/Y').' - '.date_format(date_create($agenda['tanggal_berakhir']),'M/d/Y'),"<button class='delete btn btn-danger btn-circle pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light' data-id='{$agenda['id_agenda']}'><i class='fa fa-times'></i></button><button class='edit btn btn-circle btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light' data-id='{$agenda['id_agenda']}'><i class='fa fa-pencil'></i></button>");
	            $nomor_urut++;
	        }
	        
	        echo json_encode($output);
	        
	        
	}
	public function g_agenda_by_id()
	{
	    $this->load->model('M_agenda');
	    $id = $this->input->post("ids");
	    $res = $this->M_agenda->g_agenda_by_id($id);
	    echo json_encode($res);
	}
	public function d_agenda()
	{
	    $this->load->model('M_agenda');
	    $id = $this->input->post('id');
	    $this->M_agenda->query("DELETE FROM tb_agenda WHERE id_agenda='{$id}'");
	}
	public function i_agenda(){
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('agenda','Nama Agenda','required');
	    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
	    $this->form_validation->set_rules('alamat','Alamat','required');
	    $this->form_validation->set_rules('lat','Peta','required');
	    $this->form_validation->set_rules('lng','Peta','required');
	    $this->form_validation->set_rules('tanggal_mulai','Tanggal Mulai','required');
	    $this->form_validation->set_rules('tanggal_berakhir','Tanggal Berakhir','required');
	    $this->form_validation->set_rules('kontak','Kontak','required');
	    
	    
	    /*  */
	    $config['upload_path']="./image"; //path folder file upload
	    $config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
	    $config['encrypt_name'] = TRUE; //enkripsi file name upload
	    
	    $this->load->library('upload',$config); //call library upload
	    if($this->upload->do_upload("gambar")){ //upload file
	        $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
	        
	        $image= $data['upload_data']['file_name']; //set file name ke variable image
	        $data = array(
	            'judul_agenda'      =>  $this->input->post('agenda'),
	            'alamat'            =>  $this->input->post('alamat'),
	            'deskripsi'         =>  $this->input->post('deskripsi'),
	            'latitude'          =>  $this->input->post('lat'),
	            'waktu_mulai'       =>  $this->input->post('waktu_mulai'),
	            'waktu_selesai'     =>  $this->input->post('waktu_selesai'),
	            'longitude'         =>  $this->input->post('lng'),
	            'tanggal_mulai'     =>  $this->input->post('tanggal_mulai'),
	            'tanggal_berakhir'  =>  $this->input->post('tanggal_berakhir'),
	            'gambar'            =>  $image,
	            'id_admin'          =>  $this->session->id_admin,
	            'kontak'            =>  $this->input->post('kontak'),
	        );
	        
	        if($this->form_validation->run()==FALSE){
	            echo self::FORM_TIDAK_LENGKAP;
	        }else{
	            $query = $this->db->insert($this->tb_agenda,$data);
	            if($query){
	                echo self::FORM_BERHASIL_DISIMPAN;
	            }else{
	                echo self::FORM_TIDAK_BERHASIL_DISIMPAN;
	            }
	        }
	        //echo json_decode($result);
	    }
	}
	public function u_agenda(){
	    $this->load->model('M_agenda');
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('agenda','Nama Agenda','required');
	    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
	    $this->form_validation->set_rules('alamat','Alamat','required');
	    $this->form_validation->set_rules('lat','Peta','required');
	    $this->form_validation->set_rules('lng','Peta','required');
	    $this->form_validation->set_rules('tanggal_mulai','Tanggal Mulai','required');
	    $this->form_validation->set_rules('tanggal_berakhir','Tanggal Berakhir','required');
	    
	    /*  */
	    $config['upload_path']="./image"; //path folder file upload
	    $config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
	    $config['encrypt_name'] = TRUE; //enkripsi file name upload
	    
	    $this->load->library('upload',$config); //call library upload
	    if($this->upload->do_upload("gambar")){ //upload file
	    }
        $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
	    $image= $data['upload_data']['file_name']; //set file name ke variable image
	    $data = array(
	        'judul_agenda'      =>  $this->input->post('agenda'),
	        'alamat'            =>  $this->input->post('alamat'),
	        'deskripsi'         =>  $this->input->post('deskripsi'),
	        'latitude'          =>  $this->input->post('lat'),
	        'longitude'         =>  $this->input->post('lng'),
	        'waktu_mulai'       =>  $this->input->post('waktu_mulai'),
	        'waktu_selesai'     =>  $this->input->post('waktu_selesai'),
	        'tanggal_mulai'     =>  $this->input->post('tanggal_mulai'),
	        'tanggal_berakhir'  =>  $this->input->post('tanggal_berakhir'),
	        'id_admin'          =>  $this->session->id_admin,
	        'kontak'            =>  $this->input->post('kontak'),
	    );
	    if($image){
	        $data['gambar'] = $image;
	    }
	    
	    $id = $this->input->post('id_agenda');
	    if($this->form_validation->run()==FALSE){
	        echo self::FORM_TIDAK_LENGKAP;
	    }else{
	        $query = $this->M_agenda->update_agenda($data,$id);
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
	
	public function g_kategori()
	{
	    $res = $this->db->get("tb_kategori");
	    echo json_encode($res->reuslt());
	}

}
