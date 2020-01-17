<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirements extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	/* --------------------------------
	 * Save / Update Requirements
	 * Called by ajax from reference.js
	 * -------------------------------- */
	
	public function save() {
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');

		if(!empty($post)) {
			$this->load->model('reference/reference_model', 'reference');
			$this->form_validation->set_rules('description', 'Requirement Title', 'required|xss_clean');

			if($this->form_validation->run() == false) {
				response(1, 'Please fill in the missing fields.');
			} else {
				if($this->reference->saveRequirements($post)) {
					response(0, 'Requirements saved.');
				} else {
					response(1, 'Failed saving requirements');
				}
			}
		} else {
			response(1, 'No records to save.');
		}
	}

	public function gettfo_amt($tfo_ID){
		
		$tfoa = $this->load->model('reference/reference_model', 'reference');
		
		if($this->reference->get_tfo_amt($tfo_ID))
		{
			response(0," ", $this->reference->get_tfo_amt($tfo_ID));
		}

	}

	public function save_surcharge(){

		$post = $this->input->post(null, true);
		$this->load->library('form_validation');

		if(!empty($post)) {
			
			$this->form_validation->set_rules('date_renew' ,'Renew Date', 'required|xss_clean');
			$this->form_validation->set_rules('surcharge' ,'Surcharge', 'required|xss_clean');
			$this->form_validation->set_rules('interest' ,'Interest', 'required|xss_clean');

			if($this->form_validation->run() == false){
				response(1, 'Please fill in the missing fields');
			} else {
				$this->load->model('reference/reference_model', 'reference');
				if($this->reference->saveSurcharge($post)) {
					response(0, 'Surcharge  Saved');
				} else {
					response(1, 'Failed saving Surcharge');
				}
			}
		} else {
			response(1, 'Please fill in the missing fields');
		}
	}
	
	

	public function get($buss_id = null) {
		$this->load->model('reference/reference_model', 'reference');
		if($this->reference->get_requirements($buss_id)->num_rows() > 0) {
			response(0, 'Requirements', $this->reference->get_requirements($buss_id)->{ !is_null($buss_id) ? 'row' : 'result' }());
		} else {
			response(1, 'No requirements found.');
		}
	}

	// public function get($natureID = null) {
	// 	if(!is_null($natureID)) {
	// 		$this->load->model('reference/reference_model', 'reference');

	// 		$set = $this->reference->get_requirements($natureID);
	// 		if($set->num_rows() > 0) {
	// 			response(0, 'List of Requirements', $set->result());
	// 		} else {
	// 			response(1, 'No requirements found for this nature of business.');
	// 		}
	// 	} else {

	// 	}
	// }

	public function remove($requirement_id = null) {
		if(!is_null($requirement_id)) {
			$this->load->model('reference/reference_model', 'reference');
			//if($this->reference->remove_requirements($requirement_id)) {
			if($this->reference->remove_requirements($requirement_id)) {
				response(0, 'Selected requirement successfully removed.');
			} else {
				response(1, 'Unable to remove the specified requirement.');
			}
		} else {
			response(1, 'No requirement id specified.');
		}
	}
	
	public function remove_req_gen($requirement_id = null) {
		if(!is_null($requirement_id)) {
			$this->load->model('reference/reference_model', 'reference');
			//if($this->reference->remove_requirements($requirement_id)) {
			if($this->reference->remove_gen_requirements($requirement_id)) {
				response(0, 'Selected requirement successfully removed.');
			} else {
				response(1, 'Unable to remove the specified requirement.');
			}
		} else {
			response(1, 'No requirement id specified.');
		}
	}

	public function get_required_tfo($natureID = null,$app_id = null) {
		//if(!is_null($natureID) && !is_null($app_id)) {
		if(!is_null($natureID)) {
			$this->load->model('reference/requirements_model', 'rm');
			$tfo = $this->rm->get_required_tfo($natureID,$app_id);

			if($tfo->num_rows() > 0) {
				response(0, 'List of Required TFO', $tfo->result());
			} else {
				response(1, 'No records found');
			}
		} else {
			response(1, 'No busines nature id specified');
		}
	}

	/* public function get_requirements($natureID = null) {
		if(!is_null($natureID)) {
			$this->load->model('reference/requirements_model', 'rm');

			$nature = $this->rm->get_nature($natureID);
			$requirements = array();
			$diff = array();
			$all_requirements = $this->rm->get_all_reqts();
			//$diff = array_diff($all_requirements,$nature);
			//print_r($diff);
			if(!empty($nature)) {
				if(is_array($nature['requirements']) && !empty($nature['requirements'])) {
					$i = 0;
					foreach ($nature['requirements'] as $item) {
						$req = $this->rm->requirement($item);
						if($req->num_rows() > 0) {
							$req = $req->row();
							$requirements['requirements'][$i] = (array)$req;
							$requirements['requirements'][$i]['nature'] = $nature['nature'];
						}
						$i++;
					}
					$diff = array('reqt' =>$requirements, 'all_requirements' =>$all_requirements);
						response(0, 'Requirements', $diff);
						
				} else {
					$buss_nature = (Array)$this->rm->get_buss_nature($natureID)->row();
					$requirements['requirements'][0]['nature'] = $buss_nature['business_nature'];
					$diff = array('reqt' => $requirements, 'all_requirements' =>$all_requirements);
					response(0, 'No requirements found for this nature',$diff);
				}
			} else {
				response(1, 'No business nature found');
			}
		} else {
			response(1, 'No Business Nature ID is specified');
		}
	} */
	
	
	public function get_requirements($natureID = null, $application_id = null) {
		if(!is_null($natureID)) {
			$this->load->model('reference/requirements_model', 'rm');

			$nature = $this->rm->get_nature($natureID,$application_id);
			$requirements = array();
			$diff = array();
			$store_req = array();
			$rem = array();
			$j=0;
			$all_requirements =  $this->rm->get_rem_reqts($natureID);
			//print_r($all_requirements);
			if(!is_null($nature)) {
				foreach($all_requirements as $rem_req){
					$rr = $this->rm->requirement($rem_req);
						if($rr->num_rows > 0){
							$remaining_req = $rr->row();
							$store_req[$j]['req'] = $remaining_req;
						}
						//$requirements['requirements'][$j]['nature'] = $nature['nature'];	
						/*$store_req[$j]['nature'] = $nature['nature'];*/
						$j++;
				}
				if(is_array($nature['requirements']) && !empty($nature['requirements'])) {
					$i = 0;
					foreach ($nature['requirements'] as $item) {
						$req = $this->rm->requirement($item);
						//if($req->num_rows() > 0) {
							$req = $req->row();
							$requirements['requirements'][$i] = (array)$req;
							$requirements['requirements'][$i]['nature'] = $nature['nature'];							
						//}else {  }
						$i++;
					} 
														
					$diff = array('reqt' =>$requirements, 'all_requirements' =>$store_req);
					response(0, 'Requirements', $diff);
				} else { 
					$buss_nature = (Array)$this->rm->get_buss_nature($natureID)->row();
					$requirements['requirements'][0]['nature'] = $buss_nature['business_nature'];				
					$diff = array('reqt' => $requirements,'nature' =>$buss_nature['business_nature'], 'all_requirements' =>$store_req);
					
					response(0, 'No requirements found for this nature',$diff);
				}
			} else {
				response(1, 'No business nature found');
			}
		} else {
			response(1, 'No Business Nature ID is specified');
		}
	}

	public function add_requirement() {
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');
	//print_r($post);
		if(!empty($post)) {
			$this->load->model('reference/requirements_model', 'rm');
			$this->form_validation->set_rules('requirement_id', 'Requirement Title', 'required|xss_clean');

			if($this->form_validation->run() == false) {
				response(1, 'Please fill in the missing fields.');
			} else {
				if($this->rm->add_requirement($post)) {
					response(0, 'Requirements saved.');
				} else {
					response(1, 'Failed saving requirements');
				}
			}
		} else {
			response(1, 'No records to save.');
		}
	}

	
	public function save_nature(){
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');

		if(!empty($post)) {			
				$this->load->model('reference/reference_model', 'ref');
				$res = $this->ref->save_nature($post) ;
				
				if($res == 1){
					response(0, 'Business Nature Saved');
				}elseif($res == 100){
					response(100, 'Business Nature Already in Database');
				}else{
					response(1, 'Failed saving Business Nature');
				}
			
		} else {
			response(1, 'Please fill in the missing fields');
		}
	}
	
	public function get_business_nature($buss_id = null,$buss_applid = null){	
		//return $this->ref->get_business_nature();
		if(!is_null($buss_id)) {
			$this->load->model('reference/reference_model', 'ref');

			if($this->ref->get_business_nature($buss_id,$buss_applid)->num_rows() > 0) {
				response(0, 'Fetch business nature ambot successful', $this->ref->get_business_nature($buss_id,$buss_applid)->row());
			}else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing tfo id');
		}
	}
	
	public function update_buss_nature() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');

		if($this->reference_model->update_buss_nature($post)) {
			response(0, 'Update successful');
			
					} else {
			response(1, 'Failed updating business line.');
		}
	}

public function get_surcharge($surch_id = null) {
		if(!is_null($surch_id)) {
			$this->load->model('reference/reference_model','ref');

			if($this->ref->get_all_surcharge($surch_id)->num_rows() > 0) {
				response(0, 'Fetch surcharge ambot successful', $this->ref->get_all_surcharge($surch_id)->row());
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing surcharge id');
		}
	}

	public function update_surcharge() {
		$post = $this->input->post(null, true);
		$this->load->model('reference/reference_model');

		if($this->reference_model->update_all_surcharge($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating business line.');
		}
	}
	
	public function get_all_reqts(){
		$this->load->model('reference/requirements_model', 'rm');
		 response(0,'', $this->rm->get_all_reqts());
	}
		
}