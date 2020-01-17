<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CTC extends MX_Controller {

    protected $data;
	public function __construct() {
		parent::__construct();
	}

    public function ctc_settings(){
			$this->load->model('ctc/ctc_model','ctc'); 
			show(array(
				'ctc' => $this->ctc->ctc_settings()->result(),
				'page' => 'ctc_individual_2',
				'sub_title' => 'CTC Settings',
				'view' => 'ctc/ctc_individual_2'
			));
	}
// 	public function ctcbarangay(){
// 		$this->load->model('ctc/ctc_model','ctc'); 
// 		show(array(
// 			'ctcbarangay' => $this->ctc->ctcbarangay()->result(),
// 			'page' => 'ctc_individual_2',
// 			'sub_title' => 'CTC NEW',
// 			'view' => 'ctc/ctc_individual_2'
// 		));
// }

	public function ctc_individual(){
			show(array(
				'page' => 'ctc_individual',
				'sub_title' => 'CTC Individual',
				'script' => 'fees/business_permit',
				'view' => 'ctc/ctc_individual'
			));
	}
	public function ctc_individual_2(){
		$this->load->model('ctc/ctc_model','ctc'); 
		show(array(
			'ctc' => $this->ctc->ctcbarangay()->result(),
			'viewctc' => $this->ctc->viewctc()->result(),

			'page' => 'ctc_individual_2',
			'sub_title' => 'CTC Settings',
			'script' => 'fees/business_permit',
			'view' => 'ctc/ctc_individual_2'
		));
}


	public function ctc_report(){
		$this->load->model('ctc/ctc_model','ctc'); 
			show(array(
				'ctc' => $this->ctc->ctc_report()->result(),
				'sub_title' => 'CTC Report',
				'view' => 'ctc/ctc_report',
				'page' => 'ctc_individual'
			));
	}

	public function save_ctc_indi()
	{
		$this->load->library('form_validation');
		$post = $this->input->post(null, true);
		// print_r($post);
		if(!empty($post)) {
				// $this->load->model('ctc_model/ctc_save_indi');
				$this->load->model('ctc/ctc_model','save_ctc'); 
				// $post['created_at'] = date('m-d-Y');
				// $post['modified_at'] = '01-01-1970';
				if($this->save_ctc->ctc_save_indi($post)) {
					response(0, 'Successfully added.');
				} else {
					response(1, 'Failed saving.');
				}

		} else {
			response(1, 'Missing input data.');
		}
	}

	public function ctc_corporate(){
			show(array(
				'page' => 'ctc_corporate',
				'sub_title' => 'CTC Corporate',
				'script' => 'fees/business_permit',
				'view' => 'ctc/ctc_corporate'
			));
	}
	public function ctc_corporate_2(){
		$this->load->model('ctc/ctc_model','ctc'); 
		show(array(
			'ctc' => $this->ctc->ctcbarangay()->result(),
			'viewctccorpo' => $this->ctc->viewctccorpo()->result(),
		
			'page' => 'ctc_corporate_2',
			'sub_title' => 'CTC Corporate 2',
			'script' => 'fees/business_permit',
			'view' => 'ctc/ctc_corporate_2'
		));
}

	public function save_ctc_corp()
	{
		$this->load->library('form_validation');
		$post = $this->input->post(null, true);
		// print_r($post);
		if(!empty($post)) {
				// $this->load->model('ctc_model/ctc_save_indi');
				$this->load->model('ctc/ctc_model','save_ctc'); 
				// $post['created_at'] = date('m-d-Y');
				// $post['modified_at'] = '01-01-1970';
				if($this->save_ctc->ctc_save_corp($post)) {
					response(0, 'Successfully added.');
				} else {
					response(1, 'Failed saving.');
				}

		} else {
			response(1, 'Missing input data.');
		}
	}

	public function view_ctc($businessid = null) {
		// echo 'haahhahaah';
		if(!is_null($businessid)) {
			$this->load->model('ctc/ctc_model', 'ctc');
			$details = $this->ctc->view_details($businessid);
			$admin = $this->ctc->admin();
			
				if($details->num_rows() > 0) {
					$this->data['ctc1'] = $details->result();
					$this->data['admin'] = $admin->result();
					$this->load->view('ctc/ctc_print',$this->data);// this is workin' baby :P
				} else{
					echo "<script>alert('Not yet paid');window.close();</script>" ;
				}
			
		} else {
			redirect('ctc');
		}
	}
	public function view_ctc_corp($businessid2 = null) {
		if(!is_null($businessid2)) {
			$this->load->model('ctc/ctc_model', 'ctc');
			$details = $this->ctc->view_details_corp($businessid2);
			$admin = $this->ctc->admin();
			
				if($details->num_rows() > 0) {
					$this->data['ctc12'] = $details->result();
					$this->data['admin'] = $admin->result();
					$this->load->view('ctc/ctc_print_corporate',$this->data);// this is workin' baby :P
				} else{
					echo "<script>alert('Not yet paid');window.close();</script>" ;
				}
			
		} else {
			redirect('ctc');
		}
	}
}