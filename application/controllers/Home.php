<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['main'] 	= 'home';
		$data['title'] 	= 'Home';
		$data['menu'] 	= 1;
		$this->load->view('template/template',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */