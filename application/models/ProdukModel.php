<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {

	public function getProduk(){
		$this->db->order_by('status','desc');
		$this->db->order_by('updated_at','desc');
		$data = $this->db->get('produk')->result();
		return $data;
	}

	public function getProdukAktif(){
		$this->db->where('status',1);
		$this->db->order_by('updated_at','desc');
		$data = $this->db->get('produk')->result();
		return $data;
	}

	public function getProdukById($id){
		$this->db->where('id', $id);
		$data = $this->db->get('produk')->row();
		return $data;

	}

	public function insertProduk($data){
		$this->db->insert('produk',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function updateProduk($id, $data){
		$this->db->where('id',$id);
		$this->db->update('produk',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function updateStokProduk1($id, $qty){
		$query = "UPDATE produk SET qty = qty - $qty WHERE id = $id";
		$this->db->query($query);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function updateStokProduk2($id, $qty){
		$query = "UPDATE produk SET qty = qty + $qty WHERE id = $id";
		$this->db->query($query);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function deleteProduk($id){
		$this->db->where('id',$id);
		$this->db->delete('produk');
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

}
/* End of file ProdukModel.php */
/* Location: ./application/models/ProdukModel.php */