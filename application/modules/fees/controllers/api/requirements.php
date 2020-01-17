<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirements extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function get($req_id = null) {
		if(!is_null($req_id)) {
			$this->load->model('fees/req_model');
			if($this->req_model->get_requirements($req_id)->num_rows() > 0) {
				response(0, 'Requirements', $this->req_model->get_requirements($req_id)->result());
			} else {
				response(1, 'No records found.');
			}
		} else {
			response(1, 'No requirement id specified');
		}
	}
	
	public function get_all_req() {
		if(!is_null($req_id)) {
			$this->load->model('fees/req_model');
			if($this->req_model->get_all_req()->num_rows() > 0) {
				response(0, 'Requirements', $this->req_model->get_all_req()->result());
			} else {
				response(1, 'No records found.');
			}
		} else {
			response(1, 'No requirement id specified');
		}
	}
}