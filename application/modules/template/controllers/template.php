<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index($template, $data) {	
		
 		$this->load->view('template/'.$template.'/content', $data);
	}

	
}