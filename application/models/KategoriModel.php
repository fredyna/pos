<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {

	public function getKategori(){
		$this->db->order_by('status','desc');
		$data = $this->db->get('kategori')->result();
		return $data;
	}

	public function getKategoriAktif(){
		$this->db->where('status',1);
		$data = $this->db->get('kategori')->result();
		return $data;
	}

	public function getKategoriById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('kategori')->row();
		return $data;

	}

	public function insertKategori($data){
		$this->db->insert('kategori',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function updateKategori($id, $data){
		$this->db->where('id',$id);
		$this->db->update('kategori',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function deleteKategori($id){
		$this->db->where('id',$id);
		$this->db->delete('kategori');
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

}

/* End of file KategoriModel.php */
/* Location: ./application/models/KategoriModel.php */