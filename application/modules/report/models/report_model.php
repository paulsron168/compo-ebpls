<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_business_report(){
		return $this->db
			 ->select('e.ban,b.brgy,e.name')
			 ->from('establishment e')
			 ->join('brgys b', 'e.barangay=b.brgy_id', 'left')
			 ->get();
	}

	public function get_barangay(){
			$check =  $this->db
			 ->select('a.application_date,b.buss_id ,b.permit_number,b.registered_date, b.business_name,b.abled_female_emp, b.abled_male_emp, b.created_at, o.owner_id,o.firstname, o.middlename, o.lastname')
			 ->select('at.types AS app_type,p.types AS pay_type')
			 ->select('br.brgy')
			 ->select('bl.capital')
			 ->select('bn.business_nature')
			 ->select('ot.occupancy_id', 'ot.code')
			// ->select('bl.buss_nature_id', 'bn.business_nature','bn.buss_nature_id')
			 ->from('businessess b')
			 ->join('applications a', 'b.application_id=a.app_id', 'left')
			 ->join('application_type at', 'b.application_id=at.application_id', 'left')
			 ->join('payment_type p', 'b.payment_id=p.payment_id', 'left')
			 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
			 ->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'left')
			 ->join('business_nature bn', 'bn.buss_nature_id=bl.buss_nature_id', 'left')
			 ->join('occupancy_type ot', 'b.occupancy_id=ot.occupancy_id', 'left')
			 // ->join('payment_status ps', 'b.payment_status=ps.payment_status_id', 'left')
			 ->join('owners o', 'b.owner_id=o.owner_id', 'left')
			 ->distinct()
			 ->get();
			 	//echo $this->db->last_query();
				return $check;

	}
	//Added by:joAnn
	//Date: 04.10.17
	//Desc: gets ownership type
	public function get_ownership_type(){
		return $this->db->get('ownership_type');
	}
	//insert cherry bsp report
	public function get_bsp($year=null){
		$year = $_POST['getyear'];
		$yearcon = '%'.$year;
		$where =  "bl.buss_nature_id IN(3, 26, 27) AND b.date_applied LIKE '".$yearcon."'" ;

			$check =  $this->db
			 ->distinct()
			 ->select(' bl.bl_buss_id,a.buss_id,b.date_applied,b.buss_id,permit_number, b.business_name,b.street_address,
						o.owner_id,o.firstname, o.middlename, o.lastname,o.permitee,
						o.contact_number')

			 ->select('bn.business_nature')
			 ->from('businessess b')
			 ->join('applications a', 'b.buss_id=a.buss_id', 'inner')
			 ->join('renews r', 'r.app_id=a.app_id', 'left')
			 ->join('application_type at', 'b.application_id=at.application_id', 'left')
			 ->join('payment_type p', 'b.payment_id=p.payment_id', 'left')
			 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
			 ->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'left')
			 ->join('business_nature bn', 'bn.buss_nature_id=bl.buss_nature_id', 'left')
			 ->join('owners o', 'b.owner_id=o.owner_id', 'left')
			 ->where($where)
			 ->get();
			// echo $this->db->last_query();
			return $check;

	}
	public function get_business($year=null,$oid=null){
		$year = $_POST['getyear'];
		$yearcon = $year.'%';
		$businessess = array();

		// $where =  "permit_number LIKE '".$format."' ORDER BY CAST(RIGHT(b.permit_number,4) AS UNSIGNED) ";
    	$where =  "b.date_applied LIKE'".$yearcon."' AND b.ownership_id = '$oid'" ;
			$check =  $this->db
			 ->distinct()
			 ->select(' a.buss_id,b.date_applied,b.buss_id , permit_number,b.registered_date, b.business_name,b.application_id,b.street_address,
						b.abled_female_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_estab,b.abled_male_emp_estab,b.ownership_id,
						b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.mobile_number,
						b.created_at, o.owner_id,o.firstname, o.middlename, o.lastname,o.permitee,o.gender,
						o.email,o.contact_number')
			 ->select('at.types AS app_type,p.types AS pay_type')
			 ->select('br.brgy')
			 ->select('bl.capital,bl.gross')
			 ->select('bn.business_nature')
			 ->from('businessess b')
			 ->join('applications a', 'b.buss_id=a.buss_id', 'inner')
			 ->join('renews r', 'r.app_id=a.app_id', 'left')
			 ->join('application_type at', 'b.application_id=at.application_id', 'left')
			 ->join('payment_type p', 'b.payment_id=p.payment_id', 'left')
			 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
			 ->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'left')
			 ->join('business_nature bn', 'bn.buss_nature_id=bl.buss_nature_id', 'left')
			 ->join('owners o', 'b.owner_id=o.owner_id', 'left')
			 ->where($where)
			 ->get();
			return $check;
			//echo $this->db->last_query();

			/* $check = $check->result();

			 	foreach($check as $c){

			 		$businessess['business_name'] = $c->business_name;
			 		$businessess['business_nature'] = $c->;

			 	}
*/
	}

	public function get_bir_report($year=null){

		$year = $_POST['getyear'];
		$yearcon = '%'.$year;
		$businessess = array();
		$pre = '20';
		// $where =  "permit_number LIKE '".$format."' ORDER BY CAST(RIGHT(b.permit_number,4) AS UNSIGNED) ";
    	$where =  "b.date_applied LIKE '".$yearcon."' OR b.date_applied LIKE '".str_replace('20','',$yearcon)."'" ;
			$check =  $this->db
			 ->distinct()
			 ->select(' a.buss_id,b.date_applied,b.buss_id , permit_number,b.registered_date, b.business_name,b.application_id,b.street_address,
						b.abled_female_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_estab,b.abled_male_emp_estab,b.ownership_id,
						b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.mobile_number,
						b.created_at, o.owner_id,o.firstname, o.middlename, o.lastname,o.permitee,o.gender,
						o.email,o.contact_number')
			 ->select('at.types AS app_type,p.types AS pay_type')
			 ->select('br.brgy')
			 ->select('bl.capital,bl.gross')
			 ->select('bn.business_nature')
			 ->from('businessess b')
			 ->join('applications a', 'b.buss_id=a.buss_id', 'inner')
			 ->join('renews r', 'r.app_id=a.app_id', 'left')
			 ->join('application_type at', 'b.application_id=at.application_id', 'left')
			 ->join('payment_type p', 'b.payment_id=p.payment_id', 'left')
			 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
			 ->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'left')
			 ->join('business_nature bn', 'bn.buss_nature_id=bl.buss_nature_id', 'left')
			 ->join('owners o', 'b.owner_id=o.owner_id', 'left')
			 ->where($where)
			 ->get();
			 //echo $this->db->last_query();
			 	
			return $check;
			
	}

	public function get_temp_permit_report($year=null){
		
				$year = $_POST['getyear'];	
				$where =  "p.payment_date LIKE '%".$year."%' " ;
				return $this->db
				->distinct()
				->select('r.payment_id pay_id,r.releasing_id,r.is_released,a.application_id')
				->select('o.firstname, o.middlename, o.lastname,o.permitee')
				->select('p.pay_id,p.or_number, p.payment_date,a.requirements,a.na_requirements')
				->select('br.brgy')
				->select('b.business_name, b.permit_number, b.street_address,b.ownership_id')
				->from('releasing r')
				->join('payments p' ,'r.payment_id = p.pay_id','inner')
				->join('owners o', 'p.owner_id=o.owner_id', 'inner')
				->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
				->join('applications a', 'a.buss_id=b.buss_id', 'inner')			
				->join('brgys br', 'o.brgy_id=br.brgy_id', 'inner')
				->where($where)
				->get();
					
			}
		

	public function get_dti($year=null){
		$year = $_POST['getyear'];
		$yearcon = '%'.$year;
		$businessess = array();

		// $where =  "permit_number LIKE '".$format."' ORDER BY CAST(RIGHT(b.permit_number,4) AS UNSIGNED) ";
    	//$where =  "b.date_applied LIKE '".$yearcon."'" ;
			$where =  "b.date_applied LIKE '".$yearcon."' OR b.date_applied LIKE '".str_replace('20','',$yearcon)."'" ;
			$check =  $this->db
			 ->distinct()
			 ->select(' a.buss_id,b.date_applied,b.buss_id , permit_number,b.registered_date, b.business_name,b.application_id,b.street_address,
						b.abled_female_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_estab,b.abled_male_emp_estab,b.ownership_id,
						b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu,b.mobile_number,
						b.created_at, o.owner_id,o.firstname, o.middlename, o.lastname,o.permitee,o.gender,
						o.email,o.contact_number')
			 ->select('at.types AS app_type,p.types AS pay_type')
			 ->select('br.brgy')
			 ->select('bl.capital,bl.gross')
			 ->select('bn.business_nature')
			 ->from('businessess b')
			 ->join('applications a', 'b.buss_id=a.buss_id', 'inner')
			 ->join('renews r', 'r.app_id=a.app_id', 'left')
			 ->join('application_type at', 'b.application_id=at.application_id', 'left')
			 ->join('payment_type p', 'b.payment_id=p.payment_id', 'left')
			 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
			 ->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'left')
			 ->join('business_nature bn', 'bn.buss_nature_id=bl.buss_nature_id', 'left')
			 ->join('owners o', 'b.owner_id=o.owner_id', 'left')
			 ->where($where)
			 ->get();
			return $check;
			// echo $this->db->last_query();


	}
	public function get_business_dti($year=null){
		$format =$year.'-%';
		$year=$year.'-01-01';

		//$where =  "YEAR(r.date_renewed) = YEAR('".$year."') AND YEAR(a.application_date) = YEAR('".$year."') ";
		//$where =  "YEAR(a.application_date) = YEAR('".$year."') OR YEAR (r.date_renewed) = YEAR ('".$year."') ORDER BY (permit_number*1) AND str_to_date(b.date_applied,"%d/%m/%Y"), ";
		$where =  "permit_number LIKE '".$format."' ORDER BY (b.permit_number*1)  ";

			$check =  $this->db
			 ->distinct()
			 ->select(' b.date_applied,b.buss_id , permit_number,b.registered_date, b.business_name,b.application_id,
						b.abled_female_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_estab,b.abled_male_emp_estab,
						b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu,
					    b.created_at, o.owner_id,o.firstname, o.middlename, o.lastname,o.gender,
						o.email,o.contact_number')
			 ->select('at.types AS app_type,p.types AS pay_type')
			 ->select('br.brgy')
			 ->select('bl.capital,bl.gross')
			 ->select('bn.business_nature')
			 ->from('businessess b')
			 ->join('applications a', 'b.buss_id=a.buss_id', 'inner')
			 ->join('renews r', 'r.app_id=a.app_id', 'left')
			 ->join('application_type at', 'b.application_id=at.application_id', 'left')
			 ->join('payment_type p', 'b.payment_id=p.payment_id', 'left')
			 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
			 ->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'left')
			 ->join('business_nature bn', 'bn.buss_nature_id=bl.buss_nature_id', 'left')
			 ->join('owners o', 'b.owner_id=o.owner_id', 'left')
			 ->where($where)
			 ->get();
			return $check;
			//echo $this->db->last_query();

	}
	public function get_assessment(){

			$business = $this->db
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
    		->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address')
    		->select('bn.business_nature, bn.requirements')
    		->select('pt.types payment_type')
    		->select('a.app_id, a.application_id,a.application_date')
			->select('bl.bus_line_id,bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted')
			->select('assess.app_id assess_app_id,assess.status as assess_status,assess.breakdowns,assess.assessment_date, assess.annually, assess.semi_annually, assess.quarterly')
			->select('p.payment_date')
    		->from('business_line bl')
    		->join('businessess b', 'bl.bl_buss_id=b.buss_id', 'inner')
    		->join('applications a', 'bl.app_id=a.app_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
    		->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
    		->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
			->join('assessments assess','assess.app_id=a.app_id','left')
			->join('payments p','assess.assessment_id=p.assessment_id','left')
    		->DISTINCT()
    		->get();
			//echo $this->db->last_query();
			//let's do this thing baby!
			/* $storenextmonth = date('Y-m-d',strtotime($nextmonth. ' + 10 days'));
			$storenextmonth2 = date('Y-m-d',strtotime($storenextmonth. ' + 3 days'));echo 'next'.$storenextmonth; echo '<br>'.$storenextmonth2; */
			//$storenextmonth = $nextmonth;
			$business = $business->result();
			$dt = new DateTime('first day of next month');
			$data = array();
			$newdata = array();
			$i=0;
			//echo 'today='.$today;echo ' storenextmonth= '.$storenextmonth; echo ' storenextmonth2= '.$storenextmonth2;
				foreach ($business as $item){
					if(empty($item->assessment_date)){
					$data[$i]['name'] = $item->firstname.' '.$item->middlename.' '.$item->lastname;
					$data[$i]['buss_name'] = $item->business_name;
					$data[$i]['app_id'] = $item->app_id;
					$data[$i]['application_id'] = $item->application_id;
					$breakdowns = (array)json_decode($item->breakdowns,true);
					$data[$i]['notice'] = 'N';
					$data[$i]['demand'] = 'N';
					$data[$i]['cease'] = 'N';
						//test to see if there is an unpaid quarter..just if ever the business is quarterly or bi annual
						if (!empty($breakdowns)){
							$nextmonth = strtotime($dt->format('Y-m-d'));
							$nextmonth2 = $dt->format('Y-m-d');
							$storenextmonth =  date('Y-m-d',strtotime($nextmonth2. ' + 10 days')); //for demand_letter purposes
							$storenextmonth2 = date('Y-m-d',strtotime($storenextmonth. ' + 3 days')); //for cease and decease purposes
							$storenextmonth2 = strtotime($storenextmonth2);
							$today = strtotime(date('Y-m-d'));
							echo '<br>stat= '.$pieces['stat'].' today ='.$today.' dues='.$dues.' nextmonth='.$nextmonth;
							foreach ($breakdowns as $pieces){
								$dues = strtotime($pieces['dues']);
								$storenextmonth = strtotime($storenextmonth);
								if ( ($pieces['stat'] == "UnPaid") || ($today > $dues) && ($today > $nextmonth)){
									$data[$i]['notice'] = 'Y';

								} else { $data[$i]['notice'] = 'N';	 }

								if (empty($item->payment_date) || $today > $storenextmonth){ //didn't response
									//echo $storenextmonth.'<br>';
									$data[$i]['demand'] = 'Y';
								} else { $data[$i]['demand'] = 'N';	 }

								if(empty($item->payment_date) || $today > $storenextmonth2){
									//echo $storenextmonth2.'<br>';
									$data[$i]['cease'] = 'Y';
								} else { $data[$i]['cease'] = 'N';	 }
							}
						} else {

							$getdue = $due_date = $this->db
												 ->select('s.value,s.field,s.payment_mode')
												 ->from('settings s')
												 ->where('s.payment_mode' ,$business[0]->payment_id)
												// ->like(array ('value' =>date('Y',strtotime(date('Y-m-d')) )))
												 ->get();
												// echo $this->db->last_query();
							$getdue = $getdue->result();

								foreach($getdue as $g){

									$today = strtotime("now"); /* echo date('Y-m-d',$today).'<br>'; */
									$duedate = date('Y-m-d',strtotime($g->value)); //gets the due date in date format
									$datefirstweek = strtotime($duedate. ' +1 month'); // gets the due date's next month
									$datefirstweek = date('Y-m-01',$datefirstweek); // gets the first day of the due date's next month
									$stringfirstweek = date('M Y',strtotime($datefirstweek)); //converts the datefirstweek into string
									$notice = strftime("%d/%m/%Y", strtotime("first Monday of ".$stringfirstweek)); //gets the first monday of datefirstweek
									$addoneweek = date('Y-m-d',strtotime($notice.' + 1 week')); // this is for one week span of due date's next month
									$demand =  date('Y-m-d',strtotime($addoneweek. ' + 10 days')); //for demand_letter purposes
									$addoneweek = strtotime($addoneweek);
										//echo $addoneweek.'<br>';
										if (date('l',strtotime($demand)) == 'Sunday'){
											$demand = date('Y-m-d',strtotime($demand. ' +1 day'));
										} else if (date('l',strtotime($demand)) == 'Saturday'){
											$demand = date('Y-m-d',strtotime($demand. ' +2 days'));
										}
									$cease = date('Y-m-d',strtotime($demand. ' + 3 days')); //for cease and decease purposes

										if (date('l',strtotime($cease)) == 'Sunday'){
											$cease = date('Y-m-d',strtotime($cease. ' +1 day'));
										} else if (date('l',strtotime($cease)) == 'Saturday'){
											$cease = date('Y-m-d',strtotime($cease. ' +2 days'));
										}

										//compare dates ;)
									//echo 'today='.$today;
									if ($today > $addoneweek){ //echo 'f';
										$data[$i]['notice'] = 'Y';

									} else { $data[$i]['notice'] = 'N';	 }

									if ($today > strtotime($demand)){ //didn't response
										//echo $storenextmonth.'<br>';
									//echo "if2";
										$data[$i]['demand'] = 'Y';
									} else { $data[$i]['demand'] = 'N';	 }

									if($today > strtotime($cease)){ //echo "if3";
										$data[$i]['cease'] = 'Y';
									} else { $data[$i]['cease'] = 'N';	 }
								}//end foreach getdue
						}
					$i++;
					}
				}

			//print_r( $data);
			return $data;
	}


	public function demand_letter($app_id){
		$get_application_id = $this->db
							  ->select('a.application_id')
							  ->from('applications a')
							  ->where('app_id',$app_id)
							  ->get();
		$get_application_id = $get_application_id->result();

		$business = $this->db
	    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
	    		->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address,b.classification_id')
	    		->select('bn.business_nature, bn.requirements')
	    		 ->select('br.brgy')
	    		->select('pt.types payment_type')
	    		->select('assess.breakdowns, assess.annually, assess.semi_annually, assess.quarterly, assess.payment, assess.total_tax_due')
	    		->select('a.app_id, a.application_id,a.application_date')
				->select('bl.bus_line_id,bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted')
				->select('assess.app_id  assess_app_id,assess.status as assess_status,assess.assessment_date')
	    		->from('business_line bl')
	    		->join('businessess b', 'bl.bl_buss_id=b.buss_id', 'inner')
	    		->join('applications a', 'bl.app_id=a.app_id', 'inner')
	    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
	    		->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
	    		->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
				->join('assessments assess','a.app_id=assess.app_id','left')
				 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
	    		->DISTINCT()
				 ->where(array ('a.app_id' =>$app_id,
								'a.application_id' => $get_application_id[0]->application_id
				  ))
	    		->get();
				//echo $this->db->last_query();

				return (array)$business->result();

	}


	public function notice($app_id = null){
	$get_application_id = $this->db
						  ->select('a.application_id')
						  ->from('applications a')
						  ->where('app_id',$app_id)
						  ->get();
	$get_application_id = $get_application_id->result();

	$business = $this->db
    		->select('o.owner_id, o.firstname, o.middlename, o.lastname')
    		->select('b.buss_id, b.payment_id, b.business_name, b.trade_name, b.street_address,b.classification_id,b.permit_number')
    		->select('bn.business_nature, bn.requirements')
    		 ->select('br.brgy')
    		->select('pt.types payment_type')
    		->select('assess.breakdowns, assess.annually, assess.semi_annually, assess.quarterly, assess.payment, assess.total_tax_due')
    		->select('a.app_id, a.application_id,a.application_date')
			->select('bl.bus_line_id,bl.buss_nature_id, bl.capital, bl.gross, bl.requirements requirements_submitted')
			->select('assess.app_id  assess_app_id,assess.status as assess_status,assess.assessment_date')
    		->from('business_line bl')
    		->join('businessess b', 'bl.bl_buss_id=b.buss_id', 'inner')
    		->join('applications a', 'bl.app_id=a.app_id', 'inner')
    		->join('owners o', 'b.owner_id=o.owner_id', 'inner')
    		->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
    		->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
			->join('assessments assess','a.app_id=assess.app_id','left')
			 ->join('brgys br', 'b.brgy_id=br.brgy_id', 'left')
    		->DISTINCT()
			 ->where(array ('a.app_id' =>$app_id,
							'a.application_id' => $get_application_id[0]->application_id
			  ))
    		->get();
			//echo $this->db->last_query();
			$foundmayors_permit = 0;
			$foundgarbage_fee = 0;
			$today = date('Y-m-d');
			$required_tfo = array();
			$store_assessment_date = date('Y-m-d',strtotime(date('Y-m-d') . ' -365 days')); // sets the year to today's year
			$diff = strtotime(date($today)) - strtotime($store_assessment_date);
			$diff_years = floor(($diff)/(60*60*24*365));

			$business = $business->result();

				if(empty($business[0]->breakdowns)){
					//get the needed tfos
					$empty = '1';
					$where = 'r.buss_nature_id = '.$business[0]->buss_nature_id.' AND  (r.buss_nature_id = '.$business[0]->buss_nature_id.' OR t.all = '.$empty.') AND r.application_id='.$business[0]->application_id.' AND b.application_id='.$business[0]->application_id.'';

				$tfo = $this->db
					->select('t.tfo, t.amount, t.tfo_id, t.payment_id,t.type tfo_type')
					->select('r.req_tfo_id, r.value, r.variables, r.type')
					->from('required_tfo r')
					->join('tfo t', 'r.tfo_id=t.tfo_id', 'inner')
					->join('business_nature b', 'r.buss_nature_id=b.buss_nature_id', 'inner')
					->where($where)->get();
					//echo $this->db->_error_message();
					//echo $this->db->last_query();
				foreach ($tfo->result() as $t) {
					array_push($required_tfo,(array)$t);
				}
				//get the mayors_permit according to classification_id of business
				$mayors_permit = $this->db
								 ->distinct()
								 ->select('r.rid,r.value')
								 ->from('range r')
								 ->where( array ('r.classification'=>$business[0]->classification_id))
								 ->get();

					/***********************get mayors permit*************************/
					if ( ($mayors_permit->num_rows > 0 ) && ($foundmayors_permit ==0)){
						$foundmayors_permit = 1;
						$mayors_permit = $mayors_permit->result();
						$value = array();
							foreach($mayors_permit as $mp){
								array_push($value,json_decode($mp->value,true));
							}
						$tfop = array(
									  'tfo' =>"Mayors Permit",
									  'amount' =>"0",
									  'tfo_id' =>$mayors_permit[0]->rid,
									  'req_tfo_id' => $mayors_permit[0]->rid,
									  'payment_id' => "1",
									  'tfo_type' => "3",
									  'type' => "3",
									  'value' =>$mayors_permit[0]->value,
									  'variables' => null
									);
						array_push($required_tfo,$tfop);
					} else if (($foundmayors_permit == 0)){ //echo 'else';
					$foundmayors_permit = 1;
						$tfop = array(
									  'tfo' =>"Mayors Permit",
									  'amount' =>"0",
									  'tfo_id' => "1",
									  'req_tfo_id' => "1",
									  'payment_id' => "1",
									  'tfo_type' => "3",
									  'type' => "3",
									  'value' => "null",
									  'variables' => "null"
									);
						array_push($required_tfo,$tfop);
					}
					//print_r($tfo);
					/********************end of mayors permit************************************/
					/***********************get garbage fee*************************/
					$garbage_fee = $this->db
									 ->distinct()
									 ->select('g.gid,g.value')
									 ->from('garbage_fee g')
									 ->where( array ('g.classification'=>$business[0]->classification_id))
									 ->get();
					if ( ($garbage_fee->num_rows > 0 ) && ($foundgarbage_fee ==0)){
						$foundgarbage_fee = 1;
						$garbage_fee = $garbage_fee->result();
						$valuegf = array();
							foreach($garbage_fee as $gf){
								array_push($valuegf,json_decode($gf->value,true));

							}
						$tfop = array(
									  'tfo' =>"Garbage Fee",
									  'amount' =>"0",
									  'tfo_id' =>$garbage_fee[0]->gid,
									  'req_tfo_id' => $garbage_fee[0]->gid,
									  'payment_id' => "1",
									  'tfo_type' => "3",
									  'type' => "3",
									  'value' =>$garbage_fee[0]->value,
									  'variables' => null
									);
						array_push($required_tfo,$tfop);
					} else if (($foundgarbage_fee == 0)){ //echo 'else';
					$foundgarbage_fee = 1;
						$tfop = array(
									  'tfo' =>"Garbage Fee",
									  'amount' =>"0",
									  'tfo_id' => "1",
									  'req_tfo_id' => "1",
									  'payment_id' => "1",
									  'tfo_type' => "3",
									  'type' => "3",
									  'value' => "null",
									  'variables' => "null"
									);
						array_push($required_tfo,$tfop);	//print_r($tfop);
					}
					/********************end of garbage fee************************************/
					/******************************************************************************************/
						//Get Due Date base on payment mode

						if (date('Y',strtotime($business[0]->application_date)) == date('Y',strtotime($today))){ //echo 'f';
							$recent_year = date('Y');
							if ($business[0]->payment_id == 1){
								$field = 'Annual';
								$due_date = $this->db
												 ->select('s.value,s.field,s.payment_mode')
												 ->from('settings s')
												 ->where('s.payment_mode' ,$business[0]->payment_id)
												 ->like(array ('field' =>$field,'value' =>$recent_year))
												 ->get();

							} else if ($business[0]->payment_id == 2){
								$field = 'Semester';
								$due_date = $this->db
												 ->select('s.value,s.field,s.payment_mode')
												 ->from('settings s')
												 ->where('s.payment_mode' ,$business[0]->payment_id)
												 ->like(array ('field' =>$field,'value' =>$recent_year))
												 ->get();

							} else if ($business[0]->payment_id == 3){
								$field = 'quarter';
								$due_date = $this->db
												 ->select('s.value,s.field,s.payment_mode')
												 ->from('settings s')
												 ->where('s.payment_mode' ,$business[0]->payment_id)
												 ->like(array ('field' =>$field,'value' =>$recent_year))
												 ->get();
							}
							//echo $this->db->last_query();
							$new_due1 = $due_date->result();

						} else { //echo 'else';
							//Get Due Date base on payment mode

								if ($business[0]->payment_id == 1){
									$field = 'Annual';
									$due_date = $this->db
													 ->select('s.value,s.field,s.payment_mode')
													 ->from('settings s')
													 ->where('s.payment_mode' ,$business[0]->payment_id)
													 ->like(array ('value' =>date('Y',strtotime($business[0]->application_date))))
													 ->get();

								} else if ($business[0]->payment_id == 2){
									$field = 'Semester';
									$due_date = $this->db
													 ->select('s.value,s.field,s.payment_mode')
													 ->from('settings s')
													 ->where('s.payment_mode' ,$business[0]->payment_id)
													 ->like(array ('value' =>date('Y',strtotime($business[0]->application_date))))
													 ->get();

								} else if ($business[0]->payment_id == 3){
									$field = 'quarter';
									$due_date = $this->db
													 ->select('s.value,s.field,s.payment_mode')
													 ->from('settings s')
													 ->where('s.payment_mode' ,$business[0]->payment_id)
													 ->like(array ('value' =>date('Y',strtotime($business[0]->application_date))))
													 ->get();
								}
								//echo $this->db->last_query();
								$new_due1 = $due_date->result();
								if ($diff_years >=1){ //echo 'inner if';
									$surcharge = $this->db
												  ->select('surcharge,interest')
												  ->from('surcharge')
												  ->like('date_renew',date('Y',strtotime($store_assessment_date)))
												  ->get();
									$add_surcharge = $surcharge->result();
									//$number_of_months = (int)($diff_years * 12);
								}
						}
				$number_of_months = date('n');
				$number_of_months = ($number_of_months - 1);

					/******************************************************************************************/
				//let's do this thing baby!
				if (!empty($business[0]->capital)){
				$atfo = 0;
				$btfo = 0;
				$ptfo = 0;
				$amount = 0;
				$annually = 0;
				$biannual= 0;
				$quarter = 0;
				$penalty = 0;
				$given_surcharge = 0;
				$interest = 0;
				$cntr = 0;
				$subtotal = 0;
				$today = date('Y-m-d');
				$total = array();
				$breakdowns = array();
				//print_r($required_tfo);
				//foreach ($new_due1 as $due) {
				foreach ($required_tfo as $t) { //echo 'tfo='.$t['tfo'];
						switch ($t['type']){

							case 1: //Formula
								$formula = $t['value'];
								$variable = $t['variables'];
								$capital = $business[0]->capital;
								$amount = compute($formula, $variable, $capital);
								//echo 'case1';

							break;

							case 2: // Constant
								$amount = $t['value'];
								//echo 'case2';
							break;

							case 3: //Range
							$formula = $t['value'];
							$variable = $t['variables'];
							$capital = $business[0]->capital;
							//echo 'case3';


							break;

						}  //echo $subtotal.'<br>';
							if($business[0]->payment_id==1 ){
								$atfo = $amount;
								$annually = $annually + $atfo;
								$total = array('annually' =>$amount
											  );
							} elseif ($business[0]->payment_id==2){
								if ($t['tfo_type'] ==1 ){
									$btfo = $amount/2;
									$biannual = $btfo;
									$annually = $annually+$btfo;
								} else {
									$btfo = $amount;
									$annually =  $annually + $btfo;
								}

							} elseif ($business[0]->payment_id==3 ){
								if ($t['tfo_type'] ==1){
									$qtfo = $amount/4;
									$quarter = $qtfo;
									$annually = $annually+$qtfo;
								} else {
									$qtfo = $amount;
									$annually =  $annually + $qtfo;
								}
							}

						if ($t['tfo_type'] == 1){
							/******************************************************************************************/
								//Get Due Date base on payment mode

								if ($business[0]->payment_id == 1){
									$field = 'Annual';
									$due_date = $this->db
													 ->select('s.value,s.field,s.payment_mode')
													 ->from('settings s')
													 ->where('s.payment_mode' ,$business[0]->payment_id)
													 ->like(array ('field' =>$field))//,'value' =>(date('Y',strtotime($today)))))
													 ->get();

								} else if ($business[0]->payment_id == 2){
									$field = 'Semester';
									$due_date = $this->db
													 ->select('s.value,s.field,s.payment_mode')
													 ->from('settings s')
													 ->where('s.payment_mode' ,$business[0]->payment_id)
													 ->like(array ('field' =>$field))//,'value' =>(date('Y',strtotime($today)))))
													 ->get();

								} else if ($business[0]->payment_id == 3){
									$field = 'quarter';
									$due_date = $this->db
													 ->select('s.value,s.field,s.payment_mode')
													 ->from('settings s')
													 ->where('s.payment_mode' ,$business[0]->payment_id)
													 ->like(array ('field' =>$field))//,'value' =>(date('Y',strtotime($today)))))
													 ->get();
								}
								//print_r($due_date->result());
								$new_due1 = $due_date->result();
								/******************************************************************************************/
								$year = date('Y',strtotime($today));
								$year = $year - 1;
								$get_due_date=date('Y-m-d',strtotime($new_due1[0]->value));
								if(strtotime($today) > $get_due_date){
										/*****************************************************************************************
											Get Surcharge and Penalty
										*******************************************************************************************/

										$surcharge = $this->db
														  ->select('surcharge,interest')
														  ->from('surcharge')
														  //->like('date_renew',date('Y',strtotime($today)))
														  ->get();
														  //echo $this->db->last_query();
										$add_surcharge = $surcharge->result(); //print_r($add_surcharge);
										$surcharge_value = $add_surcharge[0]->surcharge;
										$interest = $add_surcharge[0]->interest;
										$given_surcharge = $given_surcharge + ($amount * $surcharge_value);
										$penalty = $penalty + (($amount * $interest) * $number_of_months);
										/******************************************************************************************/
								}
						}
				} //end of foreach
				$total = array ('annually' => $annually,
								'biannual' => $biannual,
								'quarter'  => $quarter
									 );

				$breakdowns [] = array ('duedate'   => $new_due1,
										'amount'  => $total,
										'penalty' => $penalty
										);

				return array (
							'error' =>0,
							'msg' =>'No Error',
							'payment_mode' =>$business[0]->payment_id,
							'breakdowns' =>$breakdowns,
							'owner_detail' =>(array)$business
						);
			} else {
				return array('error' =>1,
							 'msg'=>'No capital/gross inputted');
			}

				}
	}

	public function get_headers(){

		return array('b.permit_number' =>'Permit No',
					 'b.street_address' =>'Address',
					 'bl.capital' =>'Capital',
					 'bl.gross' =>'Gross',
					 'b.business_name' =>'Business Name',
					 'o.firstname' =>'First Name',
					 'o.middlename' => 'Middle Name',
					 'o.lastname' =>'Last Name',
					 'o.gender' => 'Gender',
					 'bn.business_nature' => 'Business Nature',
					 'b.contact_number' => 'Telephone No',
					 'b.mobile_number' =>'Mobile Number',
				 	 '(b.abled_male_emp_lgu + b.abled_female_emp_lgu) as total_emp' => 'Total # of<br> Emp');
	}


	public function get_diy_report($data = array()){

		$user_header = json_decode($data['theheaders'],true);
		$stringheaders = implode(',', array_map('quote', $data['headers']));
		$new_headers = $this->get_header_element($data['headers']);

		$data = $this->db->select($stringheaders)
		->from('owners o')
		->distinct()
		->join('businessess b','o.owner_id=b.owner_id','inner')
		->join('applications a','a.owner_id=o.owner_id','inner')
		->join('business_line bl','bl.app_id=a.app_id','inner')
		->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
		->get();
		///echo $this->db->last_query();
		return array('result' =>$data->result(),'user_headers' =>$new_headers);

	}

	private function get_header_element($user_header = array()){

		$cnt = count($user_header);
		$new_header = array();
		$headers = $this->get_headers();

		for($i=0;$i<$cnt;$i++){
			if(!array_search($user_header[$i], $headers)){
				$new_header[]=$headers[$user_header[$i]];

			}
		}
		return($new_header);
	}

	public function get_admin_details(){

		return $this->db->select('id,firstName,middleName,lastName,designation')
						->from('bplissettings')
						->get();
	}

	public function get_quarters(){
		return $this->db->select('setting_id,field')
					->from('settings')
					->where(array('payment_mode' =>'3'))
					->get();
				/*	echo $this->db->last_query();*/
	}

	public function get_start_and_end_quarters($year,$id){

		$start_and_end_quarter=$this->db->select('setting_id,value,value1,field')
				 ->from('settings')
				 ->where(array('setting_id' =>$id))
				 ->get();
		//echo $this->db->_error_message();
		$start_and_end_quarter = $start_and_end_quarter->result();
		
		return ( array('value' =>"'".$start_and_end_quarter[0]->value."/".$year."'",
					 'value1' =>"'".$start_and_end_quarter[0]->value1."/".$year."'",
					 'v1' =>"'".str_replace('20','',$year)."'",
					 'v2' =>"'".str_replace('20','',$year)."'",
					 'field' =>$start_and_end_quarter[0]->field,
					 'year' =>$year,
					 'id' =>$start_and_end_quarter[0]->setting_id,
					 'end' =>$start_and_end_quarter[0]->value1
					));
	}

	public function get_dilg_report($year = null, $quarter = null){

		$quarters = $this->get_start_and_end_quarters($year,$quarter);
		//print_r($quarters);
		$details = array();
		$current_year = date('Y');
		$get_current_date = date('m');
		$mayors_permit = 0;
		$business_tax = 0;
		$fees = 0;
		$mayors_permit2 = 0;
		$business_tax2 = 0;
		$fees2 = 0;
		$get_current_quarter = 0;
		$cnt_all_business_new_perquarter = 0;
		$cnt_all_business_new = 0;
		$cnt_all_business_renew = 0;
		$cnt_all_owned_by_woman_new = 0;
		$cnt_all_owned_by_woman_renew = 0;
		$percentage_all_business = 0;
		$percentage_owned_by_woman_new = 0;
		$percentage_owned_by_woman_renew = 0;
		$owned_by_woman_sp_new =0;
		$owned_by_woman_renew = 0;
		$owned_by_woman_sp_renew =0;
		$percent_owned_by_woman_new2 =0;
		$cnt_all_business_renew_perquarter = 0;
		$setting_id = $quarters['id'];
		$end = "'".$year.'-'.$quarters['end']."'";
		$begin = "'".$year.'-01-02'."'";
//echo '%'.date('Y',strtotime(str_replace("'", "", $quarters['value'])));
		$total_for_current_quarter_new_query = $this->db->select('count(*)  cnt')
							   ->from('owners o')
							   ->join('businessess b','o.owner_id=b.owner_id','inner')
							   ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
							   ->join('business_line bl','a.app_id=bl.app_id','inner')
							   ->where('date_applied LIKE "%'.date('Y',strtotime(str_replace("'", "", $quarters['value']))).'" OR date_applied LIKE "%'.$quarters['v1'].'" ')
							   ->where(array('b.application_id' =>'1'))
							   ->get();
//echo $this->db->last_query();
		$total_for_current_quarter_new_query = $total_for_current_quarter_new_query->result();
		$total_for_current_quarter_new = $total_for_current_quarter_new_query[0]->cnt;

		//(angel note)NEW all business per quarter
		$all_business_new_perquarter = $this->db->select('count(*)  cnt')
							   ->from('owners o')
							   ->join('businessess b','o.owner_id=b.owner_id','inner')
							   ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
							   ->join('business_line bl','a.app_id=bl.app_id','inner')
							   ->where('date_applied BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'] .'')
							   ->where(array('gender' =>'2','b.application_id' =>'1'))
							   ->get();
		//echo $this->db->last_query();
		$all_business_new_perquarter = $all_business_new_perquarter->result();
		$cnt_all_business_new_perquarter = $all_business_new_perquarter[0]->cnt;

		/*(dunno if they're using this)*/
		$percent_owned_by_woman_new_query = $this->db->select('count(*)  cnt')
							   ->from('owners o')
							   ->join('businessess b','o.owner_id=b.owner_id','inner')
							   ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
							   ->join('business_line bl','a.app_id=bl.app_id','inner')
							   ->where('date_applied LIKE "%'.date('Y',strtotime(str_replace("'", "", $quarters['value']))).'%"'.' OR date_applied LIKE "%'.$quarters['v1'].'"')
							   ->where(array('gender' =>'2'))
							   ->get();
							   //	echo $this->db->last_query();
		$percent_owned_by_woman_new_query = $percent_owned_by_woman_new_query->result();

		//(angel_note) NEW percent owned by woman for the quarter new
		$owned_by_wowan_query = $this->db->select('count(*)  cnt')
							   ->from('owners o')
							   ->join('businessess b','o.owner_id=b.owner_id','inner')
							   ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
							   ->join('business_line bl','a.app_id=bl.app_id','inner')
							   ->where('date_applied BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'])
							   ->where(array('gender' =>'2','b.application_id' =>'1'))
							   ->get();
		$owned_by_wowan_query = $owned_by_wowan_query->result();
		if(! empty($cnt_all_business_new_perquarter) && $cnt_all_business_new_perquarter !==0){
			$percent_owned_by_woman_new2 = round(($owned_by_wowan_query[0]->cnt / $cnt_all_business_new_perquarter) * 100,2);
		}else{
			$cnt_all_business_new_perquarter=0;
		}
		//(angel_note)NEW percent owned by woman single propriety for the quarter
		$owned_by_wowan_single_prop_query = $this->db->select('count(*)  cnt')
								 ->from('owners o')
								 ->join('businessess b','o.owner_id=b.owner_id','inner')
								 ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
								 ->join('business_line bl','a.app_id=bl.app_id','inner')
								 ->where('date_applied BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'] .' OR date_applied LIKE "%'.$quarters['v1'].'"')
								 ->where(array('gender' =>'2','b.application_id' =>'1','ownership_id' =>'1'))
								 ->get();
		$owned_by_wowan_single_prop_query = $owned_by_wowan_single_prop_query->result();
		//echo $this->db->last_query();
		if(! empty($cnt_all_business_new_perquarter) && $cnt_all_business_new_perquarter !== 0){
			$owned_by_woman_sp_new = round(($owned_by_wowan_single_prop_query[0]->cnt / $cnt_all_business_new_perquarter ) * 100,2);
		}else{
			$cnt_all_business_new_perquarter= 0;
		}
		//echo '<pre>'.json_encode($owned_by_wowan_single_prop_query).'<pre>';

		//(angel_note)NEW cumulative query

		if($setting_id == 2){
			$cumulative_woman_for_year = 0;
		}else{

		$cumulative_owned_by_woman_query = $this->db->select('count(*)  cnt')
								 ->from('owners o')
								 ->join('businessess b','o.owner_id=b.owner_id','inner')
								 ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
								 ->join('business_line bl','a.app_id=bl.app_id','inner')
								 ->where('date_applied BETWEEN '.$begin.' AND '.$end)
								 ->where(array('gender' =>'2','b.application_id' =>'1'))
								 ->get();
		$cumulative_owned_by_woman_query = $cumulative_owned_by_woman_query->result();
		$cumulative_woman_for_year = $cumulative_owned_by_woman_query[0]->cnt;
	}

		//(angel_note)RENEW all business per quarter
		$all_business_renew_perquarter = $this->db->select('count(*)  cnt')
							   ->from('owners o')
							   ->join('businessess b','o.owner_id=b.owner_id','inner')
							   ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
							   ->join('business_line bl','a.app_id=bl.app_id','inner')
							   ->where('date_applied BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'])
							   ->where(array('gender' =>'2','b.application_id' =>'2'))
							   ->get();
		//echo $this->db->last_query();
		$all_business_renew_perquarter = $all_business_renew_perquarter->result();
		$cnt_all_business_renew_perquarter = $all_business_renew_perquarter[0]->cnt;

		//(angel_note)RENEW percent owned by woman single propriety for the quarter
		$owned_by_wowan_single_prop_query_renew = $this->db->select('count(*)  cnt')
								 ->from('owners o')
								 ->join('businessess b','o.owner_id=b.owner_id','inner')
								 ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
								 ->join('business_line bl','a.app_id=bl.app_id','inner')
								 ->where('date_applied BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'])
								 ->where(array('gender' =>'2','b.application_id' =>'2','ownership_id' =>'1'))
								 ->get();
		$owned_by_wowan_single_prop_query_renew = $owned_by_wowan_single_prop_query_renew->result();

		if(! empty($cnt_all_business_renew_perquarter) && $cnt_all_business_renew_perquarter !== 0){
			$owned_by_woman_sp_renew = round(($owned_by_wowan_single_prop_query_renew[0]->cnt / $cnt_all_business_renew_perquarter ) * 100,2);
		}else{
			$cnt_all_business_renew_perquarter = 0;
		}
		//(angel_note)RENEW cumulative query
		if($setting_id == 2){
			$cumulative_for_year_renew = 0;
		}else{
		$cumulative_query_renew = $this->db->select('count(*)  cnt')
								 ->from('owners o')
								 ->join('businessess b','o.owner_id=b.owner_id','inner')
								 ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
								 ->join('business_line bl','a.app_id=bl.app_id','inner')
								 ->where('date_applied BETWEEN '.$begin.' AND '.$end)
								 ->where(array('gender' =>'2','b.application_id' =>'2'))
								 ->get();
		//echo $this->db->last_query();
		$cumulative_query_renew = $cumulative_query_renew->result();
		$cumulative_for_year_renew = $cumulative_query_renew[0]->cnt;
		}
		//(angel_note)RENEW percent owned by woman for the quarter
		$owned_by_wowan_query_renew = $this->db->select('count(*)  cnt')
								 ->from('owners o')
								 ->join('businessess b','o.owner_id=b.owner_id','inner')
								 ->join('applications a','b.buss_id=a.buss_id AND o.owner_id=a.owner_id','inner')
								 ->join('business_line bl','a.app_id=bl.app_id','inner')
								 ->where('date_applied BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'])
								 ->where(array('gender' =>'2','b.application_id' =>'2'))
								 ->get();

		$owned_by_wowan_query_renew = $owned_by_wowan_query_renew->result();;
		if(! empty($cnt_all_business_renew_perquarter) && $cnt_all_business_renew_perquarter !==0){
			$owned_by_woman_renew = round(($owned_by_wowan_query_renew[0]->cnt / $cnt_all_business_renew_perquarter ) * 100,2);
		}else{
			$cnt_all_business_renew_perquarter=0;
		}

		//(angel note)Revenue business tax|mayor parmit|regulatory fees total new and renew for current quarter
		$paid_query = $this->db->select('bl.buss_nature_id, assess.app_id')
										->distinct()
										->from('assessments assess')
										->join('business_line bl','assess.app_id=bl.app_id','inner')
										->join('business_nature bn','bn.buss_nature_id=bl.buss_nature_id','inner')
										->where(array('status' =>'paid'))
										->where('assessment_date BETWEEN '.$quarters['value'].' AND '.$quarters['value1'])
										->order_by('bn.buss_nature_id')
										->get();
		$paid_query = $paid_query->result();

		foreach ($paid_query as $p) {
			$get_app_id = $this->db->select('assess.app_id')
				   ->DISTINCT()
				   ->from('business_line bl')
				   ->join('assessments assess','bl.app_id=assess.app_id','inner')
				   ->join('applications a','a.app_id=assess.app_id','inner')
				   ->where(array('bl.buss_nature_id' =>$p->buss_nature_id))
				   ->get();

			if(!empty($get_app_id)){
				foreach ($get_app_id->result() as $row) {
					$get_tfo_breakdown = $this->db->select('tfos')
												  ->from('assessments assess')
												  ->where(array('assess.app_id' =>$row->app_id,
												  				'assess.status' =>'paid'
												  		))
												  ->where('assessment_date BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'])
												  ->get();
					$get_tfo_breakdown = $get_tfo_breakdown->result();
					//echo $this->db->last_query();
					if(!empty($get_tfo_breakdown)){
						$tfos = json_decode($get_tfo_breakdown->tfos,true);
						foreach ($tfos as $t) {
							if($t['tfo'] == 1){
								$business_tax += $t['amount'];
								//echo $fees;
							}elseif ($t['tfo'] == 6){
								$mayors_permit += $t['amount'];
								//echo $mayors_permit;
							}else
								$fees +=$t['amount'];
						}
					}
				}
			}
		}
		//echo $setting_id;
		if ($setting_id == 2) {
			$mayors_permit2 = 0;
			$business_tax2 = 0;
			$fees2 = 0;
		} else {
			$paid_query2 = $this->db->select('bl.buss_nature_id, assess.app_id')
										->distinct()
										->from('assessments assess')
										->join('business_line bl','assess.app_id=bl.app_id','inner')
										->join('business_nature bn','bn.buss_nature_id=bl.buss_nature_id','inner')
										->where(array('status' =>'paid'))
										->where('assessment_date BETWEEN '.$begin.' AND '.$end)
										->order_by('bn.buss_nature_id')
										->get();
			$paid_query2 = $paid_query2->result();

			foreach ($paid_query2 as $p) {
				$get_app_id2 = $this->db->select('assess.app_id')
					   ->DISTINCT()
					   ->from('business_line bl')
					   ->join('assessments assess','bl.app_id=assess.app_id','inner')
					   ->join('applications a','a.app_id=assess.app_id','inner')
					   ->where(array('bl.buss_nature_id' =>$p->buss_nature_id))
					   ->get();

				if(!empty($get_app_id2)){
					foreach ($get_app_id2->result() as $row) {
						$get_tfo_breakdown2 = $this->db->select('tfos')
													  ->from('assessments assess')
													  ->where(array('assess.app_id' =>$row->app_id,
													  				'assess.status' =>'paid'
													  		))
													  ->where('assessment_date BETWEEN '.$quarters['value'] .' AND '.$quarters['value1'])
													  ->get();
						$get_tfo_breakdown2 = $get_tfo_breakdown2->result();
						//echo $this->db->last_query();
						if(!empty($get_tfo_breakdown2)){
							$tfos = json_decode($get_tfo_breakdown2[0]->tfos,true);
							foreach ($tfos as $t) {
								if($t['tfo'] == 1){
									$business_tax2 += $t['amount'];
									//echo $fees;
								}elseif ($t['tfo'] == 6){
									$mayors_permit2 += $t['amount'];
									//echo $mayors_permit;
								}else
									$fees2 +=$t['amount'];
							}
						}
					}
				}
			}
		}
		//echo '<pre>'.json_encode($paid_query).'<pre>';

		$details = array(
					'quarter' =>$quarters['field'],
					'year' =>$quarters['year'],
					'total_for_current_quarter_new' =>$cnt_all_business_new_perquarter,
					'owned_by_woman_sp_new' => $owned_by_woman_sp_new,
					'cumulative_total_for_current_year_new' => $cumulative_woman_for_year,

					'percent_owned_by_woman_new' =>$percent_owned_by_woman_new2,
					'total_for_current_quarter_renew' =>$cnt_all_business_renew_perquarter,
					'owned_by_woman_sp_renew' => $owned_by_woman_sp_renew,
					'cumulative_total_for_current_year_renew' => $cumulative_for_year_renew,
					'percent_owned_by_woman_renew' => $owned_by_woman_renew,

					'total_for_current_quarter_close' =>$cnt_all_business_new,
					'owned_by_woman_sp_close' => '',
					'cumulative_total_for_current_year_close' => '',
					'percent_owned_by_woman_close' =>'',
					'business_tax' =>$business_tax,
					'mayors_permit' =>$mayors_permit,
					'fees' =>$fees,
					'cummulative_mayors_permit' =>$mayors_permit2,
					'cummulative_business_tax' =>$business_tax2,
					'cummulative_fees' =>$fees2
				);
		return $details;


	}

	public function get_blgf_report($year = null, $quarter=null){

		if(!is_null($year) && !is_null($quarter)){
			$quarters = $this->get_start_and_end_quarters($year,$quarter);
			//print_r($quarters);
			$app_id = array();
			$or = 0;
			$owner = '<b><font color="red">No Data Available</font></b>';
			$assess_date = "00-00-0";	
			//TAX ON BUSINESS
			$retailers_tax = 0;
			$amusement_tax = 0;
			$other_buss_tax = 0;
			$manufacturer_assemblers_tax = 0;
			$fines_n_pen_tax = 0;
			//OTHER TAXES
			$community_tax_corp=0;
			$community_tax_individual=0;
			$professional_tax=0;
			$miscellaneous_fee=0;
			$occupational_fee=0;
			//REGULATORY FEE
			$fee_on_weights_measures=0;
			$mayor_business_permit=0;
			$building_permit=0;
			$plumbing_fee=0;
			$zonal_permit_fee=0;
			$motorbike_operator_fee=0;
			$other_permit_license=0;
			$marriage_fee=0;
			$burial_permit_fee=0;
			$animal_registration_fee=0;
			$electrical_fee=0;
			$inspection_fee=0;
			//SERVICE USER CHARGES
			$legal_fees_ra9048=0;
			$police_clearance_fee=0;
			$medico_legal=0;
			$med_health_clearance=0;
			$other_clearance_certificate=0;
			$garbage_fees=0;
			$violation_ordinance_fee=0;
			//ECONOMIC ENTERPRISE
			$cemetery_fee=0;
			$stall_rentals=0;
			$cash_tickets=0;
			$coral_fees=0;
			$post_mortem=0;
			$anti_mortem=0;
			$income_from_lease=0;
			$document_stamps=0;


			
			$amusement_query1 = $this->db->select('assess.assessment_id,assess.assessment_date,pm.or_number, o.firstname, o.lastname,assess.tfos,assess.addtltfo')
										->distinct()
										->from('assessments assess')
										->join('applications a','assess.app_id=a.app_id','inner')
										->join('business_line bl','assess.app_id=bl.app_id','inner')
										->join('business_nature bn','bl.buss_nature_id=bn.bid','inner')
										->join('businessess bs','bl.bl_buss_id=bs.buss_id', 'inner')
										->join('owners o','bs.owner_id=o.owner_id','inner')
										->join('payments pm','assess.assessment_id=pm.assessment_id','inner')
										->where(array('assess.status' =>'paid'))
										->where('assessment_date BETWEEN "'.date('Y-m-d',strtotime(str_replace("'", "", $quarters['value']))).'" AND "'.date('Y-m-d',strtotime(str_replace("'", "", $quarters['value1']))).'"')
										->order_by('assess.assessment_id')
										->get();
										// echo '<br>'.$this->db->last_query();		
					
					return array(
						'amusement_query' => $amusement_query1->result(),
						//TAX ON BUSINESS
						'retailers_tax'=>$retailers_tax,
						'amusement_tax'=>$amusement_tax,
						'other_buss_tax'=>$other_buss_tax,
						'manufacture_tax'=>$manufacturer_assemblers_tax,
						'fines_n_pen_tax'=>$fines_n_pen_tax,
						//OTHER TAXES
						'community_tax_corp'=>$community_tax_corp,
						'community_tax_individual'=>$community_tax_individual,
						'professional_tax'=>$professional_tax,
						'miscellaneous_fee'=>$miscellaneous_fee,
						'occupational_fee'=>$occupational_fee,
						//REGULATORY FEES
						'fee_on_weights_measures'=>$fee_on_weights_measures,
						'mayor_business_permit'=>$mayor_business_permit,
						'building_permit'=>$building_permit,
						'plumbing_fee'=>$plumbing_fee,
						'zonal_permit_fee'=>$zonal_permit_fee,
						'motorbike_operator_fee'=>$motorbike_operator_fee,
						'other_permit_license'=>$other_permit_license,
						'marriage_fee'=>$marriage_fee,
						'burial_permit_fee'=>$burial_permit_fee,
						'animal_registration_fee'=>$animal_registration_fee,
						'electrical_fee'=>$electrical_fee,
						'inspection_fee'=>$inspection_fee,
						//SERVICE USER CHARGES
						'legal_fees_ra9048'=>$legal_fees_ra9048,
						'police_clearance_fee'=>$police_clearance_fee,
						'medico_legal'=>$medico_legal,
						'med_health_clearance'=>$med_health_clearance,
						'other_clearance_certificate'=>$other_clearance_certificate,
						'garbage_fees'=>$garbage_fees,
						'violation_ordinance_fee'=>$violation_ordinance_fee,
						//ECONOMIC ENTERPRISE
						'cemetery_fee'=>$cemetery_fee,
						'stall_rentals'=>$stall_rentals,
						'cash_tickets'=>$cash_tickets,
						'coral_fees'=>$coral_fees,
						'post_mortem'=>$post_mortem,
						'anti_mortem'=>$anti_mortem,
						'income_from_lease'=>$income_from_lease,
						'document_stamps'=>$document_stamps,
						'quarter'=>date('F d, Y',strtotime(str_replace("'", "", $quarters['value']))),
						'quarter1'=>date('F d, Y',strtotime(str_replace("'", "", $quarters['value1']))),
				);
					}
					
				}
				public function get_closed_business($year=null){
					$year = $_POST['getyear'];
					$yearcon = '%'.$year.'-%';
					$where =  "b.permit_number LIKE '".$yearcon."'" ;
			
						$check =  $this->db->select('r.business_name,r.business_address,r.owner_name')
								->select('r.date_filed,r.gross,r.permit_no,r.employees,r.nature_retired')
								->select('b.permit_number')
								->distinct()
								->from('retirement r')
								->join('businessess b','b.buss_id=r.buss_id','left')
								->where($where)
								->get();
			
					return $check;
			
				}

				public function diy_v2_business($year=null){
				
					$year = $_POST['getyear'];
					$years = date('Y',strtotime($_POST['getyear']))-1;
					$brgy = $_POST['getbrgy'];
					if(empty($_POST['natlist'])){
						$nature = 0;
					}else{
					
						if(stripos($_POST['natlist'],',')!==false){
							$naturey = explode(',',$_POST['natlist']);
							$nature = 1;
						}else{
							$naturey = $_POST['natlist'];
							$nature = 1;
						}
						
						
					}
	
					$quarter = $_POST['getquarter'];
					$orders = $_POST['order'];
					$newrenew = $_POST['getnew'];

					if($newrenew){
						$newrenew1 = "AND b.application_id=$newrenew";
					}else{
						$newrenew1 = "";
					}
			
					if($_POST['order']==1){
						$order="b.permit_number";
					} else if($_POST['order']==2){
						$order="bl.capital DESC";
					} else if($_POST['order']==3){
						$order="o.lastname asc";
					}
				//QUARTERLY	
					if($quarter==1){
						$quarters = "'$years/01/01' and '$year/03/31'";
					}
					if($quarter==2){
						$quarters = "'$years/04/01' and '$year/04/30'";
					}
					if($quarter==3){
						$quarters = "'$years/07/01' and '$year/09/30'";
					}
					if($quarter==4){
						$quarters = "'$years/10/01' and '$year/12/31'";
					}
				//QUERIES
					if($brgy==0 && $nature==0 && $quarter==0){
						$where = "b.permit_number LIKE '%$year%' AND br.brgy_id <> 0   $newrenew1";
					}
					else if($brgy!=0 && $nature==0 && $quarter==0){
						$where="b.permit_number LIKE '%$year%' AND br.brgy_id = $brgy $newrenew1";
					}
					else if($brgy==0 && $nature!=0 && $quarter==0){
				
						if($naturey){
							$countt=0;$item="";
							foreach($naturey as $nat){
								$countt++;
								if($countt==1){
									$item.="bn.buss_nature_id = $nat";
								}else{
									$item.=" OR bn.buss_nature_id = $nat";
								}
							}
							$naturex = $item;

						}else{
							$naturex = "bn.buss_nature_id = $nature";	
						}
						$where="b.permit_number LIKE '%$year%' $newrenew1 AND $naturex";
					}
					else if($brgy==0 && $nature==0 && $quarter!=0){
						$where="b.permit_number LIKE '%$year%' AND assess.assessment_date BETWEEN $quarters $newrenew1";
					}
					else{	
				
						if($naturey){
							$countt=0;$item="";
							foreach($naturey as $nat){
								$countt++;
								if($countt==1){
									$item.="bn.buss_nature_id = $nat";
								}else{
									$item.=" OR bn.buss_nature_id = $nat";
								}
							}
							$naturex = $item;

						}else{
							$naturex = "bn.buss_nature_id = $nature";	
						}
					
						$where="b.permit_number LIKE '%$year%' AND br.brgy_id = $brgy  AND assess.assessment_date BETWEEN $quarters $newrenew1 AND $naturex";
						
					}
				$check =  $this->db
						->select('b.permit_number,o.firstname,o.middlename,o.lastname,b.business_name,o.permitee,a	.application_id as appid')
						->select('bl.capital,b.contact_number,b.plate_no,br.brgy,GROUP_CONCAT(DISTINCT(bn.business_nature)) as business_nature')
						->select('b.abled_female_emp_estab,b.abled_male_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu')						
						->select('p.or_number,p.payment_date,assess.assessment_date,ot.types as ownership_type,b.application_id')						
						->distinct()
						->from('businessess b')
						->join('business_line bl','b.buss_id=bl.bl_buss_id','inner')
						->join('business_nature bn','bl.buss_nature_id=bn.buss_nature_id','inner')
						->join('owners o','b.owner_id=o.owner_id','inner')
						->join('ownership_type ot','ot.ownership_id=b.ownership_id','inner')
						->join('brgys br','b.brgy_id=br.brgy_id','inner')
						->join('applications a','b.buss_id=a.buss_id','inner')
						->join('assessments assess','a.app_id=assess.app_id','inner')
						->join('payments p','assess.assessment_id=p.assessment_id','inner')
						->where($where)
						
						->group_by('b.permit_number')
						->order_by($order)
						->get();

					return $check;
			
				}

				public function diy_v2_business1($year=null){

					$wired1=0;
					$wired2=0;
					$wired3=0;
					$wired4=0;
					$wired5=0;
					$wired6=0;
					$wired7=0;
					$wired8=0;
					$wired9=0;
					$wired10=',';
					$wired11='.';

					
					if(isset($_POST['year'])==NULL){
						$year = 0;
					}else{
						$year = $_POST['year'];
					}

					if(isset($_POST['permit_no'])==NULL){
						$permit_no = 0;
					}else{
						$permit_no = $_POST['permit_no'];
					}

					if(isset($_POST['owner_name'])==NULL){
						$owner_name = 0;
					}else{
						$owner_name = $_POST['owner_name'];
					}

					if(isset($_POST['brgy'])==NULL){
						$brgy = 0;
					}else{
						$brgy = $_POST['brgy'];
					}

					if(isset($_POST['buss_nature'])==NULL){
						$buss_nature = 0;
					}else{
						$buss_nature = $_POST['buss_nature'];
					}

					if(isset($_POST['business_name'])==NULL){
						$business_name = 0;
					}else{
						$business_name = $_POST['business_name'];
					}

					if(isset($_POST['gross'])==NULL){
						$gross = 0;
					}else{
						$gross = $_POST['gross'];
					}

					if(isset($_POST['employees'])==NULL){
						$employees = 0;
					}else{
						$employees = $_POST['employees'];
					}

					if(isset($_POST['contact_num'])==NULL){
						$contact_num = 0;
					}else{
						$contact_num = $_POST['contact_num'];
					}

					if(isset($_POST['plate_no'])==NULL){
						$plate_no = 0;
					}else{
						$plate_no = $_POST['plate_no'];
					}

					if(isset($_POST['or_number'])==NULL){
						$or_number = 0;
					}else{
						$or_number = $_POST['or_number'];
					}

					if(isset($_POST['title'])==NULL){
						$title = "";
					}else{
						$title = $_POST['title'];
					}

					if(isset($_POST['ownership_type'])==NULL){
						$ownership_type = 0;
					}else{
						$ownership_type = $_POST['ownership_type'];
					}
			
					
					if($permit_no==1 ){
						$wired1=1;
					}
					if($owner_name==1 ){
						$wired2=2;
					}
					if($brgy==1 ){
						$wired3=3;
					}
					if($buss_nature==1 ){
						$wired4=4;
					}
					if($business_name==1 ){
						$wired5=5;
					}
					if($gross==1 ){
						$wired6=6;
					}
					if($employees==1 ){
						$wired7=7;
					}
					if($contact_num==1 ){
						$wired8=8;
					}
					if($plate_no==1 ){
						$wired9=9;
					}
					if($or_number==1 ){
						$wired10=',';
					}
					if($ownership_type==1 ){
						$wired11='.';
					}
					
					$wired = $wired1."".$wired2."".$wired3."".$wired4."".$wired5."".$wired6."".$wired7."".$wired8."".$wired9."".$wired10."".$wired11."".$title;
					return $wired;
			
				}

				public function diy_v2_business2($year=null){
						$year = $_POST['getyear'];
						return $year;
				}

				public function get_barangays() {
					return $this->db->select('*')->distinct()->from('brgys br')->get();
				}

				public function get_natures() {
					$where = "application_id = 1";
					return $this->db->select('*')->distinct()->from('business_nature')->where($where)->order_by('business_nature')->get();
				}
				
				public function get_delinquent($year=null){
					$year = $_POST['getyear'];
					$yearcon = $year.'%';
					$businessess = array();
					$where =  "b.permit_number LIKE '".$yearcon."'" ;
						$check =  $this->db
						  ->distinct()
						->select('b.permit_number, b.business_name,b.ownership_id')
						->select('br.brgy')
						->select('o.firstname, o.middlename, o.lastname,o.owner_id,o.permitee')
						->select('a.app_id, a.buss_id, a.application_date, apptype.types application_type')
						->select('assess.status, assess.assessment_id, assess.total_tax_due, assess.assessment_date, pt.payment_id,pt.types,GROUP_CONCAT(pay.count) as count,pay.payment_modes')
						->from('assessments assess')
						->join('applications a', 'assess.app_id=a.app_id', 'inner')
						->join('owners o', ' a.owner_id=o.owner_id', 'inner')
						->join('businessess b', 'a.buss_id=b.buss_id', 'inner')
						->join('brgys br', 'b.brgy_id=br.brgy_id', 'inner')
						->join('application_type apptype', 'assess.application_id=apptype.application_id', 'inner')
							->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
							->join('payments pay', 'assess.assessment_id=pay.assessment_id', 'inner')
							->where($where)
							->order_by('b.permit_number','asc')
							->group_by('b.permit_number')
							->get(); //echo $this->db->last_query();
						return $check;// echo $this->db->last_query();
			
						
				}
					
}
// 		else{
// 			return false;
// 		}	
		
// 	}
// //-----------------------
// 	private function get($table = '', $fields = '*', $where = null, $order_by = 'ID', $order = 'ASC') {
// 		$this->db
// 			->select($fields)
// 			->from($table);

// 		if(!is_null($where)) {
// 			$this->db->where($where);
// 		}

// 		return $this->db->order_by($order_by, $order)
// 			->get();
// 	}
// }

/*$query = select all from table // inside the table is buss_nature -> amusement, manufacturing, bank, retailers
$query->result();
$buss_nature = $query[0]->buss_nature;
switch ($buss_nature){
	case 'amusement':
		$query2 = select buss_id
				where buss_nature = 'amusement'
				break;
	case 'manufacturing':
		$query2 = select buss_id
				where buss_nature = 'manufacturing'

	case 'bank'
		$query2 = select buss_id
				where buss_neture = 'bank'
	etc.. etc..
}*/
