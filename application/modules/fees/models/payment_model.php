<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}


	public function show_buss_info($ownerid,$businessid){
		if( (!is_null($ownerid)) && (!is_null($businessid)) ) {
			return $this->db->select('o.firstname, o.middlename, o.lastname')
			->select('b.buss_id,b.business_name, b.street_address,b.contact_number')
			->select('pt.types payment_type')
			->select('a.app_id,a.capital, bn.business_nature')
			->select('p.payment_mode')
			->select('t.amount, t.tfo,t.tfo_id')
			->select('ps.types AS pay_status_types')
			->select('at.types AS app_type')
			->from('businessess b')
			->join('owners o', 'b.owner_id=o.owner_id', 'inner')
			->join('applications a', 'o.owner_id=a.owner_id AND b.buss_id=a.buss_id', 'inner')
			->join('payment p', 'a.app_id=p.app_id', 'left')
			->join('application_type at', 'b.application_id=at.application_id', 'left')
			->join('business_nature bn', 'a.buss_nature_id=bn.buss_nature_id', 'inner')
			->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
			->join('payment_status ps', 'b.payment_status=ps.payment_status_id', 'left')
			->join('required_tfo rt', 'bn.buss_nature_id=rt.buss_nature_id')
			->join('tfo t', 'rt.tfo_id=t.tfo_id', 'inner')
			->where( array ('a.owner_id' => $ownerid,
			'a.buss_id' =>$businessid))->get();


		} else		 {
			return false;
		}
	}

	public function requirement($requirement_id = null) {
		if(!is_null($requirement_id)) {

			return $this->db->get_where('requirements', array('requirement_id' => $requirement_id));
		} else {
			return false;
		}
	}

	public function get_nature($natureID = null) {
		if(!is_null($natureID)) {
			$requirements = $this->db
				->select('business_nature nature, requirements')
				->from('business_nature')
				->where('buss_nature_id', $natureID)
				->limit(1, 0)
				->get();

			if($requirements->num_rows() > 0) {
				$requirements = $requirements->row();
				return array(
					'nature' => $requirements->nature,
					'requirements' => json_decode($requirements->requirements)
				);
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function get_stall($val){
		$aquire = $this->db
		->select('*')
		->from('stalls')
		->where('stall_num', $val)
		->get();
		$stalls = $aquire->result();
		if($stalls){
			foreach($stalls as $st){
				$stall['stall_area'] = $st->stall_area;
				$stall['stall_val'] = $st->stall_val;
			}
			return ['stall' => $stall];
		}
	}

	

	public function get_assessment($assessmentID) {

		//get app_id in applications table
		$app_id = $this->db
				  ->select('app_id')
				  ->from('assessments')
				  ->where('assessment_id',$assessmentID)
				  ->get();
		$app_id = $app_id->result();
		

		//get application_id (New or Renew)
		$application_id = $this->db
						  ->select('application_id')
						  ->from('applications')
						  ->where('app_id',$app_id[0]->app_id)
						  ->get();
		$application_id = $application_id->result();

		//get business_nature in business_line table for the business
		$buss_nature_id = $this->db
						  ->select('buss_nature_id')
						  ->from('business_line')
						  ->where('app_id',$app_id[0]->app_id)
						  ->get();
		$buss_nature_id = $buss_nature_id->result();

    	$assessments = $this->db
						->distinct()
						->select('bn.business_nature, apptype.types application_type,b.payment_id,b.permit_number,b.old_permit_number')
						->select('bar.brgy')
						->select('b.ownership_id,o.firstname, o.middlename, o.lastname, o.house_no_bldg_name,o.o_subdivision_street,o.o_muni,o.o_province, o.contact_number')
						->select('assess.total_tax_due, assess.assessment_id,assess.breakdowns, assess.status, assess.assessment_date,assess.flag_paid_all,assess.tfos,assess.addtltfo')
						->select('a.buss_id, a.owner_id, bl.capital')
						->select('a.application_id, pt.types payment_type')
						->select('p.pay_id,p.count,p.pay_status')
						->from('assessments assess')
						->join('applications a', 'assess.app_id=a.app_id', 'inner')
						->join('business_line bl', 'a.app_id=bl.app_id', 'inner')
						->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
						->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
						->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
						->join('payments p','assess.assessment_id=p.assessment_id','left')
						/* ->join('required_tfo rtfo', 'bn.buss_nature_id=rtfo.buss_nature_id', 'inner')
						->join('tfo t', 'rtfo.tfo_id=t.tfo_id', 'inner') */
						->join('application_type apptype', 'a.application_id=apptype.application_id', 'inner')
						->join('owners o', 'a.owner_id=o.owner_id', 'inner')
						->join('brgys bar', 'bar.brgy_id=o.brgy_id', 'inner')
						->where(array('assess.assessment_id' =>$assessmentID,
						'bl.buss_nature_id'	 =>$buss_nature_id[0]->buss_nature_id
						))->get();
    		/* ->where(array('assess.assessment_id' =>$assessmentID,
						   'rtfo.application_id' =>$application_id[0]->application_id,
						   'bl.buss_nature_id'	 =>$buss_nature_id[0]->buss_nature_id
				   ))->get(); */
			//echo $this->db->_error_message();
		// echo $this->db->last_query();
    	$tfos = array();
		$owner = array();
		$current_date = date('m/d/Y');

    	if($assessments->num_rows() > 0) {
    		$tfo = $assessments->result();
			//print_r($tfo);
    		$i = 0;
    		foreach ($tfo as $item) {
			// print_r($item);
				$owner['owner'] = $item->firstname . ' ' . $item->middlename . ' ' . $item->lastname;
				$owner['address'] = (($item->house_no_bldg_name == 'N/A') ? ' ' : $item->house_no_bldg_name).' '. (($item->house_no_bldg_name=='N/A') ? ' ' : $item->house_no_bldg_name) .' '.(($item->brgy == 'N/A') ? ' ' : $item->brgy).' '. (($item->o_subdivision_street == 'N/A') ? ' ' : $item->o_subdivision_street) .' ' .(($item->o_muni) ? ' ' : $item->o_muni);
				$owner['contact_number'] = $item->contact_number;
				$owner['application_type'] = $item->application_type;
				$owner['payment_type'] = $item->payment_type;
				$owner['business_nature'] = $item->business_nature;
				$owner['assessment_id'] = $item->assessment_id;
				$owner['buss_id'] = $item->buss_id;
				$owner['pay_status'] = $item->pay_status;				
				$owner['owner_id'] = $item->owner_id;
				$owner['payment_id'] = $item->payment_id;
				$owner['total'] = (float)$item->total_tax_due;
				$owner['paid_all'] = $item->flag_paid_all;
				$owner['pay_id'] = $item->pay_id;
				$owner['permit_number'] = $item->permit_number;
				$owner['ownership_id'] = $item->ownership_id;
				$owner['breakdowns'] = json_decode($item->breakdowns,true);
				$owner['bustax'] = json_decode($item->tfos,true);
				$owner['bustax2'] = json_decode($item->addtltfo,true);
				$count[] = $item->count;
				$i++;
			}
			$owner['count'] = $count;
			 return [
				'owner' => $owner
					];
    	} else {
    		return false;

    	}
	}

	public function retire_pay($appid) {
		
				//get app_id in applications table
				$assessment_id = $this->db
						  ->select('assessment_id')
						  ->from('assessments')
						  ->where('app_id',$appid)
						  ->get();
				$assessment_id = $assessment_id->result();
		
				//get business_nature in business_line table for the business
	
				$buss_nature_id = $this->db
								  ->distinct('')
								  ->select('bn.business_nature,rtfo.value,bl.capital,rtfo.application_id,rtfo.type,rtfo.subtype,retire.gross')
								  ->from('applications a')
								  ->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
								  ->join('business_line bl', 'a.app_id=bl.app_id', 'inner')
								  ->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
								  ->join('required_tfo rtfo', 'bn.buss_nature_id=rtfo.buss_nature_id', 'inner')
								  ->join('retirement retire','retire.buss_id=b.buss_id','left')	
								  ->where('bl.app_id',$appid)
								  ->where('rtfo.tfo_id','22')
								  ->where('rtfo.application_id','2')
								  ->get();
				$buss_nature_id = $buss_nature_id->result();
		
				$rtfo1 = array();
				
				foreach($buss_nature_id as $getdata){
					
					$groxxx = $getdata->gross;
				}
				$groy = explode(',',$groxxx);
			
				
				$grossss = array();
				$groxxxxx = array();
				$gross_array = array();
				foreach($groy as $getda){
					$grossss[] = "grossy";
					$groxxxxx[] = $getda;
					$gross_array[] = array_combine($grossss, $groxxxxx);
					
				}
					
		
				foreach($buss_nature_id as $getdata){
					//isud cla og comma para ma split sa business_permit.js okay2		
					$rtfo1[] = $getdata;
					
				}
				

					// $assessments = $this->db
					// 			->distinct()
					// 			->select('bn.business_nature, apptype.types application_type,b.payment_id,b.permit_number,b.old_permit_number')
					// 			->select('bar.brgy')
					// 			->select('b.ownership_id,o.firstname, o.middlename, o.lastname, o.house_no_bldg_name,o.o_subdivision_street,o.o_muni,o.o_province, o.contact_number')
					// 			->select('assess.total_tax_due, assess.assessment_id,assess.breakdowns, assess.status, assess.assessment_date,assess.flag_paid_all,assess.tfos,assess.addtltfo')
					// 			->select('a.buss_id, a.owner_id, bl.capital')
					// 			->select('a.application_id, pt.types payment_type')
					// 			->select('p.pay_id,p.count,p.pay_status')
					// 			->select('retire.gross,rtfo.value,rtfo.tfo_id,rtfo.type,rtfo.subtype')
					// 			->from('assessments assess')
					// 			->join('applications a', 'assess.app_id=a.app_id', 'inner')
					// 			->join('business_line bl', 'a.app_id=bl.app_id', 'inner')
					// 			->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
					// 			->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
					// 			->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
					// 			->join('retirement retire','retire.buss_id=b.buss_id','inner')
					// 			->join('required_tfo rtfo', 'bn.buss_nature_id=rtfo.buss_nature_id', 'inner')
					// 			->join('retire_payments p','assess.assessment_id=p.assessment_id','left')
					// 			->join('tfo t', 'rtfo.tfo_id=t.tfo_id', 'inner') 
					// 			->join('application_type apptype', 'a.application_id=apptype.application_id', 'inner')
					// 			->join('owners o', 'a.owner_id=o.owner_id', 'inner')
					// 			->join('brgys bar', 'bar.brgy_id=o.brgy_id', 'inner')
					// 			->where(array('assess.app_id' =>$appid))
								
					// 			->get();

				$buss_nature_id1 = $this->db
								  ->select('buss_nature_id')
								  ->from('business_line')
								  ->where('app_id',$appid)
								  ->get();
				$buss_nature_id1 = $buss_nature_id1->result();
				
				$assessments = $this->db
								->distinct()
								->select('bn.business_nature, apptype.types application_type,b.payment_id,b.permit_number,b.old_permit_number')
								->select('bar.brgy')
								->select('b.ownership_id,o.firstname, o.middlename, o.lastname, o.house_no_bldg_name,o.o_subdivision_street,o.o_muni,o.o_province, o.contact_number')
								->select('assess.total_tax_due, assess.assessment_id,assess.breakdowns, assess.status, assess.assessment_date,assess.flag_paid_all,assess.tfos,assess.addtltfo')
								->select('a.buss_id, a.owner_id, bl.capital')
								->select('a.application_id, pt.types payment_type')
								->select('p.pay_id,p.count,p.pay_status')
								->select('retire.gross,rtfo.value,rtfo.tfo_id,rtfo.type,rtfo.subtype')
								->from('assessments assess')
								->join('applications a', 'assess.app_id=a.app_id', 'inner')
								->join('business_line bl', 'a.app_id=bl.app_id', 'inner')
								->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
								->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
								->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
								->join('retire_payments p','assess.assessment_id=p.assessment_id','left')
								->join('retirement retire','retire.buss_id=b.buss_id','left')
								->join('required_tfo rtfo', 'bn.buss_nature_id=rtfo.buss_nature_id', 'inner')
								->join('tfo t', 'rtfo.tfo_id=t.tfo_id', 'inner') 
								->join('application_type apptype', 'a.application_id=apptype.application_id', 'inner')
								->join('owners o', 'a.owner_id=o.owner_id', 'inner')
								->join('brgys bar', 'bar.brgy_id=o.brgy_id', 'inner')
								->where(array('assess.app_id' =>$appid,
								'bl.buss_nature_id'	 =>$buss_nature_id1[0]->buss_nature_id
								))->get();

				//echo $this->db->last_query();
				$tfos = array();
				$owner = array();
				$current_date = date('m/d/Y');
		
				if($assessments->num_rows() > 0) {
					$tfo = $assessments->result();
				// print_r($tfo);
					$i = 0;
					foreach ($tfo as $item) {
					// print_r($item);
						$owner['owner'] = $item->firstname . ' ' . $item->middlename . ' ' . $item->lastname;
						$owner['address'] = (($item->house_no_bldg_name == 'N/A') ? ' ' : $item->house_no_bldg_name).' '. (($item->house_no_bldg_name=='N/A') ? ' ' : $item->house_no_bldg_name) .' '.(($item->brgy == 'N/A') ? ' ' : $item->brgy).' '. (($item->o_subdivision_street == 'N/A') ? ' ' : $item->o_subdivision_street) .' ' .(($item->o_muni) ? ' ' : $item->o_muni);
						$owner['contact_number'] = $item->contact_number;
						$owner['application_type'] = $item->application_type;
						$owner['payment_type'] = $item->payment_type;
						$owner['business_nature'] = $item->business_nature;
						$owner['assessment_id'] = $item->assessment_id;
						$owner['buss_id'] = $item->buss_id;
						$owner['pay_status'] = $item->pay_status;				
						$owner['owner_id'] = $item->owner_id;
						$owner['payment_id'] = $item->payment_id;
						$owner['total'] = (float)$item->total_tax_due;
						$owner['paid_all'] = $item->flag_paid_all;
						$owner['pay_id'] = $item->pay_id;
						$owner['permit_number'] = $item->permit_number;
						$owner['ownership_id'] = $item->ownership_id;
						$owner['breakdowns'] = json_decode($item->breakdowns,true);
						$owner['bustax'] = json_decode($item->tfos,true);
						$owner['bustax2'] = json_decode($item->addtltfo,true);
						$count[] = $item->count;

						
						//RETIRE_PAY
						$owner['rtfo'] = $rtfo1;
						$owner['gross'] = $gross_array;
	
			
						
						$i++;
					}
					$owner['count'] = $count;
					 return [
						'owner' => $owner,
						];
				} else {
					return false;
		
				}
			}

	public function assessment($assessmentID = null) {
		if(!is_null($assessmentID)) {
			$record = $this->db
				->select('pt.types payment_type')
				->select('at.types application_type')
				->select('a.assessment_id, a.owner_id, a.buss_id, a.status, a.approved, a.tfo, a.total_tax_due')
				->select('o.firstname, o.middlename, o.lastname, o.address, o.contact_number')
				->from('assessments a')
				->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
				->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
				->join('owners o', 'a.owner_id=o.owner_id', 'inner')
				->join('applications app', 'a.app_id=app.app_id', 'inner')
				->join('application_type at', 'app.application_id=at.application_id', 'inner')
				->where('a.assessment_id', $assessmentID)
				->get();

			if($record->num_rows() > 0) {
				$data = $record->row();
				$tfo = json_decode($data->tfo);

				return [
					'record' => $data,
					'tfo' => $tfo
				];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function save_payment($data = array()) { 
		// print_r($data);
		
				$data['payment_date'] = date('Y-m-d',strtotime($data['payment_date']));
				$breakdowns = json_decode($data['breakdowns'],true);
				$paid_breakdowns = json_decode($data['paid_breakdowns'],true);
				$count=count($breakdowns);
				$get_key=0;
				$datas = $this->db
								  ->select('*')
								  ->from('businessess')
								  ->where (array('buss_id' =>$data['buss_id']))
								  ->get();
				$datas = $datas->result();
				$permit_no = $this->db
								  ->select('permit_number')
								  ->from('businessess')
								  ->where (array('buss_id' =>$data['buss_id']))
								  ->get();
				$permit_no = $permit_no->result();
				$dataapp = $this->db
								  ->select('*')
								  ->from('applications')
								  ->where (array('buss_id' =>$data['buss_id']))
								  ->get();
				$dataapp = $dataapp->result();
				$databl = $this->db
								  ->select('*')
								  ->from('business_line')
								  ->where (array('bl_buss_id' =>$data['buss_id']))
								  ->get();
				$databl = $databl->result();
				$application_id01='2';
				$application_id02='2';
				$requirements='[]';
				$status='renewed';
				$payall = $data['payall'];
				$date_applied = date('m/d/Y');
				$application_date = date('Y-m-d');
				//  print_r($permit_no);
				foreach($datas as $d){
					if($d->owner_id==null){$owner_id=0;}else{$owner_id = $d->owner_id;}
					if($d->ownership_id==null){$ownership_id=0;}else{$ownership_id = $d->ownership_id;}
					if($d->occupancy_id==null){$occupancy_id=0;}else{$occupancy_id = $d->occupancy_id;}
					if($d->property_id==null){$property_id=0;}else{$property_id = $d->property_id;}	
					if($d->classification_id==null){$classification_id=0;}else{$classification_id = $d->classification_id;}
					if($d->payment_id==null){$payment_id=0;}else{$payment_id = $d->payment_id;}
					if($d->brgy_id==null){$brgy_id=0;}else{$brgy_id = $d->brgy_id;}
					if($d->application_id==null){$application_id=0;}else{$application_id= $d->application_id;}
					if($d->reference_no==null){$reference_no="";}else{$reference_no= $d->reference_no;}
					if($d->govt_incentive==null){$govt_incentive=0;}else{$govt_incentive= $d->govt_incentive;}
					if($d->govt_entity==null){$govt_entity=0;}else{$govt_entity= $d->govt_entity;}
					if($d->business_name==null){$business_name=0;}else{$business_name= $d->business_name;}
					if($d->trade_name==null){$trade_name=0;}else{$trade_name= $d->trade_name;}
					if($d->street_address==null){$street_address="";}else{$street_address= $d->street_address;}
					if($d->street_address2==null){$street_address2="";}else{$street_address2= $d->street_address2;}					
					if($d->house_no==null){$house_no=0;}else{$house_no= $d->house_no;}
					if($d->city==null){$city=0;}else{$city= $d->city;}
					if($d->province==null){$province=0;}else{$province= $d->province;}
					if($d->contact_number==null){$contact_number=0;}else{$contact_number= $d->contact_number;}
					if($d->mobile_number==null){$mobile_number=0;}else{$mobile_number= $d->mobile_number;}
					if($d->email==null){$email=0;}else{$email= $d->email;}
					if($d->pin==null){$pin=0;}else{$pin= $d->pin;}
					if($d->ctc==null){$ctc=0;}else{$ctc= $d->ctc;}
					if($d->tin==null){$tin=0;}else{$tin= $d->tin;}
					if($d->dti_no==null){$dti_no=0;}else{$dti_no= $d->dti_no;}
					if($d->dti_expiration==null){$dti_expiration=0;}else{$dti_expiration= $d->dti_expiration;}					
					if($d->sec_no==null){$sec_no=0;}else{$sec_no= $d->sec_no;}
					if($d->sec_expiration==null){$sec_expiration=0;}else{$sec_expiration= $d->sec_expiration;}
					if($d->cda_no==null){$cda_no=0;}else{$cda_no= $d->cda_no;}
					if($d->cda_expiration==null){$cda_expiration=0;}else{$cda_expiration= $d->cda_expiration;}
					if($d->dti_regdate==null){$dti_regdate=0;}else{$dti_regdate= $d->dti_regdate;}
					if($d->rep_bookkepr==null){$rep_bookkepr=0;}else{$rep_bookkepr= $d->rep_bookkepr;}
					if($d->rep_bookkepr_ph_no==null){$rep_bookkepr_ph_no=0;}else{$rep_bookkepr_ph_no= $d->rep_bookkepr_ph_no;}
					if($d->business_area==null){$business_area=0;}else{$business_area= $d->business_area;}
					if($d->abled_female_emp_estab==null){$abled_female_emp_estab=0;}else{$abled_female_emp_estab= $d->abled_female_emp_estab;}
					if($d->abled_male_emp_estab==null){$abled_male_emp_estab=0;}else{$abled_male_emp_estab= $d->abled_male_emp_estab;}
					if($d->abled_male_emp_info_estab==null){$abled_male_emp_info_estab=0;}else{$abled_male_emp_info_estab= $d->abled_male_emp_info_estab;}
					if($d->abled_female_emp_info_estab==null){$abled_female_emp_info_estab=0;}else{$abled_female_emp_info_estab= $d->abled_female_emp_info_estab;}
					if($d->pwd_male_emp_estab==null){$pwd_male_emp_estab=0;}else{$pwd_male_emp_estab= $d->pwd_male_emp_estab;}
					if($d->pwd_female_emp_estab==null){$pwd_female_emp_estab=0;}else{$pwd_female_emp_estab= $d->pwd_female_emp_estab;}
					if($d->pwd_male_emp_info_estab==null){$pwd_male_emp_info_estab=0;}else{$pwd_male_emp_info_estab= $d->pwd_male_emp_info_estab;}
					if($d->pwd_female_emp_info_estab==null){$pwd_female_emp_info_estab=0;}else{$pwd_female_emp_info_estab= $d->pwd_female_emp_info_estab;}
					if($d->pwd_male_emp_lgu==null){$pwd_male_emp_lgu=0;}else{$pwd_male_emp_lgu= $d->pwd_male_emp_lgu;}
					if($d->pwd_female_emp_lgu==null){$pwd_female_emp_lgu=0;}else{$pwd_female_emp_lgu= $d->pwd_female_emp_lgu;}
					if($d->pwd_male_emp_info_lgu==null){$pwd_male_emp_info_lgu=0;}else{$pwd_male_emp_info_lgu= $d->pwd_male_emp_info_lgu;}
					if($d->pwd_female_emp_info_lgu==null){$pwd_female_emp_info_lgu=0;}else{$pwd_female_emp_info_lgu= $d->pwd_female_emp_info_lgu;}	
					if($d->indi_male_emp==null){$indi_male_emp=0;}else{$indi_male_emp= $d->indi_male_emp;}
					if($d->indi_female_emp==null){$indi_female_emp=0;}else{$indi_female_emp= $d->indi_female_emp;}
					if($d->abled_male_emp_lgu==null){$abled_male_emp_lgu=0;}else{$abled_male_emp_lgu= $d->abled_male_emp_lgu;}
					if($d->abled_female_emp_lgu==null){$abled_female_emp_lgu=0;}else{$abled_female_emp_lgu= $d->abled_female_emp_lgu;}
					if($d->abled_male_emp_info_lgu==null){$abled_male_emp_info_lgu=0;}else{$abled_male_emp_info_lgu= $d->abled_male_emp_info_lgu;}
					if($d->abled_female_emp_info_lgu==null){$abled_female_emp_info_lgu=0;}else{$abled_female_emp_info_lgu= $d->abled_female_emp_info_lgu;}
					if($d->registrar_number==null){$registrar_number=0;}else{$registrar_number= $d->registrar_number;}
					if($d->registered_date==null){$registered_date=0;}else{$registered_date= $d->registered_date;}
					if($d->created_at==null){$created_at=0;}else{$created_at= $d->created_at;}
					if($d->modified_at==null){$modified_at=0;}else{$modified_at= $d->modified_at;}	
					if($d->old_permit_number==null){$old_permit_number="";}else{$old_permit_number= $d->old_permit_number;}	
					if($d->old_buss_id==null){$old_buss_id="";}else{$old_buss_id= $d->old_buss_id;}	
					if($d->plate_no==null){$plate_no="";}else{$plate_no= $d->plate_no;}	
					if($d->stall_num==null){$stall_num="";}else{$stall_num= $d->stall_num;}
					if($d->stall_area==null){$stall_area="";}else{$stall_area= $d->stall_area;}	
					if($d->stall_val==null){$stall_val="";}else{$stall_val= $d->stall_val;}		
					

				}
		
				foreach($dataapp as $ad){
					if($ad->owner_id==null){$owner_id=0;}else{$owner_id = $ad->owner_id;}
					if($ad->modified==null){$modified=0;}else{$modified = $ad->modified;}
				}
		
			
		
				//  print_r($owner_id);
				//  var_dump($owner_id);
		
				if(!isset($data['payall'])){
		
					for($i = 0;$i<$count; $i++ ){
						if (in_array($paid_breakdowns[0]['dues'],$breakdowns[$i])){ 
							$get_key = $i;
						}
						stripslashes($breakdowns[$i]['dues']);
					}
						$breakdowns[$get_key]['stat'] = 'Paid';	
				}else{
					
					for($i = 0;$i<$count; $i++ ){
						$breakdowns[$i]['stat'] = 'Paid';
					}
				}
		
				
					/*print_r($data['paid_breakdowns']);
					print_r($breakdowns);*/
					if(is_array($data)) {
						
						unset($data['breakdowns']);
						unset($data['paid_breakdowns']);
						unset($data['payment_mode']);
						unset($data['total_amount_']);
						unset($data['payment_id']);
						unset($data['payall']);
					
						// var_dump($data);
						if($this->db->insert('payments', $data)) {
							$id = $this->db->insert_id();
							$pn = $permit_no[0]->permit_number;
							$pos = strpos($pn,'-');
							$replace = date('Y')+2;	
		
								if (!empty($pos)){
									$search = strstr($pn,'-',true);
									$new_pn = substr_replace($pn,$replace,0,$pos); 
								} else {
									$new_pn=$replace.'-'.$pn;
								}
								$check = $this->db->get_where('releasing', array('assessment_id' =>$data['assessment_id']));
								
								if ($check->num_rows() > 0){
								} 
								else {
								
									if ($this->db->insert('releasing',array('payment_id' => $id,'assessment_id' =>$data['assessment_id']))){	
		
									
										if($this->db->insert('businessess',
										array(
											'owner_id'=>$owner_id,
											'ownership_id'=>$ownership_id,
											'occupancy_id'=>$occupancy_id,
											'property_id'=>$property_id,
											'classification_id'=>$classification_id,
											'payment_id'=>$payment_id,
											'brgy_id'=>$brgy_id,
											'permit_number'=>$new_pn,
											'date_applied'=>$date_applied,
											'application_id'=>$application_id01,
											'reference_no'=>$reference_no,
											'govt_incentive'=>$govt_incentive,
											'govt_entity'=>$govt_entity,
											'business_name'=>$business_name,
											'trade_name'=>$trade_name,
											'street_address'=>$street_address,
											'street_address2'=>$street_address2,
											'house_no'=>$house_no,
											'city'=>$city,
											'province'=>$province,
											'contact_number'=>$contact_number,
											'mobile_number'=>$mobile_number,
											'email'=>$email,
											'pin'=>$pin,
											'ctc'=>$ctc,
											'tin'=>$tin,
											'dti_no'=>$dti_no,
											'dti_expiration'=>$dti_expiration,											
											'sec_no'=>$sec_no,
											'sec_expiration'=>$sec_expiration,											
											'cda_no'=>$cda_no,											
											'cda_expiration'=>$cda_expiration,											
											'dti_regdate'=>$dti_regdate,
											'rep_bookkepr'=>$rep_bookkepr,
											'rep_bookkepr_ph_no'=>$rep_bookkepr_ph_no,
											'business_area'=>$business_area,
											'abled_female_emp_estab'=>$abled_female_emp_estab,
											'abled_male_emp_estab'=>$abled_male_emp_estab,
											'abled_male_emp_info_estab'=>$abled_male_emp_info_estab,
											'abled_female_emp_info_estab'=>$abled_female_emp_info_estab,
											'pwd_male_emp_estab'=>$pwd_male_emp_estab,
											'pwd_female_emp_estab'=>$pwd_female_emp_estab,
											'pwd_male_emp_info_estab'=>$pwd_male_emp_info_estab,
											'pwd_female_emp_info_estab'=>$pwd_female_emp_info_estab,
											'pwd_male_emp_lgu'=>$pwd_male_emp_lgu,
											'pwd_female_emp_lgu'=>$pwd_female_emp_lgu,
											'pwd_male_emp_info_lgu'=>$pwd_male_emp_info_lgu,
											'pwd_female_emp_info_lgu'=>$pwd_female_emp_info_lgu,
											'indi_male_emp'=>$indi_male_emp,
											'indi_female_emp'=>$indi_female_emp,
											'abled_male_emp_lgu'=>$abled_male_emp_lgu,
											'abled_female_emp_lgu'=>$abled_female_emp_lgu,
											'abled_male_emp_info_lgu'=>$abled_male_emp_info_lgu,
											'abled_female_emp_info_lgu'=>$abled_female_emp_info_lgu,
											'registrar_number'=>$registrar_number,
											'registered_date'=>$registered_date,
											'created_at'=>$created_at,
											'modified_at'=>$modified_at,
											'old_permit_number'=>$old_permit_number,	
											'old_buss_id'=>$old_buss_id,	
											'plate_no'=>$plate_no,				
											
										))){
											
											
												$lastbussid=$this->db->insert_id();
												

												$this->db->insert('summarylist',
												array(
													'permit_number'=>$new_pn,
													'old_permit_number'=>$old_permit_number
												));
	
													$this->db->insert('applications',
													array(
														'application_id'=>$application_id02,
														'buss_id'=>$lastbussid,
														'owner_id'=>$owner_id,
														'status'=>$status,
														'requirements'=>$requirements,
														'application_date'=>$data['payment_date'],	
														'modified'=>$modified,	
													));
													
		
												$lastapp_id=$this->db->insert_id();
												foreach($databl as $bd){
													if($bd->buss_nature_id==null){$buss_nature_id=0;}else{$buss_nature_id = $bd->buss_nature_id;}
													if($bd->capital==null){$capital=0;}else{$capital = $bd->capital;}
													if($bd->gross==null){$gross=0;}else{$gross = $bd->gross;}
													if($bd->quantity==null){$quantity=0;}else{$quantity = $bd->quantity;}
													if($bd->unit==null){$unit=0;}else{$unit = $bd->unit;}
													if($bd->modified==null){$modified=0;}else{$modified = $bd->modified;}
													$this->db->insert('business_line',
													array(
														'app_id'=>$lastapp_id,
														'bl_buss_id'=>$lastbussid,
														'buss_nature_id'=>$buss_nature_id,
														'requirements'=>$requirements,
														'capital'=>$capital,	
														'gross'=>$gross,	
														'quantity'=>$quantity,
														'unit'=>$unit,
														'modified'=>$modified,
														'delinquent'=>'0',
													));
												}
													
		
													$this->db->update('assessments',
													array('status'=>'paid'), 
													array('assessment_id' => $data['assessment_id']));
													
													echo $this->db->_error_message();
												}
											}
		
											 else {
										return false;
									echo $this->db->_error_message();
										}
									// } 
								}
						$count = count($breakdowns);
					
										return true;
						} else {
							//return false;
							echo $this->db->_error_message();
						}
					
					} else {  return false;}
			}
		

			public function retire_payment($data = array()) { 
		
				
						$data['payment_date'] = date('Y-m-d',strtotime($data['payment_date']));
						$breakdowns = json_decode($data['breakdowns'],true);
						$paid_breakdowns = json_decode($data['paid_breakdowns'],true);
						$count=count($breakdowns);
						$get_key=0;
						$datas = $this->db
										  ->select('*')
										  ->from('businessess')
										  ->where (array('buss_id' =>$data['buss_id']))
										  ->get();
						$datas = $datas->result();
						
						$payall = $data['payall'];
						$date_applied = date('m/d/Y');
						$application_date = date('Y-m-d');
						
				
							if(is_array($data)) {
								
								unset($data['breakdowns']);
								unset($data['paid_breakdowns']);
								unset($data['payment_mode']);
								unset($data['total_amount_']);
								unset($data['payment_id']);
								unset($data['payall']);
							
								// var_dump($data);
								if($this->db->insert('retire_payments', $data)) {
									return true;
												
								} else {
									//return false;
									echo $this->db->_error_message();
								}
							
							} else {  
								
							return false;
						}
		}


			public function reassessments($data = array()) { 
		
							if(is_array($data)) {
							$where = "assessment_id = '".$data['assessment_id']."' ";
						
								if($this->db->delete('assessments',$where)) {
									return true;
												
								} else {
									//return false;
									echo $this->db->_error_message();
								}
							
							} else {  
								
							return false;
						}
		}
		
	public function get_paid($unpaid = array() , $paid = array()){

		$i=0;
		foreach($unpaid as $p){
			if(in_array($paid[0]['dues'],$p)){
				$unpaid[$i]['stat'] = 'Paid';
			}
			$i++;
		}
		return $unpaid;
	}

	public function get_cancelled($cancelledid){
		
		$querycancel = $this->db
				  ->distinct()
				  ->select('*')
				  ->select('cb.app_id, cb.buss_nature_id, cb.businessid, cb.owner_id, cb.capital, cb.status')
				  ->select('apptype.types application_type')
				  ->select('b.ownership_id,o.firstname, o.middlename, o.lastname, o.house_no_bldg_name,o.o_subdivision_street,o.o_muni,o.o_province, o.contact_number')
				  ->select('pt.types payment_type')
				  ->select('assess.total_tax_due, assess.assessment_id,assess.breakdowns, assess.assessment_date,assess.flag_paid_all,assess.tfos,assess.addtltfo')
				  ->select('p.pay_id,p.count,p.pay_status')
				  ->select('retire.gross,rtfo.value,rtfo.tfo_id,rtfo.type,rtfo.subtype')
				  ->from('cancelled_business cb')
				  ->join('owners o', 'cb.owner_id = o.owner_id', 'inner')
				  ->join('businessess b', 'o.owner_id = b.owner_id', 'inner')
				  ->join('brgys brgy', 'b.brgy_id = brgy.brgy_id', 'inner')
				  ->join('applications app', 'cb.app_id = app.app_id', 'inner')
				  ->join('application_type apptype', 'app.application_id = apptype.application_id', 'inner')
				  ->join('payment_type pt', 'b.payment_id = pt.payment_id', 'inner')
				  ->join('assessments assess', 'cb.app_id = assess.app_id', 'inner')
				  ->join('payments p', 'assess.assessment_id = p.assessment_id', 'left')
				  ->join('retirement retire','retire.buss_id=cb.businessid','left')
				  ->join('required_tfo rtfo', 'cb.buss_nature_id=rtfo.buss_nature_id', 'inner')

				  
				  ->where('id',$cancelledid)
				  ->get();
		 $tfos = array();
		 $owner = array();
		 $current_date = date('m/d/Y');

		if($querycancel->num_rows() > 0){
			$queryc = $querycancel->result();
    		 foreach ($queryc as $result) {
			//print_r($queryc);
				 $returnies['owner_id'] = $result->owner_id;
				 $returnies['owner'] = $result->firstname . ' ' . $result->middlename . ' ' . $result->lastname;
				 $returnies['contact'] = $result->contact_number;
				 $returnies['address'] = (($result->house_no_bldg_name == 'N/A') ? ' ' : $result->house_no_bldg_name).' '. (($result->house_no_bldg_name=='N/A') ? ' ' : $result->house_no_bldg_name) .' '.(($result->brgy == 'N/A') ? ' ' : $result->brgy).' '. (($result->o_subdivision_street == 'N/A') ? ' ' : $result->o_subdivision_street) .' ' .(($result->o_muni) ? ' ' : $result->o_muni);
				 $returnies['application_type'] = $result->application_type;
				 $returnies['buss_id'] = $result->businessid;
				 $returnies['status'] = $result->status;
				 $returnies['ownership_id'] = $result->ownership_id;
				 $returnies['payment_type'] = $result->payment_type;
				 $returnies['payment_id'] = $result->payment_id;
				 $returnies['pay_id'] = $result->pay_id;
				 $returnies['assessment_id'] = $result->assessment_id;
				 $returnies['total'] = $result->total_tax_due;
				 $returnies['assessment_id'] = $result->assessment_id;
				 $returnies['breakdowns'] = json_decode($result->breakdowns,true);
				 $returnies['assessment_date'] = $result->assessment_date;
				 $returnies['flag_paid_all'] = $result->flag_paid_all;
				 $returnies['bustax'] = json_decode($result->tfos,true);
				 $returnies['bustax2'] = json_decode($result->addtltfo,true);
				 $count[] = $result->count;

				 $returnies['gross'] = $result->capital;
				if($result->tfo_id == 22){
					$returnies['rtfo'] = $result->value;
					$returnies['rtfo_type'] = $result->type;
					$returnies['rtfo_subtype'] = $result->subtype;	
				}
				 
			 }
			 $returnies['counts'] = $count;
			  return [
			 	'returnies' => $returnies
			 		];
    	} else {
    		return false;

    	}
		
	}
	public function save_cancel_payment($data){
			//$data123['status'] = "pending";
			$data123['cash_tendered'] = $data['cash_tendered'];
			$data123['change'] = $data['change'];
			$data123['or_number'] = $data['or_number'];
			$data123['cert_or_number'] = $data['cert_or_number'];
			// $data123['bank'] =	"sample bank";
			// $data123['chequeno'] = "sample check";
			$data123['paid_tax'] = $data['paid_tax'];

			$amount = $data['cash_tendered']-$data['change'];
			$balance = $amount - $data['paid_tax'];

			$data123['balance'] = $balance;
			$data123['total_amount'] = $amount;
			$data123['payment_date'] = date('Y-m-d',strtotime($data['payment_date']));
			$data123['interest'] = $data['interest'];
			$data123['surcharge'] = $data['surcharge'];
			$data123['payment_modes'] = $data['payment_modes'];
			$data123['pay_status'] = "";
			$data123['count'] = $data['count'];
			$data123['cancelled_id'] = $data['cancelled_id'];
			
		$this->db->insert('cancelled_payments', $data123);
		$this->db->update('cancelled_business', array('status'=>'Paid'), array('id' => $data123['cancelled_id']));
		//  print_r($data123);
			return true;
	}

	public function save_stall_payment($data){
		//$data123['status'] = "pending";
		$data123['assessment_id'] = $data['assessment_id'];
		$data123['status'] = "pending";
		$data123['cash_tendered'] = $data['cash_tendered'];
		$data123['change'] = $data['change'];
		$data123['or_number'] = $data['or_number'];
		$data123['paid_tax'] = "";

		$amount = $data['cash_tendered']-$data['change'];
		$balance = $amount - $data['paid_tax'];

		$data123['balance'] = $balance;
		$data123['total_amount'] = $data['total_amount'];
		$data123['payment_date'] = date('Y-m-d',strtotime($data['payment_date']));
		$data123['interest'] = $data['interest'];
		$data123['surcharge'] = $data['surcharge'];
		$data123['payment_modes'] = "";
		$data123['pay_status'] = "";
		$data123['count'] = $data['count'];
		$data123['buss_id'] = $data['buss_id'];
		$data123['owner_id'] = $data['owner_id'];
		
	$this->db->insert('stalls_payment', $data123);
	//  print_r($data123);
		return true;
}

	
	public function pay_stall($appid){

		$stalls = $this->db
			->distinct()
			->select('a.app_id, a.buss_id, a.owner_id')
			->select('b.brgy_id, b.stall_num, b.stall_area, b.stall_val, b.permit_number')
			->select('o.firstname, o.middlename, o.lastname, o.contact_number')
			->select('bl.buss_nature_id, bn.business_nature')
			->select('brgy.brgy')
			->select('assess.stallss, assess.assessment_id')
			->select('p.count, p.or_number, p.stpay_id')			
			->from('applications a')
			->join('businessess b', 'a.buss_id = b.buss_id', 'inner')
			->join('assessments assess', 'assess.app_id = a.app_id', 'inner')
			->join('owners o', 'a.owner_id  = o.owner_id', 'inner')
			->join('brgys brgy', 'b.brgy_id=brgy.brgy_id', 'inner')
			->join('business_line bl', 'a.app_id=bl.app_id', 'inner')
			->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
			->join('stalls_payment p', 'assess.assessment_id = p.assessment_id', 'left')
			->where('a.app_id', $appid)
			->get();
			if($stalls->num_rows() > 0) {
			$stall = $stalls->result();
				foreach($stall as $item){
					$owner['owner'] = $item->firstname . ' ' . $item->middlename . ' ' . $item->lastname;
					$owner['address'] = $item->brgy;
					$owner['contact_number'] = $item->contact_number;
					$owner['business_nature'] = $item->business_nature;
					$owner['assessment_id'] = $item->assessment_id;
					$owner['buss_id'] = $item->buss_id;			
					$owner['owner_id'] = $item->owner_id;
					$owner['permit_number'] = $item->permit_number;
					$owner['stall_val'] = $item->stall_val;
					$owner['app_id'] = $appid;
					// $owner['stpay_id'] = $item->stpay_id;
					// $owner['or_number'] = $item->or_number;
					$owner['stall_info'] = json_decode($item->stallss,true);
					
					$count[] = $item->count;
					//$orcount[] = $item->or_number;
				}
				
				$owner['counts'] = $count;
				//$owner['countor'] = $orcount;
				return [
					'owner' => $owner
				];
			} else {
				return false;
	
			}


	}
}
