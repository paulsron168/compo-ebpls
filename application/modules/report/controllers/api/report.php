<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function get_nature() {
		$this->load->model('report/report_model', 'r');

		$list = $this->r->get_natures();

		if($list->num_rows() > 0) {
			response(0, 'List for Natures', $list->result());
		} else {
			response(1, 'No records found.');
		}
	}

	public function get_reports() {
		//if(!is_null($natureID)) {
			$this->load->model('report/report_model');
			//print_r($get_barangay());
			if($this->report_model->get_barangay()) {
				response(0, 'Reports Available', $this->report_model->get_barangay()->result());
			} else {
				response(1, 'No reports in this month');
			}
		/*} else {
			response(1, 'Error.');
		}*/
	}
/*
		public function notices($app_id=  null) {
			if(!is_null($app_id)){
			$this->load->model('report/report_model', 'fees');
			if($this->fees->demand_letter($app_id)){		
				response(0, 'Reports Available', $this->fees->demand_letter($app_id)->result());
			}

	else{
		response(1, 'No Reports available');
	}
}
}*/
}