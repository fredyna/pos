<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->is_admin()){
			redirect('auth','refresh');
		}
		$this->load->model('laporanModel');
	}

	// Laporan transaksi pulsa

	public function index()
	{
		$this->pulsa();
	}

	public function pulsa($date=null, $waktu=null){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'laporan/laporan_pulsa';
		$data['title'] 	= 'Laporan Transaksi Pulsa | UJ Cell';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 3;
		}
		$data['submenu'] = 1;

		//menentukan tanggal laporan
		$waktu1 = $date == null ? date('Y-m-d') : date('Y-m-d', strtotime($date));

		//menentukan waktu laporan
		if($waktu==null){
			$waktu2 = date('H');
			if($waktu2 < 16){
				$waktu = 1;
			} else{
				$waktu = 2;
			}
		}
		
		$data['telkomsel'] = $this->laporanModel->getLaporanPulsa($waktu1, $waktu, 'TELKOMSEL');
		$data['total_telkomsel'] = $this->laporanModel->getTotalTransaksiPulsa($waktu1, $waktu, 'TELKOMSEL');
		$data['indosat'] = $this->laporanModel->getLaporanPulsa($waktu1, $waktu, 'INDOSAT');
		$data['total_indosat'] = $this->laporanModel->getTotalTransaksiPulsa($waktu1, $waktu, 'INDOSAT');
		$data['xl'] = $this->laporanModel->getLaporanPulsa($waktu1, $waktu, 'XL');
		$data['total_xl'] = $this->laporanModel->getTotalTransaksiPulsa($waktu1, $waktu, 'XL');
		$data['axis'] = $this->laporanModel->getLaporanPulsa($waktu1, $waktu, 'AXIS');
		$data['total_axis'] = $this->laporanModel->getTotalTransaksiPulsa($waktu1, $waktu, 'AXIS');
		$data['tri'] = $this->laporanModel->getLaporanPulsa($waktu1, $waktu, '3');
		$data['total_tri'] = $this->laporanModel->getTotalTransaksiPulsa($waktu1, $waktu, '3');
		$data['smartfren'] = $this->laporanModel->getLaporanPulsa($waktu1, $waktu, 'SMARTFREN');
		$data['total_smartfren'] = $this->laporanModel->getTotalTransaksiPulsa($waktu1, $waktu, 'SMARTFREN');
		$data['bolt'] = $this->laporanModel->getLaporanPulsa($waktu1, $waktu, 'BOLT');
		$data['total_bolt'] = $this->laporanModel->getTotalTransaksiPulsa($waktu1, $waktu, 'BOLT');
		$data['date'] = $waktu1;
		$data['waktu'] = $waktu == 1 ? 'Pagi' : 'Sore';
		$this->load->view('template/template',$data);
	}

	public function perdana($date=null, $waktu=null){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'laporan/laporan_perdana';
		$data['title'] 	= 'Laporan Transaksi Perdana | UJ Cell';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 3;
		}
		$data['submenu'] = 2;

		//menentukan tanggal laporan
		$waktu1 = $date == null ? date('Y-m-d') : date('Y-m-d', strtotime($date));

		//menentukan waktu laporan
		if($waktu==null){
			$waktu2 = date('H');
			if($waktu2 < 16){
				$waktu = 1;
			} else{
				$waktu = 2;
			}
		}
		
		$data['telkomsel'] = $this->laporanModel->getLaporanPerdana($waktu1, $waktu, 'TELKOMSEL');
		$data['telkomsel_eceran'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'TELKOMSEL', 'Eceran');
		$data['telkomsel_grosir'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'TELKOMSEL', 'Grosir');
		$data['indosat'] = $this->laporanModel->getLaporanPerdana($waktu1, $waktu, 'INDOSAT');
		$data['indosat_eceran'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'INDOSAT', 'Eceran');
		$data['indosat_grosir'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'INDOSAT', 'Grosir');
		$data['xl'] = $this->laporanModel->getLaporanPerdana($waktu1, $waktu, 'XL');
		$data['xl_eceran'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'XL', 'Eceran');
		$data['xl_grosir'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'XL', 'Grosir');
		$data['axis'] = $this->laporanModel->getLaporanPerdana($waktu1, $waktu, 'AXIS');
		$data['axis_eceran'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'AXIS', 'Eceran');
		$data['axis_grosir'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'AXIS', 'Grosir');
		$data['tri'] = $this->laporanModel->getLaporanPerdana($waktu1, $waktu, '3');
		$data['tri_eceran'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, '3', 'Eceran');
		$data['tri_grosir'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, '3', 'Grosir');
		$data['smartfren'] = $this->laporanModel->getLaporanPerdana($waktu1, $waktu, 'SMARTFREN');
		$data['smartfren_eceran'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'SMARTFREN', 'Eceran');
		$data['smartfren_grosir'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'SMARTFREN', 'Grosir');
		$data['bolt'] = $this->laporanModel->getLaporanPerdana($waktu1, $waktu, 'BOLT');
		$data['bolt_eceran'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'BOLT', 'Eceran');
		$data['bolt_grosir'] = $this->laporanModel->getTotalTransaksiPerdana($waktu1, $waktu, 'BOLT', 'Grosir');
		$data['date'] = $waktu1;
		$data['waktu'] = $waktu == 1 ? 'Pagi' : 'Sore';
		$this->load->view('template/template',$data);
	}

	public function general($date=null, $waktu=null){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'laporan/laporan_general';
		$data['title'] 	= 'Laporan Transaksi General | UJ Cell';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 3;
		}
		$data['submenu'] = 3;

		//menentukan tanggal laporan
		$waktu1 = $date == null ? date('Y-m-d') : date('Y-m-d', strtotime($date));

		//menentukan waktu laporan
		if($waktu==null){
			$waktu2 = date('H');
			if($waktu2 < 16){
				$waktu = 1;
			} else{
				$waktu = 2;
			}
		}

		$data['transaksi'] = $this->laporanModel->getLaporanTransaksi($waktu1, $waktu);
		$data['laba_untung'] = 0;
		$data['laba_rugi'] = 0;
		foreach($data['transaksi'] as $t){
			if($t->laba > 0){
				$data['laba_untung'] += $t->laba;
			} else{
				$data['laba_rugi'] += abs($t->laba);
			}
		}
		$data['date'] = $waktu1;
		$data['waktu'] = $waktu == 1 ? 'Pagi' : 'Sore';
		$this->load->view('template/template',$data);
	}



}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */