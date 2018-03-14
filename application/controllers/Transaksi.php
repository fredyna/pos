<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in()){
			redirect('auth','refresh');
		}
		$this->load->model('transaksiModel');
		$this->load->library('datatables');
		$this->load->model('produkModel');
	}

	/* Transaksi Pulsa */

	public function index(){
		$this->pulsa();
	}

	public function pulsa()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_pulsa';
		$data['title'] 	= 'Transaksi Pulsa | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 1;
		$this->load->view('template/template',$data);
	}

	public function transaksiPulsaJson(){
		header('Content-Type: application/json');
        echo $this->transaksiModel->transaksiPulsaJson();
	}

	public function addTransaksiPulsa(){

		$user = $this->ion_auth->user()->row();
		$operator = $this->input->post('operator');
		$pulsa 	  = $this->input->post('pulsa');
		$harga 	  = $this->input->post('harga');
		$noHp 	  = $this->input->post('noHp');

		if($operator!='' && $pulsa!='' && $harga!='' && $noHp!=''){
			$data = array(
				'id_user' => $user->id,
				'nama_operator' => $operator,
				'pulsa'	  => $pulsa,
				'harga'   => $harga,
				'no_hp'   => $noHp,
				'created_at' => date('Y-m-d H:i:s')
			);

			$sql = $this->transaksiModel->insertTransaksiPulsa($data);
			if($sql){
				echo 1;
				return;
			}
		}

		echo 0;
	}

	public function viewTransaksiPulsa($id=null){
		if($id==null){
			echo 0;
			return;
		}

		$data = $this->transaksiModel->getTransaksiPulsaById($id);
		echo json_encode($data,JSON_PRETTY_PRINT);
	}

	public function editTransaksiPulsa($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Transaksi Gagal!');
			redirect('transaksi/pulsa','refresh');
		}


		$data['user'] 	= $this->ion_auth->user()->row();

		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('operator', 'Nama Operator', 'trim|required');
			$this->form_validation->set_rules('pulsa', 'Pulsa', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'id_user' => $data['user']->id,
					'nama_operator' => $this->input->post('operator'),
					'pulsa'	  => $this->input->post('pulsa'),
					'harga'   => $this->input->post('harga'),
					'no_hp'   => $this->input->post('no_hp')
				);

				$sql = $this->transaksiModel->updateTransaksiPulsa($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Edit Data Sukses!');
					redirect('transaksi/editTransaksiPulsa/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Edit Data Gagal!');
					redirect('transaksi/editTransaksiPulsa/'.$id,'refresh');
				}
			}
		}

		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_pulsa_edit';
		$data['title'] 	= 'Edit Transaksi Pulsa | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 1;
		$data['trx']	= $this->transaksiModel->getTransaksiPulsaById($id);
		$this->load->view('template/template',$data);
	}

	/* End Transaksi Pulsa */

	/* Transaksi Perdana */

	public function perdana(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_perdana';
		$data['title'] 	= 'Transaksi Perdana | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 2;
		$this->load->view('template/template',$data);
	}

	public function getTransaksiPerdanaSementara(){
		$user = $this->ion_auth->user()->row();
		$data = $this->transaksiModel->getTransaksiPerdanaSementara($user->id);
		echo json_encode($data,JSON_PRETTY_PRINT);
	}

	public function addTransaksiPerdanaSementara(){
		$user = $this->ion_auth->user()->row();
		$operator = $this->input->post('operator');
		$jenis 	  = $this->input->post('jenis');
		$harga 	  = $this->input->post('harga');
		$qty 	  = $this->input->post('qty');

		if($operator!='' && $jenis!='' && $harga!='' && $qty!=''){
			$data = array(
				'id_user' => $user->id,
				'nama_operator' => $operator,
				'jenis'	  => $jenis,
				'harga'   => $harga,
				'qty'     => $qty,
				'created_at' => date('Y-m-d H:i:s')
			);

			$sql = $this->transaksiModel->insertTransaksiPerdanaSementara($data);
			if($sql){
				echo 1;
				return;
			}
		}

		echo 0;
	}

	public function getTransaksiPerdanaSementaraById($nama_operator=null, $jenis=null){
		if($nama_operator==null || $jenis==null){
			echo 0;
			return;
		}
		$user = $this->ion_auth->user()->row();
		$data = $this->transaksiModel->getTransaksiPerdanaSementaraById($user->id, $nama_operator, $jenis);
		echo json_encode($data, JSON_PRETTY_PRINT);

	}

	public function editTransaksiPerdanaSementara($nama_operator=null, $jenis=null){
		if($nama_operator==null || $jenis==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal');
			redirect('transaksi/perdana','refresh');
		}

		$id_user 	= $this->ion_auth->user()->row()->id;

		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('operator', 'Nama Operator', 'trim|required');
			$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('qty', 'Qty', 'trim|required');
			if ($this->form_validation->run() == true) {
				$data = array(
					'nama_operator' => $this->input->post('operator'),
					'jenis'			=> $this->input->post('jenis'),
					'harga'			=> $this->input->post('harga'),
					'qty'			=> $this->input->post('qty'),
				);

				$sql = $this->transaksiModel->updateTransaksiPerdanaSementara($id_user, $nama_operator, $jenis, $data);
				if($sql){
					$this->session->set_flashdata('info', 'Edit data berhasil!');
					redirect('transaksi/perdana/','refresh');
				} else{
					$this->session->set_flashdata('info', 'Edit data gagal!');
					redirect('transaksi/editTransaksiPerdanaSementara/'.$nama_operator.'/'.$jenis,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_perdana_sementara_edit';
		$data['title'] 	= 'Transaksi Perdana | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 2;
		$data['trx']	= $this->transaksiModel->getTransaksiPerdanaSementaraById($id_user, $nama_operator, $jenis);
		$this->load->view('template/template',$data);
	}

	public function hapusTransaksiPerdanaSementara($nama_operator=null, $jenis=null){
		if($nama_operator==null || $jenis==null){
			echo 0;
			return;
		}

		$id_user = $this->ion_auth->user()->row()->id;

		$sql = $this->transaksiModel->deleteTransaksiPerdanaSementara($id_user, $nama_operator, $jenis);
		if($sql){
			echo 1;
		} else{
			echo 0;
		}
	}

	public function selesaiTransaksiPerdana(){
		$id_user = $this->ion_auth->user()->row()->id;

		$data = $this->transaksiModel->getTransaksiPerdanaSementara($id_user);
		if($data==null){
			echo 2;
			return;
		}

		$data_trx = array(
			'id_user' => $id_user,
			'created_at' => date('Y-m-d H:i:s')
		);

		$trx_id = $this->transaksiModel->insertTransaksiPerdana($data_trx);
		if(!$trx_id || $trx_id==0){
			echo 0;
			return;
		}

		foreach($data as $d){
			$data2 = array(
				'id_transaksi' => $trx_id,
				'nama_operator' => $d->nama_operator,
				'jenis'			=> $d->jenis,
				'harga'			=> $d->harga,
				'qty'			=> $d->qty
			);

			//insert item transaksi perdana
			$sql2 = $this->transaksiModel->insertTransaksiPerdanaItems($data2);
			if(!$sql2){
				echo 0;
				return;
			}

			//hapus item transaksi perdana sementara
			$this->transaksiModel->deleteTransaksiPerdanaSementara($id_user, $d->nama_operator, $d->jenis);
		}

		echo 1;
	}

	public function transaksiPerdanaJson(){

		header('Content-Type: application/json');
        echo $this->transaksiModel->getTransaksiPerdanaJson();
	}

	public function viewTransaksiPerdana($id=null){
		if($id==null){
			$this->session->set_flashdata('info-data', 'View data gagal!');
			redirect('transaksi/perdana','refresh');
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_perdana_view';
		$data['title'] 	= 'Transaksi Perdana | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 2;
		$data['items'] 	= $this->transaksiModel->getTransaksiPerdanaItems($id);
		$data['id_trx'] = $id;
		$this->load->view('template/template',$data);


	}

	public function addItemsTransaksiPerdana($id_trx=null){
		if($id_trx==null){
			$this->session->set_flashdata('info', 'Tambah data gagal');
			redirect('transaksi/perdana','refresh');
		}

		$this->form_validation->set_rules('operator', 'Nama Operator', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('qty', 'Qty', 'trim|required');
		if ($this->form_validation->run() == true) {
			$data = array(
				'id_transaksi'	=> $id_trx,	
				'nama_operator' => $this->input->post('operator'),
				'jenis'			=> $this->input->post('jenis'),
				'harga'			=> $this->input->post('harga'),
				'qty'			=> $this->input->post('qty')
			);

			$sql = $this->transaksiModel->addTransaksiPerdanaItem($data);
			if($sql){
				$this->session->set_flashdata('info', 'Tambah data berhasil!');
				redirect('transaksi/viewTransaksiPerdana/'.$id_trx,'refresh');
			} else{
				$this->session->set_flashdata('info', 'Tambah data gagal!');
				redirect('transaksi/viewTransaksiPerdana/'.$id_trx,'refresh');
			}
		}

		$this->viewTransaksiPerdana($id_trx);
	}


	public function editItemsTransaksiPerdana($id_trx=null, $nama_operator=null, $jenis=null){
		if($id_trx==null || $nama_operator==null || $jenis==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal');
			redirect('transaksi/viewTransaksiPerdana/'.$id_trx,'refresh');
		}

		$id_user 	= $this->ion_auth->user()->row()->id;

		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('operator', 'Nama Operator', 'trim|required');
			$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('qty', 'Qty', 'trim|required');
			if ($this->form_validation->run() == true) {
				$data = array(
					'nama_operator' => $this->input->post('operator'),
					'jenis'			=> $this->input->post('jenis'),
					'harga'			=> $this->input->post('harga'),
					'qty'			=> $this->input->post('qty'),
				);

				$sql = $this->transaksiModel->updateTransaksiPerdanaItem($id_trx, $nama_operator, $jenis, $data);
				if($sql){
					$this->session->set_flashdata('info', 'Edit data berhasil!');
					redirect('transaksi/viewTransaksiPerdana/'.$id_trx,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Edit data gagal!');
					redirect('transaksi/viewTransaksiPerdana/'.$id_trx,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_perdana_edit_item';
		$data['title'] 	= 'Transaksi Perdana | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 2;
		$data['trx']	= $this->transaksiModel->getTransaksiPerdanaItemById($id_trx, $nama_operator, $jenis);
		$this->load->view('template/template',$data);
	}

	public function hapusItemTransaksiPerdana($id_trx=null, $nama_operator=null, $jenis=null){
		if($id_trx==null || $nama_operator==null || $jenis==null){
			echo 0;
			return;
		}

		$sql = $this->transaksiModel->deleteItemTransaksiPerdana($id_trx, $nama_operator, $jenis);
		if($sql){
			echo 1;
		} else{
			echo 0;
		}
	}

	/* End Transaksi Perdana */

	/* Transaksi general */

	public function general(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_general';
		$data['title'] 	= 'Transaksi General | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 1;
		$data['produk'] = $this->produkModel->getProdukAktif();
		$this->load->view('template/template',$data);
	}

	public function addTransaksiSementara(){ 

		$user = $this->ion_auth->user()->row();
		$produk = $this->input->post('produk');
		$harga 	  = $this->input->post('harga');
		$qty 	  = $this->input->post('qty');

		if($produk!='' && $harga!='' && $qty!=''){
			$data = array(
				'id_user' => $user->id,
				'id_produk' => $produk,
				'harga'   => $harga,
				'qty'     => $qty,
				'created_at' => date('Y-m-d H:i:s')
			);

			$sql = $this->transaksiModel->insertTransaksiSementara($data);
			if($sql){
				$this->produkModel->updateStokProduk1($produk, $qty);
				echo 1;
				return;
			}
		}

		echo 0;

	}

	public function getItemsTransaksiSementara(){
		$user = $this->ion_auth->user()->row();
		$data = $this->transaksiModel->getItemsTransaksiSementara($user->id);
		echo json_encode($data,JSON_PRETTY_PRINT);
	}

	public function hapusTransaksiSementara($id_produk=null){
		if($id_produk==null){
			echo 0;
			return;
		}

		$id_user = $this->ion_auth->user()->row()->id;
		$qty = $this->transaksiModel->getTransaksiSementaraById($id_user, $id_produk)->qty;

		$sql = $this->transaksiModel->deleteTransaksiSementara($id_user, $id_produk);
		if($sql){
			$this->produkModel->updateStokProduk2($id_produk, $qty);
			echo 1;
		} else{
			echo 0;
		}
	}

	public function editItemTransaksiSementara($id_produk=null){

		if($id_produk==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal');
			redirect('transaksi/general','refresh');
		}

		$id_user = $this->ion_auth->user()->row()->id;
		$qty_awal	= $this->transaksiModel->getTransaksiSementaraById($id_user, $id_produk)->qty;

		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('produk', 'Produk', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('qty', 'Qty', 'trim|required');
			if ($this->form_validation->run() == true) {
				$data = array(
					'id_produk' => $this->input->post('produk'),
					'harga'			=> $this->input->post('harga'),
					'qty'			=> $this->input->post('qty'),
				);

				$selisih = $qty_awal - $data['qty'];

				$sql = $this->transaksiModel->updateTransaksiSementara($id_user, $id_produk, $data);
				if($sql){

					if($selisih > 0){
						$this->produkModel->updateStokProduk2($id_produk, $selisih);
					} else{
						$selisih = abs($selisih);
						$this->produkModel->updateStokProduk1($id_produk, $selisih);
					}

					$this->session->set_flashdata('info', 'Edit data berhasil!');
					redirect('transaksi/general','refresh');
				} else{
					$this->session->set_flashdata('info', 'Edit data gagal!');
					redirect('transaksi/editTransaksiSementara/'.$id_produk,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_sementara_edit';
		$data['title'] 	= 'Transaksi General | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 1;
		$data['trx']	= $this->transaksiModel->getTransaksiSementaraById($id_user, $id_produk);
		$data['produk'] = $this->produkModel->getProdukAktif();
		$this->load->view('template/template',$data);
	}

	public function transaksiJson(){

		header('Content-Type: application/json');
        echo $this->transaksiModel->getTransaksiJson();
	}

	public function selesaiTransaksi(){
		$id_user = $this->ion_auth->user()->row()->id;
		$diskon  = $this->input->post('diskon');
		if($diskon=='' || $diskon==null){
			$diskon = 0;
		}

		$data = $this->transaksiModel->getItemsTransaksiSementara($id_user);
		if($data==null){
			echo 2;
			return;
		}

		$data_trx = array(
			'id_user' => $id_user,
			'diskon'  => $diskon,
			'created_at' => date('Y-m-d H:i:s')
		);

		$trx_id = $this->transaksiModel->insertTransaksi($data_trx);
		if(!$trx_id || $trx_id==0){
			echo 0;
			return;
		}

		foreach($data as $d){
			$data2 = array(
				'id_transaksi' => $trx_id,
				'id_produk'	   => $d->id_produk,
				'harga'		   => $d->harga,
				'qty'		   => $d->qty
			);

			//insert item transaksi
			$sql2 = $this->transaksiModel->insertTransaksiItems($data2);
			if(!$sql2){
				echo 0;
				return;
			}

			//hapus item transaksi sementara
			$this->transaksiModel->deleteTransaksiSementara($id_user, $d->id_produk);
		}

		echo 1;
	}

	public function viewTransaksi($id=null){
		if($id==null){
			$this->session->set_flashdata('info-data', 'View data gagal!');
			redirect('transaksi/general','refresh');
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_view';
		$data['title'] 	= 'Transaksi General | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 1;
		$data['items'] 	= $this->transaksiModel->getTransaksiItems($id);
		$data['produk'] = $this->produkModel->getProdukAktif();
		$data['id_trx'] = $id;
		$this->load->view('template/template',$data);

	}

	public function hapusItemTransaksi($id_trx=null, $id_produk){
		if($id_trx==null || $id_produk==null){
			echo 0;
			return;
		}

		$qty = $this->transaksiModel->getTransaksiItemById($id_trx, $id_produk)->qty;

		$sql = $this->transaksiModel->deleteItemTransaksi($id_trx, $id_produk);
		if($sql){
			$this->produkModel->updateStokProduk2($id_produk, $qty);
			echo 1;
			return;
		} else{
			echo 0;
			return;
		}
	}

	public function addItemsTransaksi($id_trx=null){
		if($id_trx==null){
			$this->session->set_flashdata('info', 'Tambah data gagal');
			redirect('transaksi/general','refresh');
		}

		$this->form_validation->set_rules('produk', 'Produk', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('qty', 'Qty', 'trim|required');
		if ($this->form_validation->run() == true) {
			$data = array(
				'id_transaksi'	=> $id_trx,	
				'id_produk' => $this->input->post('produk'),
				'harga'			=> $this->input->post('harga'),
				'qty'			=> $this->input->post('qty')
			);

			$sql = $this->transaksiModel->insertTransaksiItems($data);
			if($sql){
				$this->produkModel->updateStokProduk1($data['id_produk'], $data['qty']);
				$this->session->set_flashdata('info', 'Tambah data berhasil!');
				redirect('transaksi/viewTransaksi/'.$id_trx,'refresh');
			} else{
				$this->session->set_flashdata('info', 'Tambah data gagal!');
				redirect('transaksi/viewTransaksi/'.$id_trx,'refresh');
			}
		}

		$this->viewTransaksi($id_trx);
	}

	public function editTransaksi($id_trx=null){
		$diskon = $this->input->post('diskon');

		if($id_trx==null || $diskon=='' || $diskon==null){
			echo 0;
			return;
		}

		$data = array(
			'diskon' => $diskon
		);

		$update = $this->transaksiModel->updateTransaksi($id_trx, $data);
		if($update){
			echo 1;
			return;
		} else{
			echo 0;
			return;
		}

	}

	public function editItemsTransaksi($id_trx=null, $id_produk=null){
		if($id_trx==null || $id_produk==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal');
			redirect('transaksi/viewTransaksi/'.$id_trx,'refresh');
		}

		$qty_awal	= $this->transaksiModel->getTransaksiItemById($id_trx, $id_produk)->qty;

		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('qty', 'Qty', 'trim|required');
			if ($this->form_validation->run() == true) {
				$data = array(
					'harga'			=> $this->input->post('harga'),
					'qty'			=> $this->input->post('qty'),
				);
				
				$selisih = $qty_awal - $data['qty'];

				$sql = $this->transaksiModel->updateTransaksiItem($id_trx, $id_produk, $data);
				if($sql){
					if($selisih > 0){
						$this->produkModel->updateStokProduk2($id_produk, $selisih);
					} else{
						$selisih = abs($selisih);
						$this->produkModel->updateStokProduk1($id_produk, $selisih);
					}

					$this->session->set_flashdata('info', 'Edit data berhasil!');
					redirect('transaksi/viewTransaksi/'.$id_trx,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Edit data gagal!');
					redirect('transaksi/viewTransaksi/'.$id_trx,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'transaksi/transaksi_edit_item';
		$data['title'] 	= 'Transaksi General | UJ Cell PoS';
		if($data['group']==1){
			$data['menu'] 	= 5;
		} else if($data['group']==2){
			$data['menu'] 	= 2;
		}
		$data['submenu'] = 1;
		$data['trx']	= $this->transaksiModel->getTransaksiItemById($id_trx, $id_produk);
		$data['produk'] = $this->produkModel->getProdukAktif();
		$this->load->view('template/template',$data);
	}

	/* end transaksi general */

	/* Transaksi konter */

	/* end transaksi konter */

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */