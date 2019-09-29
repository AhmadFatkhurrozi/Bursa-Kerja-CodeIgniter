<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_company extends CI_Model {

	public $limit, $offset, $kolom, $keyword;

	public function tampil()
	{
		$this->db->select('*');
		if ($this->keyword != '' OR isset($this->keyword)) {
			$this->db->like('_PERUSAHAAN'.$this->kolom.'', $this->keyword, 'BOTH');
		}
		$this->db->order_by('NAMA_PERUSAHAAN', 'asc');
		return $this->db->get('perusahaan', $this->limit, $this->offset);
	}
	
	public function lowonganku($limit, $start) 
	{
			$this->db->where('lowongan.ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
					 ->join('kategori','kategori.ID_KATEGORI=lowongan.ID_KATEGORI')
					 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
					 ->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
					 ->group_by('lowongan.ID_LOWONGAN')
					 ->order_by('lowongan.ID_LOWONGAN', 'DESC');


			return $this->db->get('lowongan', $limit, $start);
	}

	public function bid($where, $table)
	{
		$this->db->select('lowongan.JUDUL, pencaker.NAMA_PENCAKER, lowongan.ID_LOWONGAN, pencaker.ID_PENCAKER, bid.TGL_BID, review.HASIL_REVIEW, bid.ID_BID, review.CATATAN, bid.STATUS_BID')
				 ->join('bid' , 'bid.ID_LOWONGAN = lowongan.ID_LOWONGAN')
				 ->join('pencaker', 'pencaker.ID_PENCAKER = bid.ID_PENCAKER')
				 ->join('review', 'review.ID_BID = bid.ID_BID' , 'LEFT');

		return $this->db->get_where($table,$where);
	}

	function profilPenc($where)
	{		
		return $this->db->join('user_akun', 'user_akun.ID_USER=pencaker.ID_USER')
						->group_by('pencaker.ID_PENCAKER')
						->get_where('pencaker',$where);
	}

	function detailPenc($table, $where)
	{
		return $this->db->get_where($table,$where);
	}
	

	public function notifBid($view)
	{
		 $query = $this->db->get('bid');

		 $output = '';
			 if($query->num_rows() <= 0)
				{
					$output .= '<li><a href="#" class="text-bold text-italic">Tidak ada pemberitahuan</a></li>';
				}

			 $result_1	=  $this->db->where('ID_PERUSAHAAN', $this->session->userdata('__ci_perusahaan_idpr'))
			 						->where('STATUS_BID' , 0)
								  	->get('bid');

			 $count = $result_1->num_rows();
			 $data = array(
			  'unseen_notification' => $count, 
			  'notification'   => $output, 
			 );
			 return $data;
	}
	
	public function data( $tabel )
	{
		return $this->db->get( $tabel );
	}
	
}