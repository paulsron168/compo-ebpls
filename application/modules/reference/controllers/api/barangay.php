<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barangay extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function save() {
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');
		//print_r($post);
		if(!empty($post)) {
			$this->form_validation->set_rules('brgy', 'Barangay Name', 'required|xss_clean');
			unset($post['field']);
			unset($post['type']);
			if($this->form_validation->run() == false) {
				response(1, 'Please fill in the missing fields.');
			} else {
				$this->load->model('reference/reference_model', 'reference');

				if($this->reference->save_barangay($post)) {
					response(0, 'Barangay saved.');
				} else {
					response(1, 'Failed saving requirements');
				}
			}
		} else {
			response(1, 'Please fill in the missing fields');
		}
	 }
	
	// public function save_nature(){
	// 	$post = $this->input->post(null, true);
	// 	$this->load->library('form_validation');

	// 	if(!empty($post)){
	// 		$this->form_validation->set_rules('	','','');
	// 	}
	// }

	public function get() {
		$this->load->model('reference/reference_model', 'reference');
		if($this->reference->get_barangays()->num_rows() > 0) {
			response(0, 'Barangay List', $this->reference->get_barangays()->result());
		} else {
			response(1, 'No barangays found.');
		}
	}
	public function getduedate(){
		$this->load->model('reference/reference_model', 'reference');
		if($this->reference->get_duedate()->num_rows() > 0){
			response(0, 'Due Date List', $this->reference->get_duedate()->result());
		} else {
			response(1, 'No Due Dates found.');
		}
	}

	public function get_barangay($brgy_id = null) {
		if(!is_null($brgy_id)) {
			$this->load->model('reference/reference_model','ref');

			if($this->ref->get_barangay($brgy_id)->num_rows() > 0) {
				response(0, 'Barangay Fetched', $this->ref->get_barangay($brgy_id)->row());
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing barangay id');
		}
	}


	public function get_duedate($sett_id) {
		$this->load->model('reference/reference_model', 'reference');
		if($this->reference->get_duedate2($sett_id)->num_rows() > 0) {
			response(0, 'Fetch tfo ambot successful', $this->reference->get_duedate2($sett_id)->{ !is_null($sett_id) ? 'row' : 'result' }());
		} else {
			response(1, 'No Announcement found.');
		}
	}


	public function update_brgy() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');

		if($this->reference_model->update_brgy($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating business line.');
		}
	}

	public function update_duedate() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');

		if($this->reference_model->update_duedate($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating due date.');
		}
	}

	public function save_new_duedate(){
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model', 'ref');
			if($this->ref->save_new_duedate($post)) {
				response(0, 'New tfo saved');
			} else {
				response(1, 'Failed saving tfo');
			}
	}

	public function get_announcement($annou_id = null) {
		$this->load->model('reference/reference_model', 'reference');
		if($this->reference->get_announcement($annou_id)->num_rows() > 0) {
			response(0, 'Announcement', $this->reference->get_announcement($annou_id)->{ !is_null($annou_id) ? 'row' : 'result' }());
		} else {
			response(1, 'No Announcement found.');
		}
	}

	public function update_announcement() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');

		if($this->reference_model->update_all_announcement($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating announcement.');
		}
	}

			public function delete_barangay($bid = null){
		if(!is_null($bid)){
			$this->load->model('reference/reference_model','ref');

			if($this->ref->delete_barangay($bid) >  0) {
				response(0, 'Delete Surcharges successful', $this->ref->delete_barangay($bid));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}



			public function delete_duedate($sett_id = null){
		if(!is_null($sett_id)){
			$this->load->model('reference/reference_model','ref');

			if($this->ref->delete_duedate($sett_id) >  0) {
				response(0, 'Delete duedate successful', $this->ref->delete_duedate($sett_id));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}
}
