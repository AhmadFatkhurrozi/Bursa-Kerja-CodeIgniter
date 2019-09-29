<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

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
		if ( count($this->session->userdata('__ci_perusahaan_id')) < 1 ) {
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
		$this->load->library('calendar');
		
		$data = '';

		$data['kalender']	= $this->calendar->generate();
		$data['slider'] 	= $this->load->view('company/slider', $data, TRUE);
		$data['header'] 	= $this->load->view('company/header', $data, TRUE);
		$data['footer'] 	= $this->load->view('footer', $data, TRUE);

		$this->load->view('company/home', $data, FALSE);
	}

	//	-----------------------------------------------------------------------------------------------
	//	---------------------------------------LOWONGAN------------------------------------------------

	public function lowongan()
	{
		$this->is__login();
		$this->load->model('M_company');

 		$config['base_url'] 	= site_url('company/lowongan'); 
        $config['total_rows'] 	= $this->db->count_all('lowongan'); 
        $config['per_page'] 	= 5;  
        $config["uri_segment"] 	= 3;  
        $choice 				= $config["total_rows"] / $config["per_page"];
        $config["num_links"] 	= floor($choice);
 
        $this->pagination->initialize($config);

        $data['query_profil'] 	= $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');
        $data['page'] 			= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['query_lowongan'] = $this->M_company->lowonganku($config["per_page"],$data['page'])->result();  
        $data['pagination'] 	= $this->pagination->create_links();

		$data['menu']    = 'lowongan';
		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/lowongan/caper', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function lowonganDetail($id)
	{
		$this->is__login();

		$this->load->model('M_pekerjaan');

		$where = array('lowongan.ID_LOWONGAN' 	=> $id );

		$data['menu']   = 'lowongan';

		$data['query_profil'] 	= $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');
		$data['query_lowongan'] = $this->M_pekerjaan->detail('lowongan', $where)->result();

		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/lowongan/detail', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function tambahLowongan()
	{
		$this->is__login();
		$this->load->model('M_kategori');
		$this->load->model('M_pekerjaan');

		$data['menu']    = 'tambahlow';

		$data['query_profil'] 	= $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');
		$data['query_kategori']	= $this->M_kategori->tampil();
	
		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/lowongan/tambah', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function tambahkanLowongan()
	{
		$this->is__login();
		
		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/lowongan/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['file_name'] 		= 'low'.date('YmdHis');
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$low = array(
			'ID_LOWONGAN'	 		=> '',
			'ID_KATEGORI'			=> $this->input->post('kategori') ,
			'ID_PERUSAHAAN'   		=> $this->session->userdata('__ci_perusahaan_idpr'),
			'JUDUL'					=> $this->input->post('judul'),
			'TGL_MULAI'				=> date('Ymd'), 
			'TGL_SELESAI'			=> $this->input->post('selesai'),
			'GAJI'					=> $this->input->post('gaji'),
			'KUOTA'					=> $this->input->post('kuota') ,
			'STATUS_LOWONGAN'		=> 'Pending',
			'DESKRIPSI'				=> $this->input->post('deskripsi'),
			'GAMBAR'				=> $gambar
        );

		$this->M_data->create('lowongan', $low);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil Tambah!</span>
				</div>');

		redirect(base_url('company/lowongan'));
	}

	public function hapusLowongan($id)
	{
		$this->db->where('ID_LOWONGAN',$id);
	    $query = $this->db->get('lowongan');
	    $row = $query->row();

    	unlink("./dist/img/lowongan/$row->GAMBAR");

    	$this->db->delete('lowongan', array('ID_LOWONGAN' => $id));

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Hapus Berhasil!</span>
				</div>');

		redirect( $this->kembali() );
	}

	public function uploadLow()
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$config['upload_path'] 		= './dist/img/lowongan/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['file_name'] 		= 'low'.$this->uri->segment(3);
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$data 	= array('GAMBAR'		=> $gambar);
	 
		$where 	= array('ID_LOWONGAN' => $this->uri->segment(3));
	 
		$this->M_data->ubah_data($where,$data,'lowongan');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Gambar Terupload!</span>
				</div>');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function editLowongan($id)
	{
		$this->is__login(); 

		$this->load->model('M_data');
		$this->load->model('M_pekerjaan');

		$where = array('ID_LOWONGAN' => $id);

		$data['menu']   = 'lowongan';

		$data['query_profil'] 	= $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');
		$data['query_lowongan'] = $this->M_pekerjaan->join2($where,'lowongan')->result();
		
		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/lowongan/edit', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function ubahLowongan()
	{
		$this->is__login(); 

		$this->load->model('M_data');

		$id = $this->input->post('id_lowongan');
		
		$data = array(
			'JUDUL'		  => $this->input->post('judul') ,
			'TGL_SELESAI' => $this->input->post('selesai') ,
			'GAJI'		  => $this->input->post('gaji') ,
			'KUOTA'		  => $this->input->post('kuota') ,
			'DESKRIPSI'	  => $this->input->post('deskripsi') ,
		);
	 
		$where = array(
			'id_lowongan' => $id
		);
	 
		$this->M_data->ubah_data($where,$data,'lowongan');
		
		redirect(base_url('company/lowongan'));
	}

	//	-----------------------------------------------------------------------------------------------
	//	----------------------------------------PROFIL-------------------------------------------------

	public function profil()
	{
		$this->is__login();

		$data['query_profil'] = $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
							->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
							->get('perusahaan');

		$data['menu']   = 'editprofil';
		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/profil/profil', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function editProfil()
	{
		$this->is__login(); 

		$data['query_profil'] = $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
							->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
							->get('perusahaan');

		$data['menu']   = 'editprofil';
		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);
		$data['lihat']  = $this->load->view('company/profil/edit', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function uploadProfil()
	{
		$this->is__login(); 

		$this->load->model('M_data');
		
		$id 	= $this->session->userdata('__ci_perusahaan_idpr');

		$config['upload_path'] 		= './dist/img/company/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['file_name'] 		= $this->session->userdata('__ci_perusahaan_id');
		$config['max_size']  		= '2048';
		$config['overwrite'] 		= TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$gambar = $this->upload->data("file_name");

		$data 	= array('LOGO_PERUSAHAAN'	=> $gambar);
	 
		$where 	= array('ID_PERUSAHAAN' 	=> $id);
	 
		$this->M_data->ubah_data($where,$data,'perusahaan');
		
		redirect($this->input->server('HTTP_REFERER'));
	}

	public function ubahProfil()
	{
		$this->is__login(); 

		$this->load->model('M_data');
		
		$id 	= $this->session->userdata('__ci_perusahaan_id');

		$data = array(
			'NAMA_PERUSAHAAN' 		=> $this->input->post('namacomp') ,
			'BIDANG_USAHA'			=> $this->input->post('bidang') ,
			'DESKRIPSI_PERUSAHAAN' 	=> $this->input->post('deskripsi') ,
			'SLOGAN' 				=> $this->input->post('slogan') ,
			'NO_SIUP' 				=> $this->input->post('siup') ,
			'NO_SITU' 				=> $this->input->post('situ') ,
			'TELEPON' 				=> $this->input->post('telepon') ,
			'WEBSITE' 				=> $this->input->post('web') ,
			'ALAMAT' 				=> $this->input->post('alamat') ,
		);

		$email = array('EMAIL' 		=> $this->input->post('email'));
	 
		$where = array('ID_USER' => $id);
	 
		$this->M_data->ubah_data($where,$data,'perusahaan');
		$this->M_data->ubah_data($where,$email, 'user_akun');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Update Data Berhasil!</span>
				</div>');
		
		redirect(base_url('company/profil'));	
	}

	//---------------------------------------------------------------------------------------------
	//-------------------------------------------BID-----------------------------------------------

	public function bid()
	{
		$this->is__login();
		$this->load->model('M_company');

		$id 	= $this->session->userdata('__ci_perusahaan_idpr');

		$where 	= array('lowongan.ID_PERUSAHAAN' => $id );

		$data['menu']   = 'bid';

		$data['query_profil'] 	= $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');
		$data['query_bid']		= $this->M_company->bid($where, 'lowongan')->result();

		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/bid/bid', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function terimaBid()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array(
			'ID_PERUSAHAAN'			=> $this->session->userdata('__ci_perusahaan_idpr'),
			'review.HASIL_REVIEW' 	=> 'Diterima');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_BID', $id[$i])
							->update('review', $object);
		}
		redirect( $this->kembali() );
	}

	public function tolakBid()
	{
		$this->is__login();

		$id = array();

		$id = $this->input->post('pilih');

		$object = array(
			'ID_PERUSAHAAN'			=> $this->session->userdata('__ci_perusahaan_idpr'),
			'review.HASIL_REVIEW' 	=> 'Ditolak');

		for($i=0;$i<count($id);$i++){

			$this->query = $this->db
							->where('ID_BID', $id[$i])
							->update('review', $object);
		}
		redirect( $this->kembali() );
	}

	public function tambahCatatan($id)
	{
		$this->is__login(); 

		$this->load->model('M_data');
		$this->load->model('M_company');

		$where = array('bid.ID_BID' => $id);

		$data['menu']   = 'review';

		$data['query_profil'] 	= $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');
		$data['query_bid'] 		= $this->M_company->bid($where,'lowongan')->result();
		
		$data['header'] 		= $this->load->view('company/header', $data, TRUE);
		$data['lihat']			= $this->load->view('company/bid/catatan', $data, TRUE);
		$data['footer'] 		= $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function tambahkanCatatan()
	{
		$this->is__login();
		$this->load->model('M_data');

		$id = array();

		$idpr = $this->session->userdata('__ci_perusahaan_idpr');
		$id   = $this->input->post('idbid');
		$catatan = $this->input->post('catatan');
		$status = $this->input->post('status');

		$where = $this->db->where('ID_BID', $id )
						  ->get('review');

		if ($where->num_rows() == 0 ) {

			$sbid   = array('ID_BID' => $id);
			$sb 	= array('STATUS_BID' => '1');
			$idpk 	= $this->db->where('ID_BID' , $id)->get('bid')->row()->ID_PENCAKER;

			$this->M_data->ubah_data($sbid, $sb,'bid');

			$object = array(
				'ID_BID'		=> $id ,
				'HASIL_REVIEW'	=> $status ,
				'CATATAN' 		=> $catatan ,
				'ID_PENCAKER'	=> $idpk , 
				'ID_PERUSAHAAN'	=> $idpr ,
			);

			$penc 		= $this->db->select('pencaker.NAMA_PENCAKER')
								   ->where('bid.ID_BID' , $id)
								   ->join('bid', 'bid.ID_PENCAKER = pencaker.ID_PENCAKER')
								   ->get('pencaker')
								   ->row()->NAMA_PENCAKER;

			$comp 		= $this->session->userdata('__ci_perusahaan_nama');

			$to 		= $this->db->select('user_akun.EMAIL')
								   ->where('bid.ID_BID' , $id)
								   ->join('pencaker', 'pencaker.ID_USER = user_akun.ID_USER')
								   ->join('bid', 'bid.ID_PENCAKER = pencaker.ID_PENCAKER')
								   ->get('user_akun')
								   ->row()->EMAIL;

			$lowongan 	= $this->db->where('bid.ID_BID' , $id)
								   ->join('bid', 'lowongan.ID_LOWONGAN=bid.ID_LOWONGAN')
								   ->get('lowongan')
								   ->row()->JUDUL;

			$pesan 	= '<h1>HASIL REVIEW LAMARAN PEKERJAAN "SIBUK"</h1>'; 
			$pesan .= '<h3>Hai <b>'.$penc.',</b></h3>';
			$pesan .= '<p><b>'.$comp.'</b> Menanggapi lamaran pekerjaan <b>'.$lowongan.'</b> yang sudah  anda lamar di Sistem Informasi Bursa Kerja.</p>';
			$pesan .= '<hr class="m-y-md">';
			$pesan .= '<p>Dengan berbagai pertimbangan, anda <b>'.$status.'</b></p><p>'.$catatan.'</p>';
			$pesan .= '<br><p>Salam,<br><br><b>SAINTEK UNIPDU</b><br><i>Admin Sistem Informasi Bursa Kerja - DISNAKER JOMBANG</i></p>';

			$this->config_email();
			$this->email->from('disnaker@jombangdev.com', 'Sistem Informasi Bursa Kerja');
			$this->email->to($to);
            $this->email->subject('Hasil Review Lamaran Kerja');
            $this->email->message($pesan);
            $this->email->send();

            $wherelog = array('ID_BID' => $id);

            $log   = array( 
	        	'TGL_BID'   		=> date('Ymd') ,
	        	'STATUS_HISTORY'	=> $status
	        );

          	$this->M_data->ubah_data($wherelog, $log,'history');
			$this->M_data->create('review', $object);

			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Review berhasil dikirim!</span>
				</div>');

			redirect(base_url('company/bid'));
		}else{
			$this->session->set_flashdata('msg', 
					'<div class="alert alert-danger" style="margin-top: 10px;">
						<span><i class="fa fa-times"></i> Review sudah anda kirim!</span>
					</div>');
			redirect($this->kembali());
		}
	}


	public function review()
	{
		$this->is__login();
		$this->load->model('M_company');

		$id 	= $this->session->userdata('__ci_perusahaan_idpr');

		$where 	= array('lowongan.ID_PERUSAHAAN' => $id );

		$data['menu']   = 'review';

        $data['query_profil'] 	  = $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');        
		$data['query_bid']		= $this->M_company->bid($where, 'lowongan');

		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/bid/review', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function detailPenc($id)
	{
		$this->is__login();

		$this->load->model('M_company');
		$this->load->model('M_pencaker');

		$where			= array('ID_PENCAKER' => $id);
		$wherehs		= array('history.ID_PENCAKER' => $id);

		$data['menu']   = 'bid';

		$data['query_profil'] 	  = $this->db->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
										   ->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
										   ->get('perusahaan');
		$data['query_pencaker']   = $this->M_company->profilPenc($where)->result();
		$data['query_pendidikan'] = $this->M_company->detailPenc('pendidikan', $where)->result();
		$data['query_pengalaman'] = $this->M_company->detailPenc('pengalaman_kerja', $where)->result();
		$data['query_skill'] 	  = $this->M_company->detailPenc('keahlian', $where)->result();
		$data['query_history']	  = $this->M_pencaker->log($wherehs, 'history')->result();

		$data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/bid/detailpencaker', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/menu', $data, FALSE);
	}

	public function cetak($id) 
	{
		$this->is__login();	

		$this->load->model('M_company');
		$this->load->model('M_pencaker');

		$where		= array('ID_PENCAKER' => $id);
		$wherehs	= array('history.ID_PENCAKER' => $id);
		
		$nama       = $this->db->where($where)
		                       ->get('pencaker')->row()->NAMA_PENCAKER;

		$data['query_pencaker']   = $this->M_company->profilPenc($where)
													->result();
		$data['query_pendidikan'] = $this->M_company->detailPenc('pendidikan', $where)
													->result();
		$data['query_pengalaman'] = $this->M_company->detailPenc('pengalaman_kerja', $where)
													->result();
		$data['query_skill'] 	  = $this->M_company->detailPenc('keahlian', $where)
													->result();
		$data['query_history']	  = $this->M_pencaker->log($wherehs, 'history')->result();

		$this->load->view('cetak/detailPenc', $data, FALSE);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("CV_".$nama.".pdf", array('Attachment' => 0));
		
	}

	public function notifBid()
	{
		$this->load->model('M_company');
		
		$view = $this->input->post('view');
		$data =$this->M_company->notifBid($view);
		echo json_encode($data);
	}

	public function maps()

	{
		$this->is__login();
	  
	    $data = "";
	    $data['header'] = $this->load->view('company/header', $data, TRUE);
		$data['footer'] = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/maps', $data, FALSE);
	}

	public function ubahMaps()

	{
		$this->is__login(); 

		$this->load->model('M_data');
		
		$id 	= $this->session->userdata('__ci_perusahaan_id');

		$data = array(
			'LONG_KOORDINAT' 		=> $this->input->post('long') ,
			'LAT_KOORDINAT'			=> $this->input->post('lat') ,
		);

		$where = array('ID_USER' => $id);
	 
		$this->M_data->ubah_data($where,$data,'perusahaan');

		redirect(base_url('company/editProfil'));	
	}
}
