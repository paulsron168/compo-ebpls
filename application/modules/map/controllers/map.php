<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map extends MX_Controller {

    protected $data;
	public function __construct() {
		parent::__construct();
	}

    public function public_market(){

		$this->load->model('map_model');
			show(array(
				'result' => $this->map_model->getList(),
				'page' => 'map/map.php',
				'sub_title' => 'Market Map',
				'script' => 'business_permit.js',
				'view' => 'map/map.php'
			));

	}



}