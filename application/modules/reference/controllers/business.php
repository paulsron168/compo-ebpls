<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Business extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if($this->session->userdata('username')){
			$this->login();
		}
		else{
		$this->load->model('reference/reference_model', 'reference');
		show(array(
			'page' => 'reference',
			'sub_title' => 'Business References',

			'barangay' => $this->reference->get_barangays(),
			'view' => 'reference/reference_business'
		));
		}
	}
	public function login() {
		show(array(
			'page' => 'login',
			'sub_title' => 'Login',
			'script' => 'user/login',
			'view' => 'user/login'
		));
	}
	public function logout(){
  		 	$this->session->sess_destroy();
  		 	$_SESSION = array();
  		 	 $this->login();
			
		
	}
}