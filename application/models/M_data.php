<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	function auth($username, $password)
	{
		$this->db->where("EMAIL = '$username' or USERNAME = '$username'");
		$this->db->where('PASSWORD',md5($password));
		$this->db->where('STATUS', 'AKTIF');
		$query = $this->db->get('user_akun');
		return $query;
	}

	function tampil_data($table){
		return $this->db->get($table);
	}

	function create($table,$data)
	{
    
    	$query = $this->db->insert($table, $data);
    	return $query;
	}

	function edit_data($where,$table)
	{		
		return $this->db->get_where($table,$where);
	}

	function ubah_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function cari($keyword) { 
	 	$this->db->like('JUDUL',$keyword, 'BOTH')
	 			 ->or_like('NAMA_PERUSAHAAN', $keyword, 'BOTH')
	 			 ->or_like('ALAMAT', $keyword, 'BOTH')
	 			 ->where('STATUS_LOWONGAN', 'Tervalidasi')
	 			 ->where('STATUS', 'AKTIF')
				 ->join('kategori','kategori.ID_KATEGORI=lowongan.ID_KATEGORI')
		 	     ->join('perusahaan', 'perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN')
		         ->join('user_akun', 'user_akun.ID_USER = perusahaan.ID_USER')
		         ->group_by('lowongan.ID_LOWONGAN')
		         ->order_by('lowongan.ID_LOWONGAN', 'DESC');
		
		return $this->db->get('lowongan');
	}
}
