<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctc_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function ctc_settings(){
		return $this->db->select('*')
				->from('ctc_settings')
				->get();
	}

	public function ctc_save_indi($data = array()){
		$date = date('m');
		$interest = $this->db->select('*')->from('surcharge')->get();
		
		$name = $this->session->userdata('firstname');
		// $this->session->userdata('fname');

    $inte = $interest->result();
		foreach($inte as $in){
			$int = $in->interest;
		}
		// echo $int;
		// echo $date;
		// var_dump($data);
		
		$data_ctc['gross_tax'] = $data['gross_tax'];
		$data_ctc['salary_tax'] = $data['salary_tax'];
		$data_ctc['income_tax'] = $data['income_tax'];
		$data_ctc['encoder'] = $name;
		$data_ctc['ctc_no'] = $data['ctc_no'];
		$data_ctc['firstname'] = $data['firstname'];
		$data_ctc['middlename'] = $data['middlename'];
		$data_ctc['lastname'] = $data['lastname'];
		$data_ctc['year'] = $data['year'];
		$data_ctc['place_issued'] = $data['place_issued'];
		$data_ctc['tin'] = $data['tin'];
		$data_ctc['gender'] = $data['gender'];
		$data_ctc['address'] = $data['address'];
		$data_ctc['citizenship'] = $data['citizenship'];
		$data_ctc['icr_no'] = $data['icr'];
		$data_ctc['place_of_birth'] = $data['place_of_birth'];
		$data_ctc['date_issued'] = $data['date_issueds'];
		$data_ctc['height'] = $data['height'];
		$data_ctc['weight'] = $data['weight'];
		$data_ctc['ctc_type'] = 'individual';
		$data_ctc['civil_status'] = $data['status'];
		$data_ctc['basic_tax'] = $data['basic_tax'];
		// $data_ctc['additional_tax'] = $data['additional_tax'];
		$data_ctc['salaries'] = $data['salaries'];
		$data_ctc['income'] = $data['income'];
		$data_ctc['earnings'] = $data['earnings'];
		$data_ctc['date_of_birth'] = $data['date_of_birth'];
		$total = $data['basic_tax'] + $data['salaries'] + $data['income'] + $data['earnings'];

		$penalty = $int * $date;
		$pento = $total * $penalty;
		$overalltotal = $total + $pento;
		// echo $overalltotal;
		$data_ctc['total'] = $total;
		$data_ctc['interest'] = $pento;
		$data_ctc['overalltotal'] = $overalltotal;
		 return $this->db->insert('jcit_ctc', $data_ctc);
		//  echo $this->db->_error_message();
	}

	public function ctc_save_corp($data = array()){
		//print_r($data);
		$date = date('m');
		$interest = $this->db->select('*')->from('surcharge')->get();
		
		$name = $this->session->userdata('firstname');
		// $this->session->userdata('fname');

    	$inte = $interest->result();
		foreach($inte as $in){
			$int = $in->interest;
		}
		$data_ctc['assessed_tax_amt'] = $data['assessed_tax_amt'];
		$data_ctc['gross_tax_amt'] = $data['gross_tax_amt'];
		$data_ctc['companyname'] = $data['companyname'];
		$data_ctc['year'] = $data['year'];
		$data_ctc['place_issued'] = $data['place_issued'];
		$data_ctc['tin'] = $data['tin'];
		$data_ctc['address'] = $data['address'];
		$data_ctc['nature_of_business'] = $data['nature_of_business'];
		$data_ctc['place_of_inc'] = $data['place_of_inc'];
		$data_ctc['date_issued'] = $data['date_issued'];
		$data_ctc['date_of_reg'] = $data['date_of_reg'];
		$data_ctc['ctc_type'] = 'corporate';
		$data_ctc['organization_type'] = $data['organization_type'];
		$data_ctc['basic_tax'] = $data['basic_tax'];
		$data_ctc['assessed_tax_due'] = $data['assessed_tax_due'];
		$data_ctc['gross_tax_due'] = $data['gross_tax_due'];
		$total = $data['basic_tax'] + $data['assessed_tax_due'] + $data['gross_tax_due'];
		$penalty = $int * $date;
		$pento = $total * $penalty;
		$overalltotal = $total + $pento;
		// echo $overalltotal;
		$data_ctc['total'] = $total;
		$data_ctc['interest'] = $pento;
		$data_ctc['overalltotal'] = $overalltotal;
		return $this->db->insert('jcit_ctc_corporate', $data_ctc);
	}

	public function ctc(){
		// return $this->db->select('*')
		// 		->from('jcit_ctc')
		// 		->get();

		return $this->db->select('*')->order_by('id',"desc")->limit(1)->from('jcit_ctc')->get();
	}

	public function ctc_report(){
		return $this->db->select('*')->order_by('id',"desc")->from('jcit_ctc')->get();
	}

	public function ctcbarangay(){
		

		return $this->db->select('*')->from('jcit_brgys')->get();
	}
	public function viewctc(){
		return $this->db->select('*')->from('jcit_ctc')->order_by('id','desc')->get();
	}
	public function viewctccorpo(){
		return $this->db->select('*')->from('jcit_ctc_corporate')->order_by('id','desc')->get();
	}

	public function admin(){
		return $this->db->select('*')->from('jcit_bplissettings')->get();
	}
	
	public function view_details($businessid = null){
		return $this->db->select('*')->from('jcit_ctc')->where('id',$businessid)->get();
	}
	public function view_details_corp($businessid2 = null){
		return $this->db->select('*')->from('jcit_ctc_corporate')->where('id',$businessid2)->get();
	}
}

