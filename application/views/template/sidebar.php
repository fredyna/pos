<?php
	switch($group){
		case 1:
			$this->load->view('template/sidebarAdmin');
			break;
		case 2:
			$this->load->view('template/sidebarKasir');
			break;
	}	
?>