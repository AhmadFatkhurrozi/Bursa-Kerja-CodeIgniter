<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('me');
		$this->load->model('M_data');
		$this->load->helper('tgl_indo');
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
		if ( count($this->session->userdata('__ci_perusahaan_id')) > 0 ) {
			redirect(base_url('company'));
		} elseif ( count($this->session->userdata('__ci_pencaker_id')) > 0 ) {
			redirect(base_url('pencaker'));
		} 
	}

	public function index()
	{
		$this->is__login();
		$this->load->model('M_pekerjaan');
		$this->load->library('calendar');
		$this->load->model('M_kategori');
		$this->load->model('M_admin');

		$data['menu']   		= '';

		$data['topcomp']		= $this->M_admin->topComp()->result();
		$data['null']			= $this->M_pekerjaan->null();
		$data['smp']			= $this->M_pekerjaan->smp();
		$data['sma']			= $this->M_pekerjaan->sma();
		$data['sarjana']		= $this->M_pekerjaan->sarjana();
		$data['query_lowongan'] = $this->M_kategori->beranda();
		$data['kalender']		= $this->calendar->generate();
		$data['query_kategori'] = $this->M_kategori->kategori();
		$data['all']			= $this->M_kategori->semua();
		$data['slider'] 		= $this->load->view('pencaker/slider', $data, TRUE);		
		$data['header'] 		= $this->load->view('header', $data, TRUE);
		$data['footer']  		= $this->load->view('footer', $data, TRUE);

		$this->load->view('home', $data, FALSE);
	}

	public function kembali()
	{

		return $this->input->server('HTTP_REFERER');
	}

	// PENCAKER

	public function reg_pencaker()
	{
		$data = '';
		
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);

		$this->load->view('pencaker/register', $data, FALSE);
	}

	public function tambahkanPencaker()
	{
		$usr  = $this->input->post('username');
		$mail = $this->input->post('email');

		$where = $this->db->where("EMAIL = '$mail' or USERNAME = '$usr'")
						  ->get('user_akun');
		
		if ($where->num_rows() != 0 ) {

			$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i> Email atau username sudah ada!</span>
				</p');

			redirect( $this->kembali() );
			
		}else{
			$id = 'PK'.date('YmdHis');

			$user = array(
				'ID_USER'       =>  $id,
				'EMAIL'    		=> $mail , 
				'USERNAME'    	=> $usr , 
				'PASSWORD'      => md5($this->input->post('password')) , 
				'LEVEL_USER'    => 'PENCAKER' ,
				'STATUS' 		=> 'NONAKTIF' ,
				'DIBUAT_PADA'   => date('YmdHis') ,
	        );

			$this->M_data->create('user_akun', $user);
			 
			$pencaker = array(
				'ID_PENCAKER'  		=> '' ,
				'ID_USER'			=> $id , 
				'NAMA_PENCAKER'    	=> $this->input->post('namalengkap') ,
				'JK' 				=> $this->input->post('jk') ,
				'TEMPAT_LAHIR'		=> $this->input->post('tmp') ,
				'TGL_LAHIR'			=> $this->input->post('tgl') ,
				'FOTO'				=> 'default.png' , 
			);

			$this->M_data->create('pencaker',$pencaker);

			$enkrip = md5($id);
		  
		    $this->config_email();
			$this->email->from('disnaker@jombangdev.com', 'Sistem Informasi Bursa Kerja');
		    $this->email->to($mail);
		    $this->email->subject("Verifikasi Akun");
		    $this->email->message(
		     "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
		      site_url("akun/verif/$enkrip")
		    );
		  
		    if($this->email->send())
		    {
		      $this->session->set_flashdata('msg', 
				'<p class="text-warning" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil melakukan registrasi, Silahkan cek email untuk memverifikasi akun!</span>
				</p');

				redirect( $this->kembali() );

		    }else{
		        $this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i> Berhasil melakukan registrasi, namun gagal mengirim verifikasi email, silahkan daftar kembali dengan email lain!</span>
				</p');

				redirect( $this->kembali() );
		    }
		  
		    echo "<br><br><a href='".site_url("akun")."'>Kembali ke Menu Login</a>";
		}
	}

	// ------------------------------------------------------------
	// Company

	public function reg_comp()
	{
		$data = '';
		
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['lihat']	= $this->load->view('company/register', $data, TRUE);
		$data['footer']  = $this->load->view('footer', $data, TRUE);

		$this->load->view('company/register', $data, FALSE);
	}

	public function tambahkanComp()
	{
		$usr  = $this->input->post('username');
		$mail = $this->input->post('email');
		$id   = 'PR'.date('YmdHis');

		$where = $this->db->where("EMAIL = '$mail' or USERNAME = '$usr'")
						  ->get('user_akun');
		
		if ($where->num_rows() != 0 ) {

			$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i> Email atau username sudah ada!</span>
				</p');

			redirect( $this->kembali() );
			
		}else{

			$user = array(
				'ID_USER'       	=> $id ,
				'EMAIL'    			=> $mail , 
				'USERNAME'    		=> $usr , 
				'PASSWORD'      	=> md5($this->input->post('password')) , 
				'LEVEL_USER'    	=> 'PERUSAHAAN' ,
				'STATUS'		 	=> 'NONAKTIF' , 
				'DIBUAT_PADA'   	=> date('YmdHis') ,
	        );

			$this->M_data->create('user_akun', $user);
			 
			$company = array(
				'ID_PERUSAHAAN'			=> '' ,
				'ID_USER'				=> $id , 
				'NO_SITU'				=> '-' ,
				'NO_SIUP'				=> '-' ,
				'BIDANG_USAHA'			=> '-' ,
				'ALAMAT'				=> '-' ,
				'TELEPON'				=> '-' ,
				'DESKRIPSI_PERUSAHAAN'	=> '-' ,
				'WEBSITE'				=> '-' ,
				'SLOGAN' 				=> '-' ,
				'NAMA_PERUSAHAAN'  		=> $this->input->post('namacomp') , 
				'LOGO_PERUSAHAAN'		=> 'default.png' ,  
			);

			$this->M_data->create('perusahaan',$company);

			$enkrip = md5($id);

			$this->config_email();
			$this->email->from('disnaker@jombangdev.com', 'Sistem Informasi Bursa Kerja');
		    $this->email->to($mail);
		    $this->email->subject("Verifikasi Akun");
		    $this->email->message(
		     "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
		      site_url("akun/verif/$enkrip")
		    );
		  
		    if($this->email->send())
		    {
		      $this->session->set_flashdata('msg', 
				'<p class="text-warning" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil melakukan registrasi, Silahkan cek email untuk memverifikasi akun!</span>
				</p');

				redirect( $this->kembali() );

		    }else{
		        $this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i> Berhasil melakukan registrasi, namun gagal mengirim verifikasi email, silahkan daftar kembali dengan email lain!</span>
				</p');

				redirect( $this->kembali() );
		    }
		  
		    echo "<br><br><a href='".site_url("akun")."'>Kembali ke Menu Login</a>";
		}

	}

	// -------------------------------------------------------------

	public function verif($key)
	{
	 $this->load->helper('url');
	
	 $data  = array( 'STATUS' => 'AKTIF');

	 $where = array( 'md5(ID_USER)' => $key );
	
	 $this->M_data->ubah_data($where, $data, 'user_akun');
	 
	 echo "Selamat kamu telah memverifikasi akun kamu";
	 echo "<br><br><a href='".site_url("akun")."'>Kembali ke Menu Login</a>";
	}


	function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->M_data->auth($username ,$password);

		if ($cek->num_rows() != 0 ) 
		{
			$id = $cek->row()->ID_USER;

			// query pencaker
			$query_pencaker   = $this->db->join('user_akun', 'user_akun.ID_USER=pencaker.ID_USER')
										 ->where('pencaker.ID_USER', $id)
										 ->get('pencaker');

			// query perusahaan
			$query_perusahaan = $this->db->join('user_akun', 'user_akun.ID_USER=perusahaan.ID_USER')
										 ->where('perusahaan.ID_USER', $id)
										 ->get('perusahaan');

			if( $query_pencaker->num_rows() != 0 )
			{
				$array = array(
					'__ci_pencaker_id' 				=> $id,
					'__ci_pencaker_idpk' 			=> $query_pencaker->row()->ID_PENCAKER,
					'__ci_pencaker_nik' 			=> $query_pencaker->row()->NIK,
					'__ci_pencaker_nama' 			=> $query_pencaker->row()->NAMA_PENCAKER,
					'__ci_pencaker_jk' 				=> $query_pencaker->row()->JK,
					'__ci_pencaker_tempat_lahir' 	=> $query_pencaker->row()->TEMPAT_LAHIR,
					'__ci_pencaker_tgl_lahir' 		=> $query_pencaker->row()->TGL_LAHIR,
					'__ci_pencaker_agama' 			=> $query_pencaker->row()->AGAMA,
					'__ci_pencaker_foto' 			=> $query_pencaker->row()->FOTO,
					'__ci_pencaker_telepon' 		=> $query_pencaker->row()->TELEPON,
					'__ci_pencaker_email' 			=> $query_pencaker->row()->EMAIL,
					'__ci_pencaker_alamat' 			=> $query_pencaker->row()->ALAMAT,
					);
				
				$this->session->set_userdata( $array );

				redirect(base_url("pencaker"),'refresh');

			}
			elseif ( $query_perusahaan->num_rows() != 0  ) 
			{
				$array = array(
					'__ci_perusahaan_id' => $id,
					'__ci_perusahaan_idpr' => $query_perusahaan->row()->ID_PERUSAHAAN,
					'__ci_perusahaan_nama' => $query_perusahaan->row()->NAMA_PERUSAHAAN,
					'__ci_perusahaan_email'=> $query_perusahaan->row()->EMAIL,
					'__ci_perusahaan_foto' => $query_perusahaan->row()->LOGO_PERUSAHAAN,
					'__ci_perusahaan_siup' => $query_perusahaan->row()->NO_SIUP,
					'__ci_perusahaan_situ' => $query_perusahaan->row()->NO_SITU,
				);
				
				$this->session->set_userdata( $array );

				redirect(base_url("company"),'refresh');

			}
			else
			{
				$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i> username atau password salah!</span>
				</p');

				redirect( $this->kembali() );
			}
		}
		else
		{
			$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i> username atau password salah!</span>
				</p');

			redirect( $this->kembali() );
		}
	}

	function masuk_admin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->M_data->auth($username ,$password);

		if( $cek->num_rows() != 0 ){

			$id = $cek->row()->ID_USER;
			
			// query Admin

			$query_admin = $this->db->where('ID_USER', $id)->get('admin');


			if( $query_admin->num_rows() != 0 )
			{
				$array = array(
					'__ci_admin_id' 		=> $id,
					'__ci_admin_idad'		=> $query_admin->row()->ID_ADMIN,
					'__ci_admin_nama' 		=> $query_admin->row()->NAMA_ADMIN,
					'__ci_admin_telepon' 	=> $query_admin->row()->TELEPON,
					'__ci_admin_foto'		=> $query_admin->row()->FOTO_ADMIN,
				);
				
				$this->session->set_userdata( $array );

				redirect(base_url("admin"),'refresh');

			}
		}
		else
		{
			$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i>Upps! Username/ Password Salah.</span>
				</p');	
			
			redirect( $this->kembali() );
		}
	}
	

 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
