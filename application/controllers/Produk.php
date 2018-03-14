<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->is_admin()){
			redirect('auth','refresh');
		}
		$this->load->model('produkModel');
	}

	public function index(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'produk/produk';
		$data['title'] 	= 'Produk | UJ Cell PoS';
		$data['menu'] 	= 4;
		$data['produk'] = $this->produkModel->getProduk();
		$this->load->view('template/template',$data);
	}

	public function addProduk(){
		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('nama', 'Nama Produk', 'trim|required');
			$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'trim|required');
			$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama'			=> ucwords(strtolower($this->input->post('nama'))),
					'harga_beli'	=> $this->input->post('harga_beli'),
					'harga_jual'	=> $this->input->post('harga_jual'),
					'qty'			=> $this->input->post('qty'),
					'created_at'	=> date('Y-m-d H:i:s')
				);

				$sql = $this->produkModel->insertProduk($data);
				if($sql){
					$this->session->set_flashdata('info', 'Tambah data sukses!');
					redirect('produk/addProduk','refresh');
				} else{
					$this->session->set_flashdata('info', 'Tambah data gagal!');
					redirect('produk/addProduk','refresh');
				}

			}
		} 

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'produk/produk_add';
		$data['title'] 	= 'Tambah Produk | UJ Cell PoS';
		$data['menu'] 	= 4;
		$this->load->view('template/template',$data);
	}

	public function editProduk($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit data gagal');
			redirect('produk','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('nama', 'Nama Produk', 'trim|required');
			$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'trim|required');
			$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama'			=> ucwords(strtolower($this->input->post('nama'))),
					'harga_beli'	=> $this->input->post('harga_beli'),
					'harga_jual'	=> $this->input->post('harga_jual'),
					'qty'			=> $this->input->post('qty')
				);

				$sql = $this->produkModel->updateProduk($id, $data);
				if($sql){
					$this->session->set_flashdata('info', 'Edit data sukses!');
					redirect('produk/editProduk/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Edit data gagal!');
					redirect('produk/editProduk/'.$id,'refresh');
				}

			}
		} 

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'produk/produk_edit';
		$data['title'] 	= 'Edit Produk | UJ Cell PoS';
		$data['menu'] 	= 4;
		$data['produk'] = $this->produkModel->getProdukById($id);
		$this->load->view('template/template',$data);
	}

	public function activate(){
		$this->form_validation->set_rules('id', 'ID', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id');
			$aktif = $this->produkModel->getProdukById($id)->status;
			if($aktif == 0){
				$data = array(
					'status' => 1
				);

				$sql = $this->produkModel->updateProduk($id, $data);
				if($sql){
					header('Content-Type: application/json');
					echo 1;
				} 

				return;
			} else{
				$data = array(
					'status' => 0
				);

				$sql = $this->produkModel->updateProduk($id, $data);
				if($sql){
					header('Content-Type: application/json');
					echo 0;
				}

				return;
			}
		}

		header('Content-Type: application/json');
		echo 2;
	}

	public function produkapi(){
		$data = $this->produkModel->getProduk();
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function produkById($id){
		$data = $this->produkModel->getProdukById($id);
		echo json_encode($data, JSON_PRETTY_PRINT);
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */