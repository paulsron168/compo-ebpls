<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Reference extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}	
	public function index() {
		if(!$this->session->userdata('username')){

			$this->login();
		}
		else{
		$this->load->model('reference/reference_model', 'ref');	
		//print_r($this->ref->get_tfotype()->result());	
		show(array(
			'page' => 'reference_permit',
			'sub_title' => 'Reference',
			'requirements' => $this->ref->get_requirements(),
			'classification' =>$this->ref->get_classification(),
			'business_nature' => $this->ref->display_nature(),
			'business_nature2' =>(array) $this->ref->get_types('business_nature', true, 'application_id,buss_nature_id, business_nature', 'business_nature', array('application_id' => '1')),
			'permit_type' => $this->ref->get_types('permit'),
			'application' => $this->ref->get_types('application'),
			'tfo' => $this->ref->get_tfo(),
			'surcharge' => $this->ref->display_surcharge(),
			'tfotype' => $this->ref->get_tfotype()->result(),
			'paymenttype' => $this->ref->get_paymenttype()->result(),
			'behavior' => $this->ref->get_behavior(),
			'mayors_permit' =>$this->ref->display_range(),
			'garbage_fee' =>$this->ref->garbage_fee(),
			//'business_nature' =>$this->ref->display_nature(),
			'script' => 'reference/reference',
			'view' => 'reference/reference_permit'
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