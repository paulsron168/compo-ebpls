<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Releasing extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function get() {
		$this->load->model('fees/releasing_model', 'r');

		$list = $this->r->get_for_releasing();

		if($list->num_rows() > 0) {
			response(0, 'List for Releasing', $list->result());
		} else {
			response(1, 'No records found.');
		}
	}
	public function permit_release($releasing_id = null,$pay_id = null) {
		$this->load->model('fees/releasing_model', 'r');

		$list = $this->r->permit_release($releasing_id,$pay_id);

		if($list > 0) {
			response(0, 'Update Releasing', $list);
		} else {
			response(1, 'No records found.');
		}
	}

	
}