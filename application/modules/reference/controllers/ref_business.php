<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class General extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		show(array(
			'page' => 'reference',
			'sub_title' => 'Business References',
			'view' => 'reference/reference_business'
		));
	}
}