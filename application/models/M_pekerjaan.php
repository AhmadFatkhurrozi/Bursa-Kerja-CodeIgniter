<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pekerjaan extends CI_Model {

	// public $limit, $offset, $kolom, $keyword;

	public function tampil()
	{
		$this->db->where('STATUS_LOWONGAN!=', 'Pending')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN=lowongan.ID_PERUSAHAAN')
				 ->order_by('JUDUL', 'DESC');

		return $this->db->get('lowongan');
	}

	public function join3($limit, $start) 
	{
			$this->db->where('STATUS_LOWONGAN', 'Tervalidasi')
					 ->where('STATUS', 'AKTIF')
					 ->join('kategori','kategori.ID_KATEGORI=lowongan.ID_KATEGORI')
					 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
					 ->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
					 ->group_by('lowongan.ID_LOWONGAN')
					 ->order_by('lowongan.ID_LOWONGAN', 'DESC');


			return $this->db->get('lowongan', $limit, $start);
	}

	public function lowonganKat($where, $limit, $start) 
	{
		$this->db->where('STATUS_LOWONGAN', 'Tervalidasi')
				 ->where('STATUS', 'AKTIF')
				 ->join('kategori','kategori.ID_KATEGORI=lowongan.ID_KATEGORI')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
				 ->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
				 ->group_by('lowongan.ID_LOWONGAN')
				 ->order_by('lowongan.ID_LOWONGAN', 'DESC');


		return $this->db->where($where)->get('lowongan', $limit, $start);
	}

	public function detail($table, $where) 
	{
		$this->db->where('STATUS_LOWONGAN', 'Tervalidasi')
				 ->where('STATUS', 'AKTIF')
				 ->join('kategori','kategori.ID_KATEGORI=lowongan.ID_KATEGORI')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
				 ->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
				 ->group_by('lowongan.ID_LOWONGAN')
				 ->order_by('lowongan.ID_LOWONGAN', 'DESC');


		return $this->db->get_where($table, $where);
	}

	public function join2($where,$table) 
	{
		$this->db->join('kategori','kategori.ID_KATEGORI=lowongan.ID_KATEGORI');
		return $this->db->get_where($table,$where);
	}

	public function bid($where, $table)
	{
		$this->db->join('lowongan' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = bid.ID_PERUSAHAAN');
				 return $this->db->get_where($table,$where);
	}

	// public function review($where, $table)
	// {
	// 	$this->db->join('bid' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
	// 			 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
	// 			 ->join('review', 'review.ID_BID = bid.ID_BID');

	// 			 return $this->db->get_where($table,$where);
	// }
	public function review($where, $table)
		{
		$this->db->select('lowongan.JUDUL, perusahaan.NAMA_PERUSAHAAN, lowongan.ID_LOWONGAN, perusahaan.ID_PERUSAHAAN, review.HASIL_REVIEW, review.CATATAN, bid.STATUS_BID')
				     ->join('bid' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
					 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
					 ->join('review', 'review.ID_BID = bid.ID_BID')
					 ;

					 return $this->db->get_where($table,$where);
		}

	public function sma()
	{
		$query = $this->db->select('SUM(KUOTA) as total')
						  ->where('STATUS_LOWONGAN', 'Tervalidasi')
						  ->like('DESKRIPSI','SMA','BOTH')->or_like('DESKRIPSI','SMK','BOTH')
						  ->get('lowongan'); 
						  
		return $query->result();
	}

	public function smp()
	{
		$query = $this->db->select('SUM(KUOTA) as total')
						  ->where('STATUS_LOWONGAN', 'Tervalidasi')
						  ->like('DESKRIPSI','SMP','BOTH')->or_like('DESKRIPSI','MTS','BOTH')
						  ->get('lowongan'); 

		return $query->result();
	}

	public function sarjana()
	{
		$query = $this->db->select('SUM(KUOTA) as total')
						  ->where('STATUS_LOWONGAN', 'Tervalidasi')
						  ->like('DESKRIPSI','D3','BOTH')
						  ->or_like('DESKRIPSI','S1','BOTH')
						  ->get('lowongan'); 

		return $query->result();
	}

	public function null()
	{
		$query = $this->db->select('SUM(KUOTA) as total')
						  ->where('STATUS_LOWONGAN', 'Tervalidasi')
						  ->not_like('DESKRIPSI','SMA','BOTH')
						  ->not_like('DESKRIPSI','SMK','BOTH')
						  ->not_like('DESKRIPSI','SMP','BOTH')
						  ->not_like('DESKRIPSI','MTS','BOTH')
						  ->not_like('DESKRIPSI','D3','BOTH')
						  ->not_like('DESKRIPSI','S1','BOTH')
						  ->not_like('DESKRIPSI','S2','BOTH')
						  ->get('lowongan'); 

		return $query->result();
	}

}
