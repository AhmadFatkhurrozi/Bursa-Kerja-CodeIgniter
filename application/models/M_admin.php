<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public $limit, $offset, $kolom, $keyword;

	public function tampil()
	{
		$this->db->select('*')
				 ->join('user_akun', 'user_akun.ID_USER = admin.ID_USER');
				 
		return $this->db->get('admin');
	}

	public function gLowongan() {
		$query = $this->db->query("SELECT TGL_MULAI, COUNT(ID_LOWONGAN) AS total FROM lowongan GROUP BY TGL_MULAI");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	public function gPencaker() {
		$query = $this->db->query('SELECT DIBUAT_PADA, COUNT(ID_PENCAKER) AS totalpenc 
			FROM pencaker 
			JOIN user_akun ON user_akun.ID_USER=pencaker.ID_USER 
			WHERE LEVEL_USER = "pencaker"

			GROUP BY DIBUAT_PADA');
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	public function gCompany() {
		$query = $this->db->query(
			'SELECT LEVEL_USER, DIBUAT_PADA, COUNT(ID_PERUSAHAAN) AS totalper 
				FROM perusahaan 
				JOIN user_akun ON user_akun.ID_USER=perusahaan.ID_USER 
				WHERE LEVEL_USER = "perusahaan"

				GROUP BY DIBUAT_PADA'
		);
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	public function pencaker()
	{
		$this->db->select('*')
				->join('user_akun', 'user_akun.ID_USER = pencaker.ID_USER');

		return $this->db->get('pencaker');
	}


	public function company()
	{
		$this->db->select('*')
				->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER');

		return $this->db->get('perusahaan');
	}

	public function lowongan()
	{
		$this->db->select('*')
				->join('lowongan', 'lowongan.ID_PERUSAHAAN = perusahaan.ID_PERUSAHAAN');

		return $this->db->get('perusahaan');
	}

	function profilku()
	{		
		return $this->db->join('user_akun', 'user_akun.ID_USER = admin.ID_USER')
						->where('ID_ADMIN', $this->session->userdata('__ci_admin_idad'))
						->get('admin');
	}

	public function notifLowongan($view)
	{
		 $query = $this->db->get('bid');

		 $output = '';
			 if($query->num_rows() <= 0)
				{
					$output .= '<li><a href="#" class="text-bold text-italic">Tidak ada pemberitahuan</a></li>';
				}

			 $result_1	=  $this->db->where('STATUS_LOWONGAN' , 'Pending')
								  	->get('lowongan');

			 $count = $result_1->num_rows();
			 $data = array(
			  'unseen_notification' => $count, 
			  'notification'   => $output, 
			 );
			 return $data;
	}

	public function validasiLowongan()
	{
		$this->db->where('STATUS_LOWONGAN', 'Pending')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN=lowongan.ID_PERUSAHAAN')
				 ->order_by('JUDUL', 'DESC');

		return $this->db->get('lowongan');
	}

	public function detailLow($table, $where) 
	{
		$this->db->join('kategori','kategori.ID_KATEGORI=lowongan.ID_KATEGORI')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
				 ->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
				 ->group_by('lowongan.ID_LOWONGAN')
				 ->order_by('lowongan.ID_LOWONGAN', 'DESC');


		return $this->db->get_where($table, $where);
	}

	public function topComp()
	{
		$this->db->select(' COUNT(HASIL_REVIEW) as jumlah , review.HASIL_REVIEW, review.ID_PERUSAHAAN, perusahaan.NAMA_PERUSAHAAN, perusahaan.NO_SIUP, perusahaan.NO_SITU')
				 ->where('HASIL_REVIEW', 'Diterima')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN=review.ID_PERUSAHAAN')
				 ->group_by('review.ID_PERUSAHAAN')
				 ->limit('5')
				 ->order_by('jumlah', 'DESC');

		return $this->db->get('review');
	}


}