<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model {

	public function getLaporanPulsa($waktu1, $waktu2, $operator){
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$waktu = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu = date('Y-m-d H:i:s', strtotime($waktu));

		if($waktu2 == 1){
			
			$query = "SELECT * FROM view_transaksi_pulsa WHERE (nama_operator LIKE '$operator') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at < '$waktu' )";
		} else{
			
			$query = "SELECT * FROM view_transaksi_pulsa WHERE (nama_operator LIKE '$operator') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at >= '$waktu' )";
		}
		
		$data = $this->db->query($query)->result();
		return $data;
	}

	public function getTotalTransaksiPulsa($waktu1, $waktu2, $operator){
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$waktu = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu = date('Y-m-d H:i:s', strtotime($waktu));

		if($waktu2 == 1){

			$query = "SELECT COUNT(*) AS jumlah, SUM(harga) AS total FROM view_transaksi_pulsa WHERE (nama_operator LIKE '$operator') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at < '$waktu' )";
		} else{

			$query = "SELECT COUNT(*) AS jumlah, SUM(harga) AS total FROM view_transaksi_pulsa WHERE (nama_operator LIKE '$operator') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at >= '$waktu' )";
		}
		
		$data = $this->db->query($query)->row();
		return $data;
	}

	public function getLaporanPerdana($waktu1, $waktu2, $operator){
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$waktu = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu = date('Y-m-d H:i:s', strtotime($waktu));

		if($waktu2 == 1){
			
			$query = "SELECT * FROM view_transaksi_perdana WHERE (nama_operator LIKE '$operator') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at < '$waktu' )";
		} else{
			
			$query = "SELECT * FROM view_transaksi_perdana WHERE (nama_operator LIKE '$operator') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at >= '$waktu' )";
		}
		
		$data = $this->db->query($query)->result();
		return $data;
	}

	public function getTotalTransaksiPerdana($waktu1, $waktu2, $operator, $jenis){
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$waktu = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu = date('Y-m-d H:i:s', strtotime($waktu));

		if($waktu2 == 1){
			
			$query = "SELECT COUNT(*) AS jumlah, SUM(total) as total FROM view_transaksi_perdana WHERE (nama_operator LIKE '$operator') AND (jenis LIKE '$jenis') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at < '$waktu' )";
		} else{
			
			$query = "SELECT COUNT(*) AS jumlah, SUM(total) as total FROM view_transaksi_perdana WHERE (nama_operator LIKE '$operator') AND (jenis LIKE '$jenis') AND (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at >= '$waktu' )";
		}
		
		$data = $this->db->query($query)->row();
		return $data;
	}

	public function getLaporanTransaksi($waktu1, $waktu2){
		$waktu3 = date('Y-m-d',strtotime('+1 day', strtotime($waktu1)));
		$waktu = date('Y-m-d 16:00:00', strtotime($waktu1));
		$waktu = date('Y-m-d H:i:s', strtotime($waktu));

		if($waktu2 == 1){

			$query = "SELECT id, id_produk, nama_produk, SUM(qty) AS qty, 
						SUM(harga_beli*qty) AS total_beli, 
						SUM(total) AS total_jual, 
						( SUM(total) - SUM(harga_beli*qty)) AS laba ,
						created_at
						FROM `view_transaksi`
						WHERE (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at < '$waktu' )
						GROUP BY id_produk";
		} else{
			
			$query = "SELECT id, id_produk, nama_produk, SUM(qty) AS qty, 
						SUM(harga_beli*qty) AS total_beli, 
						SUM(total) AS total_jual, 
						( SUM(total) - SUM(harga_beli*qty)) AS laba ,
						created_at
						FROM `view_transaksi`
						WHERE (created_at BETWEEN '$waktu1' AND '$waktu3') AND ( created_at >= '$waktu' )
						GROUP BY id_produk";
		}
		
		$data = $this->db->query($query)->result();
		return $data;
	}

}

/* End of file LaporanModel.php */
/* Location: ./application/models/LaporanModel.php */