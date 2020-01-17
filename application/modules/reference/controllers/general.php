<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class General extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if(!$this->session->userdata('username')){

			$this->login();
		}else{
		$this->load->model('reference/reference_model');

		show(array(
			'page' => 'reference',
			'sub_title' => 'General References',
			'barangay' => $this->reference_model->get_barangays(),
			'duedates' => $this->reference_model->get_duedate(),
			'signatory' => $this->reference_model->get_signatory(),
			'announcement' => $this->reference_model->display_announcement(),
			'script' => 'reference/general',
			'view' => 'reference/reference_general'
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


	public function announcement() {
			$this->load->model('reference/reference_model');
		show(array(
			'page' => 'announcement',
			'sub_title' => 'Announcement',
			'script' => 'reference/general',
			'announcement' => $this->reference_model->display_announcement(),
			'view' => 'reference/announcement'
		));
	}
}