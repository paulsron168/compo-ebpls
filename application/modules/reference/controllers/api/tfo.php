<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tfo extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function add_tfo() {
		$post = $this->input->post(null, true);
		// print_r($post);
		$this->load->library('form_validation');
		//print_r($post);
		if(!empty($post)) {
			$this->form_validation->set_rules('tfo_id', 'Tax Fees', 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('application_id', 'Application Type', 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('type', 'Behavior', 'required|is_natural_no_zero|xss_clean');

			/*if($post['type'] == 1) {			// Constant
				$this->form_validation->set_rules('value', 'Constant', 'required|xss_clean');
			} elseif($post['type'] == 2) { 		// Formula
				$this->form_validation->set_rules('formula', 'Formula', 'required|is_natural_no_zero|xss_clean');
			} elseif($post['type'] == 3) {		// Range
				$this->form_validation->set_rules('range[]', 'Range', 'required|xss_clean');
			}  elseif($post['type'] == 4){
				$this->form_validation->set_rules('min', 'Minimium', 'required|xss_clean');
				$this->form_validation->set_rules('formula2', 'Formula', 'required|xss_clean');
			} */

			if($this->form_validation->run() == false) {
				response(1, 'Oops! Please fill in the missing fields.', array('error' => validation_errors()));
			} else {
				$this->load->model('reference/tfo_model', 'tfo');
				if($this->tfo->save_required_tfo($post)) {
					response(0, 'New tfo saved');
				} else {
					response(1, 'Failed saving tfo');
				}
			}
		} else {
			response(1, 'No inputs to save');
		}
	}
	
	public function add_ranges() {
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');
		//print_r($post);

		if(!empty($post)) {
			$this->form_validation->set_rules('classification', 'Tax Fees', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('business_nature', 'Application Type', 'required|required|xss_clean');

			$this->load->model('reference/reference_model', 'ref');
			$exist=$this->ref->does_exist($post['rid']);

			if($this->form_validation->run() == false) {
				response(1, 'Oops! Please fill in the missing fields.', array('error' => validation_errors()));
			} else {
					$this->load->model('reference/tfo_model', 'tfo');
					if($this->tfo->save_required_tfo($post)) {
						response(0, 'New tfo saved');
					} else {
						response(1, 'Failed saving tfo');
					}

			}
		} else {
			response(1, 'No inputs to save');
		}

    }


	public function add_garbage_fee() {
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');
		//print_r($post);

		if(!empty($post)) {
			$this->form_validation->set_rules('classification', 'Classification', 'required|is_natural_no_zero|xss_clean');
			//$this->form_validation->set_rules('business_nature', 'Application Type', 'required|required|xss_clean');

			$this->load->model('reference/reference_model', 'ref');
			$exist=$this->ref->does_exist_garbage_fee($post['gid']);

			if($this->form_validation->run() == false) {
				response(1, 'Oops! Please fill in the missing fields.', array('error' => validation_errors()));
			} else {
					$this->load->model('reference/tfo_model', 'tfo');
					//$asf = $this->tfo->save_new_ranges($post,$exist);
					//print_r($asf); echo $asf;
					if($this->tfo->save_garbage_fee($post,$exist)) {
						response(0, 'New range saved');
					} else {
						response(1, 'Failed saving tfo');
					}

			}
		} else {
			response(1, 'No inputs to save');
		}

    }

	public function update_req_tfo() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');
		if($this->reference_model->edit_required_tfo($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed Updating required tfo');
		}

		/*if(!empty($post)) {
			$this->form_validation->set_rules('tfo_id', 'Tax Fees', 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('application_id', 'Application Type', 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('type', 'Behavior', 'required|is_natural_no_zero|xss_clean');

			if($post['type'] == 1) {			// Formula
				$this->form_validation->set_rules('formula', 'Formula', 'required|xss_clean');
			} elseif($post['type'] == 2) { 		// Constant
				$this->form_validation->set_rules('value', 'Constant Value', 'required|is_natural_no_zero|xss_clean');
			} elseif($post['type'] == 3) {		// Range
				$this->form_validation->set_rules('range[]', 'Range', 'required|xss_clean');
			}

			if($this->form_validation->run() == false) {
				response(1, 'Oops! Please fill in the missing fields.', array('error' => validation_errors()));
			} else {
				$this->load->model('reference/tfo_model', 'tfo');
				if($this->tfo->save_required_tfo($post)) {
					response(0, 'New tfo saved');
				} else {
					response(1, 'Failed saving tfo');
				}
			}
		} else {
			response(1, 'No inputs to save');
		} */
	}

	public function get() {
		$this->load->model('reference/reference_model', 'reference');
		if($this->reference->get_tfo()->num_rows() > 0) {
			response(0, '', $this->reference->get_tfo()->result());
		} else {
			response(1, 'No records found.');
		}
	}

	public function get_ranges() {
		$this->load->model('reference/reference_model', 'reference');
		if( is_array($this->reference->display_range())) {
			response(0, '', $this->reference->display_range());
		} else {
			response(1, 'No records found.');
		}
	}

	public function get_garbage_fee() {
		$this->load->model('reference/reference_model', 'reference');
		if( is_array($this->reference->display_garbage_fee())) {
			response(0, '', $this->reference->display_garbage_fee());
		} else {
			response(1, 'No records found.');
		}
	}

	public function requirements($natureID = null) {
		if(!is_null($natureID)) {
			$this->load->model('reference/reference_model', 'reference');
			$set = $this->reference->get_require_tfo($natureID);

			if($set->num_rows() > 0) {
				response(0, 'Required TFO', $set->result());
			} else {
				response(1, 'No requirements found');
			}
		} else {
			response(1, 'No requirements found');
		}
	}

	public function get_tfotest($tfo_id = null) {
		if(!is_null($tfo_id)) {
			$this->load->model('reference/reference_model','ref');

			if($this->ref->get_tfotest($tfo_id)->num_rows() > 0) {
				response(0, 'Fetch tfo ambot successful', $this->ref->get_tfotest($tfo_id)->row());
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing tfo id');
		}
	}

	public function get_required_tfo_by_nature($tfo_id = null,$nature_id = null){

		if(!is_null($tfo_id) && !is_null($nature_id)) {
			$this->load->model('reference/reference_model','ref');

			if($this->ref->get_required_tfo_by_nature($tfo_id,$nature_id)->num_rows() > 0) {
				response(0, 'Fetch required tfo successful', $this->ref->get_required_tfo_by_nature($tfo_id,$nature_id)->row());
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing business nature id');
		}

	}

	public function delete_required_tfo_by_nature($required_tfoid = null , $buss_nature_id = null){
		if(!is_null($required_tfoid) && !is_null($buss_nature_id)){
			$this->load->model('reference/reference_model','ref');

			if($this->ref->delete_required_tfo_by_nature($required_tfoid,$buss_nature_id) >  0) {
				response(0, 'Delete required tfo successful', $this->ref->delete_required_tfo_by_nature($required_tfoid,$buss_nature_id));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}

	public function get_req_description($req_id = null) {
		if(!is_null($req_id)) {
			$this->load->model('reference/reference_model','ref');

			if($this->ref->get_req_description($req_id)->num_rows() > 0) {
				response(0, 'Fetch tfo ambot successful', $this->ref->get_req_description($req_id)->row());
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing tfo id');
		}
	}
	//workin na ni added bny girlie
	public function update_tfo() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');

		if($this->reference_model->update_tfo($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating business line.');
		}
	}

	public function save_new_tfo(){
		$post = $this->input->post(null, true);
		$this->load->model('reference/tfo_model', 'tfo');
			if($this->tfo->save_new_tfo($post)) {
				response(0, 'New tfo saved');
			} else {
				response(1, 'Failed saving tfo');
			}
	}

	public function update_requirements() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');

		if($this->reference_model->update_requirements($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating business line.');
		}
	}


	public function delete_tfo($required_tfoid = null){
		if(!is_null($required_tfoid)){
			$this->load->model('reference/reference_model','ref');

			if($this->ref->delete_tfo($required_tfoid) >  0) {
				response(0, 'Delete  tfo successful', $this->ref->delete_tfo($required_tfoid));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}


	public function delete_business_nature($nature_id = null){
		if(!is_null($nature_id)){
			$this->load->model('reference/reference_model','ref');

			if($this->ref->delete_business_nature($nature_id) >  0) {
				response(0, 'Delete business Nature successful', $this->ref->delete_business_nature($nature_id));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}

	public function delete_surcharges($surcharge_id = null){
		if(!is_null($surcharge_id)){
			$this->load->model('reference/reference_model','ref');

			if($this->ref->delete_surcharges($surcharge_id) >  0) {
				response(0, 'Delete Surcharges successful', $this->ref->delete_surcharges($surcharge_id));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}

	public function  copy_tfo($buss_nature_id = null){

		if(!is_null($buss_nature_id)){
			$this->load->model('reference/tfo_model');

			if($this->tfo_model->copy_tfo($buss_nature_id)){
				response(0,'TFOs has been copied');
			}else {
				response(1,'Missing input');
			}

		}else {
			response(1,'An error has occured');
		}
	}

}
