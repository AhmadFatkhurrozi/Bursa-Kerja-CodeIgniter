<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data');
		$this->load->helper('me');
		$this->load->helper('tgl_indo');
	}

	public function kembali()
	{

		return $this->input->server('HTTP_REFERER');
	}

	public function is__login()
	{
		if ( count($this->session->userdata('__ci_admin_id')) < 1 ) {
			redirect('admin/login');
		}
	}
	
	function config_email(){
        $config=array(
			    'protocol'=>'smtp',
			    'smtp_host'=>'ssl://mail.jombangdev.com',
			    'smtp_port'=>465,
			    'smtp_user'=>'rozi@jombangdev.com',
			    'smtp_pass'=>'aqqkn6ab',
			    'mailtype'=>'html',
			    );
		    $this->load->library('email',$config);
    }

	public function login()
	{
		$data = '';

		$data['admin'] = $this->load->view('admin/login', $data, TRUE);

		$this->load->view('admin/login', $data, FALSE);
	}

	public function index()
	{
		$this->is__login();
		$this->load->model('M_admin');
		$this->load->model('M_pekerjaan');

		$data = '';
		
		$data['topcomp']	= $this->M_admin->topComp()->result();
		$data['null']		= $this->M_pekerjaan->null();
		$data['smp']		= $this->M_pekerjaan->smp();
		$data['sma']		= $this->M_pekerjaan->sma();
		$data['sarjana']	= $this->M_pekerjaan->sarjana();
		$data['data']	 	= $this->M_admin->gLowongan();
		$data['datapenc']	= $this->M_admin->gPencaker();
		$data['dataper']	= $this->M_admin->gCompany();
		$data['sidebar'] 	= $this->load->view('admin/sidebar', $data, TRUE);

		$this->load->view('admin/index', $data, FALSE);
	}

	public function tema()
	{
		$this->is__login();
		$data = '';

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['tema']  = $this->load->view('admin/tema', $data, TRUE);

		$this->load->view('admin/setting/tema', $data, FALSE);
	}

	// ______________________________________________________________________________________________________

	// DATA pengangguran
	
// 	public function pengangguran()
// 	{
		
// 		$this->is__login();

// 		$this->load->model('M_data');

// 		$data['query_pengangguran']     = $this->M_data->tampil_data('jumlah_pengangguran');

// 		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
// 		$data['lihat']  = $this->load->view('admin/pengangguran/lihat', $data, TRUE);

// 		$this->load->view('admin/pengangguran/menu', $data, FALSE);
// 	}

// 	public function tambahPengangguran()
// 	{
// 		$this->is__login();
// 		$data = '';

// 		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
// 		$data['lihat']  = $this->load->view('admin/pengangguran/tambah', $data, TRUE);

// 		$this->load->view('admin/pengangguran/menu', $data, FALSE);
// 	}

// 	public function tambahkanPengangguran()
// 	{
// 		$this->is__login();

// 		$pengangguran = array(
// 			'ID_PENGANGGURAN'   => '' , 
// 			'TAHUN'				=> $this->input->post('tahun'),
// 			'JUMLAH'    		=> $this->input->post('jumlah') , 
//         );

// 		$this->M_data->create('jumlah_pengangguran',$pengangguran);

// 		$this->session->set_flashdata('msg', 
// 				'<div class="alert alert-success" style="margin-top: 10px;">
// 					<span><i class="fa fa-check"></i> Tambah Data Berhasil!</span>
// 				</div>');

// 		redirect(base_url('admin/pengangguran'));

// 	}

// 	public function hapusPengangguran($id)
// 	{
// 		$this->is__login();

// 		$where = array('ID_PENGANGGURAN' => $id);
// 		$this->M_data->hapus_data($where,'jumlah_pengangguran');

// 		$this->session->set_flashdata('msg', 
// 				'<div class="alert alert-success" style="margin-top: 10px;">
// 					<span><i class="fa fa-check"></i> Hapus Data Berhasil!</span>
// 				</div>');

// 		redirect( $this->kembali() );
// 	}

// 	public function editPengangguran($id)
// 	{
// 		$this->is__login(); 

// 		$this->load->model('M_data');

// 		$where = array('ID_PENGANGGURAN' => $id);

// 		$data['query_pengangguran'] = $this->M_data->edit_data($where,'jumlah_pengangguran')->result();

// 		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
// 		$data['lihat']  = $this->load->view('admin/pengangguran/edit', $data, TRUE);

// 		$this->load->view('admin/pengangguran/menu', $data, FALSE);
// 	}

// 	public function ubahPengangguran()
// 	{
// 		$this->is__login(); 

// 		$this->load->model('M_data');

// 		$id = $this->input->post('id');
// 		$tahun = $this->input->post('tahun');
// 		$jumlah = $this->input->post('jumlah');
	 
// 		$data = array(
// 			'TAHUN' 	=> $tahun,
// 			'JUMLAH' 	=> $jumlah,
// 		);
	 
// 		$where = array(
// 			'ID_PENGANGGURAN' => $id
// 		);
	 
// 		$this->M_data->ubah_data($where,$data,'jumlah_pengangguran');

// 		$this->session->set_flashdata('msg', 
// 				'<div class="alert alert-success" style="margin-top: 10px;">
// 					<span><i class="fa fa-check"></i> Ubah Data Berhasil!</span>
// 				</div>');
		
// 		redirect(base_url('admin/pengangguran'));
// 	}




	// ______________________________________________________________________________________________________

	// DATA KATEGORI
	
	public function kategori()
	{
		
		$this->is__login();

		$this->load->model('M_data');

		$data['query_kategori']     = $this->M_data->tampil_data('kategori');

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/kategori/lihat', $data, TRUE);

		$this->load->view('admin/kategori/menu', $data, FALSE);
	}

	public function tambahKategori()
	{
		$this->is__login();
		$data = '';

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/kategori/tambah', $data, TRUE);

		$this->load->view('admin/kategori/menu', $data, FALSE);
	}

	public function tambahkanKategori()
	{
		$this->is__login();

		$kategori = array(
			'ID_KATEGORI'       => '' , 
			'NAMA_KATEGORI'    	=> $this->input->post('nama_kategori') , 
        );

		$this->M_data->create('kategori',$kategori);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Tambah Data Berhasil!</span>
				</div>');

		redirect(base_url('admin/kategori'));

	}

	public function hapusKategori($id)
	{
		$this->is__login();

		$where = array('ID_KATEGORI' => $id);
		$this->M_data->hapus_data($where,'kategori');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Hapus Data Berhasil!</span>
				</div>');

		redirect( $this->kembali() );
	}

	public function editKategori($id)
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$where = array('id_kategori' => $id);

		$data['query_kategori'] = $this->M_data->edit_data($where,'kategori')->result();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/kategori/edit', $data, TRUE);

		$this->load->view('admin/kategori/menu', $data, FALSE);
	}

	public function ubahKategori()
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$id = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
	 
		$data = array(
			'id_kategori' => $id,
			'nama_kategori' => $nama_kategori,
		);
	 
		$where = array(
			'id_kategori' => $id
		);
	 
		$this->M_data->ubah_data($where,$data,'kategori');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Ubah Data Berhasil!</span>
				</div>');
		
		redirect(base_url('admin/kategori'));
	}


	// ______________________________________________________________________________________________________

	// DATA ADMIN


	public function admin()
	{
		$this->is__login();

		$this->load->model('M_admin');

		$data['query_admin']     = $this->M_admin->tampil();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/akun/admin', $data, TRUE);

		$this->load->view('admin/akun/menu', $data, FALSE);
	}

	public function profil()
	{
		$this->is__login();

		$this->load->model('M_admin');

		$data['query_admin']     = $this->M_admin->profilku();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/akun/profil', $data, TRUE);

		$this->load->view('admin/akun/menu', $data, FALSE);
	}

	public function editprofil()
	{
		$this->is__login();

		$this->load->model('M_admin');

		$data['query_admin']     = $this->M_admin->profilku();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/akun/editprofil', $data, TRUE);

		$this->load->view('admin/akun/menu', $data, FALSE);
	}

	public function uploadProfil()
	{
		$this->is__login(); 

		$this->load->model('M_data');
		
		$id 	= $this->session->userdata('__ci_admin_idad');

		$config['upload_path'] 		= './dist/img/admin/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['file_name'] 		= $this->session->userdata('__ci_admin_id');
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$data 	= array('FOTO_ADMIN'	=> $gambar);
	 
		$where 	= array('ID_ADMIN' 		=> $id);
	 
		$this->M_data->ubah_data($where,$data,'admin');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function ubahProfil()
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$id 	= $this->session->userdata('__ci_admin_id');

		$data = array(
			'NAMA_ADMIN' 	=> $this->input->post('nama') ,
			'TELEPON' 		=> $this->input->post('telepon') ,
		);

		$email = array(
			'EMAIL' 		=> $this->input->post('email') ,
		);
	 
		$where = array('ID_USER' => $id);
	 
		$this->M_data->ubah_data($where,$data,'admin');
		$this->M_data->ubah_data($where,$email, 'user_akun');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Update Data Berhasil!</span>
				</div>');
		
		redirect(base_url('admin/profil'));	

	}


	public function tambahAdmin()
	{
		$this->is__login();

		$data['menu']    = 'admin';

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/akun/tambah', $data, TRUE);

		$this->load->view('admin/akun/menu', $data, FALSE);
	}

	public function tambahkanAdmin()
	{
		$this->is__login();

		$user = array(
			'ID_USER'       => 'AD'.date('YmdHis') , 
			'USERNAME'    	=> $this->input->post('username') , 
			'PASSWORD'      => md5($this->input->post('password')) , 
			'LEVEL_USER'    => 'ADMIN' ,
			'STATUS'		=> 'AKTIF' , 
			'DIBUAT_PADA'   => date('YmdHis') ,
        );

		$this->M_data->create('user_akun', $user);
		 
		$admin = array(
			'ID_ADMIN'    	=> '' ,
			'ID_USER'		=> 'AD'.date('YmdHis') , 
			'NAMA_ADMIN'    => $this->input->post('nama_admin') , 
			'TELEPON'    	=> $this->input->post('telepon') , 
		);

		$this->M_data->create('admin',$admin);

		redirect( $this->kembali() );

	}


	public function aktifkan_admin()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS' => 'AKTIF');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_USER', $id[$i])
							->update('user_akun', $object);
		}
		redirect( $this->kembali() );
	}

	public function nonaktifkan_admin()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS' => 'NONAKTIF');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_USER', $id[$i])
							->update('user_akun', $object);
		}
		redirect( $this->kembali() );
	}


	// DATA PENCAKER


	public function pencaker()
	{
		$this->is__login();

		$this->load->model('M_admin');

		$data['query_pencaker']     = $this->M_admin->pencaker();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/akun/pencaker', $data, TRUE);

		$this->load->view('admin/akun/menu', $data, FALSE);
	}
	
	public function detailPenc($id)
	{
		$this->is__login();

		$data['query_pencaker'] = $this->db->where('ID_PENCAKER', $id)
									   ->join('user_akun', 'user_akun.ID_USER=pencaker.ID_USER')
									   ->get('pencaker');

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/akun/detailpenc', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}

	public function aktifkanPencaker()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS' => 'AKTIF');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_USER', $id[$i])
							->update('user_akun', $object);
		}
		redirect( $this->kembali() );
	}

	public function bekukanPencaker()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS' => 'NONAKTIF');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_USER', $id[$i])
							->update('user_akun', $object);
		}
		redirect( $this->kembali() );
	}

	// DATA PERUSAHAAN

	public function perusahaan()
	{
		$this->is__login();

		$this->load->model('M_admin');

		$data['query_company']     = $this->M_admin->company();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/akun/perusahaan', $data, TRUE);

		$this->load->view('admin/akun/menu', $data, FALSE);
	}

	public function detailComp($id)
	{
		$this->is__login();

		$data['query_comp'] = $this->db->where('ID_PERUSAHAAN', $id)
									   ->join('user_akun', 'user_akun.ID_USER=perusahaan.ID_USER')
									   ->get('perusahaan')
									   ->result();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/pekerjaan/detailComp', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}

	public function detailCompany($id)
	{
		$this->is__login();

		$data['query_comp'] = $this->db->where('ID_PERUSAHAAN', $id)
									   ->join('user_akun', 'user_akun.ID_USER=perusahaan.ID_USER')
									   ->get('perusahaan')
									   ->result();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/pekerjaan/pemberitahuan/detailComp', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}

	public function aktifkanPerusahaan()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS' => 'AKTIF');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_USER', $id[$i])
							->update('user_akun', $object);
		}
		redirect( $this->kembali() );
	}

	public function bekukanPerusahaan()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS' => 'NONAKTIF');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_USER', $id[$i])
							->update('user_akun', $object);
		}
		redirect( $this->kembali() );
	}

	// DATA PEKERJAAN
	
	public function addLowongan()
	{
		$this->is__login();

		$this->load->model('M_admin');

		$data['query_pekerjaan']     = $this->M_admin->validasiLowongan();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/pekerjaan/validasi', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}

	public function detailLow($id)
	{
		$this->is__login();

		$this->load->model('M_admin');

		$where = array('lowongan.ID_LOWONGAN' 	=> $id );

		$data['query_lowongan'] = $this->M_admin->detailLow('lowongan', $where)->result();
		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/pekerjaan/detailLow', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}

	public function detailLowongan($id)
	{
		$this->is__login();

		$this->load->model('M_admin');

		$where = array('lowongan.ID_LOWONGAN' 	=> $id );

		$data['query_lowongan'] = $this->M_admin->detailLow('lowongan', $where)->result();
		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/pekerjaan/pemberitahuan/detailLow', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}
	
	public function pekerjaan()
	{
		$this->is__login();

		$this->load->model('M_pekerjaan');

		$data['query_pekerjaan']     = $this->M_pekerjaan->tampil();

		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/pekerjaan/lihat', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}

	public function validasiLowongan()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS_LOWONGAN' => 'Tervalidasi');

		for($i=0;$i<count($id);$i++){
		    
		    $to = $this->db->select('user_akun.EMAIL')
				   ->where('ID_LOWONGAN', $id[$i])
				   ->join('perusahaan', 'perusahaan.ID_USER=user_akun.ID_USER')
				   ->join('lowongan', 'lowongan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN')
				   ->get('user_akun')
				   ->row()->EMAIL;
					   
    		$comp = $this->db->select('perusahaan.NAMA_PERUSAHAAN')
    					   ->where('lowongan.ID_LOWONGAN' , $id[$i])
    					   ->join('lowongan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
    					   ->get('perusahaan')
    					   ->row()->NAMA_PERUSAHAAN;
		
    		$lowongan = $this->db->where('ID_LOWONGAN' , $id[$i])
    						   ->get('lowongan')
    						   ->row()->JUDUL;
						   
    		$pesan 	= '<h1>Konfirmasi Lowongan pekerjaan</h1>'; 
    		$pesan .= '<h3>Hai <b>'.$comp.',</b></h3>';
    		$pesan .= '<p>Lowongan pekerjaan, <b>'.$lowongan.'</b> yang sudah perusahaan anda posting di Sistem Informasi Bursa Kerja sudah diverifikasi dan ditampilkan di Sistem,</p>';
    		$pesan .= '<hr class="m-y-md">';
    		$pesan .= '<p>Terimakasih</p>';
    		$pesan .= '<br><p>Salam,<br><br><b>SAINTEK UNIPDU</b><br><i>Admin Sistem Informasi Bursa Kerja - DISNAKER JOMBANG</i></p>';
    		
    		$this->query = $this->db
							->where('ID_LOWONGAN', $id[$i])
							->update('lowongan', $object);
							
		    $this->config_email();
    		$this->email->from('disnaker@jombangdev.com', 'Sistem Informasi Bursa Kerja');
    		$this->email->to($to);
            $this->email->subject('Konfirmasi Lowongan Pekerjaan');
            $this->email->message($pesan);
            $this->email->send();
		}
		redirect( $this->kembali() );
	}

	public function rejectLowongan()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');
		

		for($i=0;$i<count($id);$i++){
							
		    $to = $this->db->select('user_akun.EMAIL')
				   ->where('ID_LOWONGAN', $id[$i])
				   ->join('perusahaan', 'perusahaan.ID_USER=user_akun.ID_USER')
				   ->join('lowongan', 'lowongan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN')
				   ->get('user_akun')
				   ->row()->EMAIL;
					   
    		$comp = $this->db->select('perusahaan.NAMA_PERUSAHAAN')
    					   ->where('lowongan.ID_LOWONGAN' , $id[$i])
    					   ->join('lowongan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
    					   ->get('perusahaan')
    					   ->row()->NAMA_PERUSAHAAN;
		
    		$lowongan = $this->db->where('ID_LOWONGAN' , $id[$i])
    						   ->get('lowongan')
    						   ->row()->JUDUL;
						   
    		$pesan 	= '<h1>Konfirmasi Lowongan pekerjaan</h1>'; 
    		$pesan .= '<h3>Hai <b>'.$comp.',</b></h3>';
    		$pesan .= '<p>Lowongan pekerjaan, <b>'.$lowongan.'</b> yang sudah perusahaan anda posting di Sistem Informasi Bursa Kerja tidak memenuhi persyaratan untuk ditampilkan di Sistem,</p>';
    		$pesan .= '<hr class="m-y-md">';
    		$pesan .= '<p>Silahkan memposting lowongan pekerjaan kembali dengan data yang valid. Terimakasih</p>';
    		$pesan .= '<br><p>Salam,<br><br><b>SAINTEK UNIPDU</b><br><i>Admin Sistem Informasi Bursa Kerja - DISNAKER JOMBANG</i></p>';
    
    		$object = array('STATUS_LOWONGAN' => 'Tidak Memenuhi Syarat');
    		
    		$this->query = $this->db
							->where('ID_LOWONGAN', $id[$i])
							->update('lowongan', $object);
							
		    $this->config_email();
    		$this->email->from('disnaker@jombangdev.com', 'Sistem Informasi Bursa Kerja');
    		$this->email->to($to);
            $this->email->subject('Konfirmasi Lowongan Pekerjaan');
            $this->email->message($pesan);
            $this->email->send();
		}
			
		redirect( $this->kembali() );
	}

	public function matikanLowongan()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array('STATUS_LOWONGAN' => 'Dinonaktifkan');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_LOWONGAN', $id[$i])
							->update('lowongan', $object);
		}
		redirect( $this->kembali() );
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}

	public function cetakPencaker() 
	{
		$this->is__login();	
		$this->load->model('M_admin');

		$data['query_pencaker']   = $this->M_admin->pencaker();

		$this->load->view('cetak/pencaker', $data, FALSE);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan-Pencaker.pdf", array('Attachment' => 0));
	}

	public function cetakPerusahaan() 
	{
		$this->is__login();	
		$this->load->model('M_admin');

		$data['query_company']   = $this->M_admin->company();

		$this->load->view('cetak/perusahaan', $data, FALSE);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan-Perusahaan.pdf", array('Attachment' => 0));
	}
	
	public function cetakTopcomp() 
	{
		$this->is__login();	
		$this->load->model('M_admin');

		$data['topcomp']	= $this->M_admin->topComp()->result();

		$this->load->view('cetak/topcomp', $data, FALSE);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan-Top-Perusahaan.pdf", array('Attachment' => 0));
	}

	public function cetakLowongan() 
	{
		$this->is__login();	
		$this->load->model('M_admin');

		$data['query_lowongan']   = $this->M_admin->lowongan();

		$this->load->view('cetak/lowongan', $data, FALSE);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan-lowongan.pdf", array('Attachment' => 0));
	}
	
		public function cetakLowonganpend() 
	{
		$this->is__login();	
		$this->load->model('M_pekerjaan');

		$data['null']		= $this->M_pekerjaan->null();
		$data['smp']		= $this->M_pekerjaan->smp();
		$data['sma']		= $this->M_pekerjaan->sma();
		$data['sarjana']	= $this->M_pekerjaan->sarjana();

		$this->load->view('cetak/lowonganpend', $data, FALSE);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan-lowongan-per-pendidikan.pdf", array('Attachment' => 0));
	}

	public function notifLowongan()
	{
		$this->load->model('M_admin');
		
		$view = $this->input->post('view');
		$data =$this->M_admin->notifLowongan($view);
		echo json_encode($data);
	}

	public function maps($id)
	{
		$this->is__login();

		$data="";

		$data['company'] = $this->db->where('ID_PERUSAHAAN', $id)->get('perusahaan')->row();
		$data['sidebar'] = $this->load->view('admin/sidebar', $data, TRUE);
		$data['lihat']  = $this->load->view('admin/maps', $data, TRUE);

		$this->load->view('admin/pekerjaan/menu', $data, FALSE);
	}
}