<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fees extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();

	}

	public function index() {

		$this->load->library('pagination');
		$this->load->model('fees/fees_model');
		$data['base_url'] = site_url('fees');
		$data['total_rows'] = $this->fees_model->count_owner('pending');
		$data['per_page'] =30;
		$data['num_links'] = 10;
		$data['records'] =  $this->fees_model->get_owners2('pending',$data['per_page'],$this->uri->segment(3));
		
		$this->pagination->initialize($data);
		show(array(
			'assess_taxpayers' =>$this->fees_model->get_to_assess_owner('pending'),
			'app_type' =>$this->fees_model->get_application_type(),
			//'for_payment' => $this->fees_model->get_approval_list(),
			'brgys' => $this->fees_model->get_barangays(),
			'amendment' =>$this->fees_model->get_amendment(),
			'application_type' => $this->fees_model->get_types('application'),
			'classification_type' => $this->fees_model->get_types('classification'),
			'occupancy_type' => $this->fees_model->get_types('occupancy'),
			'ownership_type' => $this->fees_model->get_types('ownership'),
			'payment_type' => $this->fees_model->get_types('payment'),
			'permit_type' => $this->fees_model->get_types('permit'),
			'property_type' =>$this->fees_model->get_types('property'),
			'business_nature' => $this->fees_model->get_types('business_nature', true, 'application_id,buss_nature_id, business_nature', 'business_nature','buss_nature_id !=0 '),
			'renew_requirements' => $this->fees_model->get_renew_requirements(),
			'taxpayers' => $this->fees_model->get_owners('pending'),	//originally pending
			'taxpayers1' => $this->fees_model->get_owners11('pending'),	//originally pending
			'for_payment' =>$this->fees_model->getApprovalList(),
			'for_release' =>$this->fees_model->get_release(),
			'for_summary' =>$this->fees_model->get_release1(),
			'settings' =>$this->fees_model->get_admin_details()->result(),
			'tfo' => $this->fees_model->tfo_droplist()->result(),
			'stallzz' => $this->fees_model->stalz()->result(),
			'reqs' => $this->fees_model->requirement_details()->result(),
		//  'addtltfo'=> $this->fees_model->get_additionaltfo(0)->result(),		
		//	'links' =>$this->pagination->create_links(),
			'page' => 'business_permit',
			'sub_title' => 'Business Permit',
			'script' => 'fees/business_permit',
			'view' => 'fees/business_permit'
		));
	}

	public function release($paymentID = null) {
		if(!is_null($paymentID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_payment_details($paymentID);
			$get_admin_details = $this->fees->get_admin_details()->result();
			$getdet = $this->fees->get_payment_details2($paymentID)->result();

			// print_r($details->row());
			

			if($details->num_rows() > 0) {
				$this->data['details'] = $details->row();
				$this->data['settings'] = $get_admin_details;
				$this->data['getdet'] = $getdet;
			    $this->load->view('fees/mayor_permit2',$this->data);// this is workin' baby :P
			}
		} else {
			redirect('fees');
		}
	}

	public function getamt($tfo_id1)
	{
		$this->load->model('fees/fees_model', 'fees');

		if($this->fees->get_tfoamount($tfo_id1))
		{
			response(0," ", $this->fees->get_tfoamount($tfo_id1));
		}
	}

	public function retirement($app_id) {
		$this->load->model('fees/fees_model');
		$data = $this->fees_model->retirement($app_id);
		
		if(isset($data) && count($data) > 0) {

			response(0, 'For Approval', $data);

		} else {
			response(1, 'Failed retrieving record');
		}
	}
	
	public function view_document($businessid = null) {
		if(!is_null($businessid)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->view_details($businessid);
			
				if($details->num_rows() > 0) {
					$this->data['details'] = $details->row();
					$this->load->view('fees/view_docu',$this->data);// this is workin' baby :P
				} else{
					echo "<script>alert('Not yet paid');window.close();</script>" ;
				}
			
		} else {
			redirect('fees');
		}
	}

	public function view_application($businessid = null) {
		if(!is_null($businessid)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->view_app_details($businessid);
			$nat = $this->fees->view_app_details_nature($businessid);
			$admin = $this->fees->get_admin_details();
			
				if($nat->num_rows() > 0) {
					$this->data['details'] = $details->row();
					$this->data['nat'] = $nat->result();
					$this->data['admin'] = $admin->result();
					$this->load->view('fees/view_app',$this->data);// this is workin' baby :P
				} else{
					echo "<script>alert('Not yet paid');window.close();</script>" ;
				}
			
		} else {
			redirect('fees');
		}
	}

	


	public function release_mayorpermit($paymentID = null) {
		if(!is_null($paymentID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_payment_details($paymentID);
			$get_admin_details = $this->fees->get_admin_details()->result();
			$getdet = $this->fees->get_payment_details2($paymentID)->result();

			// print_r($details->row());
			

			if($details->num_rows() > 0) {
				$this->data['details'] = $details->row();
				$this->data['settings'] = $get_admin_details;
				$this->data['getdet'] = $getdet;
			    $this->load->view('fees/mayor_permit3',$this->data);// this is workin' baby :P
			}
		} else {
			redirect('fees');
		}
	}

	public function release_temp($paymentID = null) {
		if(!is_null($paymentID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_payment_details_temp($paymentID);
			$get_admin_details = $this->fees->get_admin_details()->result();
			$getdet = $this->fees->get_payment_details_temp2($paymentID)->result();
		
			if($details->num_rows() > 0) {
				$this->data['details'] = $details->row();
				$this->data['settings'] = $get_admin_details;
				$this->data['getdet'] = $getdet;
			    $this->load->view('fees/mayor_permit1',$this->data);// this is workin' baby :P
			}
		} else {
			redirect('fees');
		}
	}

	public function release_retirementcert($paymentID = null) {
		if(!is_null($paymentID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_retire_details_temp($paymentID);
			$admin = $this->fees->get_admin_details()->result();
		
			if($details->num_rows() > 0) {
				$this->data['details'] = $details->row();
				$this->data['admin'] = $admin;
			    $this->load->view('fees/retire_cert',$this->data);
			}
		} else {
			redirect('fees');
		}
	}

	public function release_retirementcert2($paymentID = null) {
		if(!is_null($paymentID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_retire_details_temp($paymentID);
			$admin = $this->fees->get_admin_details()->result();
		
			if($details->num_rows() > 0) {
				$this->data['details'] = $details->row();
				$this->data['admin'] = $admin;
			    $this->load->view('fees/retire_cert2',$this->data);
			}
		} else {
			redirect('fees');
		}
	}


	public function print_cert($cancellID = null) {
		if(!is_null($cancellID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_cancel_details($cancellID);
			$admin = $this->fees->get_admin_details()->result();
		
			if($details->num_rows() > 0) {
				$this->data['details'] = $details->row();
				$this->data['admin'] = $admin;
			    $this->load->view('fees/print_cancel_cert',$this->data);
			}
		} else {
			redirect('fees');
		}
	}
	public function print_cert2($cancellID = null) {
		if(!is_null($cancellID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_cancel_details($cancellID);
			$admin = $this->fees->get_admin_details()->result();
		
			if($details->num_rows() > 0) {
				$this->data['details'] = $details->row();
				$this->data['admin'] = $admin;
			    $this->load->view('fees/print_cancel_cert2',$this->data);
			}
		} else {
			redirect('fees');
		}
	}


	public function print_receipt($paymentID = null,$assessID = null,$countss=null){
		
		if(!is_null($paymentID) && !is_null($assessID)){

			$this->load->model('fees/fees_model', 'fees');
			$info = $this->fees->get_payment_details($paymentID);
			$details = $this->fees->get_details($paymentID,$assessID,$countss); 
			// print_r($details['tfos']);
			if($details['tfos']==null){
				echo "<script>alert('Not yet paid');window.close();</script>" ;
			}
			$get_admin_details = $this->fees->get_admin_details()->result();
		
			if($details) {
				$this->data['info1'] = $info->result();
				$this->data['info'] = $info->row();
				$this->data['details'] = $details;
				$this->data['settings'] = $get_admin_details;
			
				$this->load->view('fees/print_receipt',$this->data);// this is workin' baby :P
			}

		}else{
			redirect('fees');
		}

	}

	public function print_receipt_stall($assessID = null,$countss = null,$buss_id = null){
		if(!is_null($assessID) && !is_null($buss_id)){

			$this->load->model('fees/fees_model', 'fees');
			$info = $this->fees->get_stall_info($assessID, $buss_id);
			$details = $this->fees->get_stall_payment($assessID, $countss, $buss_id)->result(); 
			$get_admin_details = $this->fees->get_admin_details()->result();

			if($details) {
				 $this->data['info1'] = $info->result();
				 $this->data['info'] = $info->row();
				$this->data['details'] = $details;
				$this->data['settings'] = $get_admin_details;
			
				$this->load->view('fees/print_stall_receipt',$this->data);
			}

		}else{
			redirect('fees');
		}

	}

	public function retire_receipt($paymentID = null,$assessID = null,$countss=null){
		
		if(!is_null($paymentID) && !is_null($assessID)){

			$this->load->model('fees/fees_model', 'fees');
			$info = $this->fees->get_retire_details($paymentID);
			$details = $this->fees->get_details_retire($paymentID,$assessID,$countss); 
			// print_r($details['tfos']);
			if($details['tfos']==null){
				echo "<script>alert('Not yet paid');window.close();</script>" ;
			}
			$get_admin_details = $this->fees->get_admin_details()->result();
		
			if($details) {
				$this->data['info1'] = $info->result();
				$this->data['info'] = $info->row();
				$this->data['details'] = $details;
				$this->data['settings'] = $get_admin_details;
			
				$this->load->view('fees/retire_receipt',$this->data);// this is workin' baby :P
			}

		}else{
			redirect('fees');
		}

	}
	
	public function pre_print($paymentID = null) {
		if(!is_null($paymentID)) {
			$this->load->model('fees/fees_model', 'fees');
			$details = $this->fees->get_payment_details($paymentID);
			//print_r(($details->row()));
			if($details->num_rows() > 0) {
				$this->data['pre_print'] = $details->row();
				$this->load->view('fees/pre_print',$this->data);

			}
		} else {
			redirect('fees');
		}
	}

	public function compute_formula($requiredTfoID, $capital) {
		$this->load->model('fees/fees_model');
		$tfo = $this->fees_model->get_required_tfo($requiredTfoID);

		if($tfo->num_rows() > 0) {
			$tfo = $tfo->row();
			$formula = $tfo->value;
			$variables = $tfo->variables;
			echo compute($formula, $variables, $capital);
		}
	}

	public function test() {
		$variable = json_encode(array(
			'c' => 200,
			'm' => 4
		));


		$a = '{"mp":"6","m":"80"}';
		$s = array('A' => 100, 'm' => 5);
		// echo '<pre>'; print_r((array)$a); echo '</pre>'; exit;
		$formula = '$A + $m';
		echo compute($formula, json_encode($s), 100);

	}

//requirements
	public function info_details($app_id) {
		$this->load->model('fees/fees_model');
		$data = $this->fees_model->info_details($app_id);
		if(isset($data) && count($data) > 0) {

			response(0, 'For Approval', $data);

		} else {
			response(1, 'Failed retrieving record');
		}
	}
	
//summary
	public function summary_details($buss_id) {
		$this->load->model('fees/fees_model');
		$data = $this->fees_model->summary_details($buss_id);
		if(isset($data) && count($data) > 0) {

			response(0, 'For Approval', $data);

		} else {
			response(1, 'Failed retrieving record');
		}
	}
	

	public function printAssessment($app_id = null){
			$this->load->library('form_validation');
			$post = $this->input->post(null, true);

			$this->load->model('fees/fees_model');
	
			$info = $this->fees_model->print_assessment_details($app_id);
			$details = $this->fees_model->print_assessment($app_id);
			
			if($details) {

				$this->data['info'] = $info->result();
				$this->data['details'] = $details;

				$this->load->view('fees/assessment_print',$this->data);
				
			}
			else{
				var_dump('error');
			}
	}
	public function retirenathis(){
		
	//taking data per segment 
	// order by
	//owner_id, app_id, bussinessid, buss_nature_id, capital
	//starts at 3

	//echo $this->uri->segment(3);

		$data = array(
			// 'owner_id' => $this->uri->segment(3),
			'app_id' => $this->uri->segment(3),
			'businessid' => $this->uri->segment(4),
			'buss_nature_id' => $this->uri->segment(5),
			'capital' => $this->uri->segment(6),
			'status' => 'Unpaid'
		);
		// echo $data['owner_id'];
		// echo $data['app_id'];
		// echo $data['bussinessid'];
		// echo $data['buss_nature_id'];
		// echo $data['capital'];

		$this->load->model('fees/fees_model');
		$query = $this->fees_model->addcancelled($data);
		
		if($query){
				response(0,'Successfully deleted the nature for this business');
			}else{
				response(1,$query);
			}
		
	}
}
