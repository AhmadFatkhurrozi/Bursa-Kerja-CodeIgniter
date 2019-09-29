<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencaker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('me');
		$this->load->helper('tgl_indo');
		$this->load->helper(array('form', 'url'));

		//	Load library
		$config['first_link']      = 'Pertama';
		$config['last_link']       = 'Terakhir';
		$config['next_link']       = 'Selanjutnya';
		$config['prev_link']       = 'Sebelumnya';
		$config['full_tag_open']   = '<nav><ul class="pagination justify-content-end">';
		$config['full_tag_close']  = '</ul></nav>';
		$config['num_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']   = '</span></li>';
		$config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '</span></li>';
		$config['next_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '</span></li>';
		$config['prev_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']  = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';

		$this->load->library('pagination', $config);
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

	public function is__login()
	{
		if ( count($this->session->userdata('__ci_pencaker_id')) < 1 ) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i> Silahkan Login, atau Daftar terlebih dahulu jika belum mempunyai akun!</span>
				</div>');
			redirect(base_url('akun'));
		}
	}

	public function kembali()
	{

		return $this->input->server('HTTP_REFERER');	
	}

	public function index()
	{
		$this->is__login();
		$this->load->model('M_kategori');
		$this->load->model('M_admin');
		$this->load->model('M_pekerjaan');
		$this->load->library('calendar');

		$data['menu']   = '';

		$data['topcomp']		= $this->M_admin->topComp()->result();
		$data['null']			= $this->M_pekerjaan->null();
		$data['smp']			= $this->M_pekerjaan->smp();
		$data['sma']			= $this->M_pekerjaan->sma();
		$data['sarjana']		= $this->M_pekerjaan->sarjana();
		$data['query_lowongan'] = $this->M_kategori->beranda();
		$data['kalender']		= $this->calendar->generate();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['header'] 		= $this->load->view('pencaker/header', $data, TRUE);
		$data['slider'] 		= $this->load->view('pencaker/slider', $data, TRUE);
		$data['footer'] 		= $this->load->view('footer', $data, TRUE);

		$this->load->view('pencaker/home', $data, FALSE);
	}


	// -----------------------------------------------------------------------

	// ------------------------------PROFIL-----------------------------------
	
	public function register()
	{
		$data = '';

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/register', $data, TRUE);

		$this->load->view('pencaker/register', $data, FALSE);
	}

	public function profil()
	{
		$this->is__login();

		$this->load->model('M_pencaker');
		$this->load->model('M_kategori');

		$data['menu']   = 'profil';

		$data['query_pencaker'] = $this->M_pencaker->edit_data();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/profil/profil', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function editProfil()
	{
		$this->is__login(); 

		$this->load->model('M_pencaker');
		$this->load->model('M_kategori');

		$data['menu']   = 'profil';

		$data['query_pencaker'] = $this->M_pencaker->edit_data();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/profil/editProfil', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function uploadProfil()
	{
		$this->is__login(); 

		$this->load->model('M_data');
		
		$id 	= $this->session->userdata('__ci_pencaker_idpk');

		$config['upload_path'] 		= './dist/img/pencaker/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['file_name'] 		= $this->session->userdata('__ci_pencaker_id');
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$data 	= array('FOTO'			=> $gambar);
	 
		$where 	= array('ID_PENCAKER' 	=> $id);
	 
		$this->M_data->ubah_data($where,$data,'pencaker');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function uploadKtp()
	{
		$this->is__login(); 

		$this->load->model('M_data');
		
		$id 	= $this->session->userdata('__ci_pencaker_idpk');

		$config['upload_path'] 		= './dist/img/pencaker/ktp/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['file_name'] 		= 'ktp'.$this->session->userdata('__ci_pencaker_id');
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('ktp');
		$gambar = $this->upload->data("file_name");

		$data 	= array('FOTO_KTP'		=> $gambar);
	 
		$where 	= array('ID_PENCAKER' 	=> $id);
	 
		$this->M_data->ubah_data($where,$data,'pencaker');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function ubahProfil()
	{
		$this->is__login(); 

		$this->load->model('M_data');
		$this->load->model('M_kategori');

		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();

		$id 	= $this->session->userdata('__ci_pencaker_id');

		$data = array(
			'NIK' 			=> $this->input->post('nik') ,
			'NAMA_PENCAKER' => $this->input->post('namalengkap') ,
			'JK' 			=> $this->input->post('jk') ,
			'TEMPAT_LAHIR' 	=> $this->input->post('tempatlahir') ,
			'TGL_LAHIR' 	=> $this->input->post('tgllahir') ,
			'STATUS_KAWIN'  => $this->input->post('status_kawin') ,
			'AGAMA' 		=> $this->input->post('agama') ,
			'TELEPON' 		=> $this->input->post('telepon') ,
			'ALAMAT' 		=> $this->input->post('alamat') ,
		);

		$email = array(
			'EMAIL' 		=> $this->input->post('email') ,
		);
	 
		$where = array('ID_USER' => $id);
	 
		$this->M_data->ubah_data($where,$data,'pencaker');
		$this->M_data->ubah_data($where,$email, 'user_akun');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Update Data Berhasil!</span>
				</div>');
		
		redirect(base_url('pencaker/profil'));	

	}


	// Lowongan
	//--------------------------------------------------------------------------------------

	public function lowongan()
	{
		$this->load->model('M_pekerjaan');
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

        $config['base_url'] 	= site_url('pencaker/lowongan'); 
        $config['total_rows'] 	= $this->db->count_all('lowongan'); 
        $config['per_page'] 	= 5;  
        $config["uri_segment"] 	= 3;  
        $choice 				= $config["total_rows"] / $config["per_page"];
        $config["num_links"] 	= floor($choice);
 
        $this->pagination->initialize($config);

        $data['page'] 			= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['query_lowongan'] = $this->M_pekerjaan->join3($config["per_page"],$data['page'])->result();  
        $data['pagination'] 	= $this->pagination->create_links();

		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['menu']   = 'semua';
		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/lowongan/lowongan', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function lowonganKat($id)
	{
		$this->load->model('M_pekerjaan');
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$where = array( 'lowongan.ID_KATEGORI' 	=> $id );

		$config['base_url'] 	= site_url('pencaker/lowonganKat/'.$id.'/'); 
        $config['total_rows'] 	= $this->db->count_all('lowongan'); 
        $config['per_page'] 	= 5;  
        $config["uri_segment"] 	= 4;  
        $choice 				= $config["total_rows"] / $config["per_page"];
        $config["num_links"] 	= floor($choice);
 
        $this->pagination->initialize($config);

        $data['page'] 			= ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['query_lowongan'] = $this->M_pekerjaan->lowonganKat($where,$config["per_page"],$data['page'])
        										    ->result();  
        $data['pagination'] 	= $this->pagination->create_links();
        
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['menu']   = $this->uri->segment(3);	
		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/lowongan/lowongan', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}


	public function lowonganSearch()
	{
		$this->load->model('M_data');
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$data['keyword']=   $this->input->post('cari');

		$data['query_lowongan'] = $this->M_data->cari($data['keyword']);
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['menu']   = 'semua';
		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/lowongan/pencarian', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function lowonganDetail($id)
	{
		$this->load->model('M_pekerjaan');
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$where = array('lowongan.ID_LOWONGAN' 	=> $id );

		$data['menu']			= 'kategori';

		$data['query_lowongan'] = $this->M_pekerjaan->detail('lowongan', $where)->result();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/lowongan/detail', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	// -----------------------------------------------------------------------

	// -------------------------------BID-------------------------------------

	public function bid()
	{
		$this->is__login();

		$this->load->model('M_pencaker');
		$this->load->model('M_kategori');
		$this->load->model('M_pekerjaan');

		$id 	= $this->session->userdata('__ci_pencaker_idpk');

		$where 	= array('bid.ID_PENCAKER' => $id );
		
		$data['menu']   = 'lamaran';

		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_bid']		= $this->M_pekerjaan->bid($where, 'bid');
		$data['query_pencaker'] = $this->M_pencaker->edit_data(); 

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/lamaranku/bid', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function kirimBid($id)
	{
		$this->is__login();
		$this->load->model('M_data');

		$idpk 	  = $this->session->userdata('__ci_pencaker_idpk');

		$idpr_bid = $this->db->where('ID_LOWONGAN', $id)
						     ->join('lowongan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
						   	 ->get('perusahaan')
						   	 ->row()->ID_PERUSAHAAN;

		$where = $this->db->where('ID_PENCAKER', $idpk )
						  ->where('ID_LOWONGAN', $id)
						  ->get('bid');
		
		if ($where->num_rows() == 0 ) {

			$idbid = 'BID'.date('YmdHis'); 

			$bid = array(
				'ID_BID'        	=> $idbid , 
				'ID_PENCAKER'   	=> $idpk ,
				'ID_PERUSAHAAN'   	=> $idpr_bid , 
				'ID_LOWONGAN'   	=> $id , 
				'TGL_BID'   		=> date('Ymd') ,
	        );

	        $log = array(
	        	'ID_PENCAKER'   	=> $idpk ,
	        	'ID_PERUSAHAAN'   	=> $idpr_bid ,
	        	'ID_BID'			=> $idbid, 
	        	'ID_LOWONGAN'   	=> $id , 
	        	'TGL_BID'   		=> date('Ymd') ,
	        	'STATUS_HISTORY'	=> 'Menunggu'
	        );
			 
			$comp 		= $this->db->select('perusahaan.NAMA_PERUSAHAAN')
								   ->where('lowongan.ID_LOWONGAN' , $id)
								   ->join('lowongan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
								   ->get('perusahaan')
								   ->row()->NAMA_PERUSAHAAN;

			$penc 		= $this->session->userdata('__ci_pencaker_nama');

			$to 		= $this->db->select('user_akun.EMAIL')
								   ->where('ID_LOWONGAN', $id)
								   ->join('perusahaan', 'perusahaan.ID_USER=user_akun.ID_USER')
								   ->join('lowongan', 'lowongan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN')
								   ->get('user_akun')
								   ->row()->EMAIL;

			$lowongan 	= $this->db->where('ID_LOWONGAN' , $id)
								   ->get('lowongan')
								   ->row()->JUDUL;

			$pesan 	= '<h1>LAMARAN KERJA MASUK</h1>'; 
			$pesan .= '<h3>Hai <b>'.$comp.',</b></h3>';
			$pesan .= '<p><b>'.$penc.'</b> mengirimkan lamaran pekerjaan terhadap lowongan <b>'.$lowongan.'</b> yang sudah perusahaan anda posting di Sistem Informasi Bursa Kerja.</p>';
			$pesan .= '<hr class="m-y-md">';
			$pesan .= '<p>Silahkan untuk segera melakukan review lamaran tersebut. Terimakasih</p>';
			$pesan .= '<center><a href="'.base_url().'company/bid" style="padding: 10px; color: white; background-color : blue; text-decoration: none;">REVIEW</a></center>';
			$pesan .= '<br><p>Salam,<br><br><b>SAINTEK UNIPDU</b><br><i>Admin Sistem Informasi Bursa Kerja - DISNAKER JOMBANG</i></p>';

		    $this->config_email();
		    $this->email->from('disnaker@jombangdev.com', 'Sistem Informasi Bursa Kerja');
			$this->email->to($to);
            $this->email->subject('Lamaran Kerja Masuk');
            $this->email->message($pesan);
            $this->email->send();

           
            $this->M_data->create('bid', $bid);
            $this->M_data->create('history', $log);

			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> BID berhasil dikirim!</span>
				</div>');

			redirect( $this->kembali() );

		}
		
	}

	public function history()
	{
		$this->is__login();

		$this->load->model('M_pencaker');
		$this->load->model('M_kategori');

		$id 	= $this->session->userdata('__ci_pencaker_idpk');

		$where 	= array('history.ID_PENCAKER' => $id );
		
		$data['menu']   = 'history';

		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_bid']		= $this->M_pencaker->log($where, 'history')->result();
		$data['query_pencaker'] = $this->M_pencaker->edit_data(); 

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/lamaranku/history', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function hapusBid($id)
	{
		$this->load->model('M_data');

		$idpk 	  = $this->session->userdata('__ci_pencaker_idpk');
	
		$where    = array(	'ID_BID' 	=> $id);
		$log   	  = array(	
							'TGL_BID'   	=> date('Ymd'),
	        				'STATUS_HISTORY'=> 'dibatalkan'
	        			  );

		$this->M_data->hapus_data($where,'bid');
		$this->M_data->ubah_data($where, $log,'history');

		redirect( $this->kembali() );
	}

	public function detailCOmp($id)
	{
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$data['menu']   = '';

		$data['query_pencaker'] = $this->M_pencaker->edit_data();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_profil']   = $this->db->join('user_akun', 'user_akun.ID_USER=perusahaan.ID_USER')
								->where('ID_PERUSAHAAN', $id)
								->get('perusahaan');

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['lihat']	= $this->load->view('pencaker/lowongan/detailComp', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function review()
	{
		$this->is__login();

		$this->load->model('M_kategori');
		$this->load->model('M_pekerjaan');
		$this->load->model('M_pencaker');

		$id 	= $this->session->userdata('__ci_pencaker_idpk');

		$where 	= array('bid.ID_PENCAKER' => $id );
		
		$data['menu']   = 'review';

		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_bid']		= $this->M_pekerjaan->review($where, 'lowongan')->result();
		$data['query_pencaker'] = $this->M_pencaker->edit_data(); 

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/lamaranku/review', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function get_notification()
	{
		$this->load->model('M_pencaker');

		$view = $this->input->post('view');
		$data =$this->M_pencaker->get_notification($view);
		echo json_encode($data);
	}


	// -----------------------------------------------------------------------

	// ----------------------------PENDIDIKAN---------------------------------

	public function pendidikan()
	{
		$this->is__login();

		$this->load->model('M_pencaker');
		$this->load->model('M_kategori');

		$data['menu']   = 'pendidikan';		
		
		$data['query_pencaker'] 	= $this->M_pencaker->edit_data();
		$data['query_pendidikan']   = $this->M_pencaker->pendidikan();
		$data['query_kategori'] 	= $this->M_kategori->kategori();
		$data['all']				= $this->M_kategori->semua();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/pendidikan/pendidikan', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function tambahPend()
	{
		$this->is__login();

		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$data['menu']   = 'pendidikan';
		
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/pendidikan/tambah', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function tambahkanPend()
	{
		$this->is__login();
		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/pencaker/pendidikan/';
		$config['allowed_types'] 	= 'jpg|png|gif|pdf';
		$config['file_name'] 		= time();
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$pend = array(
			'ID_PENDIDIKAN' 		=> '',
			'ID_PENCAKER'   		=> $this->session->userdata('__ci_pencaker_idpk'), 
			'TINGKAT_PENDIDIKAN'    => $this->input->post('tingkat') , 
			'NAMA_SEKOLAH'      	=> $this->input->post('namasekolah') ,
			'ALAMAT_SEKOLAH'      	=> $this->input->post('alamat') , 
			'JURUSAN'    			=> $this->input->post('jurusan') , 
			'TAHUN_MASUK'   		=> $this->input->post('masuk') , 
			'TAHUN_LULUS'   		=> $this->input->post('keluar') , 
			'LAMPIRAN'				=> $gambar
        );

		$this->M_data->create('pendidikan', $pend);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil menambah data!</span>
				</div>');

		redirect(base_url('pencaker/pendidikan'));
	}

	public function uploadPend()
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/pencaker/pendidikan/';
		$config['allowed_types'] 	= 'jpg|png|gif|pdf';
		$config['file_name'] 		= 'pend'.$this->uri->segment(3);
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$data 	= array('LAMPIRAN'		=> $gambar);
	 
		$where 	= array('ID_PENDIDIKAN' => $this->uri->segment(3));
	 
		$this->M_data->ubah_data($where,$data,'pendidikan');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Lampiran Terupload!</span>
				</div>');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function editPend($id)
	{
		$this->is__login(); 

		$this->load->model('M_data');
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$where = array('ID_PENDIDIKAN' => $id);

		$data['menu']   = 'pendidikan';

		$data['query_pendidikan'] 	= $this->M_data->edit_data($where,'pendidikan')->result();
		$data['query_kategori'] 	= $this->M_kategori->kategori();
		$data['all']				= $this->M_kategori->semua();
		$data['query_pencaker'] 	= $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/pendidikan/edit', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function ubahPend()
	{
		$this->is__login(); 

		$this->load->model('M_data');
	
		$id 	= $this->input->post('id_pendidikan');
	 
		$data 	= array(
			'ID_PENDIDIKAN'			=> $id,
			'TINGKAT_PENDIDIKAN' 	=> $this->input->post('tingkat') ,
			'NAMA_SEKOLAH' 			=> $this->input->post('namasekolah') ,
			'JURUSAN' 				=> $this->input->post('jurusan') ,
			'ALAMAT_SEKOLAH' 		=> $this->input->post('alamat') ,
			'TAHUN_MASUK' 			=> $this->input->post('masuk') ,
			'TAHUN_LULUS' 			=> $this->input->post('keluar') ,
		);
	 
		$where = array('ID_PENDIDIKAN' => $id);

		$this->M_data->ubah_data($where,$data,'pendidikan');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Update Data Berhasil!</span>
				</div>');
		
		redirect(base_url('pencaker/pendidikan'));
	}

	public function hapusPend($id)
	{
		$this->db->where('ID_PENDIDIKAN',$id);
	    $query = $this->db->get('pendidikan');
	    $row = $query->row();

    	unlink("./dist/img/pencaker/pendidikan/$row->LAMPIRAN");

    	$this->db->delete('pendidikan', array('ID_PENDIDIKAN' => $id));

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Hapus Data Berhasil!</span>
				</div>');

		redirect( $this->kembali() );
	}



	// -----------------------------------------------------------------------

	// ----------------------------PENGALAMAN---------------------------------


	public function pengalaman()
	{
		$this->is__login();

		$this->load->model('M_pencaker');
		$this->load->model('M_kategori');

		$data['menu']   = 'pengalaman';
		
		$data['query_pengalaman']   = $this->M_pencaker->pengalaman();
		$data['query_kategori'] 	= $this->M_kategori->kategori();
		$data['all']				= $this->M_kategori->semua();
		$data['query_pencaker'] 	= $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/pengalaman/pengalaman', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function tambahPeng()
	{
		$this->is__login();

		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$data['menu']   = 'pengalaman';
		
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/pengalaman/tambah', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function tambahkanPeng()
	{
		$this->is__login();
		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/pencaker/pengalaman/';
		$config['allowed_types'] 	= 'jpg|png|gif|pdf';
		$config['file_name'] 		= time();
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$peng = array(
			'ID_PENGALAMAN' 	=> '',
			'ID_PENCAKER'   	=> $this->session->userdata('__ci_pencaker_idpk'), 
			'NAMA_PERUSAHAAN'   => $this->input->post('compname') , 
			'JABATAN'      		=> $this->input->post('jabatan') ,
			'DESKRIPSI_JABATAN'	=> $this->input->post('deskripsi') , 
			'BIDANG_PERUSAHAAN' => $this->input->post('bidang') , 
			'TGL_MASUK'   		=> $this->input->post('masuk') , 
			'TGL_KELUAR'   		=> $this->input->post('keluar') ,
			'LAMPIRAN'			=> $gambar 
        );

		$this->M_data->create('pengalaman_kerja', $peng);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil menambah data!</span>
				</div>');

		redirect(base_url('pencaker/pengalaman'));
	}

	public function uploadPeng()
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/pencaker/pengalaman/';
		$config['allowed_types'] 	= 'jpg|png|gif|pdf';
		$config['file_name'] 		= 'peng'.$this->uri->segment(3);
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$data 	= array('LAMPIRAN'		=> $gambar);
	 
		$where 	= array('ID_PENGALAMAN' => $this->uri->segment(3));
	 
		$this->M_data->ubah_data($where,$data,'pengalaman_kerja');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Lampiran Terupload!</span>
				</div>');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function editPeng($id)
	{
		$this->is__login(); 

		$this->load->model('M_data');
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$data['menu']   = 'pengalaman';

		$where = array('ID_PENGALAMAN' => $id);

		$data['query_pengalaman'] 	= $this->M_data->edit_data($where,'pengalaman_kerja')->result();
		$data['query_kategori'] 	= $this->M_kategori->kategori();
		$data['all']				= $this->M_kategori->semua();
		$data['query_pencaker'] 	= $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/pengalaman/edit', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function ubahPeng()
	{
		$this->is__login(); 

		$this->load->model('M_data');
	
		$id 	= $this->input->post('id_pengalaman');
	 
		$data 	= array(
			'ID_PENGALAMAN'		=> $id,
			'NAMA_PERUSAHAAN'   => $this->input->post('compname') , 
			'JABATAN'      		=> $this->input->post('jabatan') ,
			'DESKRIPSI_JABATAN'	=> $this->input->post('deskripsi') , 
			'BIDANG_PERUSAHAAN' => $this->input->post('bidang') , 
			'TGL_MASUK'   		=> $this->input->post('masuk') , 
			'TGL_KELUAR'   		=> $this->input->post('keluar') ,
		);
	 
		$where = array('ID_PENGALAMAN' => $id);

		$this->M_data->ubah_data($where,$data,'pengalaman_kerja');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Update Data Berhasil!</span>
				</div>');
		
		redirect(base_url('pencaker/pengalaman'));
	}

	public function hapusPeng($id)
	{
		$this->db->where('ID_PENGALAMAN',$id);
	    $query = $this->db->get('pengalaman_kerja');
	    $row = $query->row();

    	unlink("./dist/img/pencaker/pengalaman/$row->LAMPIRAN");

    	$this->db->delete('pengalaman_kerja', array('ID_PENGALAMAN' => $id));

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Hapus Data Berhasil!</span>
				</div>');

		redirect( $this->kembali() );
	}

	// -----------------------------------------------------------------------

	// -----------------------------KEAHLIAN----------------------------------

	public function keahlian()
	{
		$this->is__login();

		$this->load->model('M_pencaker');
		$this->load->model('M_kategori');

		$data['menu']   = 'skill';
		
		$data['query_keahlian'] = $this->M_pencaker->keahlian();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/keahlian/keahlian', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function tambahSkill()
	{
		$this->is__login();

		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$data['menu']   = 'skill';
		
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/keahlian/tambah', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function tambahkanSkill()
	{
		$this->is__login();
		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/pencaker/keahlian/';
		$config['allowed_types'] 	= 'jpg|png|gif|pdf';
		$config['file_name'] 		= time();
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$skill = array(
			'ID_KEAHLIAN' 			=> '',
			'ID_PENCAKER'   		=> $this->session->userdata('__ci_pencaker_idpk'), 
			'BIDANG_KEAHLIAN'   	=> $this->input->post('bidang') , 
			'DESKRIPSI_KEAHLIAN'	=> $this->input->post('deskripsi') , 
			'LAMPIRAN'				=> $gambar
        );

		$this->M_data->create('keahlian', $skill);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil menambah data!</span>
				</div>');

		redirect(base_url('pencaker/keahlian'));
	}

	public function uploadSkill()
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/pencaker/keahlian/';
		$config['allowed_types'] 	= 'jpg|png|gif|pdf';
		$config['file_name'] 		= 'skill'.$this->uri->segment(3);
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$data 	= array('LAMPIRAN'		=> $gambar);
	 
		$where 	= array('ID_KEAHLIAN' 	=> $this->uri->segment(3));
	 
		$this->M_data->ubah_data($where,$data,'keahlian');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Lampiran Terupload!</span>
				</div>');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function editSkill($id)
	{
		$this->is__login(); 

		$this->load->model('M_data');
		$this->load->model('M_kategori');
		$this->load->model('M_pencaker');

		$where = array('ID_KEAHLIAN' => $id);

		$data['menu']   = 'skill';

		$data['query_keahlian'] = $this->M_data->edit_data($where,'keahlian')->result();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['query_pencaker'] = $this->M_pencaker->edit_data();

		$data['header'] = $this->load->view('pencaker/header', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('pencaker/keahlian/edit', $data, TRUE);

		$this->load->view('pencaker/menu', $data, FALSE);
	}

	public function ubahSkill()
	{
		$this->is__login(); 

		$this->load->model('M_data');
	
		$id 	= $this->input->post('id_keahlian');
	 
		$data 	= array(
			'ID_KEAHLIAN'			=> $id,
			'BIDANG_KEAHLIAN'   	=> $this->input->post('bidang') , 
			'DESKRIPSI_KEAHLIAN'	=> $this->input->post('deskripsi') ,
		);
	 
		$where = array('ID_KEAHLIAN' => $id);

		$this->M_data->ubah_data($where,$data,'keahlian');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Update Data Berhasil!</span>
				</div>');
		
		redirect(base_url('pencaker/keahlian'));
	}

	public function hapusSkill($id)
	{
		$this->db->where('ID_KEAHLIAN',$id);
	    $query = $this->db->get('keahlian');
	    $row = $query->row();

    	unlink("./dist/img/pencaker/keahlian/$row->LAMPIRAN");

    	$this->db->delete('keahlian', array('ID_KEAHLIAN' => $id));

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Hapus Data Berhasil!</span>
				</div>');

		redirect( $this->kembali() );
	}

    public function sukses(){
        
        $data = array('ID_PENCAKER' =>  $this->session->userdata('__ci_pencaker_idpk') );
        
        $this->db->insert('sudah_bekerja', $data);
        redirect( $this->kembali() );
    }
}
