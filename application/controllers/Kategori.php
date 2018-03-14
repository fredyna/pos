<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('kategoriModel');
	}

	/* kategori */

	public function index()
	{
		$this->kategori();
	}

	public function kategori(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kategori/kategori';
		$data['title'] 	= 'Kategori Produk | UJ Cell PoS';
		$data['menu'] 	= 3;
		$data['submenu'] = 1;
		$data['kategori'] = $this->kategoriModel->getKategori();
		$this->load->view('template/template',$data);
	}

	public function activate(){
		$this->form_validation->set_rules('id', 'ID', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id');
			$aktif = $this->kategoriModel->getKategoriById($id)->status;
			if($aktif == 0){
				$data = array(
					'status' => 1
				);

				$sql = $this->kategoriModel->updateKategori($id, $data);
				if($sql){
					header('Content-Type: application/json');
					echo 1;
				} 

				return;
			} else{
				$data = array(
					'status' => 0
				);

				$sql = $this->kategoriModel->updateKategori($id, $data);
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

	public function addKategori(){
		$nama = ucwords(strtolower($this->input->post('nama')));
		if($nama==''){
			header('Content-Type: application/json');
			echo 0;
		}
			
		$data = array(
			'nama'			=> $nama,
		);

		$sql = $this->kategoriModel->insertKategori($data);
		if($sql){
			header('Content-Type: application/json');
			echo 1;
		} else{
			header('Content-Type: application/json');
			echo 0;
		}
	}

	public function editKategori($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal edit data!');
			redirect('kategori','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama' => ucwords(strtolower($this->input->post('nama')))
				);

				$sql = $this->kategoriModel->updateKategori($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Berhasil edit data!');
					redirect('kategori/editKategori/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Gagal edit data!');
					redirect('kategori/editKategori/'.$id,'refresh');
				}
			}

			
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kategori/kategori_edit';
		$data['title'] 	= 'Edit Kategori Produk | UJ Cell PoS';
		$data['menu'] 	= 3;
		$data['submenu'] = 1;
		$data['kategori'] = $this->kategoriModel->getKategoriById($id);
		$this->load->view('template/template',$data);

	}

	/* end kategori */

	/* sub kategori */
	public function subkategori($id=null){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kategori/kategori';
		$data['title'] 	= 'Kategori Produk | UJ Cell PoS';
		$data['menu'] 	= 3;
		$data['submenu'] = 1;
		$data['kategori'] = $this->kategoriModel->getKategori();
		$data['subkategori'] = $this->kategoriModel->getSubKategori($id);
		$this->load->view('template/template',$data);
	}

	/* end sub kategori */

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */