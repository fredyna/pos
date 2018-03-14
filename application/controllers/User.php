<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->is_admin()){
			redirect('auth','refresh');
		}
	}

	public function index(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'user/user';
		$data['title'] 	= 'Kelola User | UJ Cell PoS';
		$data['menu'] 	= 2;
		$data['member'] = $this->ion_auth->users(2)->result();
		$this->load->view('template/template',$data);
	}

	public function addUser(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('r_password', 'Repeat Password', 'required|matches[password]');
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$additional_data = array(
					'first_name' => $this->input->post('nama')
				);
				$group = array('2');
				$sql = $this->ion_auth->register($username, $password, null, $additional_data, $group);
				if($sql){
					$this->session->set_flashdata('info', 'Tambah Data Sukses!');
					redirect('user/addUser','refresh');
				} else{
					$this->session->set_flashdata('info', 'Tambah Data Gagal!');
					redirect('user/addUser','refresh');
				}
			} 
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'user/user_add';
		$data['title'] 	= 'Tambah User | UJ Cell PoS';
		$data['menu'] 	= 2;
		$this->load->view('template/template',$data);
	}

	public function editUser($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal!');
			redirect('user','refresh');
		} else{
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'user/user_edit';
			$data['title'] 	= 'Edit User | UJ Cell Pos';
			$data['menu'] 	= 2;
			$data['member'] = $this->ion_auth->user($id)->row();
			$this->load->view('template/template',$data);
		}
	}

	public function updateUser($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal!');
			redirect('user','refresh');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'username' 	=> $this->input->post('username'),
				'first_name'=> ucwords(strtolower($this->input->post('nama')))
			);

			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info', 'Edit Data Sukses!');
				redirect('user/editUser/'.$id,'refresh');
			} else{
				$this->session->set_flashdata('info', 'Edit Data Gagal!');
				redirect('user/editUser/'.$id,'refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'user/user_edit';
			$data['title'] 	= 'Edit User | UJ Cell PoS';
			$data['menu'] 	= 2;
			$data['member'] = $this->ion_auth->users($id)->row();
			$this->load->view('template/template',$data);
		}
	}

	public function updatePassword($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Update Password Gagal!');
			redirect('user','refresh');
		}

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('r_password', 'Repeat Password', 'required|matches[password]');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'password' 	=> $this->input->post('password')
			);

			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info-password', 'Update Password Sukses!');
				redirect('user/editUser/'.$id,'refresh');
			} else{
				$this->session->set_flashdata('info-password', 'Update Password Gagal!');
				redirect('user/editUser/'.$id,'refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'user/user_edit';
			$data['title'] 	= 'Edit User | UJ Cell PoS';
			$data['menu'] 	= 2;
			$data['member'] = $this->ion_auth->users($id)->row();
			$this->load->view('template/template',$data);
		}
	}

	public function deleteUser($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Delete User Failed!');
			redirect('user','refresh');
		}

		$sql = $this->ion_auth->delete_user($id);
		if($sql){
			$this->session->set_flashdata('info', 'Delete User Sukses!');
			redirect('user','refresh');
		} else{
			$this->session->set_flashdata('info', 'Delete User Gagal!');
			redirect('user','refresh');
		}
	}

	public function activate(){
		$this->form_validation->set_rules('id', 'ID', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id');
			$aktif = $this->ion_auth->user($id)->row()->active;
			if($aktif == 0){
				$data = array(
					'active' => 1
				);

				$sql = $this->ion_auth->update($id,$data);
				if($sql){
					header('Content-Type: application/json');
					echo 1;
				} 

				return;
			} else{
				$data = array(
					'active' => 0
				);

				$sql = $this->ion_auth->update($id,$data);
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

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */