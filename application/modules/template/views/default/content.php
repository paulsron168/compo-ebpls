<?php
	$data['username']= $this->session->userdata('username');
	$data['firstname'] = $this->session->userdata('firstname');
	$data['lastname'] = $this->session->userdata('lastname');
	
	//$data2= $this->session->set_userdata('username',$data);
	$this->load->view('default/header',$data);
	$this->load->view($view);
	$this->load->view('default/footer');