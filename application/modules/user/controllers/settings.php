<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Settings extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function settings() {
		//$this->load->model('user/settings_model');
		show(array(
			'page' => 'settings',
			'sub_title' => 'System Settings',
			'script' => 'user/settings',
			'view' => 'user/system_settings'
		));
	}
}