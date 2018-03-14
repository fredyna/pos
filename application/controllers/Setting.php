<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in()){
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'setting';
		$data['title'] 	= 'Pengaturan';
		if($data['group'] == 1){
<<<<<<< HEAD
			$data['menu'] 	= 6;
=======
			$data['menu'] 	= 7;
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
		} else {
			$data['menu'] 	= 3;
		}
		$this->load->view('template/template',$data);
	}

	public function changePassword(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$id 			= $data['user']->id;
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('r_password', 'Password', 'required|matches[password]');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'password' => $this->input->post('password')
			);
			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info-password', 'Change Password Success!');
				redirect('setting','refresh');
			} else{
				$this->session->set_flashdata('info-password', 'Change Password Failed!');
				redirect('setting','refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'setting';
			$data['title'] 	= 'Pengaturan';
			if($data['group'] == 1){
<<<<<<< HEAD
				$data['menu'] 	= 6;
=======
				$data['menu'] 	= 7;
>>>>>>> e7b491495aeac88623149a1f3c0871ae822bb9ca
			} else {
				$data['menu'] 	= 3;
			}
			$this->load->view('template/template',$data);
		}
	}

	public function updateData(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$id 			= $data['user']->id;
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'username' => $this->input->post('username'),
				'first_name' => $this->input->post('nama')
			);
			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info-data', 'Change Data Success!');
				redirect('setting','refresh');
			} else{
				$this->session->set_flashdata('info-data', 'Change Data Failed!');
				redirect('setting','refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'setting';
			$data['title'] 	= 'Pengaturan';
			if($data['group'] == 1){
				$data['menu'] 	= 7;
			} else {
				$data['menu'] 	= 3;
			}
			$this->load->view('template/template',$data);
		}
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */