<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

	/* transaksi pulsa */
	public function getTransaksiPulsa(){
		$this->db->order_by('created_at','desc');
		$data = $this->db->get('view_transaksi_pulsa')->result();
		return $data;
	}

	public function transaksiPulsaJson(){
		$group 	= $this->ion_auth->get_users_groups()->row()->id;
		$base = base_url();
		
		$waktu1 = date('Y-m-d');
		$waktu2 = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$where	= "created_at BETWEEN '$waktu1' AND '$waktu3'";

        $this->datatables->select('v.id as id, v.id_user as id_user, v.username as username, v.first_name as name, v.nama_operator as nama_operator, v.pulsa as pulsa, v.harga as harga, v.no_hp as no_hp, date_format(v.created_at, "%d %b %Y %H:%i:%s") as created_at');
        $this->datatables->from('view_transaksi_pulsa as v');
        if($group==2){
        	$this->datatables->where($where);
        }
        $this->datatables->add_column('action', '<a href="javascript:void(0)" onclick="viewData($1)" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a> <a href="'.$base.'transaksi/editTransaksiPulsa/$1" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>', 'id');
        return $this->datatables->generate();
	}

	public function getTransaksiPulsaById($id){
		$this->db->select('v.id as id, v.id_user as id_user, v.username as username, v.first_name as name, v.nama_operator as nama_operator, v.pulsa as pulsa, v.harga as harga, v.no_hp as no_hp, date_format(v.created_at, "%d %b %Y %H:%i:%s") as created_at');
		$this->db->from('view_transaksi_pulsa as v');
		$this->db->where('id', $id);
		$data = $this->db->get()->row();
		return $data;

	}

	public function insertTransaksiPulsa($data){
		$this->db->insert('transaksi_pulsa',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function updateTransaksiPulsa($id, $data){
		$this->db->where('id',$id);
		$this->db->update('transaksi_pulsa',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	/* end transaksi pulsa */

	/* Transaksi Perdana */

	public function getTransaksiPerdanaSementara($id_user){
		$this->db->order_by('created_at','desc');
		$this->db->where('id_user',$id_user);
		$data = $this->db->get('perdana_sementara')->result();
		return $data;
	}

	public function insertTransaksiPerdanaSementara($data){
		$this->db->insert('perdana_sementara',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function getTransaksiPerdanaSementaraById($id_user, $nama_operator, $jenis){
		$this->db->where('id_user',$id_user);
		$this->db->where('nama_operator',$nama_operator);
		$this->db->where('jenis',$jenis);
		$data = $this->db->get('perdana_sementara')->row();
		return $data;
	}

	public function updateTransaksiPerdanaSementara($id_user, $nama_operator, $jenis, $data){
		$this->db->where('id_user',$id_user);
		$this->db->where('nama_operator',$nama_operator);
		$this->db->where('jenis',$jenis);
		$this->db->update('perdana_sementara',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function deleteTransaksiPerdanaSementara($id_user, $nama_operator, $jenis){
		$this->db->where('id_user',$id_user);
		$this->db->where('nama_operator',$nama_operator);
		$this->db->where('jenis',$jenis);
		$this->db->delete('perdana_sementara');
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function insertTransaksiPerdana($data){
		$this->db->insert('transaksi_perdana',$data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function insertTransaksiPerdanaItems($data){
		$this->db->insert('perdana_items',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function getTransaksiPerdanaJson(){
		$group 	= $this->ion_auth->get_users_groups()->row()->id;
		$base = base_url();
		
		$waktu1 = date('Y-m-d');
		$waktu2 = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$where	= "created_at BETWEEN '$waktu1' AND '$waktu3'";

        $this->datatables->select('tp.id as id, tp.id_user as id_user, u.username as username, u.first_name as name, date_format(tp.created_at, "%d %b %Y %H:%i:%s") as created_at');
        $this->datatables->from('transaksi_perdana as tp');
        $this->datatables->join('users as u', 'u.id=tp.id_user');
        if($group == 2){
        	$this->datatables->where($where);
        }
        $this->datatables->add_column('action', '<a href="'.$base.'transaksi/viewTransaksiPerdana/$1" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>', 'id');
        return $this->datatables->generate();
	}

	public function getTransaksiPerdanaItems($id){
		$this->db->where('id',$id);
		$data = $this->db->get('view_transaksi_perdana')->result();
		return $data;
	}

	public function getTransaksiPerdanaItemById($id_trx, $nama_operator, $jenis){
		$this->db->where('id_transaksi',$id_trx);
		$this->db->where('nama_operator', $nama_operator);
		$this->db->where('jenis',$jenis);
		$data = $this->db->get('perdana_items')->row();
		return $data;
	}

	public function addTransaksiPerdanaItem($data){
		$this->db->insert('perdana_items',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false; 
	}

	public function updateTransaksiPerdanaItem($id_trx, $nama_operator, $jenis, $data){
		$this->db->where('id_transaksi',$id_trx);
		$this->db->where('nama_operator', $nama_operator);
		$this->db->where('jenis',$jenis);
		$this->db->update('perdana_items',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false; 
	}

	public function deleteItemTransaksiPerdana($id_trx, $nama_operator, $jenis){
		$this->db->where('id_transaksi',$id_trx);
		$this->db->where('nama_operator', $nama_operator);
		$this->db->where('jenis',$jenis);
		$this->db->delete('perdana_items');
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false; 
	}

	/* End transaksi perdana */

	/* Transaksi general */

	public function getItemsTransaksiSementara($id_user){
		$this->db->select('items_sementara.*, produk.nama as nama_produk');
		$this->db->from('items_sementara');
		$this->db->join('produk','produk.id=items_sementara.id_produk');
		$this->db->order_by('created_at','desc');
		$this->db->where('id_user',$id_user);
		$data = $this->db->get()->result();
		return $data;
	}

	public function getTransaksiSementaraById($id_user, $id_produk){
		$this->db->select('items_sementara.*, produk.nama as nama_produk');
		$this->db->from('items_sementara');
		$this->db->join('produk','produk.id=items_sementara.id_produk');
		$this->db->order_by('created_at','desc');
		$this->db->where('id_user',$id_user);
		$this->db->where('id_produk',$id_produk);
		$data = $this->db->get()->row();
		return $data;
	}

	public function insertTransaksiSementara($data){
		$this->db->insert('items_sementara',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function deleteTransaksiSementara($id_user, $id_produk){
		$this->db->where('id_user',$id_user);
		$this->db->where('id_produk',$id_produk);
		$this->db->delete('items_sementara');
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function updateTransaksiSementara($id_user, $id_produk, $data){
		$this->db->where('id_user',$id_user);
		$this->db->where('id_produk',$id_produk);
		$this->db->update('items_sementara',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function getTransaksiJson(){
		$group 	= $this->ion_auth->get_users_groups()->row()->id;
		$base = base_url();
		
		$waktu1 = date('Y-m-d');
		$waktu2 = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$where	= "created_at BETWEEN '$waktu1' AND '$waktu3'";

        $this->datatables->select('t.id as id, t.id_user as id_user, t.diskon as diskon, u.username as username, u.first_name as name, date_format(t.created_at, "%d %b %Y %H:%i:%s") as created_at');
        $this->datatables->from('transaksi as t');
        $this->datatables->join('users as u', 'u.id=t.id_user');
        if($group == 2){
        	$this->datatables->where($where);
        }
        $this->datatables->add_column('action', '<a href="'.$base.'transaksi/viewTransaksi/$1" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>', 'id');
        return $this->datatables->generate();
	}

	public function insertTransaksi($data){
		$this->db->insert('transaksi',$data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function insertTransaksiItems($data){
		$this->db->insert('transaksi_items',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function getTransaksiItems($id){
		$this->db->where('id',$id);
		$data = $this->db->get('view_transaksi')->result();
		return $data;
	}

	public function deleteItemTransaksi($id_trx, $id_produk){
		$this->db->where('id_transaksi',$id_trx);
		$this->db->where('id_produk',$id_produk);
		$this->db->delete('transaksi_items');
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false; 
	}

	public function updateTransaksi($id, $data){
		$this->db->where('id',$id);
		$this->db->update('transaksi',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	public function getTransaksiItemById($id_trx, $id_produk){
		$this->db->where('id_transaksi',$id_trx);
		$this->db->where('id_produk', $id_produk);
		$data = $this->db->get('transaksi_items')->row();
		return $data;
	}

	public function updateTransaksiItem($id_trx, $id_produk, $data){
		$this->db->where('id_transaksi',$id_trx);
		$this->db->where('id_produk',$id_produk);
		$this->db->update('transaksi_items',$data);
		$cek = $this->db->affected_rows();
		return $cek > 0 ? true : false;
	}

	/* End transaksi general */

}

/* End of file TransaksiModel.php */
/* Location: ./application/models/TransaksiModel.php */