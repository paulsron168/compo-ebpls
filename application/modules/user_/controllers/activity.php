<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Activity extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function activity() {
		//$this->load->model('user/activity_model');
		
		show(array(
			'page' => 'activity',
			'sub_title' => 'Activity Log',
			'script' => 'user/activity',
			'view' => 'user/activity_log'
		));
	}
}