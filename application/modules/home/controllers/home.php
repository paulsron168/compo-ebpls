<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function index() {
	if(!$this->session->userdata('username')){
			$this->login();
		}else{
			$this->dashboard();
			}
		}


	public function dashboard() {
	if(!$this->session->userdata('username')){
			$this->login();
		}else{
		$this->load->model('home/home_model');
		show(array(
			'announcement' => $this->home_model->get_announcement()->result(),
			'page' => 'dashboard',
			'sub_title' => 'Dashboard',
			'view' => 'home/dashboard',
			'script' => 'fees/business_permit',
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

	public function newAnnouncement() {
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');
		if(!empty($post)) {
			$this->load->model('home/home_model', 'home');
			unset($post['field']);
			unset($post['type']);
			if($this->home->save_new_announcement($post)) {
				response(0, 'Announcement saved.');
			} else {
				response(1, 'Failed saving Announcement');
			}
		} else {
			response(1, 'Please fill in the missing fields');
		}
	 }

	 //DELETING ANNOUNCEMNET

		public function delete_announcement($aid = null){
		if(!is_null($aid)){
			$this->load->model('home/home_model', 'home');

			if($this->home->delete_announcement($aid) >  0) {
				response(0, 'Delete announcement successful', $this->home->delete_announcement($aid));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}

	public function get_announcement_edit($annou_id = null) {
		$this->load->model('home/home_model', 'home');
		if($this->home->get_announcement_edit($annou_id)->num_rows() > 0) {
			response(0, 'Announcement', $this->home->get_announcement_edit($annou_id)->{ !is_null($annou_id) ? 'row' : 'result' }());
		} else {
			response(1, 'No Announcement found.');
		}
	}
}
