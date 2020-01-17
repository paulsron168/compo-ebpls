<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}
	

	public function index(){
	
		show(array(				
			'page' => 'payment-mode',
			'sub_title' => 'Business Permit',
			'script' => 'fees/business_permit',
			'view' => 'fees/payment-mode'
		)); 
	}
	
	public function get_requirements($natureID = null) {
		if(!is_null($natureID)) {
			$this->load->model('fees/payment_model', 'pm');

			$nature = $this->pm->get_nature($natureID);
			$requirements = array();

			if(!empty($nature)) {
				if(is_array($nature['requirements']) && !empty($nature['requirements'])) {
					$i = 0;
					foreach ($nature['requirements'] as $item) {
						$req = $this->pm->requirement($item);
						if($req->num_rows() > 0) {
							$req = $req->row();
							$requirements['requirements'][$i] = (array)$req;
							$requirements['requirements'][$i]['nature'] = $nature['nature'];
						}
						$i++;
					}
					response(0, 'Requirements', $requirements);
				} else {
					response(1, 'No requirements found for this nature');
				}
			} else {
				response(1, 'No business nature found');
			}
		} else {
			response(1, 'No Business Nature ID is specified');
		}
	}

	public function show_buss_info($ownerid = null, $businessid = 'null') {
		if( (!is_null($ownerid)) && (!is_null($businessid)) ) {
		$this->load->model('fees/payment_model');			
			if( $this->payment_model->show_buss_info($ownerid,$businessid)->num_rows() > 0) {
				response(0, 'Fetch Payer successful', $this->payment_model->show_buss_info($ownerid,$businessid)->result());				
			} else {
				response(1, 'Missing input data.');
			}
		} else {
			response(1, 'Missing owner id.');
		}	
	}

	public function assess_now() {
		$post = $this->input->post(null, true);
		if (!empty($post)) {
			$this->load->model('fees/fees_model');
			if($this->fees_model->assess_now($post)) {
				response(0, 'Assessment Saved');
			} else {
				//response(1, 'Failed saving assessment');
			}
		} else {
			response(1, 'No data to save');
		}
	}
	
	//re-assess now
	public function re_assess_now() {
		$post = $this->input->post(null, true);
		if (!empty($post)) {
			$this->load->model('fees/fees_model');
			if($this->fees_model->re_assess_now($post)) {
				response(0, 'Re-Assessment Saved');
			} else {
				response(1, 'Failed saving re-assessment');
			}
		} else {
			response(1, 'No data to save');
		}
	}

	public function assessment($assessmentID) {
		$this->load->model('fees/payment_model');
		$data = $this->payment_model->get_assessment($assessmentID);
		if(isset($data) && count($data) > 0) {

			response(0, 'For Approval', $data);

		} else {
			response(1, 'Failed retrieving record');
		}
	}

	public function stall_details($val) {
		if($val == 'C-32'){
			$val1 = 'C-32,33,34';
		}else{
			$val1 = $val;
		}
		$this->load->model('fees/payment_model');
		$data = $this->payment_model->get_stall($val1);
		
		if($data) {

			response(0, 'okeeh keeyo', $data);

		} else {
			response(1, 'soreeh keeyu');
		}
	}


	public function retirement_assess($appid) {
		$this->load->model('fees/payment_model');
		$data = $this->payment_model->retire_pay($appid);
		if(isset($data) && count($data) > 0) {

			response(0, 'For Approval', $data);

		} else {
			response(1, 'Failed retrieving record');
		}
	}

	public function approval_list() {
		$this->load->model('fees/fees_model');
		$data = $this->fees_model->getApprovalList();

		if($data->num_rows() > 0) {
			response(0, 'List for Approval', $data->result());
		} else {
			response(1, 'No Records found');
		}
	}

	/* -------------
	 * Save Payment
	 * ------------- */
	public function save_payment() {
		$post = $this->input->post(null, true);
		$this->load->model('fees/payment_model');
		
		if($this->payment_model->save_payment($post)) {
			response(0, 'Payment successful!');
		} else {
			response(1, 'There is an error in the transaction.');
		}
	}

	public function save_cancel_payment() {
		$data = $this->input->post(null, true);
		$this->load->model('fees/payment_model');
		
		if($this->payment_model->save_cancel_payment($data)) {
			response(0, 'Payment successful!');
		} else {
			response(1, 'There is an error in the transaction.');
		}
	}

	public function save_stall_payment() {
		$data = $this->input->post(null, true);
		$this->load->model('fees/payment_model');
		
		if($this->payment_model->save_stall_payment($data)) {
			response(0, 'Payment successful!');
		} else {
			response(1, 'There is an error in the transaction.');
		}
	}

	/* -------------
	 * RETIRE Payment
	 * ------------- */
	public function retire_payments() {
		$post = $this->input->post(null, true);
		$this->load->model('fees/payment_model');
		
		if($this->payment_model->retire_payment($post)) {
			response(0, 'Payment successful!');
		} else {
			response(1, 'There is an error in the transaction.');
		}
	}

	/* -------------
	 * REASSESS NOW
	 * ------------- */
	public function reassessments() {
		$post = $this->input->post(null, true);
		$this->load->model('fees/payment_model');
		
		if($this->payment_model->reassessments($post)) {
			response(0, 'Deletion successful!');
		} else {
			response(1, 'There is an error in the transaction.');
		}
	}

	/* -------------
	 * cancelled
	 * ------------- */
	public function cancelled($cancelledid) {
		$this->load->model('fees/payment_model');
		$data = $this->payment_model->get_cancelled($cancelledid);
		//print_r($data);
		if($data) {

			response(0, 'For Approval', $data);

		} else {
			response(1, 'Failed retrieving record');
		}
	}
	public function stall_pay($appid) {
		$this->load->model('fees/payment_model');
		$data = $this->payment_model->pay_stall($appid);
		if(isset($data) && count($data) > 0) {

			response(0, 'For Approval', $data);

		} else {
			response(1, 'Failed retrieving record');
		}
	}

}
