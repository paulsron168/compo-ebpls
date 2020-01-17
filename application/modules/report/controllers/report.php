<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function index() {

		if(!$this->session->userdata('username')){
			$this->login();
		}else{
			$this->load->model('report/report_model');
			show(array(
				'barangay' => $this->report_model->get_barangay(),
				'page' => 'report',
				'sub_title' => 'Report',
				'script' => 'fees/report',
				'view' => 'report/report'
			));
		}
	}

	public function login() {
	show(array(
		'page' => 'login',
		'sub_title' => 'Login',
		'script' => 'user/login',
		'view' => 'user/login'
	));}

	public function bir_report() {
		$this->load->model('report/report_model');
	show(array(
		'ownership_type' => $this->report_model->get_ownership_type()->result(),
		'page' => 'report',
		'sub_title' => 'BIR REPORTS',
		'script' => 'fees/report',
		'view' => 'report/bir_report'

	));}

	public function closed_business() {
		$this->load->model('report/report_model');
		show(array(
			//'quarter' => $this->report_model->get_quarters()->result(),
			'page' => 'report',
			'sub_title' => 'Closed Business',
			'script' => 'fees/report',
			'view' => 'report/closed_business'

		));
	}

	public function diy_v2() {
		$this->load->model('report/report_model');
		show(array(
			//'quarter' => $this->report_model->get_quarters()->result(),
			'brgy' => $this->report_model->get_barangays()->result(),
			'nature' => $this->report_model->get_natures()->result(),
			'page' => 'report',
			'sub_title' => 'DIY REPORT',
			'script' => 'fees/report',
			'view' => 'report/diy_v2'

		));
	}

	public function closed_business_search($year=null) {
		
					$this->load->model('report/report_model');
					$data = $this->report_model->get_closed_business($year)->result();
					if($data==null){
						echo "<script>alert('No Data Found');window.close();</script>" ;
					}
						if(!empty($data)){
							//echo '<pre>'.json_encode($detail).'<pre>';
							$this->data['result'] = $data;
							$this->data['date'] = $year;
							$this->load->view('report/closed_business_result',$this->data);
						}else {
							response(1, 'No Records found');
						}
					
			}			

		
	
	public function diy_v2_search($year=null) {
		
					$this->load->model('report/report_model');
					$data = $this->report_model->diy_v2_business($year)->result();
					$datass = $this->report_model->diy_v2_business1($year);
					$year = $this->report_model->diy_v2_business2($year);
					
					if($data==null){
						echo "<script>alert('No Data Found');window.close();</script>" ;
					}
						if(!empty($data)){
							//echo '<pre>'.json_encode($detail).'<pre>';
							$this->data['result'] = $data;
							$this->data['datass'] = $datass;
							$this->data['year'] = $year;
							
							$this->load->view('report/diy_v2_result',$this->data);
						}else {
							response(1, 'No Records found');
						}
					
			}	

	public function delinquent_report() {
		$this->load->model('report/report_model');
		show(array(
			//'quarter' => $this->report_model->get_quarters()->result(),
			'page' => 'report',
			'sub_title' => 'Delinquency',
			'script' => 'fees/report',
			'view' => 'report/delinquent_report'

		));
	}

	public function delinquent_reports() {
		$post = $this->input->post(null, true);
		$this->load->model('report/report_model');
		$data = $this->report_model->get_delinquent($post['getyear'])->result();
		if($data==null){
			echo "<script>alert('No Data Found');window.close();</script>" ;
		}
			if(is_array($data)) {
				//response(0, 'List for Approval', $data->result());
				$this->data['result'] = $data;
				$this->load->view('report/delinquent_report_result',$this->data);
			} else {
				response(1, 'No Records found');
			}
	}
	
	public function temp_permit_report() {
		$this->load->model('report/report_model');
	show(array(
		'ownership_type' => $this->report_model->get_ownership_type()->result(),
		'page' => 'report',
		'sub_title' => 'TEMPORARY PERMIT REPORTS',
		'script' => 'fees/report',
		'view' => 'report/temp_permit_report'

	));}

	public function temp_permit_report_search() {
		$post = $this->input->post(null, true);
		$this->load->model('report/report_model');
		$data = $this->report_model->get_temp_permit_report($post['getyear'])->result();

			if(is_array($data)) {
				//response(0, 'List for Approval', $data->result());
				//echo '<pre>'.json_encode($data).'<pre>';
				$this->data['result'] = $data;
				$this->load->view('report/temp_permit_result',$this->data);
			} else {
				response(1, 'No Records found');
			}
	}

	public function bir_report_search() {
		$post = $this->input->post(null, true);
		$this->load->model('report/report_model');
		$data = $this->report_model->get_bir_report($post['getyear'])->result();

			if(is_array($data)) {
				//response(0, 'List for Approval', $data->result());
				//echo '<pre>'.json_encode($data).'<pre>';
				$this->data['result'] = $data;
				$this->load->view('report/bir_report_result',$this->data);
			} else {
				response(1, 'No Records found');
			}
	}

	//insert cherry
	public function bsp_report_search(){
		$post = $this->input->post(null, true);
		$this->load->model('report/report_model');
		$data = $this->report_model->get_bsp($post['getyear'])->result();

			if(is_array($data)) {
				$this->data['result'] = $data;
				$this->load->view('report/bsp_report_result',$this->data);
			} else {
				response(1, 'No Records found');
			}

	}
	public function bsp_report() {
		$this->load->model('report/report_model');
		show(array(
			//'quarter' => $this->report_model->get_quarters()->result(),
			'page' => 'report',
			'sub_title' => 'BSP Report',
			'script' => 'fees/report',
			'view' => 'report/bsp_report'

		));
	}//end cherry

	public function dti_report_search() {
		$post = $this->input->post(null, true);
		$this->load->model('report/report_model');
		$data = $this->report_model->get_dti($post['getyear'])->result();

			if(is_array($data)) {
				//response(0, 'List for Approval', $data->result());
				$this->data['result'] = $data;
				$this->load->view('report/dti_reports_result',$this->data);
			} else {
				response(1, 'No Records found');
			}
	}

	public function dti_reports() {
		$this->load->model('report/report_model');
	show(array(
		'ownership_type' => $this->report_model->get_ownership_type()->result(),
		'page' => 'report',
		'sub_title' => 'DTI REPORTS',
		'script' => 'fees/report',
		'view' => 'report/dti_reports'

	));}


	public function billing($assess_id = null) {
		$this->load->model('report/report_model');
	show(array(
		'billings' => $this->report_model->get_assessment(),
		'page' => 'report',
		'sub_title' => 'Billings and Notices',
		'script' => 'fees/report',
		'view' => 'report/billing'

	));}

	public function notices($app_id = null) {
		if(!is_null($app_id)){
			$this->load->model('report/report_model', 'fees');
			$details = $this->fees->notice($app_id);

			if(!empty($details)) {

				if($details['error']!=1){
					$this->data['error'] = $details['error'];
					$this->data['payment_mode'] = $details['payment_mode'];
					$this->data['details'] = $details['owner_detail'];
					$this->data['breakdowns'] = (array)$details['breakdowns'];
					$this->load->view('report/notice_of_billing', $this->data);
				} else{
					$this->data['error'] = $details['error'];
					$this->data['msg'] = $details['msg'];
					$this->load->view('report/notice_of_billing', $this->data);
				}
			}
		}
		else{

			echo 'error';
		}

	}

	public function cease_desist($app_id = null) {

		if(!is_null($app_id)){
			$this->load->model('report/report_model', 'fees');
			$details = $this->fees->demand_letter($app_id);
			$settings = $this->fees->get_admin_details()->result();
			/*if(!empty($details)) {

			}*/
				$this->data['details'] = $details;
				$this->data['settings'] = $settings;
				$this->load->view('report/cease_desist', $this->data);
		}
		else{

			echo 'error';
		}
	}

	public function letter($app_id = null) {
		if(!is_null($app_id)){
			$this->load->model('report/report_model', 'fees');
			$details = $this->fees->demand_letter($app_id);
			$settings = $this->fees->get_admin_details()->result();
			if(!empty($details)) {
				$this->data['details'] = $details;
				$this->data['settings'] = $settings;
				/*$this->data['breakdowns'] = (array)$details['breakdowns'];
					if (!empty($this->data['breakdowns'])){
						//echo 'd';
					} else {
						//echo 'duh';
					}*/
				$this->load->view('report/demand_letter', $this->data);

			}
		}
		else{

			echo 'error';
		}

	}

	public function diy_report() {
		$this->load->model('report/report_model');
		show(array(
			'headers' => $this->report_model->get_headers(),
			'page' => 'report',
			'sub_title' => 'DIY Report',
			'script' => 'fees/report',
			'view' => 'report/diy_report'

		));
	}


	public function dilg_report_choose() {
		$this->load->model('report/report_model');
		show(array(
			'quarter' => $this->report_model->get_quarters()->result(),
			'page' => 'report',
			'sub_title' => 'DILG Report',
			'script' => 'fees/report',
			'view' => 'report/dilg_report_choose_quarter'

		));
	}

	public function dilg_report() {
		$this->load->model('report/report_model');
		show(array(
			//'quarter' => $this->report_model->get_quarters()->result(),
			'page' => 'report',
			'sub_title' => 'DILG Report',
			'script' => 'fees/report',
			'view' => 'report/dilg_report'

		));
	}

	public function get_dilg_report($year = null, $quarter = null) {

		if(!is_null($year)){

			$this->load->model('report/report_model');
			$details = $this->report_model->get_dilg_report($year,$quarter);
			//echo '<pre>'.$year.'&'.$quarter.'<pre>';
				if(!empty($details)){
					// echo '<pre>'.json_encode($details,JSON_PRETTY_PRINT).'<pre>'
					 $data['details'] = $details;
					$this->load->view('report/dilg_report',$data);

				}

		} else { echo "hoi";
			response(1,'An error has occured');
		}
	}

	public function blgf_report() {
		$this->load->model('report/report_model');
		show(array(
			'quarter' => $this->report_model->get_quarters()->result(),
			'page' => 'report',
			'sub_title' => 'BLGF Report',
			'script' => 'fees/report',
			'view' => 'report/blgf_choose_quarter'

		));
	}

	public function get_blgf_report($year = null, $quarter = null) {

			$this->load->model('report/report_model');
			$details= $this->report_model->get_blgf_report($year,$quarter);

				if(is_array($details)){
					//echo '<pre>'.json_encode($detail).'<pre>';
					$this->data['detailed'] = $details['amusement_query'];
					$this->data['detail'] = $details;
					$this->load->view('report/blgf_report_new',$this->data);
				}
				else {
					response(1,'An error has occured');
				}
			
	}																									

	

		
	public function get_diy_report(){

		$post = $this->input->post(null, true);
			if(!is_null($post))		{
				$this->load->model('report/report_model');
				$data = $this->report_model->get_diy_report($post);

				$this->data['choosen_headers'] = $data['user_headers'];
				$this->data['report_title'] = $post['report_title'];
				$this->data['result'] = $data['result'];
				$this->load->view('report/diy_report_result',$this->data);

			}else {
				response(1,'Could not retrieve data');
			}
	}
}
