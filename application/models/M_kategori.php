<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public $limit, $offset, $kolom, $keyword;

	public function tampil()
	{
		$this->db->select('*');
		if ($this->keyword != '' OR isset($this->keyword)) {
			$this->db->like('_kategori'.$this->kolom.'', $this->keyword, 'BOTH');
		}
		
		$this->db->order_by('ID_KATEGORI', 'asc');
		return $this->db->get('kategori', $this->limit, $this->offset);
	}

	public function join2() 
	{
		$this->db->select('*')
				 ->from('kategori')
				 ->JOIN('lowongan','lowongan.ID_KATEGORI = kategori.ID_KATEGORI', 'LEFT');

		$query = $this->db->get();
 		return $query->result();
	}

	public function kategori()
	{
		$query = $this->db->query
		(
			'SELECT lowongan.STATUS_LOWONGAN , lowongan.ID_KATEGORI, kategori.NAMA_KATEGORI, 
				COUNT(lowongan.ID_KATEGORI) as total FROM kategori

				JOIN lowongan ON lowongan.ID_KATEGORI = kategori.ID_KATEGORI
				JOIN perusahaan ON perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN 
				JOIN user_akun ON user_akun.ID_USER = perusahaan.ID_USER
				WHERE lowongan.STATUS_LOWONGAN = "Tervalidasi" && user_akun.STATUS ="AKTIF"

				GROUP BY kategori.NAMA_KATEGORI 
				ORDER BY kategori.ID_KATEGORI ASC 
              '
		);

		return $query->result();
	}

	public function semua()
	{
		$query = $this->db->query
		(
			'SELECT COUNT(ID_LOWONGAN) as total FROM lowongan 
				JOIN perusahaan ON perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN  
				JOIN user_akun ON user_akun.ID_USER = perusahaan.ID_USER
				WHERE lowongan.STATUS_LOWONGAN = "Tervalidasi" && user_akun.STATUS ="AKTIF"
			'
		);

		return $query->result(); 
	} 
	
	public function beranda()
	{
		return $this->db->query(
			'SELECT * FROM lowongan 
				JOIN perusahaan ON perusahaan.ID_PERUSAHAAN = lowongan.ID_PERUSAHAAN 
				JOIN user_akun ON user_akun.ID_USER = perusahaan.ID_USER
				WHERE lowongan.STATUS_LOWONGAN = "Tervalidasi" && user_akun.STATUS ="AKTIF"
				ORDER BY lowongan.ID_LOWONGAN DESC
				LIMIT 5
			')->result();
	}
}