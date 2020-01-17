
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Owner extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function save_owner() {
		$this->load->library('form_validation');
		$post = $this->input->post(null, true);
		//print_r($post);
		if(!empty($post)) {

				/* --------------------
				 * Save / Update Owner
				 * -------------------- */
				$this->load->model('fees/owner_model');
				$post['created_at'] = date('m-d-Y');
				$post['modified_at'] = '01-01-1970';
				if($this->owner_model->save_owner($post)) {
					response(0, 'Successfully added a new Business Owner.', array('owner_id' => $this->session->userdata('owner_id'),'ownership_id' => $post['ownership_id']));
				} else {
					response(1, 'Failed saving business owner details.');
				}

		} else {
			response(1, 'Missing input data.');
		}
	}

	public function save_business() {
		$this->load->library('form_validation');
		$post = $this->input->post(null, true);

		if(!empty($post)) {
				$this->load->model('fees/owner_model');
				if($this->owner_model->save_business($post)) {
					response(0, 'Successfully added a new Business', array('buss_id' => $this->session->userdata('buss_id')));
				} else {
					response(1, 'Failed saving business details.');
				}
			} else{
				/* --------------------
				 * Save / Update Owner
				 * -------------------- */
				$this->load->model('fees/owner_model');
				if($this->owner_model->save_business($post)) {
					response(0, 'Successfully added a new Business', array( 'owner_id'=> $this->session->userdata('owner_id'),
																			'buss_id' => $this->session->userdata('buss_id')
																		  ));
				} else {
					response(1, 'Failed saving business details.');
				}
			}
		} else {
			response(1, 'Missing input data.');
		}
	}

	public function save_renew() {
		$post = $this->input->post(null, true);
		$this->load->model('fees/fees_model');
		if($this->fees_model->save_renew($post)) {
			response(0, 'sucess');
		} else {
			response(1, 'failed saving to the database');
		}
	}

	public function add_business_line() {
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');

		if(!empty($post)) {
			$this->form_validation->set_rules('buss_nature_id', 'Business Nature', 'required|xss_clean');
			$this->form_validation->set_rules('capital', 'Capital', 'required|numeric|xss_clean');
			// $this->form_validation->set_rules('requirements[]', 'Business Requirements', 'required|xss_clean');

			if($this->form_validation->run() == false) {
				response(1, 'Please fill in the missing fields.');
			} else {
				/* --------------------
				 * Save / Update Owner
				 * -------------------- */
				$this->load->model('fees/owner_model');

				// Uncomment this later
				// unset($post['requirements']);
				$id = $this->owner_model->add_business_line($post);
				if($id) {
					response(0, 'Successfully added a new application', array('bus_line_id' => $id));
				} else {
					response(1, $id);
				}
			}
		} else {
			response(1, 'Missing input data.');
		}
	}

	public function save_application() {
		$this->load->library('form_validation');
		$post = $this->input->post(null, true);
		//print_r($post);
		if(!empty($post)) {
			$this->form_validation->set_rules('buss_nature_id', 'Business Nature', 'required|xss_clean');
			$this->form_validation->set_rules('capital', 'Capital', 'required|numeric|xss_clean');
			// $this->form_validation->set_rules('requirements[]', 'Business Requirements', 'required|xss_clean');

			if($this->form_validation->run() == false) {
				response(1, 'Please fill in the missing fields.');
			} else {
				/* --------------------
				 * Save / Update Owner
				 * -------------------- */
				$this->load->model('fees/owner_model');

				// Uncomment this later
				/* unset($post['buss_nature_id']);
				unset($post['capital']); */

				if($this->owner_model->save_application($this->session->userdata('owner_id'), $this->session->userdata('buss_id'), $post)) {
					response(0, 'Successfully added a new application');
				} else {
					//print_r($this->owner_model->save_application($this->session->userdata('owner_id'), $this->session->userdata('buss_id'), $post));
					echo $this->db->_error_message();
					//response(1, 'Failed saving application details.');
				}
			}
		} else {
			response(1, 'Missing input data.');
		}
	}

	/* ----------------------------------------------
	 * Separate Update function for a Business Nature
	 * ---------------------------------------------- */
	public function update_application() {
		$post = $this->input->post(null, true);
		$this->load->model('fees/owner_model');
		if($this->owner_model->update_application($post)) {
			response(0, 'Application updated successfully');
		} else {
			response(1, 'Failed updating application');
		}
	}

	public function update_business_line() {
		$post = $this->input->post(null, true);
		$this->load->model('fees/owner_model');

		if($this->owner_model->update_business_line($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating business line.');
		}
	}

	public function get_owner($owner_id = null,$buss_id = null) {
		if(!is_null($owner_id)) {
			$this->load->model('fees/owner_model');

			if($this->owner_model->get_owner($owner_id,$buss_id)->num_rows() > 0) {
				response(0, 'Fetch owner successful', $this->owner_model->get_owner($owner_id,$buss_id)->row());
			} else {
				response(1, 'Missing input data.');
			}
		} else {
			response(1, 'Missing owner id.');
		}
	}

	public function get_owner2($owner_id = null) {
		if(!is_null($owner_id)) {
			$this->load->model('fees/owner_model');

			if($this->owner_model->get_owner2($owner_id)->num_rows() > 0) {
				response(0, 'Fetch owner successful', $this->owner_model->get_owner2($owner_id)->row());
			} else {
				response(1, 'Missing input data.');
			}
		} else {
			response(1, 'Missing owner id.');
		}
	}
	//boloi wants to try
	public function get_bussiness_lines($owner_id = null,$buss_id = null) {
		if( (!is_null($owner_id)) && (!is_null($buss_id)) ) {
			$this->load->model('fees/owner_model');

			if($this->owner_model->get_bussiness_lines($owner_id,$buss_id)->num_rows() > 0) {
				response(0, 'Fetch owner successful', $this->owner_model->get_bussiness_lines($owner_id,$buss_id)->row());
			} else {
				$this->load->model('fees/fees_model');
				$nature = $this->fees_model->get_types('business_nature', true, 'buss_nature_id, business_nature', 'buss_nature_id');
					if($nature){
						foreach ($nature as $n){
							$buss_nature[$n->buss_nature_id] = $n->business_nature;
						}
							response(0, 'Fetch Business Nature',$buss_nature);
					}
			}
		} else {
			response(1, 'Missing owner id.');
		}
	}

	//by boloi

	public function renew_status($bus_line_id = null){
		if( (!is_null($bus_line_id)) ) {
			$this->load->model('fees/owner_model');

			$info = $this->owner_model->renew_status($bus_line_id);
			if($info) {
				response(0, 'Renew Status', $info);
			} else {
				response(1, 'Failed getting status');
			}
		} else {
			response(1,'No Record for status');
		}
	}

	public function get_taxpayer_info ($owner_id = null ,$buss_id = null, $app_id = null){
		if( (!is_null($owner_id)) && (!is_null($buss_id))  && (!is_null($app_id)) ) {
			$this->load->model('fees/owner_model');

			$info = $this->owner_model->get_taxpayer_info($owner_id,$buss_id,$app_id);
			if($info) {
				response(0, 'Taxpayer Info', $info);
			} else {
				response(1, 'Failed getting taxpayer info');
			}
		} else {
			response(1,'No Record for taxpayer');
		}
	}

	public function get_business_nature($appID = null) {
		if(!is_null($appID)) {
			$this->load->model('fees/owner_model');

			$nature = $this->owner_model->get_business_nature($appID);
			if(count($nature) > 0 && !empty($nature)) {
				response(0, 'Fetch business nature', $nature);
			} else {
				response(1, 'Failed getting business nature');
			}
		} else {
			response(1, 'Missing arguments');
		}
	}

	public function get_business($buss_id = null,$app_id =  null) {
		if(!is_null($buss_id)) {
			$this->load->model('fees/owner_model');

			if($this->owner_model->get_business($buss_id)->num_rows() > 0) {
				response(0, 'Fetch business successfulssss', $this->owner_model->get_business($buss_id)->row());
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing business id');
		}
	}

	public function get_requirements($natureID = null) {
		if(!is_null($natureID)) {
			$this->load->model('fees/fees_model');
			if($this->fees_model->get_requirements($natureID)) {
				response(0, 'Requirements', $this->fees_model->get_requirements($natureID)->result());
			} else {
				response(1, 'No requirements found for this business nature.');
			}
		} else {
			response(1, 'No business nature id specified.');
		}
	}

	/* ----------------------
	 * Setter for searching
	 * ---------------------- */
	public function set($search = null, $id = null) {
		if(!is_null($search) && !is_null($id)) {
			$this->session->set_userdata($search.'_id', $id);
			response(0, ucfirst($search).' attached', array('id' => $id));
		} else {
			response(1, 'No search query specified.');
		}
	}

	/* ----------------------
	 * Getter for searching
	 * ---------------------- */
	public function get($table = '', $search = null) {
		if(!is_null($search)) {
			$this->load->model('fees/owner_model');

			if(!empty($table)) {
				if($this->owner_model->search($search, $table)->num_rows() > 0) {
					response(0, 'Record listing from '.$table, $this->owner_model->search($search, $table)->result());
				} else {
					response(1, 'No records found with that query.');
				}
			} else {
				response(1, 'No table specified.');
			}
		} else {
			response(1, 'No search query specified.');
		}
	}

	public function application($owner_id = null,$buss_id = null) {
		if(!is_null($owner_id)) {
			$this->load->model('fees/owner_model');
			if($this->owner_model->application($owner_id,$buss_id)->num_rows() > 0) {
				response(0, 'Owner Details', $this->owner_model->application($owner_id,$buss_id)->row());
			} else {
				response(1, 'No records found.');
			}
		} else {
			response(1, 'No owner id specified.');
		}
	}

	public function session() {
		$session = $this->session->all_userdata();
		response(0, 'Session Data', $session);
	}

	public function test() {
		echo '<pre>'; print_r($this->session->all_userdata()); echo '</pre>';
	}

	public function assess($appID = null) {
		if(!is_null($appID)) {
			$this->load->model('fees/fees_model');
			$assessment = $this->fees_model->getAssessment($appID);//print_r($assessment);
			if(count($assessment) > 0 && !empty($assessment)) {
				response(0, 'Assessment', $assessment);
			} else {
				response(1, 'No Records found');
			}
		} else {
			response(1, 'No owner id specified.');
		}
	}

	//Re assessment flow

	public function re_assess($appID = null) {
		if(!is_null($appID)) {
			$this->load->model('fees/fees_model');
			$assessment = $this->fees_model->getReAssessment($appID);
			// echo '<pre>'; print_r($assessment); echo '</pre>'; exit;
			if(count($assessment) > 0 && !empty($assessment)) {
				response(0, 'Re-Assessment', $assessment);
			} else {
				response(1, 'No Records found');
			}
		} else {
			response(1, 'No owner id specified.');
		}
	}

	public function clear_requirements($natureID = null, $appID = null) {
		if(!is_null($appID) && !is_null($natureID)) {
			$this->load->model('fees/fees_model');
			if($this->fees_model->clear_requirements($natureID, $appID)) {
				response(0, 'Requirements Cleared');
			} else {
				response(1, 'There is an error while clearing the requirements');
			}
		} else {
			response(1, 'Please provide an Application ID');
		}
	}

	public function add_gross($bus_line_id = null, $gross = null,$year = null){
		if(!is_null ($bus_line_id) && !is_null ($gross)){
			$this->load->model('fees/fees_model');
				if ($this->fees_model->add_gross($bus_line_id,$gross,$year)){
					response(0,'Gross Updated');
				} else {
					response(1,'Failed to add gross');
				}
		} else {
			response(1,'An error has been occurred');
		}

	}

	public function delete_business($app_id = null,$bus_line_id = null,$business_id = null){

		if(!is_null($app_id) && !is_null($bus_line_id)){
			$this->load->model('fees/owner_model');
				if($this->owner_model->delete_business($app_id,$bus_line_id,$business_id)){
					response(0,'Business has been deleted');
				}else {
					response(1,'Cannot delete business');
				}
		}
	}

	public function upload_image(){


		$config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
       /* $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;*/

        $this->load->library('upload', $config);  print_r($_FILES);
      	$permit_no = explode(".",$_FILES['file']['name']);
       		if($this->upload->do_upload("file")){

       			$this->load->model('fees/owner_model');
       				if($this->owner_model->save_photo($config['upload_path'].$_FILES['file']['name'],$permit_no[0])){
       						response(0,'Image Updated');
       				} else{
       					response(1,'Could not update image');
       				}

       		}else{
       			response(1,'Incorrect format');
       		}
	}

	public function delete_business_nature($appid = null, $natureid = null){

		if(!is_null($appid) && !is_null($natureid)){
			$this->load->model('fees/owner_model');
			$result = $this->owner_model->delete_business_nature($appid,$natureid);
			if($result){
				response(0,'Successfully deleted the nature for this business');
			}else{
				response(1,$result);
			}
		}
	}
}
