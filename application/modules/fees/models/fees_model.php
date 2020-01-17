<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fees_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_applications() {
		return $this->get('application');
	}

	public function get_barangays() {
		return $this->get('brgys', 'brgy_id, brgy', null, 'brgy_id')->result();
	}

	public function get_amendment(){
		return $this->get('amendment', 'id, description', null, 'id')->result();
	}
	public function get_application_type(){
		 return $this->get('application_type', 'application_id, types', null, 'application_id')->result();
	}
	public function get_requirements($natureID = null) {
		if(!is_null($natureID)) {
			return $this->get('nature_requirements', 'requirements', array('buss_nature_id' => $natureID));
		} else {
			return false;
		}
	}

	public function get_required_tfo($requiredTfoID) {
		return $this->db->get_where('required_tfo', array('req_tfo_id' => $requiredTfoID));
	}

	public function get_types($type = null, $isType = false, $field = '', $order_by = '',$where = null) {
		if(!is_null($type)) {
			if($isType && !empty($field) && !empty($where)) {
				return $this->get($type, $field, $where, $order_by)->result();
			} else if ($isType && !empty($field) ){
				return $this->get($type, $field, null, $order_by)->result();
			} else {
				return $this->get($type.'_type', $type.'_id, types', null, $type.'_id')->result();
			}
		} else {
			return new stdClass();
		}
	}


	// public function save_renew($data) {
	// 	$flag = false;

	// 	if(is_array($data)) {			
	// 		$i = 0;

	// 		/*in case multi-line business*/

	// 		foreach($data['gross'] as $g) {
				
	// 			/*check each gross for the multi-line business*/
	// 			$secondearray = array();
	// 			$temp = array() ;
	// 			$temp1 = array();
	// 			$nature = '';
	// 			$check = $this->db->select('bl.buss_nature_id,bn.business_nature,bl.gross')
	// 							  ->from('business_line bl')
	// 							  ->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
	// 							  ->where(array(
	// 									'app_id' => $data['app_id'],
	// 									'bl.buss_nature_id' => $data['natureid'][$i]
	// 								))->get(); 
						
	// 			if($check->num_rows() > 0) {
	// 				foreach($check->result() as $row){
	// 					$nature = $row->business_nature;
	// 					if($row->gross == '' || $row->gross == '[]' || empty($row->gross)){
						
	// 						$temp['year'] = (date('Y',time())-1);
	// 						$temp['gross'] = $g;
	// 						array_push($secondearray, $temp);
	// 					}else {
							
	// 						$secondearray = json_decode($row->gross);
	// 						$temp['year'] = (date('Y',time())-1);
	// 						$temp['gross'] = $g;
	// 						array_push($secondearray,$temp);
	// 					}
	// 				}

	// 				$newstring = json_encode($secondearray);
	// 				// print_r($newstring);
	// 	            $cond = 'business_nature = "'.str_replace("-New","-ReNew",$nature).'" AND application_id=2';
	// 	            $get_nature = $this->db->select('buss_nature_id,business_nature')
	// 	            					   ->from('business_nature')
	// 	            					   ->where($cond)
	// 	            					   ->get(); 
			
	// 				$get_nature = $get_nature->result(); 
					
	// 				$this->db->update('business_line', array('gross' => $newstring,'buss_nature_id' =>$get_nature[0]->buss_nature_id), array(
	// 					'app_id' => $data['app_id'],
	// 					'buss_nature_id' => $data['natureid'][$i]
	// 				)); 
				

	// 			} else {
	// 				$flag = true;
	// 				break;
	// 			}
	// 			$i++;
	// 		}

	// 		if($flag) {
	// 			return false;
	// 		} else {
	// 			unset($data['natureid']);
	// 			unset($data['gross']);
	// 			unset($data['requirements']);
	// 			$this->db->update('applications', array('status' => 'renewed','application_id' => '2'), array('app_id' => $data['app_id']));
	// 			$this->db->update('businessess',array('application_id' =>'2'),array('buss_id' => $data['buss_id']));
	// 			unset($data['checkAll']);
	// 			unset($data['buss_id']);
	// 			 return $this->db->insert('renews', $data);
	// 		}
	// 	} else {
	// 		return false;
	// 	}
	// }

	
	public function save_renew($data) { 

		$flag = false;
		$today = date('Y');
		
		$new_gross = array();
		$newgross = '';
		$percentage;
		
		$check_assess = $this->db->select('assessment_id')
														 ->from('assessments')
														 ->where(array('app_id' =>$data['app_id']))
														 ->like(array('assessment_date' => $today))
														 ->get();
		//  print_r($check_assess->result());												 
 //echo $this->db->last_query();
		$check_gross = $this->db->select('bus_line_id,gross,buss_nature_id')
												->from('business_line')
												->where(array('app_id' =>$data['app_id']))
												->get();
												
		if($check_assess->num_rows() == 0){
	
			$percentage_values = array_values($data['percentage']);
		// print_r($data['gross']);
			foreach($data['gross'] as $g) {  
				$secondearray = array();
				$temp = array() ;
				// print_r($g);
			
			
				if($check_gross->num_rows() > 0) {
					// var_dump($data['percentage'][$k]);
					$percentage = isset($percentage_values[$g]) ? $percentage_values[$g] : 0 ;
					foreach($check_gross->result() as $row){
						$buslineid[] = $row->bus_line_id;
		
						if($row->gross != '[]'){
							$store_gross = json_decode($row->gross,true); //print_r($row->gross);
						
							foreach($store_gross as $key => $gross){ //print_r($gross);
								if(in_array(($today - 1),$gross)){
									
									$temp['gross'] = $g;
									$temp['year'] = $gross['year'];
									//array_push($secondearray, $temp);
									//echo "if first";
								}else{
									echo "asd";
								}
							
					 	  }
						   
						 
						}else{
							
							$temp['gross'] = $g;
							$temp['year'] = (date('Y') - 1);
						}
						
				} array_push($secondearray, $temp);
					$newgross = json_encode($secondearray);
		
				
					
					
			 } else {
					$flag = true;
					break;
				}
				$i=0;$z=0;

		foreach($data['percentage'] as $gg){
					$z++;
					$percentages[$z]=$gg;
		}
		$z=0;
		foreach($data['gross'] as $aa){
			$z++;
			$i++;
			$num[$i]='[{"year":"'.(date('Y') - 1).'","gross":"'.($aa + ($aa*($percentages[$z]/100))).'"}]';
		}

		$i=0;
		$z=0;

		foreach($buslineid as $bb){
			$i++;
			$z++;
			$this->db->update('business_line', array('gross' => $num[$i],'percentage'=> $percentages[$z]),
			array('bus_line_id'=> $bb));
			// echo $this->db->last_query();
		}
					
					//echo  $this->db->last_query();
							unset($data['natureid']);
							unset($data['gross']);
							unset($data['requirements']);
							unset($data['percentage']);
							unset($data['buss_id']);
							if($this->db->update('applications',array('application_id' =>'2'),array('app_id' =>$data['app_id']))){
								$check_renew = $this->db->select('app_id')
													->from('renews')
													->where(array('app_id'=> $data['app_id']))
													->like(array('date_renewed'=> date('Y' ,strtotime('now'))))
													->get();
									if($check_renew->num_rows()>0){
										$this->db->update('renews',array('date_renewed' =>date('Y-m-d H:m:s')));
									}else{
										if($this->db->insert('renews',$data)){
											return true;
										}else{
											return false;
										}
									}


							}else{  return array('error' =>1,'msg' =>$this->db->last_query());  }
			 
			
			 $flag = true;
			 	return array('error' =>0,'msg' =>'Successfully renewed/updated');
			}
			
			if($flag) return true;
			else return false;
		}else{
			return array('error' =>1,'msg' =>'Sorry you cannot changed this gross since the business has been assessed this year.');
		}

	}
	
	public function save_reqs($data) {

		$reqs = $data['require'];
		$notreqs = $data['not_require'];
		// var_dump($data);
		$this->db->update('applications', array('requirements' => $reqs,'na_requirements' => $notreqs), array('app_id' => $data['appid']));
		
	}



	public function get_renew_requirements(){
	//$table = '', $fields = '*', $where = null, $order_by = 'ID', $order = 'ASC'
		return $this->get('additional_requirements','*', null,'add_reqt_id', 'ASC')->result();
	}

	//by boloi
	public function get_taxpayers(){
		  $this->db
			 ->select('a.application_date,b.buss_id ,b.permit_number, b.business_name, b.created_at, o.owner_id,o.firstname, o.middlename, o.lastname')
			 ->select('at.types AS app_type,p.types AS pay_type')
			 ->from('businessess b')
			 ->join('applications a', 'b.application_id=a.app_id', 'left')
			 ->join('application_type at', 'b.application_id=at.application_id', 'left')
			 ->join('payment_type p', 'b.payment_id=p.payment_id', 'left')
			 // ->join('payment_status ps', 'b.payment_status=ps.payment_status_id', 'left')
			 ->join('owners o', 'b.owner_id=o.owner_id', 'left')
			 ->distinct();
		return $this->db->get();
	}


	public function count_owner($status){
	$owners = array();

		$this->db->distinct()
    		->select('b.permit_number, b.business_name,b.date_applied')
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
    		->select('a.app_id, a.buss_id,a.modified,a.application_date,a.status')
			->select('at.application_id, at.types application_type')
    		->from('applications a')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
    		->join('application_type at', 'a.application_id=at.application_id', 'inner')
			//->where('a.application_id','1')
			->order_by('b.permit_number','ASC');

			//echo $this->db->last_query();
    	if(!empty($status)) {
    		$this->db->where('a.status', $status);
    	}


		$results = $this->db->get();//print_r($results);
		//echo  $this->db->_error_message();
		if($results->num_rows() > 0) {
			foreach($results->result() as $r) {
				$owners[] = $r;
			}
		}

		$renewed = $this->db
    		->select('b.permit_number, b.business_name')
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
    		->select('a.app_id, a.buss_id, at.application_id, at.types application_type, a.application_date , a.modified , a.status')
    		->from('applications a')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
			->join('renews r', 'a.app_id=r.app_id', 'inner')
    		->join('application_type at', 'r.application_id=at.application_id', 'inner')
    		->distinct()
			->where('a.status', 'renewed')
			->get();

		/*commented for the mean time..-joAnn
		the purpose of this is to include all renewed
		business but in this case we don't have to do
		that :)
		*/
		if($renewed->num_rows() > 0) {
			foreach($renewed->result() as $renew) {
				array_push($owners, $renew);

			}
		}
		return count($owners);
	}
	public function get_owners2($status,$limit,$offset) { //echo $limit .' and '. $offset;
    	$owners = array();

		$this->db->distinct()
    		->select('b.permit_number, b.business_name,b.date_applied')
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
    		->select('a.app_id, a.buss_id,a.modified,a.application_date,a.status')
			->select('at.application_id, at.types application_type')
    		->from('applications a')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
    		->join('application_type at', 'a.application_id=at.application_id', 'inner')
			//->where('a.application_id','1')
			->limit($limit,$offset)
			->order_by('b.permit_number','asc');

			//echo $this->db->last_query();
    	if(!empty($status)) {
    		$this->db->where('a.status', $status);
    	}


		$results = $this->db->get();//print_r($results);
		//echo  $this->db->_error_message();
		if($results->num_rows() > 0) {
			foreach($results->result() as $r) {
				$owners[] = $r;
			}
		}

		$renewed = $this->db
    		->select('b.permit_number, b.business_name')
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
    		->select('a.app_id, a.buss_id, at.application_id, at.types application_type, a.application_date , a.modified , a.status')
    		->from('applications a')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
			->join('renews r', 'a.app_id=r.app_id', 'inner')
    		->join('application_type at', 'r.application_id=at.application_id', 'inner')
    		->distinct()
			->where('a.status', 'renewed')
			->get();

		/*commented for the mean time..-joAnn
		the purpose of this is to include all renewed
		business but in this case we don't have to do
		that :)
		*/
		if($renewed->num_rows() > 0) {
			foreach($renewed->result() as $renew) {
				array_push($owners, $renew);

			}
		}

			return $owners;
    	// return $this->db->get();

		// return $this->db
		// 	->select('b.permit_number, b.business_name, b.trade_name, b.buss_id, b.owner_id')	// Select from Businessess Table
		// 	->select('o.firstname, o.middlename, o.lastname')									// Select from Owners Table
		// 	->select('a.application_date, a.app_id')											// Select from Applications Table
		// 	->select('at.types application_type')												// Select from Application Types Table
		// 	->from('applications a')
		// 	->join('application_type at', 'a.application_id=at.application_id', 'inner')
		// 	->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
		// 	->join('owners o', 'a.owner_id=o.owner_id AND b.owner_id=o.owner_id', 'inner')
		// 	->get();
	}

	
	public function retirement($app_id){
		$this->db->select('*')->from('assessments')->where('app_id', $app_id);
		$query1 = $this->db->get();
		if($query1->result()){

		$this->db->select('b.business_name,o.firstname,o.middlename,o.lastname,o.permitee,b.permit_number')
				 ->select('br.brgy as brgy1,brg.brgy as brgy2,b.buss_id,bl.capital')
				 ->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu')
		         ->select('bn.business_nature')
				 ->distinct()
				 ->from('applications a')
				 ->join('businessess b','b.buss_id = a.buss_id','inner')
				 ->join('owners o','o.owner_id = a.owner_id','inner')
				 ->join('brgys br','b.brgy_id = br.brgy_id','inner')
				 ->join('brgys brg','o.brgy_id = brg.brgy_id','inner')
				 ->join('business_line bl','a.app_id = bl.app_id','inner')
				 ->join('business_nature bn','bl.buss_nature_id = bn.buss_nature_id','inner')

				 ->where('a.app_id',$app_id);
		$query = $this->db->get();
		//  echo $this->db->last_query();

		$datas = $query->result();
		
		$bnarray = array();
		foreach($datas as $d){
			$info['business_name']=$d->business_name;
			$info['owner']=$d->firstname.' '.$d->middlename.' '.$d->lastname;
			$info['permitee']=$d->permitee;
			$info['obrgy']=$d->brgy2;
			$info['bbrgy']=$d->brgy1;
			$info['buss_id']=$d->buss_id;
			$info['employees']=$d->abled_female_emp_estab+$d->abled_male_emp_estab+$d->pwd_male_emp_estab+$d->pwd_female_emp_estab+$d->pwd_male_emp_lgu+$d->pwd_female_emp_lgu+$d->abled_male_emp_lgu+$d->abled_female_emp_lgu;
			$info['permit_no']=$d->permit_number;
			
		
		}
		foreach($datas as $d){
			$gross[] = $d;
			$bnarray[]=str_replace('(Additional)','',$d->business_nature);
		}
		
		return [
			'info_data' => $info,
			'bnarray' => $bnarray,
			'gross' => $gross
				];

	}else{

	}
}

	/* -------------------
	 * Get Business Owners
	 * ------------------- */
	public function get_owners($status = null) {

		$replace1 = date('Y')+2;	
		$replace01 = $replace1.'-';
		$replace2 = date('Y')+1;	
		$replace02 = $replace2.'-';
		$replace3 = date('Y');	
		$replace03 = $replace3.'-';
		$replace4 = date('Y')-1;	
		$replace04 = $replace4.'-';
    	$owners = array();
		$order = ' ORDER BY CAST(RIGHT(b.permit_number,4) AS UNSIGNED)';
		$where="b.permit_number like '%".$replace01."%' OR b.permit_number like '%".$replace02."%' OR b.permit_number like '%".$replace03."%' OR b.permit_number like '%".$replace04."%'";
		
		  $this->db->distinct()
    		->select('a.app_id,b.permit_number, b.business_name,b.date_applied,b.ownership_id,b.date_applied')
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname,o.permitee,b.closed')
    		->select('a.buss_id,a.modified,a.application_date,a.status')
			->select('at.application_id, at.types application_type')
			//->select('bl.bus_line_id')
    		->from('applications a')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
			->join('application_type at', 'a.application_id=at.application_id', 'inner')
			->where($where)
			->limit(10);
    		//->join('business_line bl', 'bl.app_id=a.app_id','inner');

		$results = $this->db->get();
		//echo $this->db->last_query();
		if($results->num_rows() > 0) {
			foreach($results->result() as $r) {
				$owners[] = $r;
			}
		}

			return ($owners);
	}



	//assessment
	public function get_owners11($status = null) {

		// $replace1 = date('Y')+2;	
		// $replace01 = $replace1.'-';
		// $replace2 = date('Y')+1;	
		// $replace02 = $replace2.'-';
		$replace3 = date('Y');	
		$replace03 = $replace3.'-';
		// $replace4 = date('Y')-1; // mao ni ang original par! arigato
		$replace4 = date('Y')+2;	
		$replace04 = $replace4.'-';
    	$owners = array();
		$order = ' ORDER BY CAST(RIGHT(b.permit_number,4) AS UNSIGNED)';
		// $where="b.permit_number like '%".$replace01."%' OR b.permit_number like '%".$replace02."%' OR b.permit_number like '%".$replace03."%' OR b.permit_number like '%".$replace04."%'";
		$where="b.permit_number like '%".$replace03."%' OR b.permit_number like '%".$replace04."%'";

		  $this->db->distinct()
    		->select('a.app_id,b.permit_number, b.business_name,b.date_applied,b.ownership_id,b.date_applied')
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname,o.permitee,b.closed')
    		->select('a.buss_id,a.modified,a.application_date,a.status')
			->select('at.application_id, at.types application_type')
			//->select('bl.bus_line_id')
    		->from('applications a')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
			->join('application_type at', 'a.application_id=at.application_id', 'inner')
			->where($where);
    		//->join('business_line bl', 'bl.app_id=a.app_id','inner');

		$results = $this->db->get();
		//echo $this->db->last_query();
		if($results->num_rows() > 0) {
			foreach($results->result() as $r) {
				$owners[] = $r;
			}
		}

			return ($owners);
	}



	public function get_to_assess_owner($status){
		$owners=array();
	  $this->db->distinct()
				 ->select(' o.owner_id, o.firstname, o.middlename, o.lastname')
				 ->select('b.buss_id, b.permit_number, b.business_name,b.date_applied,b.application_id')
				 ->select('at.types')
				 ->select('a.modified')
				 ->from('businessess b')
				 ->join('owners o','b.owner_id=o.owner_id','inner')
				// ->join('business_line bl','b.buss_id = bl.bl_buss_id','inner')
				 ->join('application_type at','b.application_id = at.application_id','inner')
				 ->join('applications a','b.buss_id= a.buss_id AND a.owner_id=o.owner_id','inner')
				 ->distinct()
				 ->order_by('b.permit_number','ASC');

			if(!empty($status)) {
				$this->db->where('a.status', $status);
			}
			$results = $this->db->get();
			if($results->num_rows() > 0) {
				foreach($results->result() as $r) {
					$owners[] = $r;
				}
			} 
			return $owners;
		//return  $this->db->get();
	}

	
	public function getApprovalList() {
	
		$replace3 = date('Y');	
		$replace03 = $replace3.'-';
		$replace4 = date('Y')-1;	
		$replace04 = $replace4.'-';

		$where="b.permit_number like '%".$replace03."%' OR b.permit_number like '%".$replace04."%'";

    	 $approval =  $this->db
			//->distinct()
    		->select('b.permit_number, b.business_name,b.ownership_id, b.closed, b.stall_num, b.stall_area, b.stall_val, rp.pay_id')
    		->select('o.firstname, o.middlename, o.lastname,o.owner_id,o.permitee')
    		->select('a.app_id, a.buss_id, a.application_date, apptype.types application_type')
    		->select('assess.status, assess.assessment_id, assess.total_tax_due, assess.assessment_date, pt.payment_id,pt.types,GROUP_CONCAT(pay.count) as count,pay.payment_modes')
    		->from('assessments assess')
    		->join('applications a', 'assess.app_id=a.app_id', 'inner')
    		->join('owners o', ' a.owner_id=o.owner_id', 'inner')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('application_type apptype', 'assess.application_id=apptype.application_id', 'inner')
			->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
			->join('payments pay', 'assess.assessment_id=pay.assessment_id', 'left')
			->join('retire_payments rp', 'assess.assessment_id=rp.assessment_id', 'left')
			->order_by('b.permit_number','asc')
			->group_by('b.permit_number')
			->get(); //echo $this->db->last_query();
			return $approval;

	}

	public function getApprovalList1() {
		$year = date('Y');
		$yearcon = $year.'%';
		$where =  "b.permit_number LIKE '".$yearcon."'";
		$approval =  $this->db
		   //->distinct()
		   ->select('b.permit_number, GROUP_CONCAT(b.business_name) as business_name,b.ownership_id')
		   ->select('o.firstname, o.middlename, o.lastname,o.owner_id,o.permitee,o.owner_id,o.username_,o.password_')
		   ->select('a.app_id, a.buss_id, a.application_date, apptype.types application_type')
		   ->select('assess.status, assess.assessment_id, assess.total_tax_due, assess.assessment_date, pt.payment_id')
		   ->from('assessments assess')
		   ->join('applications a', 'assess.app_id=a.app_id', 'inner')
		   ->join('owners o', ' a.owner_id=o.owner_id', 'inner')
		   ->join('businessess b', 'o.owner_id=b.owner_id', 'inner')
		   ->join('application_type apptype', 'assess.application_id=apptype.application_id', 'inner')
		   ->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
		   ->where($where)
		   ->group_by('o.lastname')
		   ->order_by('o.lastname','asc')
		   ->get(); //echo $this->db->last_query();
		   return $approval;

   }

 

	public function get_approval_list() {
		return $this->db
    		->select('b.permit_number, b.business_name')
    		->select('o.firstname, o.middlename, o.lastname')
    		->select('app.app_id, app.application_date')
    		->select('a.assessment_id, a.buss_id, a.owner_id, a.status, a.approved')
    		->select('at.types application_type')
    		->from('assessments a')
    		->join('owners o', 'a.owner_id=o.owner_id', 'inner')
    		->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
    		->join('applications app', 'b.buss_id=app.buss_id', 'inner')
    		->join('application_type at', 'app.application_id=at.application_id', 'inner')
    		->where('a.status', 'unpaid')
    		->get();
	}

	

		
		
	public function getAssessment($appID) {

		$businesses = array();
   		$missing = array(); //missing requirements
		$gross = array();
		$required = array();
		$required_tfo = array();
		$ignores = array();
		$due_date = array();
		$get_surcharge_n_interest = array();
		$new_due1 = array();
		$assessment_years ='';
		$renewed=0;
		$count =0;
		$no_assessment = 0;
		$diff_year=0;
		$empty = '1';
		$diff_years = 0;
		$number_of_months = 0;
		$surcharge;
		$next_assessment_year = '';
		$today;
		/*review this, this might not be needed*/

		$get_application_id = $this->db
						  ->select('a.application_id,assess.assessment_id,a.app_id')
						  ->from('applications a')
						  ->join('assessments assess','a.app_id=assess.app_id','left')
						  ->where('a.app_id',$appID)
						  ->get();

		$get_application_id = $get_application_id->result();

		/*Check if it's renewed or not.
		Get initial business info*/

		$is_renewed = $this->db
						   ->select('r.renew_id,YEAR(r.date_renewed) drenewed')
						   ->from('renews r')
						   ->join('applications a','r.app_id=a.app_id','left')
						   ->like('r.date_renewed',date('Y',strtotime("now")))
						   ->get();


	if ($get_application_id[0]->application_id == 1){ //echo 'f'; //fresh business...application_id=1

				$business = $this->db
						->DISTINCT()
						->select('o.owner_id, o.firstname, o.middlename, o.lastname, b.permit_number')
						->select('b.stall_num, b.stall_area, b.stall_val')
						->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address,b.classification_id,b.ownership_id')
						->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu')
						->select('bn.business_nature, bn.requirements,a.requirements as reqs')
						->select('pt.types payment_type')
						->select('a.app_id, a.application_id,a.application_date,br.brgy')
						->select('bl.bus_line_id,bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted,bl.quantity,bl.unit, bl.delinquent_year')
						->select('assess.app_id assess_app_id,assess.status as assess_status,assess.breakdowns,assess.total_tax_due, assess.assessment_date,assess.addtltfo')
						// ->select('r.renew_id,date_renewed')
						// ->select('p.pay_id,p.status,p.payment_date')
						// ->select('rel.releasing_id')
						->from('business_line bl')
						->join('businessess b', 'bl.bl_buss_id=b.buss_id', 'right')
						->join('applications a', 'bl.app_id=a.app_id', 'right')
						->join('owners o', 'a.owner_id=o.owner_id', 'left')
						->join('brgys br', 'b.brgy_id=br.brgy_id', 'inner')						
						->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'left')
						->join('payment_type pt', 'b.payment_id=pt.payment_id', 'left')
						->join('assessments assess','assess.app_id=a.app_id','left')
						// ->join('renews r','r.app_id=a.app_id','left')
						// ->join('payments p','p.assessment_id=assess.assessment_id','right')
						// ->join('releasing rel','p.pay_id=rel.payment_id','left')
						
						->where(array ('a.app_id' =>$appID,
									   'a.application_id' => $get_application_id[0]->application_id
				  			))

						->get();
						
			} else if($is_renewed->num_rows()>0) { //echo 'else if'; //business has been currently renewed

				$is_renewed = $is_renewed->result();
				$today = date('Y');
				$is_assessed = $this->db
									->select('assess.assessment_id,YEAR(assess.assessment_date) adate')
									->from('assessments assess')
									->where(array('app_id' =>$appID))
									->or_like('assess.assessment_date',$is_renewed[0]->drenewed)
									->get();

					if($is_assessed->num_rows()>0){ //business has been currently assessed
						
						$is_assessed = $is_assessed->result();

							$business = $this->db
							->select('o.owner_id, o.firstname, o.middlename, o.lastname, b.permit_number')
							->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address,b.classification_id,b.ownership_id, b.stall_num, b.stall_area, b.stall_val')
							->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu')
							->select('bn.business_nature, bn.requirements,a.requirements as reqs')
							->select('pt.types payment_type')
							->select('a.app_id, a.application_id,a.application_date,br.brgy')
							->select('bl.bus_line_id,bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted,bl.quantity,bl.unit, bl.delinquent_year')
							->select('assess.app_id assess_app_id,assess.status as assess_status,assess.breakdowns,assess.total_tax_due, assess.assessment_date,assess.addtltfo')
							// ->select('r.renew_id,date_renewed')
							// ->select('p.pay_id,p.status,p.payment_date')
							// ->select('rel.releasing_id')
							->from('business_line bl')
							->join('businessess b', 'bl.bl_buss_id=b.buss_id', 'inner')
							->join('applications a', 'bl.app_id=a.app_id', 'inner')
							->join('owners o', 'b.owner_id=o.owner_id', 'inner')
							->join('brgys br', 'b.brgy_id=br.brgy_id', 'inner')						
							->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
							->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
							->join('assessments assess','assess.app_id=a.app_id','left')
							// ->join('renews r','r.app_id=a.app_id','left')
							// ->join('payments p','p.assessment_id=assess.assessment_id','right')
							// ->join('releasing rel','p.pay_id=rel.payment_id','left')
							->DISTINCT()
							->where(array ('a.app_id' =>$appID,
										   'a.application_id' => $get_application_id[0]->application_id
					  			))
							// ->where('r.date_renewed LIKE "%'.date('Y',strtotime($today)).'%" AND assess.assessment_date LIKE "%'.(date('Y',strtotime("now"))-1).'%"')
							// ->where('r.date_renewed LIKE "%'.date('Y',strtotime($today)).'%"')
							->get(); //please review this query
							
					} else {  //business not currently assessed
						
						$empty='';
                        $business = $this->db
						->select('o.owner_id, o.firstname, o.middlename, o.lastname, b.permit_number')
						->select('b.stall_num, b.stall_area, b.stall_val')
						->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address,b.classification_id,b.ownership_id')
						->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu')
						->select('bn.business_nature, bn.requirements,a.requirements as reqs')
						->select('pt.types payment_type')
						->select('a.app_id, a.application_id,a.application_date,br.brgy')
						->select('bl.bus_line_id,bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted,bl.quantity,bl.unit, bl.delinquent_year')
						->select('assess.app_id assess_app_id,assess.status as assess_status,assess.breakdowns,assess.total_tax_due, assess.assessment_date,assess.addtltfo')
						// ->select('r.renew_id,r.date_renewed')
						// ->select('p.pay_id,p.status,p.payment_date')
						// ->select('rel.releasing_id')
						->from('business_line bl')
						->join('businessess b', 'bl.bl_buss_id=b.buss_id', 'inner')
						->join('brgys br', 'b.brgy_id=br.brgy_id', 'inner')												
						->join('applications a', 'bl.app_id=a.app_id', 'inner')
						->join('owners o', 'b.owner_id=o.owner_id', 'inner')
						->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
						->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
						->join('assessments assess','assess.app_id=a.app_id','left')
						// ->join('renews r','r.app_id=a.app_id','left')
						//->join('payments p','p.assessment_id=assess.assessment_id','right')
						// ->join('releasing rel','p.pay_id=rel.payment_id','left')
						->DISTINCT()
						->where(array ('a.app_id' =>$appID,
									   'a.application_id' => $get_application_id[0]->application_id
							  ))
							
						// ->where('r.date_renewed LIKE "%'.date('Y',strtotime($today)).'%" AND assess.assessment_date LIKE "%'.(date('Y',strtotime("now"))-1).'%"')
                        //->where('r.date_renewed LIKE "%'.date('Y',strtotime($today)).'%" and releasing_id!="'.$empty.'"')
						//->where('r.date_renewed LIKE "%'.date('Y',strtotime($today)).'%"')
						->get(); //please review this query
					   // echo $this->db->last_query();  
					  
                    }

            }  else {  //assess,renew is empty
            	$today = date('Y');
				$is_assessed = $this->db
									->select('assess.assessment_id,YEAR(assess.assessment_date) adate')
									->from('assessments assess')
									->where(array('app_id' =>$appID))
									->or_like('assess.assessment_date',date('Y',strtotime($today))-1)
									->get();

				$business = $this->db
						->select('o.owner_id, o.firstname, o.middlename, o.lastname, b.permit_number')
						->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address,b.classification_id,b.ownership_id')
						->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu')
						->select('bn.business_nature, bn.requirements,a.requirements as reqs')
						->select('pt.types payment_type')
						->select('a.app_id, a.application_id,a.application_date,br.brgy')
						->select('bl.bus_line_id,bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted,bl.quantity,bl.unit, bl.delinquent_year')
						->select('assess.app_id assess_app_id,assess.status as assess_status,assess.breakdowns,assess.total_tax_due, assess.assessment_date,assess.addtltfo')
						// ->select('r.renew_id,r.date_renewed')
						// ->select('p.pay_id,p.status,p.payment_date')
						// ->select('rel.releasing_id')
						->from('business_line bl')
						->join('businessess b', 'bl.bl_buss_id=b.buss_id', 'inner')
						->join('applications a', 'bl.app_id=a.app_id', 'inner')
						->join('owners o', 'b.owner_id=o.owner_id', 'inner')
						->join('brgys br', 'b.brgy_id=br.brgy_id', 'inner')													
						->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
						->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
						->join('assessments assess','assess.app_id=a.app_id','left')
						// ->join('renews r','r.app_id=a.app_id','left')
						// ->join('payments p','p.assessment_id=assess.assessment_id','left')
						// ->join('releasing rel','p.pay_id=rel.payment_id','left')
						->DISTINCT()
						->where(array ('a.app_id' =>$appID,
									   'a.application_id' => $get_application_id[0]->application_id
				  			))
				  		//->where('assess.assessment_date LIKE "%'.(date('Y',strtotime($today))-1).'%" AND r.date_renewed LIKE "%'.(date('Y',strtotime($today))-1).'%"')
						->get();
						
						//$app_date_year = (!empty($business[0]->application_date)) ? date('Y',strtotime($business[0]->application_date)) : ;
						$today = date('Y');
    					/*$app_date_year = $business[0]->application_date;
						$diff_year = $today - $app_date_year;*/
			}

	//echo $this->db->last_query();
		/*pull the trigger*/

		if($business->num_rows() > 0) {
			$business = $business->result();

			$i = 0;

			foreach ($business as $b) {
				$total_emp = $b->abled_female_emp_estab+$b->abled_male_emp_estab+$b->pwd_male_emp_estab+$b->pwd_female_emp_estab+$b->pwd_male_emp_lgu+$b->pwd_female_emp_lgu+$b->abled_male_emp_lgu+$b->abled_female_emp_lgu;
				$businesses[] = $b;
				$breakdowns = isset($b->breakdowns) ? (array)json_decode($b->breakdowns) : '';
				$requirements = isset($b->requirements) ? (array)json_decode($b->requirements) : '';
				$submitted = isset($b->requirements_submitted) ? (array)json_decode($b->requirements_submitted) : '';
				$addttfo = isset($b->addtltfo) ? (array)json_decode($b->addtltfo) : '';
					/*Sometimes requirements of the nature might be empty. User must provide*/
					if (is_array($requirements) && is_array($submitted)){
						$missing = array_diff($requirements, $submitted);
					} else {
						$missing = array();
					}

				$gross = isset($b->gross) ? (array)json_decode($b->gross) : '';

				// Check and get missing Requirements

					foreach ($missing as $item) {
						$req = $this->db
							->select('r.description')
							->from('requirements r')
							->where('requirement_id', $item)
							->get();

						if($req->num_rows() > 0) {
							$r = $req->row();
							$required[$i][] = $r->description;
						} else {
							//do nothing
						}
					} //end of foreach missing

				//$where = 'r.buss_nature_id = '.$b->buss_nature_id.' AND b.application_id = '.$b->application_id.'  AND  (r.application_id = '.$b->application_id.')' ;// OR t.all = '.$empty.') AND r.application_id='.$b->application_id.' AND b.application_id='.$b->application_id.'';
					$where = 'r.buss_nature_id = '.$b->buss_nature_id.'  AND  (r.application_id = '.$b->application_id.')' ;

				//get tfo for the business' nature

				$tfo = $this->db
					->distinct()
					->select('t.tfo, t.amount, t.tfo_id, t.payment_id,t.type tfo_type')
					->select('r.req_tfo_id, r.value, r.variables, r.type,r.subtype')
					->from('required_tfo r')
					->join('tfo t', 'r.tfo_id=t.tfo_id', 'inner')
					->join('business_nature b', 'r.buss_nature_id=b.buss_nature_id', 'inner')
					->where($where)->get();

				//echo $this->db->last_query();
				$tfo =  $tfo->result();
				$required_tfo[] = $tfo;

				//Get due date baby
				$new_due1 = $this->db
								 ->select('s.value,s.field,s.payment_mode')
								 ->from('settings s')
								 ->where('s.payment_mode',$business[0]->payment_id)
								 ->get()->result();

				//Check due date and current systems date
				if(strtotime('now') > strtotime($new_due1[0]->value)){
					$get_surcharge_n_interest = $this->db
													 ->select('s.surcharge,s.interest')
													 ->from('surcharge s')
													 ->get(); //echo $this->db->last_query();
													//print_r($get_surcharge_n_interest->result());
				}else {
					$get_surcharge_n_interest = $this->db
													 ->select('s.surcharge,s.interest')
													 ->from('surcharge s')
													 ->get();
				}

			} //end of foreach business
			$today = date('m-d-Y');
			$like = "assessment_date LIKE '".date('Y',strtotime($today)).'%'."' AND app_id ='".$b->app_id."'";
			$check = $this->db
						  ->select('assessment_date')
						  ->from('assessments')
						  ->where($like)
						  ->get();

			if (($check->num_rows()> 0 )){
				$ignores[$i] = 'true';
			} else { $ignores[$i] = 'false';}

			if (!empty($breakdowns)){
				$new_breakdowns = (date('Y',strtotime($breakdowns[0]->dues)) == (date ('Y',strtotime($today)))) ?  (array)json_decode($b->breakdowns) : $breakdowns;
			} else {
				$new_breakdowns = array();
			}

			if(!empty($business[0]->application_date)){

				/*$diff_year = $diff_year *12; //echo 'diff_year='.$diff_year;*/
				$today = date('Y');
				$today_month = date('m');/*echo 'today_month='.$today_month;*/
				$diff_year = date('Y',strtotime($business[0]->application_date));/*echo 'diff_year='.$diff_year;*/
				$num_months = date('n',$today); //echo 'num_months='.$num_months;
				$no_assessment = 1;
				$number_of_months = (((($today - $diff_year)  * 12) + $today_month));

			} else{

				$today = date('n');// echo 'today='.$today;
				$diff_year = date('Y',strtotime($business[0]->assessment_date)); //echo 'diff_year='.$diff_year;
				//$num_months = date('n',$today);
				$no_assessment = 1;
				$number_of_months = $today - $diff_year;

			}
			return array(
				'breakdowns' =>$new_breakdowns,
			    'renewed' => $renewed,
			    'total_emp' =>$total_emp,
				'no_assessment' =>$no_assessment,
				'diff_years' =>$diff_years,
				'assessment_years' => $assessment_years,
				'add_surcharge' =>$get_surcharge_n_interest->result(),
				'number_of_months' =>($number_of_months),
				'business' => $business,
				'required' => $required,
				'tfos' => $required_tfo,
				'ignore' => $ignores,
				'due_date' =>$new_due1,
				'addttfo' => $addttfo
			);
		} else {
			return false;
			/* return array(
						'error' => '1',
						'msg'  =>'Please check Required TFO for this business nature'
						); */

		}

	} //end of getAssessment

	//Re assessment

	public function getReAssessment($ownerID) {
    	$business = $this->db
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
    		->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address')
    		->select('bn.business_nature, bn.requirements')
    		->select('pt.types payment_type')
    		->select('a.app_id, a.application_id, bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted, bl.delinquent_year')
    		->from('business_line bl')
    		->join('businessess b', 'bl.buss_id=b.buss_id', 'inner')
    		->join('applications a', 'bl.app_id=a.app_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
    		->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
    		->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
    		->where('o.ownerid', $ownerID)
    		->get();

    		//echo $this->db->last_query();
    	$missing = array();
		$required = array();
		$required_tfo = array();
		$ignores = array();
		$due_date = array();
		if($business->num_rows() > 0) {
			$business = $business->result();
			$businesses = array();
			//print_r($business);
			$i = 0;
			foreach ($business as $b) {
				$requirements = (array)json_decode($b->requirements);
				$submitted = (array)json_decode($b->requirements_submitted);
				$missing = array_diff($requirements, $submitted);

				// Get Missing Requirements
				foreach ($missing as $item) {
					$req = $this->db
						->select('r.description')
						->from('requirements r')
						->where('requirement_id', $item)
						->get();

					if($req->num_rows() > 0) {
						$r = $req->row();
						$required[$i][] = $r->description;
					} else {
						return false;
					}
				}

				// echo '<pre>'; print_r($requirements); echo '</pre>';

				// Get TFO
				$tfo = $this->db
					->select('t.tfo, t.amount, t.tfo_id, t.payment_id')
					->select('r.req_tfo_id, r.value, r.variables, r.type')
					->from('required_tfo r')
					->join('tfo t', 'r.tfo_id=t.tfo_id', 'inner')
					->join('business_nature b', 'r.buss_nature_id=b.buss_nature_id', 'inner')
					->where(array(
						'r.buss_nature_id' => $b->buss_nature_id
					))
					->or_where('t.all', 1)->get();

				// Check if the business is already assessed
				$check = $this->db->get_where('assessments', array(
					'app_id' => $b->app_id
				));

				$ignores[$i][] = ($check->num_rows() > 0) ? true : false;
				$required_tfo[] = $tfo->result();
				$businesses[] = $b;
				$i++;


			// Get Due Date base on payment mode of the business
				if ($b->payment_id == 1){
				/* $due_date = $this->db
								 ->select('') */
				} else if ($b->payment_id == 2){
					$field = 'Semester';
					$due_date = $this->db
									 ->select('s.value')
									 ->from('settings s')
									 ->like('field',$field)
									 ->get()->result();
				} else if ($b->payment_id == 3){
					$field = 'quarter';
					$due_date = $this->db
									 ->select('s.value')
									 ->from('settings s')
									 ->like('field',$field)
									 ->get()->result();
				}
			}

			return array(
				'business' => $business,
				'required' => $required,
				'tfos' => $required_tfo,
				'ignore' => $ignores,
				'due_date' =>$due_date
			);
		} else {
			return false;
		}
	}

	public function get_assessment($owner_id, $buss_id) {
		$business = $this->db
			->select('b.buss_id, b.owner_id, b.business_name, b.trade_name, b.street_address')	// Select from Businessess Table
			->select('o.firstname, o.middlename, o.lastname')									// Select from owners table
			->select('a.app_id, a.capital, a.gross, a.requirements requirements_submitted, a.buss_nature_id')				// Select from applications table. Gross is a JSON Data
			->select('bn.business_nature, bn.requirements')		// Select from business nature table. Requirements is a JSON Data
			->select('p.types payment_type')
			->from('businessess b')
			->join('owners o', 'b.owner_id=o.owner_id', 'inner')
			->join('applications a', 'b.buss_id=a.buss_id', 'inner')
			->join('business_nature bn', 'a.buss_nature_id=bn.buss_nature_id', 'inner')
			->join('payment_type p', 'b.payment_id=p.payment_id', 'inner')
			->where('a.owner_id', $owner_id)
			->get();

		$missing = array();
		$required = array();
		$required_tfo = array();

		if($business->num_rows() > 0) {
			$business = $business->result();
			$businesses = array();

			foreach ($business as $b) {
				$requirements = json_decode($b->requirements);
				$submitted = json_decode($b->requirements_submitted);
				$missing = array_diff($requirements, $submitted);

				// Get Missing Requirements
				foreach ($missing as $item) {
					$req = $this->db
						->select('r.description')
						->from('requirements r')
						->where('requirement_id', $item)
						->get();

					if($req->num_rows() > 0) {
						$r = $req->row();
						$required[] = $r->description;
					} else {
						return false;
					}
				}

				// Get TFO
				$tfo = $this->db
					->select('t.tfo, t.amount, t.tfo_id')
					->select('r.req_tfo_id, r.value, r.variables, r.type')
					->from('required_tfo r')
					->join('tfo t', 'r.tfo_id=t.tfo_id', 'inner')
					->join('business_nature b', 'r.buss_nature_id=b.buss_nature_id', 'inner')
					->where(array(
						'r.buss_nature_id' => $b->buss_nature_id
					))
					->or_where('t.all', 1)->get();

				// Check if the business is already assessed
				$check = $this->db->get_where('assessments', array(
					'owner_id' => $owner_id,
					'buss_id' => $buss_id
				));
				$businesses[] = $b;
			}

			//echo '<pre>'; print_r($businesses); echo '</pre>'; exit;

			return array(
				'business' => $business,
				'required' => $required,
				'tfos' => $tfo->result(),
				'ignore' => ($check->num_rows() > 0) ? true : false
			);
		} else {
			return false;
		}
	}

	// public function get_assessment($owner_id = null, $buss_id = null) {
	// 	$this->db->distinct()
	// 		->select('o.firstname, o.middlename, o.lastname')
	// 		->select('b.business_name, b.street_address')
	// 		->select('pt.types payment_type')
	// 		->select('a.capital, bn.business_nature')
	// 		->select('t.amount, t.tfo')
	// 		->from('businessess b')
	// 		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
	// 		->join('applications a', 'o.owner_id=a.owner_id AND b.buss_id=a.buss_id', 'inner')
	// 		->join('business_nature bn', 'a.buss_nature_id=bn.buss_nature_id', 'inner')
	// 		->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
	// 		->join('required_tfo rt', 'bn.buss_nature_id=rt.buss_nature_id')
	// 		->join('tfo t', 'rt.tfo_id=t.tfo_id', 'inner')
	// 		->where(array ('o.owner_id' =>$owner_id, 'b.buss_id' =>$buss_id))
	// 		->get();
	// 		echo $this->db->_error_message();exit;
	// 		// echo $this->db->last_query(); exit;
	// 	if(!is_null($owner_id) && !is_null($buss_id)){
	// 	} else {
	// 		return false;
	// 	}
	// }

	/* ---------------------------------
	 * Get Payment Details for Printing
	 * ---------------------------------*/
	public function get_payment_details($paymentID) {

	 
		return $get_tfo = $this->db
		->select('o.firstname, o.middlename, o.lastname,o.brgy_id own_bar,o.permitee, o.remarks')
		->select('p.or_number, p.payment_date,a.application_id as app_idd,p.paid_tax')
		->select('br.brgy obrgy,bbr.brgy bbrgy,b.units_no')
		->select('b.business_name,b.contact_number, b.permit_number, b.street_address,b.street_address2,b.brgy_id buss_bar,b.ownership_id,b.image,b.plate_no')
		->select('b.stall_num, b.stall_area, b.stall_val')
		->select('bn.application_id,bn.business_nature,bl.gross,assess.total_tax_due as total_amount,bl.capital')
		->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.indi_male_emp,b.indi_female_emp,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')		
		->select('at.types application_status')
		->select('cl.types, ot.types as ownership_type')
		->select('assess.tfos,assess.addtltfo,assess.interest_n_surcharge')
		->from('payments p')
		->join('owners o', 'p.owner_id=o.owner_id', 'inner')
		->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
		->join('classification_type cl','b.classification_id=cl.classification_id','left')
		->join('applications a', 'b.buss_id=a.buss_id AND b.owner_id=o.owner_id', 'inner')
		->join('business_line bl','bl.app_id=a.app_id','inner')
		->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
		->join('application_type at', 'b.application_id=at.application_id', 'inner')
		->join('brgys br', 'o.brgy_id=br.brgy_id', 'left')
		->join('brgys bbr', 'b.brgy_id=bbr.brgy_id', 'left')				
		->join('assessments assess' ,'a.app_id = assess.app_id','inner')	
		->join('ownership_type ot', 'b.ownership_id=ot.ownership_id', 'inner')			
		->where(array(
			//'p.status' => 'pending',
			'p.pay_id' => $paymentID
		))->get();
		// echo $this->db->last_query();
		
		//echo $this->db->_error_message();
}

public function get_retire_details($paymentID) {
	
		
			return $get_tfo = $this->db
			->select('o.firstname, o.middlename, o.lastname,o.brgy_id own_bar,o.permitee')
			->select('p.or_number, p.payment_date,a.application_id as app_idd,p.paid_tax')
			->select('br.brgy obrgy,bbr.brgy bbrgy')
			->select('b.business_name,b.contact_number, b.permit_number, b.street_address,b.street_address2,b.brgy_id buss_bar,b.ownership_id,b.image,b.plate_no')
			->select('bn.application_id,bn.business_nature,bl.gross,assess.total_tax_due as total_amount,bl.capital')
			->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.indi_male_emp,b.indi_female_emp,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')		
			->select('at.types application_status,p.interest')
			->select('cl.types, ot.types as ownership_type')
			->select('assess.tfos,assess.addtltfo,assess.interest_n_surcharge')
			->from('retire_payments p')
			->join('owners o', 'p.owner_id=o.owner_id', 'inner')
			->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
			->join('classification_type cl','b.classification_id=cl.classification_id','left')
			->join('applications a', 'b.buss_id=a.buss_id AND b.owner_id=o.owner_id', 'inner')
			->join('business_line bl','bl.app_id=a.app_id','inner')
			->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
			->join('application_type at', 'b.application_id=at.application_id', 'inner')
			->join('brgys br', 'o.brgy_id=br.brgy_id', 'left')
			->join('brgys bbr', 'b.brgy_id=bbr.brgy_id', 'left')				
			->join('assessments assess' ,'a.app_id = assess.app_id','inner')	
			->join('ownership_type ot', 'b.ownership_id=ot.ownership_id', 'inner')			
			->where(array(
				//'p.status' => 'pending',
				'p.pay_id' => $paymentID
			))->get();
			// echo $this->db->last_query();
			
			//echo $this->db->_error_message();
	}
	

public function get_payment_details2($paymentID) {

	
		return $get_tfo = $this->db
		->select('o.firstname, o.middlename, o.lastname,o.brgy_id own_bar,o.permitee')
		->select('p.or_number, p.payment_date,a.application_id')
		->select('br.brgy obrgy,bbr.brgy bbrgy,b.units_no')
		->select('b.business_name, b.permit_number,b.contact_number, b.street_address,b.street_address2,b.brgy_id buss_bar,b.ownership_id,b.image,bl.capital,b.plate_no')
		->select('bn.application_id,bn.business_nature,bl.gross,assess.total_tax_due as total_amount')
		->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.indi_male_emp,b.indi_female_emp,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')		
		->select('at.types application_status')
		->select('cl.types, ot.types as ownership_type')
		->select('assess.tfos,assess.addtltfo,assess.interest_n_surcharge')
		->from('payments p')
		->join('owners o', 'p.owner_id=o.owner_id', 'inner')
		->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
		->join('classification_type cl','b.classification_id=cl.classification_id','left')
		->join('applications a', 'b.buss_id=a.buss_id AND b.owner_id=o.owner_id', 'inner')
		->join('business_line bl','bl.app_id=a.app_id','inner')
		->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
		->join('application_type at', 'b.application_id=at.application_id', 'inner')
		->join('brgys br', 'o.brgy_id=br.brgy_id', 'left')
		->join('brgys bbr', 'b.brgy_id=bbr.brgy_id', 'left')				
		->join('assessments assess' ,'a.app_id = assess.app_id','inner')	
		->join('ownership_type ot', 'b.ownership_id=ot.ownership_id', 'inner')			
		->where(array(
			//'p.status' => 'pending',
			'bn.application_id' => '1',
			'p.pay_id' => $paymentID
		))->get();
		// echo $this->db->last_query();
		
		//echo $this->db->_error_message();
}

public function get_payment_details_temp($paymentID) {
	
		
			return $get_tfo = $this->db
			->select('o.firstname, o.middlename, o.lastname,o.brgy_id own_bar,o.permitee')
			->select('p.or_number, p.payment_date,a.application_id as app_idd,p.paid_tax')
			->select('br.brgy obrgy,bbr.brgy bbrgy')
			->select('b.business_name, b.permit_number,b.contact_number, b.street_address,b.street_address2,b.brgy_id buss_bar,b.ownership_id,b.image,b.plate_no')
			->select('bn.business_nature,bl.gross,assess.total_tax_due as total_amount,bl.capital')
			->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.indi_male_emp,b.indi_female_emp,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')		
			->select('at.types application_status')
			->select('cl.types, ot.types as ownership_type')
			->select('assess.tfos,assess.addtltfo,assess.interest_n_surcharge')
			->from('payments p')
			->join('owners o', 'p.owner_id=o.owner_id', 'inner')
			->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
			->join('classification_type cl','b.classification_id=cl.classification_id','left')
			->join('applications a', 'b.buss_id=a.buss_id AND b.owner_id=o.owner_id', 'inner')
			->join('business_line bl','bl.app_id=a.app_id','inner')
			->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
			->join('application_type at', 'b.application_id=at.application_id', 'inner')
			->join('brgys br', 'o.brgy_id=br.brgy_id', 'left')
			->join('brgys bbr', 'b.brgy_id=bbr.brgy_id', 'left')				
			->join('assessments assess' ,'a.app_id = assess.app_id','inner')	
			->join('ownership_type ot', 'b.ownership_id=ot.ownership_id', 'inner')			
			->where(array(
				//'p.status' => 'pending',
				'p.pay_id' => $paymentID
			))->get();
			// echo $this->db->last_query();
			
			//echo $this->db->_error_message();
	}


	public function get_retire_details_temp($paymentID) {
		
			
				return $get_tfo = $this->db
				->select('o.firstname, o.middlename, o.lastname,o.brgy_id own_bar,o.permitee')
				->select('p.or_number,p.cert_or_number, p.payment_date,a.application_id as app_idd,p.paid_tax')
				->select('br.brgy obrgy,bbr.brgy bbrgy')
				->select('b.business_name, b.permit_number,b.contact_number, b.street_address,b.street_address2,b.brgy_id buss_bar,b.ownership_id,b.image,b.plate_no')
				->select('bn.business_nature,bl.gross,assess.total_tax_due as total_amount,bl.capital')
				->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.indi_male_emp,b.indi_female_emp,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')		
				->select('at.types application_status')
				->select('cl.types, ot.types as ownership_type')
				->select('assess.tfos,assess.addtltfo,assess.interest_n_surcharge')
				->from('retire_payments p')
				->join('owners o', 'p.owner_id=o.owner_id', 'inner')
				->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
				->join('classification_type cl','b.classification_id=cl.classification_id','left')
				->join('applications a', 'b.buss_id=a.buss_id AND b.owner_id=o.owner_id', 'inner')
				->join('business_line bl','bl.app_id=a.app_id','inner')
				->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
				->join('application_type at', 'b.application_id=at.application_id', 'inner')
				->join('brgys br', 'o.brgy_id=br.brgy_id', 'left')
				->join('brgys bbr', 'b.brgy_id=bbr.brgy_id', 'left')				
				->join('assessments assess' ,'a.app_id = assess.app_id','inner')	
				->join('ownership_type ot', 'b.ownership_id=ot.ownership_id', 'inner')			
				->where(array(
					//'p.status' => 'pending',
					'p.pay_id' => $paymentID
				))->get();
				// echo $this->db->last_query();
				
				//echo $this->db->_error_message();
		}

		public function get_cancel_details($cancellID) {
		
			
				return $get_tfo = $this->db
				->select('cb.app_id, cb.businessid, cb.buss_nature_id, cb.owner_id, cb.capital')
				 ->select('o.firstname, o.middlename, o.lastname,o.brgy_id own_bar,o.permitee')
				 ->select('cp.cash_tendered, cp.change, cp.or_number,cp.cert_or_number, cp.paid_tax, cp.balance, cp.total_amount, cp.payment_date, cp.interest, cp.surcharge, cp.payment_modes, cp.count, cp.cancelled_id, cp.status')
				 ->select('b.business_name, b.permit_number,b.contact_number, b.street_address,b.street_address2,b.brgy_id buss_bar,b.ownership_id,b.image,b.plate_no')
				 ->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.indi_male_emp,b.indi_female_emp,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')
				 ->select('br.brgy obrgy,bbr.brgy bbrgy')
				 ->select('bn.business_nature,assess.total_tax_due as total_amount')
				 ->select('assess.tfos,assess.addtltfo,assess.interest_n_surcharge')
				 ->select('at.types application_status')
				 ->select('cl.types, ot.types as ownership_type')
				 ->from('cancelled_business cb')
				 ->join('owners o', 'cb.owner_id=o.owner_id', 'inner')
				 ->join('cancelled_payments cp', 'cb.id=cp.cancelled_id', 'inner')
				 ->join('businessess b', 'cb.businessid=b.buss_id', 'inner')
				 ->join('brgys br', 'o.brgy_id=br.brgy_id', 'left')
				 ->join('brgys bbr', 'b.brgy_id=bbr.brgy_id', 'left')
				 ->join('business_nature bn','cb.buss_nature_id=bn.buss_nature_id','inner')	
				 ->join('assessments assess' ,'cb.app_id = assess.app_id','inner')
				 ->join('application_type at', 'b.application_id=at.application_id', 'inner')
				 ->join('classification_type cl','b.classification_id=cl.classification_id','left')
				 ->join('ownership_type ot', 'b.ownership_id=ot.ownership_id', 'inner')
				->where(array(
					//'p.status' => 'pending',
					'cb.id' => $cancellID
				))->get();
				// echo $th

				
		}


	
	
	public function get_payment_details_temp2($paymentID) {
	
		
			return $get_tfo = $this->db
			->select('o.firstname, o.middlename, o.lastname,o.brgy_id own_bar,o.permitee')
			->select('p.or_number, p.payment_date,a.application_id')
			->select('br.brgy obrgy,bbr.brgy bbrgy')
			->select('b.business_name, b.permit_number, b.street_address,b.street_address2,b.contact_number,b.brgy_id buss_bar,b.ownership_id,b.image,b.plate_no')
			->select('bn.application_id,bn.business_nature,bl.gross,assess.total_tax_due as total_amount,bl.capital')
			->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.indi_male_emp,b.indi_female_emp,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')		
			->select('at.types application_status')
			->select('cl.types, ot.types as ownership_type')
			->select('assess.tfos,assess.addtltfo,assess.interest_n_surcharge')
			->from('payments p')
			->join('owners o', 'p.owner_id=o.owner_id', 'inner')
			->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
			->join('classification_type cl','b.classification_id=cl.classification_id','left')
			->join('applications a', 'b.buss_id=a.buss_id AND b.owner_id=o.owner_id', 'inner')
			->join('business_line bl','bl.app_id=a.app_id','inner')
			->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
			->join('application_type at', 'b.application_id=at.application_id', 'inner')
			->join('brgys br', 'o.brgy_id=br.brgy_id', 'left')
			->join('brgys bbr', 'b.brgy_id=bbr.brgy_id', 'left')				
			->join('assessments assess' ,'a.app_id = assess.app_id','inner')	
			->join('ownership_type ot', 'b.ownership_id=ot.ownership_id', 'inner')			
			->where(array(
				//'p.status' => 'pending',
				'bn.application_id' => '1',
				'p.pay_id' => $paymentID
			))->get();
			// echo $this->db->last_query();
			
			//echo $this->db->_error_message();
	}
	
	public function view_details($businessid) {

		return $get_tfo = $this->db
		->select('b.image,b.image1,b.image2,b.image3,b.image4')
		->from('businessess b')
		->where('b.buss_id',$businessid)
		->get();
		
}

  public function view_app_details($businessid) {
	
			return $get_details = $this->db
			->select('rt.buss_id,rt.business_name,rt.business_address,rt.owner_name,rt.stall_no, rt.nature_retired,rt.typeof_retire,rt.permit_no,rt.employees,rt.gross,rt.date_filed')
			->from('retirement rt')
			->where('rt.buss_id',$businessid)
			->get();
			
	}

	public function view_app_details_nature($businessid) {
		
				return $get_nat = $this->db
				->select('bn.business_nature,bl.capital,b.permit_number,p.or_number,p.payment_date')
				->distinct()
				->from('businessess b')
				->join('business_line bl','b.buss_id=bl.bl_buss_id','inner')
				->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
				->join('applications a','b.buss_id=a.buss_id','inner')
				->join('assessments assess','a.app_id=assess.app_id','inner')
				->join('retire_payments p','assess.assessment_id=p.assessment_id','inner')
				->where('b.buss_id',$businessid)
				->get();
				
		}

	public function get_admin_details(){

		return $this->db->select('id,firstName,middleName,lastName,designation')
						->from('bplissettings')
						->get(); //echo $this->db->last_query();
	}
	private function get($table = '', $fields = '*', $where = array(), $order_by = 'ID', $order = 'ASC') {
		$this->db
			->select($fields)
			->from($table);

		if(!is_null($where)) {
			$this->db->where($where);
		}

		return $this->db->order_by($order_by, $order)
			->get();
	}


	public function assess_now($data = array()) {
		// var_dump($data);
		if(!empty($data)) {
			$i=0;
			$check = $this->db
					->select('*')
					->from('assessments')
					->where(array('app_id'=>$data['app_id']))
					->like(array('assessment_date'=>date('Y',strtotime('now'))))
					->get();

					$item['app_id'] = $data['app_id'];
					$item['application_id'] = ($check->num_rows()>0) ? 'unpaid' : '2';
					$item['status'] = 'unpaid';
					$item['payment'] = $data['payment'];
					$item['annually'] = isset($data['annually']) ? ($data['annually']) : '' ;
					$item['semi_annually'] = isset($data['semi_annually']) ? ($data['semi_annually']) : '' ;
					$item['quarterly'] = isset($data['quarterly']) ? ($data['quarterly']) : '' ;
					$item['flag_paid_all'] = '0';
					$item['tfos'] = $data['tfos'];
					$item['addtltfo'] = $data['addtltfo'];
					$item['stallss'] = $data['stallss'];
					$item['breakdowns'] = $data['breakdowns'];
					$item['total_tax_due'] = $data['total_tax_due'];
					$item['assessment_date'] = $data['assessment_date'];
					$this->db->insert('assessments',$item);

					return true;

		} else {
			return false;
		}
		//echo $this->db->_error_message();
	}

	// re assessment
	public function re_assess_now($data = array()) { //print_r($data);
		if(!empty($data)) {
			$check = $this->db->get_where('assessments', array(
				'app_id' => $data['app_id'],
				'status' => 'unpaid'
			));

			if($check->num_rows() > 0) {

			} else {
				// $data['tfo'] = json_encode($data['fees']);
				// unset($data['fees']);
				$ret = array ('assessments'  => $this->db->insert('assessments', $data),
							  'busines_line' => $this->db->update('business_line',array(
																  'modified' => '0'
																))
							 );
				return $ret;
				//return $this->db->insert('assessments', $data);
				// echo $this->db->_error_message();
			}
		} else {
			return false;
		}
	}

	public function clear_requirements($natureID = null, $appID) {
		if(!is_null($natureID)) {
			$check = $this->db
				->select('requirements')
				->from('business_nature')
				->where('buss_nature_id', $natureID)
				->get();

			if($check->num_rows() > 0) {
				$requirements = $check->row();
				$ret = array ('applications' => $this->db->update('applications', array(
																  'requirements' => $requirements->requirements
																), array(
																'app_id' => $appID
																)),
							  'buss_lines'	=>	$this->db->update('business_line', array(
																  'requirements' => $requirements->requirements
																), array(
																'app_id' => $appID
																)));

				/* return $this->db->update('applications', array(
					'requirements' => $requirements->requirements
				), array(
					'app_id' => $appID
				)); */
				return $ret;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function add_gross ($bus_line_id = null, $year , $gross ){
			if(!is_null($bus_line_id)){

				$check = $this->db
						->select('gross')
						->from('business_line')
						->where('bus_line_id', $bus_line_id)
						->get();
					if($check->num_rows()> 0 ){
						$firstgross = array();

						foreach($check->result() as $row){
							$arrayName= array('gross'=>$gross,'year' =>$year);
							$info_gross= json_encode($arrayName);
							$firstgross[] = $row->gross;
							$firstgross[] = $info_gross;
						}

							$getarray = (string)$firstgross[0];
							$getlast = array_pop($firstgross);
				            $substr = ']';
				        	if($row->gross == '[]'){
				        		$attachment = $getlast;
				        	}else{
				            $attachment =','.$getlast;
				        	}
				            $newstring = str_replace($substr,$attachment.$substr,$getarray);
				           // print_r($newstring);

					}
					return $this->db->update('business_line',array('gross' =>$newstring),array('bus_line_id' =>$bus_line_id));
			}

			else {
			return false;
		}

		/*if(!is_null($bus_line_id)){
			$y = explode(":", $year);
			$g = explode(":", $gross);
			$count = count($y);
			for($i=0; $i<=$count-1; $i++){
					$arrayName[$i]= array('gross'=>$g[$i],'year' =>$y[$i]);
					//$status[$i] = array('year'=>$y[$i] , 'status'=>'');
					$info_gross= json_encode(array($arrayName));
					$get_infogross = implode(',',$info_gross)
					//$info_status = json_encode(array($status));		,'status'=>$info_status
				}
					 return $this->db->update('business_line',array('gross' =>$info_gross),array('bus_line_id' =>$bus_line_id));
		}
		 else {
			return false;
		}*/

	}
	public function print_assessment($app_id){
		$today=date('Y');
		$info1 = $this->db->distinct()					
						  ->select('assess.interest_n_surcharge,assess.tfos,assess.addtltfo,bl.gross,assess.assessment_date')
						  ->from('applications a')
					      ->join('business_line bl','a.app_id=bl.app_id','inner')
						  ->join('assessments assess','a.app_id=assess.app_id','left')
						  ->join('owners o','a.owner_id=o.owner_id', 'inner')
						  ->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
						  ->join('brgys bg', 'bg.brgy_id=b.brgy_id')
						  ->where('a.app_id',$app_id)
						  
						  ->get();
						  
		// $query = $this->db->get();
		// return $query;
		// echo $this->db->last_query();


		$info = $info1->result();
		
		$paid_tfo = array();
		$i=0;
	
				foreach($info as $t){
					$i=0;
					$addtltfo=$t->addtltfo;
					
					$tfo = json_decode($t->tfos,true);
					$gross = json_decode($t->gross,true);
					
					// $infos['total_tax_due'] = $t->total_tax_due;
					// $infos['payment_date'] = $t->payment_date;
					foreach($tfo as $t1){
						$get_tfo = $this->db->distinct()
											->select('tfo')
											->from('tfo')
											->where(array('tfo_id' =>$t1['tfo']))
											->get();
	
							if($get_tfo->num_rows() > 0){
								$t = $get_tfo->row();
								// $tfo = implode(",", $t->tfo);
								$paid_tfo[$i]['nature'] = (empty($t1['nature']) ? '' : $t1['nature']);
								$paid_tfo[$i]['gross'] = (empty( $t1['gross']) ? number_format(0, 2) :  number_format($t1['gross'], 2));
								// $paid_tfo[$i]['tfo'] = strlen($t->tfo) > 20 ? substr($t->tfo,0,20)."..." : $t->tfo;
								$paid_tfo[$i]['tfo'] = $t->tfo;
								$paid_tfo[$i]['amount'] = $t1['amount'];
								
								
							}else{
							}
							$i++;
					}
				}
				
				return array('tfos' =>$app_id,
				'paid_tfo'=>$paid_tfo,
				'addtltfo'=>$addtltfo,
		   );
	
		
		
	}

	public function requirement_details(){
		$this->db->select('requirement_id,description')
				 ->distinct()
				 ->from('requirements');
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query;
	}
//requirements
	public function info_details($app_id){
		$infos = $this->db
						->select('o.firstname, o.middlename, o.lastname,b.street_address')
					 	->select('b.business_name,b.brgy_id,bg.brgy,a.requirements,a.na_requirements')
						->from('applications a')
						->join('owners o','a.owner_id=o.owner_id', 'inner')
						->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
						->join('brgys bg', 'bg.brgy_id=b.brgy_id','left')
						->where('a.app_id',$app_id)
						->get();

					
    	if($infos->num_rows() > 0) {
			$infox = $infos->result();
			foreach ($infox as $item) {
				$owner['owner'] = $item->firstname . ' ' . $item->middlename . ' ' . $item->lastname;
				$owner['business_name'] = $item->business_name;
				$owner['barangay'] = $item->brgy;				
				$owner['requirements'] = $item->requirements;		
				$owner['na_requirements'] = $item->na_requirements;		
				
			}
			return [
				'owners' => $owner
					];
		}
		

		else {
    		return false;

    	}
	}
//summary
	public function summary_details($buss_id){
		if($buss_id == 0 || $buss_id == null){
			return false;
		} else{
			$where = "bn.business_nature not like '%(Additional)%'";
			
					$infos = $this->db
					->select('sl.permit_number,b.permit_number,sl.old_permit_number,b.old_buss_id,b.buss_id,p.count,bl.capital,bn.business_nature')
					->select('o.firstname,o.middlename,o.lastname,o.permitee,b.business_name,bg.brgy,p.payment_modes,p.count,p.pay_id')
					->distinct()
					->from('summarylist sl')	
					->join('businessess b', 'b.permit_number=sl.permit_number', 'inner')
					->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'inner')
					->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
					->join('owners o', 'o.owner_id=b.owner_id', 'inner')
					->join('brgys bg', 'b.brgy_id=bg.brgy_id', 'inner')
					->join('payments p', 'b.buss_id=p.buss_id', 'inner')
					->where('b.old_buss_id',$buss_id)
					->where($where)
					->get();
		// echo $this->db->last_query();
						
			if($infos->num_rows() > 0) {
		
				$infox = $infos->result();
				$infoss = $infos->result();
				// print_r($infox);
				foreach ($infox as $item) {
					$owner['owner'] = $item->firstname . ' ' . $item->middlename . ' ' . $item->lastname;
					$owner['business_name'] = "NONE";
					$owner['barangay'] = $item->brgy;												
				}
				foreach ($infoss as $item1) {	
					$permit[] = $item1->permit_number;													
					$mode[] = $item1->payment_modes;													
					$countpay[] = $item1->count;													
					$pay_id[] = $item1->pay_id;													
					$gross[] = $item1->capital;													
					$nature[] = $item1->business_nature;													
				}
				return [
					'owners' => $owner,
					'permit' => $permit,
					'mode' => $mode,
					'countpay' => $countpay,
					'pay_id' => $pay_id,
					'gross' => $gross,
					'nature' => $nature,
					
					
						];

					
			}
			

		else {
			return false;

		}
		}
	}


	public function print_assessment_details($app_id){
		$this->db->select('assess.interest_n_surcharge,bn.business_nature,a.application_id,assess.assessment_id,a.app_id,b.brgy_id,bg.brgy,b.ownership_id,b.permit_number')
				 ->distinct()
				 ->select('o.firstname, o.middlename, o.lastname,b.street_address')
				 ->select('b.business_name')
				 ->select('pt.types')
				 ->select('assess.assessment_date, assess.addtltfo,assess.tfos')
						  ->from('applications a')
						  ->join('assessments assess','a.app_id=assess.app_id','left')
						  ->join('owners o','a.owner_id=o.owner_id', 'inner')
						  ->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
						  ->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
						  ->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'inner')
						  ->join('business_nature bn', 'bn.buss_nature_id=bl.buss_nature_id')
						  ->join('brgys bg', 'bg.brgy_id=b.brgy_id','left')
						  ->where('a.app_id',$app_id);
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query;
	}

	
	public function tfo_droplist(){
	
		$this->db->select('*')->from('tfo')->order_by('tfo.tfo','asc');
		$query = $this->db->get();
		return $query;
		
	}

	public function stalz(){

		$this->db
		->select('st.stall_num, b.stall_val, b.permit_number')
		->from('stalls as st')
		->join('businessess b' ,'st.stall_num = b.stall_num','left')
		->order_by('st.stall_num','asc');
		$query = $this->db->get();
		return $query;
		
	}


	public function get_tfoamount($tfo_id1)
	{
		
		$ftoamt =  $this->db
			->select('amount')
			->from('jcit_tfo')
			->where('tfo_id', $tfo_id1)
			->get()->result();
		foreach($ftoamt as $amt)
		{
			$amount = $amt->amount;
		}

		return array(
			'amount' =>  $amount,
		);
	}
	
	public function dropdrop(){
		
			$this->db->select('b.permit_number,p.pay_id')
			->from('businessess b')
			->join('payments p','b.owner_id=p.owner_id','left')
			->order_by('b.permit_number', 'asc');
			$query = $this->db->get();
			return $query;
			
	}

	public function get_requirement_list($appid=null){
		
			$this->db->select('*')
			->from('applications a')
			->where('a.app_id',$appid);
			$query = $this->db->get();
			return $query;
			
		
		}		
	



	public function get_release() {
		$year = date('Y');
		$yearcon1 = '%'.$year.'-%';
		$year2 = date('Y')-1;	
		$yearcon2 = '%'.$year2.'-%';
		
		$where = "b.permit_number LIKE '".$yearcon1."' or b.permit_number LIKE '".$yearcon2."' ";
		return $this->db
			->distinct()
			->select('r.payment_id pay_id,r.releasing_id,r.is_released,a.application_id,b.closed,b.old_buss_id,rp.pay_id as retire_pay_id')
			->select('o.firstname, o.middlename, o.lastname,o.permitee')
			->select('p.pay_id,p.or_number, p.payment_date,a.requirements,a.na_requirements')
			->select('br.brgy')
			->select('b.business_name, b.permit_number, b.street_address,b.ownership_id,b.buss_id')
			->from('releasing r')
			->join('payments p' ,'r.payment_id = p.pay_id','inner')
			->join('assessments assess' ,'p.assessment_id = assess.assessment_id','inner')
			->join('owners o', 'p.owner_id=o.owner_id', 'inner')
			->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
			->join('applications a', 'a.buss_id=b.buss_id', 'inner')			
			->join('brgys br', 'o.brgy_id=br.brgy_id', 'inner')
			->join('retire_payments rp' ,'assess.assessment_id = rp.assessment_id','left')
			->where($where)
			->get();
	}

	public function get_release1() {

		$where = "b.old_buss_id <> 0";
		return $this->db
			->distinct()
			->select('r.payment_id pay_id,r.releasing_id,r.is_released,a.application_id,b.closed,b.old_buss_id,rp.pay_id as retire_pay_id')
			->select('o.firstname, o.middlename, o.lastname,o.permitee')
			->select('p.pay_id,p.or_number, p.payment_date,a.requirements,a.na_requirements')
			->select('br.brgy')
			->select('b.business_name, GROUP_CONCAT(DISTINCT(b.permit_number)) as permit_number1, b.street_address,b.ownership_id,b.buss_id')
			->from('summarylist sl')
			->join('businessess b', 'sl.permit_number=b.permit_number', 'inner')
			->join('applications a', 'a.buss_id=b.buss_id', 'inner')	
			->join('payments p' ,'b.buss_id = p.buss_id','inner')
			->join('owners o', 'p.owner_id=o.owner_id', 'inner')
			->join('releasing r' ,'p.pay_id = r.payment_id','inner')		
			->join('assessments assess' ,'p.assessment_id = assess.assessment_id','inner')
			->join('brgys br', 'o.brgy_id=br.brgy_id', 'inner')
			->join('retire_payments rp' ,'assess.assessment_id = rp.assessment_id','left')
			->group_by('sl.old_permit_number')
			->where($where)
			->get();
	}

	public function get_details($payment_id = null, $assessment_id = null,$countss=null){
		
		$info = $this->db->select('p.payment_modes,assess.tfos,assess.addtltfo,assess.total_tax_due,p.payment_date,p.count')
					     ->select('p.interest,p.surcharge,b.permit_number')
						->from('payments p')
						->join('assessments assess','assess.assessment_id=p.assessment_id','inner')
						->join('applications a','assess.app_id=a.app_id','inner')
						->join('businessess b','a.buss_id=b.buss_id','inner')
						->where(array('p.assessment_id' =>$assessment_id,
									  'p.count'=>$countss,
							))
						->get(); 
		$info = $info->result();
		$paid_tfo = array();		
		$i=0;
		
	
			foreach($info as $t){
				$tfo = json_decode($t->tfos,true);
				$infos['total_tax_due'] = $t->total_tax_due;
				$infos['payment_date'] = $t->payment_date;
				$payment['payment'] = $t->payment_modes;
				$interest['interest'] = $t->interest;
				$surcharge['surcharge'] = $t->surcharge;
				$counts['counts'] = $t->count;
				$permit_number['permit_number'] = $t->permit_number;
				$add['addtltfo'] = $t->addtltfo;
				$tfoos['tfos'] = $t->tfos;
			
				foreach($tfo as $t1){
				
					$get_tfo = $this->db->select('tfo')
									->from('tfo')
									->where(array('tfo_id' =>$t1['tfo']))
									->get();
	                	
	                	if($get_tfo->num_rows() > 0){
	                		$t = $get_tfo->row();
	                		//$tfo = implode(",", $t->tfo);
	                		$paid_tfo[$i]['tfo'] = strlen($t->tfo) >100 ? substr($t->tfo,0,100)."..." : $t->tfo;
	                		$paid_tfo[$i]['amount'] = $t1['amount'];
	                		$paid_tfo[$i]['nature'] = (empty($t1['nature']) ? '' : $t1['nature']);
	                		$paid_tfo[$i]['gross'] = (empty($t1['gross']) ? '' : $t1['gross']);
	                	}else{

	                	}
	                $i++;
				}
			}
		return array('tfos' =>$infos,
					 'paid_tfo'=>$paid_tfo,
					 'tfoos'=>$tfoos,
					 'addt'=>$add,
					 'payment'=>$payment,
					 'interest'=>$interest,
					 'surcharge'=>$surcharge,
					 'count'=>$counts,
					 'permit_number'=>$permit_number
					 
				);
	}

	
	public function get_details_retire($payment_id = null, $assessment_id = null,$countss=null){
		
		$info = $this->db->select('p.payment_modes,assess.tfos,assess.addtltfo,assess.total_tax_due,p.payment_date,p.count')
					     ->select('p.interest,p.surcharge')
						->from('retire_payments p')
						->join('assessments assess','assess.assessment_id=p.assessment_id','inner')
						->where(array('p.assessment_id' =>$assessment_id,
									  'p.count'=>$countss,
							))
						->get(); 
		$info = $info->result();
		$paid_tfo = array();		
		$i=0;
		
	
			foreach($info as $t){
				$tfo = json_decode($t->tfos,true);
				$infos['total_tax_due'] = $t->total_tax_due;
				$infos['payment_date'] = $t->payment_date;
				$payment['payment'] = $t->payment_modes;
				$interest['interest'] = $t->interest;
				$surcharge['surcharge'] = $t->surcharge;
				$counts['counts'] = $t->count;
				$add['addtltfo'] = $t->addtltfo;
				$tfoos['tfos'] = $t->tfos;
			
				foreach($tfo as $t1){
				
					$get_tfo = $this->db->select('tfo')
									->from('tfo')
									->where(array('tfo_id' =>$t1['tfo']))
									->get();
	                	
	                	if($get_tfo->num_rows() > 0){
	                		$t = $get_tfo->row();
	                		//$tfo = implode(",", $t->tfo);
	                		$paid_tfo[$i]['tfo'] = strlen($t->tfo) >100 ? substr($t->tfo,0,100)."..." : $t->tfo;
	                		$paid_tfo[$i]['amount'] = $t1['amount'];
	                		$paid_tfo[$i]['nature'] = (empty($t1['nature']) ? '' : $t1['nature']);
	                	}else{

	                	}
	                $i++;
				}
			}
		return array('tfos' =>$infos,
					 'paid_tfo'=>$paid_tfo,
					 'tfoos'=>$tfoos,
					 'addt'=>$add,
					 'payment'=>$payment,
					 'interest'=>$interest,
					 'surcharge'=>$surcharge,
					 'count'=>$counts,
					 
				);
	}


	function addcancelled($data) {

		$query = $this->db
			->select('owner_id')
			->from('jcit_applications')
			->where('app_id',	$data['app_id'])
			->get();
			$dataquery = $query->result();
			foreach($dataquery as $t){	
			}
			$datani['owner_id'] = $t->owner_id;
			$datani['app_id'] =	$data['app_id'];
			$datani['businessid'] = $data['businessid'];
			$datani['buss_nature_id'] =	$data['buss_nature_id'];
			$datani['capital'] = $data['capital'];
			$datani['status'] = $data['status'];

			$this->db->insert('jcit_cancelled_business', $datani);
			$this->db->delete('jcit_business_line',
											array ('app_id' =>$datani['app_id'],
										 'bl_buss_id' => $datani['businessid'],
										 'buss_nature_id' =>$datani['buss_nature_id']
		));
			return true;
	}	

	public function get_stall_info($assessID = null, $buss_id = null){
		return $query = $this->db
						->distinct()
						->select('stpay.assessment_id, stpay.or_number, stpay.payment_date, stpay.buss_id, stpay.owner_id, stpay.count')
						->select('b.stall_num, b.stall_area, b.stall_val, b.permit_number, b.business_name')
						->select('o.firstname, o.middlename, o.lastname')
						->from('stalls_payment stpay')
						->join('businessess b', 'b.buss_id=stpay.buss_id', 'inner')
						->join('owners o', 'stpay.owner_id=o.owner_id', 'inner')
						->where(array(
							'stpay.assessment_id' => $assessID,
							'stpay.buss_id' => $buss_id
						))->get();
	}
	public function get_stall_payment($assessID = null, $countss = null, $buss_id = null){
		$query = $this->db
						->select('*')
						->from('stalls_payment')
						->where(array(
							'assessment_id' => $assessID,
							'count' => $countss,
							'buss_id' => $buss_id
						))->get();

						$queue = $query->result();

						foreach($queue as $q){
							$data['or_number'] = $q->or_number;
						}

		return $query1 = $this->db
					->select('stp.stpay_id, stp.assessment_id, stp.or_number, stp.total_amount, stp.surcharge, stp.buss_id, stp.count, stp.owner_id')
					->select('b.stall_num, b.stall_area, b.stall_num')
					->from('stalls_payment stp')
					->join('businessess b', 'stp.buss_id=b.buss_id', 'inner')
					->where(array(
						'stp.or_number' => $data['or_number']
					))->get();
	}


	

}

