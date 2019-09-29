<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pencaker extends CI_Model {

	public $limit, $offset, $kolom, $keyword;

	public function tampil()
	{
		$this->db->select('*');
		if ($this->keyword != '' OR isset($this->keyword)) {
			$this->db->like('_PENCAKER'.$this->kolom.'', $this->keyword, 'BOTH');
		}
		$this->db->order_by('NAMA_PENCAKER', 'asc');
		return $this->db->get('pencaker', $this->limit, $this->offset);
	}

	function edit_data()
	{		
		return $this->db->join('user_akun', 'user_akun.ID_USER = pencaker.ID_USER')
						->where('id_pencaker', $this->session->userdata('__ci_pencaker_idpk'))
						->get('pencaker');
	}


	public function pendidikan()
	{
		return $this->db->where('id_pencaker', $this->session->userdata('__ci_pencaker_idpk'))
						->get('pendidikan');
	}

	public function pengalaman()
	{
		return $this->db->where('id_pencaker', $this->session->userdata('__ci_pencaker_idpk'))
						->get('pengalaman_kerja');
	}

	public function keahlian()
	{
		return $this->db->where('id_pencaker', $this->session->userdata('__ci_pencaker_idpk'))
						->get('keahlian');
	}
	
	public function get_notification($view)
	{
		if($view != 1)
		 {
		  $this->db->query("UPDATE review SET STATUS_REVIEW=1 WHERE STATUS_REVIEW=0");
		 }
	
			$output = '<li class="text-center">
							<a href="'.base_url('pencaker/review').'" class="dropdown-item">Lihat Semua</a>
					   </li>
					   ';
			
			$result_1 = $this->db->where('STATUS_REVIEW', 0)
								 ->where('ID_PENCAKER', $this->session->userdata('__ci_pencaker_idpk'))
								 ->get('review');

			$count = $result_1->num_rows();
			$data = array
				(
				  'notification'   		=> $output,
				  'unseen_notification' => $count
				);
			return $data;
	}

	public function log($where, $table)
	{
		$this->db->join('pencaker', 'pencaker.ID_PENCAKER = history.ID_PENCAKER')
				 ->join('lowongan', 'lowongan.ID_LOWONGAN=history.ID_LOWONGAN')
				 ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = history.ID_PERUSAHAAN')
				 ->order_by('ID_HISTORY', 'ASC');

				 return $this->db->get_where($table,$where);
	}
}