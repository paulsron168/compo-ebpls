<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Owner_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function save_owner($data = array()) { //echo $data['brgy_id'];
		if(!empty($data) && is_array($data)) {

			$data['brgy_id'] = !empty($data['brgy_id']) ? $data['brgy_id'] : (!empty($data['brgy_id12']) ? $data['brgy_id12'] : '14' );;
			$data['house_no_bldg_name'] = !empty($data['house_no_bldg_name']) ? $data['house_no_bldg_name'] : (!empty($data['house_no_bldg_name12']) ? $data['house_no_bldg_name12'] : 'N/A' );
			$data['o_subdivision_street'] = !empty($data['o_subdivision_street']) ? $data['o_subdivision_street'] : (!empty($data['o_subdivision_street12']) ? $data['o_subdivision_street12'] : 'N/A' );
			$data['o_muni'] = !empty($data['o_muni']) ? $data['o_muni'] : (!empty($data['o_muni12']) ? $data['o_muni12'] : 'N/A' );
			$data['o_province'] = !empty($data['o_province']) ? $data['o_province'] : (!empty($data['o_province12']) ? $data['o_province12'] : 'N/A' );
			$data['email'] = empty($data['email']) ? 'N/A' : $data['email'];
			$data['contact_number'] = empty($data['contact_number']) ? 'N/A' : $data['contact_number'];
			$data['remarks'] = empty($data['remarks']) ? 'N/A' : $data['remarks'];
			$data['created_at'] = date('m-d-Y');
			$data['modified_at'] = date('m-d-Y');
			$data['firstname'] = !empty($data['firstname']) ? $data['firstname'] : (!empty($data['firstname1']) ? $data['firstname1'] : 'N/A' );
			$data['middlename'] = !empty($data['middlename']) ? $data['middlename'] : (!empty($data['middlename1']) ? $data['middlename1'] : 'N/A' );
			$data['lastname'] = !empty($data['lastname']) ? $data['lastname'] : (!empty($data['lastname1']) ? $data['lastname1'] : 'N/A' );
			$data['permitee'] = !empty($data['permitee']) ? $data['permitee'] : (!empty($data['permitee']) ? $data['permitee'] : 'N/A' );
			$data['gender'] = !empty($data['gender']) ? $data['gender'] : '';

			unset($data['ownership_id']);
			unset($data['firstname1']);
			unset($data['middlename1']);
			unset($data['lastname1']);
			unset($data['brgy_id12']);
			unset($data['house_no_bldg_name12']);
			unset($data['o_subdivision_street12']);
			unset($data['o_muni12']);
			unset($data['o_province12']);

			if(isset($data['owner_id'])) {
				/* ---------------------
				 * Update Owner Details
				 * --------------------- */

				 $data['modified_at'] = date('m-d-Y');
				 $data['middlename'] = isset($data['middlename']) ? $data['middlename'] : 'N/A';
				 return $this->db->update('owners', $data, array('owner_id' => $data['owner_id']));
				//echo $this->db->_error_message();
			} else {
				/* ---------------------
				 * Save New Owner
				 * --------------------- */
				$check_owner = $this->check_owner($data);
				//echo 'fafg='.$check_owner->num_rows();
				if($check_owner->num_rows() > 0){
					return false;
				}else{
					if($this->db->insert('owners', $data)) {
						$this->session->set_userdata('owner_id', $this->db->insert_id());
						return true;
					} else {
						//return false;
						echo $this->db->_error_message();
					}
				}

			}
		} else {
			return false;
		}
	}

	public function save_business($data = array()) {
	//print_r($data);
		if(!empty($data) && is_array($data)) {

				$abled_male_emp_info_estab = array();
				$abled_female_emp_info_estab = array();
				$pwd_male_emp_info_estab = array();
				$pwd_female_emp_info_estab = array();
				$abled_male_emp_info_lgu = array();
				$abled_female_emp_info_lgu = array();
				$pwd_male_emp_info_lgu = array();
				$pwd_female_emp_info_lgu = array();
				$amale_emp_name_lgu = array();

				$data_buss['owner_id'] = $this->session->userdata('owner_id');
				$data_buss['permit_number'] = $data['permit_number'];
				$data_buss['date_applied'] = $data['date_applied'];
				$data_buss['brgy_id'] = $data['brgy_id'];

				$data_buss['stall_num'] = $data['stall_num'];
				$data_buss['stall_area'] = $data['stall_area'];
				$data_buss['stall_val'] = $data['stall_val'];

				$data_buss['classification_id'] = '1';
				$data_buss['occupancy_id'] = $data['occupancy_id'];
				$data_buss['ownership_id'] = $data['ownership_id'];
				$data_buss['payment_id'] = $data['payment_id'];
				$data_buss['application_id'] = $data['application_id'];
				$data_buss['business_name'] = $data['business_name'];
				$data_buss['trade_name'] = $data['trade_name'];
				$data_buss['street_address'] = $data['street_address'];
				$data_buss['city'] = $data['city'];
				$data_buss['province'] = $data['province'];
				$data_buss['contact_number'] = $data['contact_number'];
				$data_buss['email'] = $data['email'];
				$data_buss['pin'] = $data['pin'];
				$data_buss['ctc'] = $data['ctc'];
				$data_buss['tin'] = $data['tin'];
				$data_buss['rep_bookkepr'] = $data['rep_bookkepr'];
				$data_buss['rep_bookkepr_ph_no'] = $data['rep_bookkepr_ph_no'];
    			$data_buss['indi_male_emp'] = empty($data['indi_male_emp']) ? '0' :$data['indi_male_emp'];
				$data_buss['abled_female_emp_estab'] = empty($data['abled_female_emp_estab']) ? '0' :$data['abled_female_emp_estab'];
				$data_buss['abled_male_emp_estab'] = empty($data['abled_male_emp_estab']) ? '0' : $data['abled_male_emp_estab'];
				$data_buss['pwd_male_emp_estab'] = empty($data['pwd_male_emp_estab']) ? '0' :$data['pwd_male_emp_estab'];
				$data_buss['pwd_female_emp_estab'] = empty($data['pwd_female_emp_estab']) ? '0' :$data['pwd_female_emp_estab'];
				$data_buss['abled_female_emp_lgu'] = empty($data['abled_female_emp_lgu']) ? '0' :$data['abled_female_emp_lgu'];
				$data_buss['abled_male_emp_lgu'] = empty($data['abled_male_emp_lgu']) ? '0' : $data['abled_male_emp_lgu'];
				$data_buss['indi_female_emp'] = empty($data['indi_female_emp']) ? '0' : $data['indi_female_emp'];
				$data_buss['pwd_male_emp_lgu'] = empty($data['pwd_male_emp_lgu']) ? '0' : $data['pwd_male_emp_lgu'];
				$data_buss['pwd_female_emp_lgu'] = empty($data['pwd_female_emp_lgu']) ? '0' : $data['pwd_female_emp_lgu'];
				//$data_buss['registrar_number'] = $data['registrar_number'];
				$data_buss['reference_no'] = $data['reference_no'];
				$data_buss['govt_incentive'] = isset($data['govt_incentive']) ? $data['govt_incentive'] : '0';
				$data_buss['govt_entity'] = isset($data['govt_entity']) ? $data['govt_entity'] : '';
				$data_buss['modified_at'] = date('Y-m-d', time());
				$data_buss['dti_no'] = $data['dti_no'];
				$data_buss['dti_expiration'] = $data['dti_expiration'];
				$data_buss['dti_no'] = $data['dti_no'];
				$data_buss['sec_expiration'] = $data['sec_expiration'];
				$data_buss['cda_no'] = $data['cda_no'];
				$data_buss['cda_expiration'] = $data['cda_expiration'];
				$data_buss['plate_no'] = $data['plate_no'];
				$data_buss['units_no'] = $data['units_no'];
				$data_buss['street_address2'] = $data['street_address2'];
				$data_buss['old_buss_id'] =  $data['old_buss_id'];
				$data_buss['old_permit_number'] = $data['old_permit_number'];

				/*print_r($data_buss);*/

			if(isset($data['buss_id'])) {

				$data_buss['owner_id'] = $data['owner_id'];
				//print_r($data_buss);
				/* ---------------------
				 * Update Owner's Business Details
				 * --------------------- */

				if($this->db->update('businessess', $data_buss, array('buss_id' => $data['buss_id']))){	 $this->db->last_query();
						
					$check = $this->db->get_where('summarylist', array(
						'permit_number' => $data['permit_number'],
						'old_permit_number' => $data['old_permit_number']

					));

					if($check->num_rows() > 0) { 
						
					} else {
							//for SUMMARY
							$this->db->insert('summarylist',array('permit_number'=>$data['permit_number'],'old_permit_number'=>$data_buss['old_permit_number']),'');						
					}	
					
					if($data['occupancy_id'] == 1 ){
						//rent
						//print_r($data);
						$rent['r_buss_id']=$data['buss_id'];
						$rent['rental_fee'] = $data['rental_fee'];
						$rent['leasor_tel_no'] = $data['leasor_tel_no'];
						$rent['leasor_first_name'] = $data['leasor_first_name'];
						$rent['leasor_middle_name'] = $data['leasor_middle_name'];
						$rent['leasor_last_name'] = $data['leasor_last_name'];
						$rent['r_house_no'] = $data['r_house_no'];
						$rent['street'] = $data['street'];
						$rent['r_brgy_id'] = $data['r_brgy_id'];
						$rent['subdi'] = $data['subdi'];
						$rent['city_muni'] = $data['city_muni'];
						$rent['province'] = $data['r_province'];
						$rent['email_add'] = $data['email_add'];
						$rent['emergency_info'] = $data['emergency_info'];
						//print_r($rent);

						if(!empty($data['r_buss_id'])){
							return $this->db->update('rent_info', $rent, array('id' => $data['id']));
						} else{

							return $this->db->insert('rent_info', $rent);
						}
					}
					if ($this->db->update('applications',array('application_id' =>$data['application_id']),array('app_id' => $data['app_id']))){
						return true;
						//echo $this->db->last_query();
					} else {
						return $this->db->_error_message();
					}

				return true;
				} else {
					echo $this->db->_error_message();
				}
			} else {
				/* -----------------------------
				 * Save Owner's Business Details
				 * ----------------------------- */
				$data_buss['owner_id'] = $this->session->userdata('owner_id');//echo 'ada'. $data_buss['owner_id'];
				//$this->check_permit_no($data_buss['permit_number']);
				if($this->check_permit_no($data['permit_number'])){
					return false;
				}else{

					
					if($this->db->insert('businessess', $data_buss)) {


						$this->session->set_userdata('buss_id', $this->db->insert_id());
						$this->session->set_userdata('application_id', $data['application_id']);

						//for SUMMARY
						$this->db->insert('summarylist',array('permit_number'=>$data['permit_number'],'old_permit_number'=>$data['permit_number']),'');						
						$this->db->update('businessess',array('old_buss_id'=>$this->session->userdata('buss_id'),'old_permit_number'=>$data['permit_number']), array('buss_id' => $this->session->userdata('buss_id')));
							
						
						/* -------------------
							*  Save Rent Info
							*  -------------------*/
							if($data['occupancy_id'] == '1'){
								$rent['r_buss_id'] = $this->session->userdata('buss_id');
								$rent['rental_fee'] = $data['rental_fee'];
								$rent['leasor_tel_no'] = $data['leasor_tel_no'];
								$rent['leasor_first_name'] = $data['leasor_first_name'];
								$rent['leasor_middle_name'] = $data['leasor_middle_name'];
								$rent['leasor_last_name'] = $data['leasor_last_name'];
								$rent['r_house_no'] = $data['r_house_no'];
								$rent['street'] = $data['street'];
								$rent['r_brgy_id'] = $data['r_brgy_id'];
								$rent['subdi'] = $data['subdi'];
								$rent['city_muni'] = $data['city_muni'];
								$rent['r_province'] = $data['r_province'];
								$rent['email_add'] = $data['email_add'];
								$rent['emergency_info'] = $data['emergency_info'];

							if($this->db->insert('rent_info', $rent)) {
								return true;
							} else {
								return $this->db->_error_message();
							}
							return $this->db->_error_message();
						  }
						return true;
					} else {
						return $this->db->_error_message();
					}
				}

			}
		} else {
			return $this->db->_error_message();
		}
	}

	public function save_application($owner_id, $buss_id, $data = array()) {
	//print_r($data);
		if(!empty($data) && is_array($data)) { // echo 'first if';
			if(isset($data['app_id'])) {
				/* ---------------------
				 * Update Owner's Business Details
				 * --------------------- */
				$data['requirements'] = empty($data['requirements']) ? '[]' : json_encode($data['requirements']);

				return $this->db->update('applications', $data, array(
					'app_id' => $data['app_id'],
					'owner_id' => $owner_id,
					'buss_id' => $buss_id
				)); //echo $this->db->_error_message();
			} else { //echo 'sud '.$buss_id;
				/* ---------------------
				 * Save Owner's Business Details
				 * --------------------- */

				//$data_application['application_id'] = $this->session->userdata('application_id');
				$data_application['application_id'] = $data['application_id'];
				$data_application['buss_id'] = $buss_id;
				$data_application['owner_id'] = $owner_id;
				$data_application['status'] = 'pending';
				$data_application['modified'] = '0';
				$data_application['requirements'] = isset($data['requirements']) ? json_encode($data['requirements']) : json_encode(array());
				$data_application['application_date'] = date('Y-m-d', time());
						//print_r($data_application);

				if($this->db->insert('applications', $data_application)) {
					$this->session->set_userdata('app_id', $this->db->insert_id());
					//echo $this->db->_error_message();

					/*-----------------------
					* Saving business lines
					*------------------------*/

					$buss_line_data['app_id']  = $this->session->userdata('app_id');
					$buss_line_data['bl_buss_id'] = $buss_id;
					$buss_line_data['buss_nature_id'] = $data['buss_nature_id'];
					$buss_line_data['requirements'] = isset($data['requirements']) ? $data['requirements'] : '' ;
					$buss_line_data['capital'] = $data['capital'];
					$buss_line_data['gross'] = '[]';
					$buss_line_data['modified'] = '0';
					$buss_line_data['delinquent'] = '0';
						if(!empty($data['kg'])){
							$buss_line_data['unit'] = 'kg';
							$buss_line_data['quantity'] = $data['kg'];
						}else if(!empty($data['l'])){
							$buss_line_data['unit'] = 'l';
							$buss_line_data['quantity'] = $data['l'];
						}elseif (!empty($data['m'])) {
							$buss_line_data['unit'] = 'm';
							$buss_line_data['quantity'] = $data['m'];
						}
					//	print_r($buss_line_data);
						if($this->add_business_line($buss_line_data)){
								return true;
							//echo $this->db->_error_message();
						} else {
								//echo $this->db->_error_message();
								return false;
							}
				//echo $this->db->_error_message();
				 return true;
				} else {
					//echo $this->db->_error_message();
					return false;
				}
			}
		} else {
			return false;
			//echo $this->db->_error_message();
		}
	}

	public function add_business_line($data = array()) { //print_r($data);
		if(is_array($data)) {

			if(strpos($data['delinquent'], 'Delinquent') !== false){

				$check = $this->db->get_where('business_line', array(
					'app_id' => $data['app_id'],
					'bl_buss_id' => $data['bl_buss_id'],
					'buss_nature_id' => $data['buss_nature_id'],
					'delinquent_year' => $data['delinquent_year']
	
				));

				if($check->num_rows() > 0) { //echo 'naa sud ang check';
					return "You have already added this nature";
				} else {
					$data['requirements'] = isset($data['requirements']) ? json_encode($data['requirements']) : json_encode(array());
					$data['gross']  = '[]';
					$data['modified']	 = '0';
					$data['bl_buss_id'] = $data['bl_buss_id'];
					//$data['quantity'] = $data['quantity'];
					unset($data['buss_id']); //print_r($data);
					unset($data['kg']);
					unset($data['m']);
					unset($data['l']);
					unset($data['delinquent']);
					//print_r($data);
	
					if($this->db->insert('business_line', $data)) {
						return true;
						//echo 'na insert bl'.$this->db->_error_message();
					} else {
						echo $this->db->last_query();
						//return false;
					}
					return true;
				}

			}else{

				$check = $this->db->get_where('business_line', array(
					'app_id' => $data['app_id'],
					'bl_buss_id' => $data['bl_buss_id'],
					'buss_nature_id' => $data['buss_nature_id']
	
				));

				if($check->num_rows() > 0) { //echo 'naa sud ang check';
					return "You have already added this nature";
				} else {
					$data['requirements'] = isset($data['requirements']) ? json_encode($data['requirements']) : json_encode(array());
					$data['gross']  = '[]';
					$data['modified']	 = '0';
					$data['bl_buss_id'] = $data['bl_buss_id'];
					//$data['quantity'] = $data['quantity'];
					unset($data['buss_id']); //print_r($data);
					unset($data['kg']);
					unset($data['m']);
					unset($data['l']);
					unset($data['delinquent']);
					//print_r($data);
					if($this->db->insert('business_line', $data)) {
						return true;
						//echo 'na insert bl'.$this->db->_error_message();
					} else {
						echo $this->db->last_query();
						//return false;
					}
					return true;
				}
			} // end of delinquent
			
	
		} else {
			return false;
			//echo $this->db->_error_message();
		}
	}


	public function update_business_line($data = array()) { 
		//$data['gross'] = is_numeric($data['gross']) ? $data['gross'] :  '[]';
		$data['requirements'] = isset($data['requirements']) ? json_encode($data['requirements']) : json_encode(array());
		if(is_array($data)) {

			$check = $this->db->get_where('business_line', array(
					'app_id' => $data['app_id'],
					'buss_nature_id' => $data['buss_nature_id']
				));

			/********************************
			* Check if there's an addt'l reqt
			********************************/

			if(!empty($data['requirements'])){
				$app_data['requirements'] = isset($data['requirements']) ? json_encode($data['requirements']) : json_encode(array());
			}

				//$app_data = array('application_date' =>$data['application_date']);

				$app_data = array();

				if($check->num_rows() > 0 && $data['application_id'] =='2') {
					$new_gross=array();
					$check=$check->result();
					$get_gross = json_decode($check[0]->gross,true);

						foreach($get_gross as $row){

							if (!empty($row['gross']) && !empty($row['year'])){
							$key = array_search($data['year'],$row);
								if($key){
									$updated_gross = array('gross' =>$data['gross'],'year' =>$data['year']);
									array_push($new_gross,$updated_gross);
								} else {
									$new_gross[] = array('gross' =>$row['gross'],'year' =>$row['year']);
								}
							} else {
								$new_gross[''] = '0.00';
							}
						}
						$data['gross'] = json_encode($new_gross);
				}
				unset($data['application_id']);

				if (isset($data['year'])) { unset($data['year']);}

					if ( $this->db->update('applications', $app_data, array('app_id' => $data['app_id']))){ echo 'hello';
						unset($data['application_date']);
						$data['modified']='1';//print_r($data['requirements']);
						$data['requirements'] = empty($data['requirements']) ? "" : json_encode($data['requirements']);

							if ($this->db->update('business_line', $data, array('bus_line_id' => $data['bus_line_id']))){ //print_r($data);
								return true;
								//echo  $this->db->_error_message();
							} else { //print_r($data);
								return false;
								//echo  $this->db->_error_message();
							}

					} else { //print_r($data);
						  //echo 'capital='.$data['capital'];
							if ($this->db->update('business_line',$data,array('bus_line_id' =>$data['bus_line_id']))) return true;//echo $this->db->last_query();
								else  return false;
					}
		}
	}
	public function get_owner($owner_id = null,$buss_id = null) {
		if(!is_null($owner_id)) {
			/* return $this->db->get_where('owners', array(
				'owner_id' => $owner_id
			)); */
		return $this->db->select('o.owner_id,o.brgy_id,o.firstname,o.middlename,o.lastname,o.permitee,b.closed')
						->select('o.house_no_bldg_name,o.remarks')
						->select('o.o_subdivision_street,o.o_province,o.email,o.gender,o.contact_number,b.ownership_id')
						->from('owners o')
						->join('businessess b','o.owner_id=b.owner_id','inner')
						->where(array ('b.owner_id' =>$owner_id,
									   'b.buss_id' =>$buss_id))
						->get();
						//echo $this->db->_error_message();
						//echo $this->db->last_query();
		} else {
			echo $this->db->_error_message();
		}
	}

	public function get_owner2($owner_id = null) {
		if(!is_null($owner_id)) {
			return $this->db->get_where('owners', array(
				'owner_id' => $owner_id
			));

		} else {
			return false;
		}
	}


	public function get_taxpayer_info ($owner_id = null ,$buss_id = null, $app_id = null){
	$cond=1;
	$get_application_id = $this->db
						  ->select('a.application_id')
						  ->from('applications a')
						  ->where('app_id',$app_id)
						  ->get(); //echo $this->db->last_query();
	$get_application_id = $get_application_id->result();
	$is_renewed = $this->db->select('r.date_renewed')
						->from('renews r')
						->where('r.app_id',$app_id)
						->or_like('r.date_renewed',date('Y',strtotime("now")))
						->get();

		if( (!is_null($owner_id)) && (!is_null($buss_id))  && (!is_null($app_id)) ) {

			if($get_application_id[0]->application_id == 1){ //echo 'first if';

				$info = $this->db
				->distinct()
    			->select('o.firstname,o.middlename,o.lastname')
    			->select('b.business_name,br.brgy')
				->select('a.status,a.application_id,a.application_date')
				->select('pt.types')
				->select('bl.capital,bl.gross,bl.app_id,bl.bus_line_id,bl.percentage')
				->select('bn.business_nature, bn.buss_nature_id')
				->select('r.date_renewed')
				->select('assess.status assess_status')
				->from('owners o')
				->join('businessess b', 'o.owner_id=b.owner_id', 'inner')
				->join('brgys br','b.brgy_id=br.brgy_id','inner')
				->join('applications a', 'o.owner_id=a.owner_id AND b.buss_id=a.buss_id', 'inner')
				->join('business_line bl', 'b.buss_id=bl.bl_buss_id AND b.buss_id=bl.bl_buss_id', 'inner')
				->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
				->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
				->join('assessments assess','assess.app_id=a.app_id','left')
				->join('renews r','a.app_id=r.app_id','left')
				->where( array ('bl.app_id'  => $app_id,
								'o.owner_id' => $owner_id,
								'b.buss_id'	 => $buss_id,
								'a.application_id' => $get_application_id[0]->application_id
				))
				->get();

			} else { //echo 'else';

				if($is_renewed->num_rows() > 0){ //renewed this year
					// echo 'd';
					$info = $this->db
								->distinct()
								->select('o.firstname,o.middlename,o.lastname')
								->select('b.business_name,br.brgy')
								->select('a.status,a.application_id,a.application_date')
								->select('pt.types')
								->select('bl.capital,bl.gross,bl.app_id,bl.bus_line_id,bl.percentage')
								->select('bn.business_nature, bn.buss_nature_id')
								->select('r.date_renewed')
								->select('assess.status assess_status')
								->from('owners o')
								->join('businessess b', 'o.owner_id=b.owner_id', 'inner')
								->join('brgys br','b.brgy_id=br.brgy_id','inner')
								->join('applications a', 'o.owner_id=a.owner_id AND b.buss_id=a.buss_id', 'inner')
								->join('business_line bl', 'b.buss_id=bl.bl_buss_id AND b.buss_id=bl.bl_buss_id', 'inner')
								->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
								->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
								->join('assessments assess','assess.app_id=a.app_id','left')
								->join('renews r','a.app_id=r.app_id','left')
								->where( array ('bl.app_id'  => $app_id,
												'o.owner_id' => $owner_id,
												'b.buss_id'	 => $buss_id,
												'a.application_id' => $get_application_id[0]->application_id
												))
								->or_like('r.date_renewed',date('Y',strtotime("now")))
								->get();
				} else { //echo 'else';
					$is_renewed_last_year =$this->db->select('r.date_renewed')
												->from('renews r')
												->where('r.app_id',$app_id)
												->or_like('r.date_renewed',date('Y',strtotime("now"))-1)
												->get();

					if($is_renewed->num_rows() > 0){
						echo //'inner if';
							$info = $this->db
										->distinct()
										->select('o.firstname,o.middlename,o.lastname')
										->select('b.business_name,br.brgy')
										->select('a.status,a.application_id,a.application_date')
										->select('pt.types')
										->select('bl.capital,bl.gross,bl.app_id,bl.bus_line_id,bl.percentage')
										->select('bn.business_nature, bn.buss_nature_id')
										->select('r.date_renewed')
										->select('assess.status assess_status')
										->from('owners o')
										->join('businessess b', 'o.owner_id=b.owner_id', 'inner')
										->join('brgys br','b.brgy_id=br.brgy_id','inner')
										->join('applications a', 'o.owner_id=a.owner_id AND b.buss_id=a.buss_id', 'inner')
										->join('business_line bl', 'b.buss_id=bl.bl_buss_id AND b.buss_id=bl.bl_buss_id', 'inner')
										->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
										->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
										->join('assessments assess','assess.app_id=a.app_id','left')
										->join('renews r','a.app_id=r.app_id','left')
										->where( array ('bl.app_id'  => $app_id,
														'o.owner_id' => $owner_id,
														'b.buss_id'	 => $buss_id,
														'a.application_id' => $get_application_id[0]->application_id
														))
										//->where($cond)
										->or_like('r.date_renewed',date('Y',strtotime("now"))-1)
										->get(); //uncomment on 5/26/17
					}else{ //echo 'inner else';
							$info = $this->db
										->distinct()
										->select('o.firstname,o.middlename,o.lastname')
										->select('b.business_name,br.brgy')
										->select('a.status,a.application_id,a.application_date')
										->select('pt.types')
										->select('bl.capital,bl.gross,bl.app_id,bl.bus_line_id,bl.percentage')
										->select('bn.business_nature, bn.buss_nature_id')
										->select('r.date_renewed')
										->select('assess.status assess_status')
										->from('owners o')
										->join('businessess b', 'o.owner_id=b.owner_id', 'inner')
										->join('brgys br','b.brgy_id=br.brgy_id','inner')
										->join('applications a', 'o.owner_id=a.owner_id AND b.buss_id=a.buss_id', 'inner')
										->join('business_line bl', 'b.buss_id=bl.bl_buss_id', 'inner')
										->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
										->join('payment_type pt', 'b.payment_id=pt.payment_id', 'inner')
										->join('assessments assess','assess.app_id=a.app_id','left')
										->join('renews r','a.app_id=r.app_id','left')
										->where( array ('bl.app_id'  => $app_id,
														'o.owner_id' => $owner_id,
														'b.buss_id'	 => $buss_id,
														'a.application_id' => $get_application_id[0]->application_id
														))
										//->where($cond)
										//->or_like('r.date_renewed',date('Y',strtotime("now"))-1)
										->get(); //uncomment on 5/26/17
					}


				}
			}
			//echo $this->db->last_query();
			if($info->num_rows() > 0) {
				$result = $info->result();
				$add_req = $this->db->get('additional_requirements');

				return array(
					'taxpayer_info'  => $result,
					'addtional_reqt' => $add_req->result(),
					'app_id' => $app_id
				);
			} else {
				return false;

			}

		} else {
			 return false;
		}
	}

	public function renew_status($bus_line_id){
		  /*$status = $this->db->get_where('business_line', array('bus_line_id' => $bus_line_id));
		  //echo $this->db->last_query();
		  return $status->result();*/
		  return $this->db->select('*')
		  		->from('business_line')
		  		->where('bus_line_id',$bus_line_id)
		  		->get()->result();
	}

	public function save_renew($data) {
		$apps = $this->db->get_where('applications', array('app_id' => $data['app_id']));
		if($apps->num_rows() > 0) {
			$app = $apps->row();
			$data['requirements'] = isset($data['requirements']) ? json_encode($data['requirements']) : json_encode(array());
			$item = array(
				'application_id' => 2,
				'status' => 'renewed',
				'requirements' =>$data['requirements']
			);
			if($this->db->update('application', $item, array('app_id' => $data['app_id']))) {
				$bussiness = $this->db->get_where('business_line', array(
					'buss_nature_id' => $data['buss_nature_id'],
					'app_id' => $data['app_id']
				));

				if($business->num_rows() > 0) {

				}
			} else{
				echo 'dri'.$this->db->_error_message();
			}
		} else {
			//return false;
			echo $this->db->_error_message();
		}
	}

	public function get_business_nature($appID = null) {

		$nature_req = array();
		if(!is_null($appID)) {

		$get_application_id = $this->db
						  ->select('a.application_id')
						  ->from('applications a')
						  ->where('app_id',$appID)
						  ->get();
		//echo $this->db->last_query();
		$get_application_id = $get_application_id->result();

    		$nature = $this->db
				->distinct()
    			->select('bl.bus_line_id, bl.app_id,bl.bl_buss_id, bl.capital, bl.gross,a.modified')
    			->select('a.application_id,a.application_date')
    			->select('bn.buss_nature_id, bn.business_nature, bn.requirements, bl.delinquent_year')
    			->from('business_line bl')
    			->join('business_nature bn', 'bl.buss_nature_id=bn.buss_nature_id', 'inner')
    			->join('applications a', 'bl.app_id=a.app_id', 'inner')
    			->where( array ('bl.app_id' => $appID,
								'a.application_id' => $get_application_id[0]->application_id))
    			->get();


			//echo $this->db->last_query();

			$req = array();
			$i = 0;
			if($nature->num_rows() > 0) {
				$nature = $nature->result();
			foreach($nature as $n){
				$requirements = (array)json_decode($n->requirements);

				// Get Missing Requirements
					foreach ($requirements as $item) {
						$req = $this->db
							->select('r.description,r.requirement_id')
							->from('requirements r')
							->where('requirement_id', $item)
							->get();

						if($req->num_rows() > 0) {
							$r = $req->row();
							$nature_req[$i]['description'] = $r->description;
							$nature_req[$i]['requirement_id'] =	$r->requirement_id;
						} else {
							//do nothing
						}
						$i++;
					}
			}
				return array(
						'nature' => $nature,
						'requirements' => $nature_req
					);
			} else {
				return false;
				//echo 'wa sud';
			}
		}
	}
	public function get_business($buss_id = null){
		if(!is_null($buss_id)){
			/* return $this->db->get_where('businessess', array(
				'buss_id' => $buss_id
			)); */
		    return $this->db->select('a.app_id,b.buss_id,b.owner_id,b.permit_number,b.application_id,b.ownership_id,b.date_applied')
				 ->select('b.classification_id,b.occupancy_id,b.payment_id,b.brgy_id,b.business_name,b.rep_bookkepr,b.rep_bookkepr_ph_no')
				 ->select('b.house_no,b.city,b.plate_no,b.province,b.street_address2,b.old_buss_id,b.old_permit_number,b.units_no')
				 ->select('b.trade_name,b.business_area,b.contact_number,b.stall_num,b.stall_area,b.stall_val')
				 ->select('b.reference_no,b.govt_incentive,b.govt_entity')
				 ->select('b.abled_female_emp_estab,b.pwd_male_emp_estab,b.pwd_female_emp_estab,b.pwd_male_emp_estab,b.abled_male_emp_estab')
				 ->select('b.pwd_male_emp_lgu,b.pwd_female_emp_lgu,b.abled_male_emp_lgu,b.abled_female_emp_lgu')
				 ->select('b.abled_male_emp_info_estab,b.abled_female_emp_info_estab,b.pwd_male_emp_info_estab,b.pwd_female_emp_info_estab')
				 ->select('b.pwd_male_emp_info_lgu,b.pwd_female_emp_info_lgu,b.abled_male_emp_info_lgu,b.abled_female_emp_info_lgu')
				 ->select('b.email,b.ctc,b.tin,b.pin,b.street_address')
				 ->select('b.dti_no,b.sec_no,b.cda_no,b.dti_expiration,b.sec_expiration,b.cda_expiration')
				 ->select('r.id,r.r_buss_id,r.r_brgy_id,r.rental_fee,r.leasor_tel_no,r.leasor_first_name,r.leasor_middle_name,r.leasor_last_name')
				 ->select('r.email_add')
				 ->select('assess.assessment_id')
				 ->from('businessess b')
				 ->join('applications a','b.buss_id=a.buss_id','left')
				 ->join('assessments assess','a.app_id=assess.app_id','left')
				 ->join('rent_info r','r.r_buss_id=b.buss_id','left')
				 ->where('b.buss_id' ,$buss_id)
				 ->get();
				// echo $this->db->_error_message();
			//echo $this->db->last_query();
		} else {
			echo $this->db->_error_message();
		}
	}

	public function application($owner_id = null,$buss_id = null) {
		if(!is_null($owner_id) && !is_null($buss_id)) {
			return $this->db
				->select('b.buss_id, b.business_name, b.trade_name,b.application_id')
				->select('o.owner_id, o.firstname, o.middlename, o.lastname,o.permitee')
				->from('businessess b')
				->join('owners o', 'b.owner_id=o.owner_id')
				->where( array ('o.owner_id' => $this->session->userdata('owner_id'),
								'b.buss_id' => $this->session->userdata('buss_id')))
				->get();
		} else {
			return false;
		}
	}

	public function edit_gross_buss_nature($app_id,$capital){

		if(isset($appid) && isset($capital)){
			$this->db->update('applications', $capital, array(
							'app_id' => $app_id
						));
		} else {
			return false;
		}
	}

	public function search($search = null, $table = '') {
		if(!is_null($search)) {
			$terms = explode(' ', $search);
			if($table === 'owners') {
				return  $this->db
					->or_where_in('firstname ', $search)
					->or_where_in('middlename', $search)
					->or_where_in('lastname', $search)
					->or_where_in('permitee', $search)
					->get($table);
					echo $this->db->last_query();
			} elseif($table === 'businessess') {
				return $this->db
					->select('b.buss_id, o.owner_id, b.business_name, b.trade_name,b.application_id')
					->from($table.' b')
					->join('owners o', 'b.owner_id=o.owner_id')
					->where('o.owner_id', $this->session->userdata('owner_id'))
					->like('b.business_name', $search)
					// ->or_like('trade_name', $search)
					->get();
					 //echo $this->db->last_query();
			} else {
				// echo 'wrong table';
				return false;
			}
		} else {
			// echo 'no search';
			return false;
		}

		// echo '<pre>'; print_r($result->result()); echo '</pre>';
		 echo $this->db->last_query();
	}

	public function assess($owner_id = null,$buss_id = null){
		if(!is_null($buss_id)){
			return $this->db->get_where('businessess', array(
				'buss_id' => $buss_id
				));
			} else {
				return false;
			}

	}

	public function save_payment($data = array()) {

		if(!empty($data) && is_array($data)) {
		    if ($data['payment_mode_id'] == '1'){
				$cash = array();
				$cash['application_id'] = $data['application_id'];
				$cash['payment_or_no'] = $data['payment_or_no'];
				$cash['amount'] = $data['amount'];
				$cash['cash_rendered'] = $data['cash_rendered'];
				$cash['tfos'] = $data['tfo'];
				$cash['date_paid'] = date('Y-m-d', time());

				/*for inserting data into payment table*/
				$info = array();
				$info['app_id'] = $data['application_id'];
				$info['payment_mode'] = $data['payment_mode_id'];
				$info['date_paid'] = $cash['date_paid'];

				$payment_mode = $this->db->insert('payment',$info);

				if($this->db->insert('payment_mode_cash', $cash)) {
					$business_status = array('payment_status' => '1');
					$this->db->update('businessess', $business_status, array('buss_id' => $data['buss_id']));
					return true;
				} else {
						return false;
					}

			} else {

			$checque = array();
			$checque['application_id'] = $data['application_id'];
			$checque['tfos'] = $data['tfo'];
			$checque['checque_no'] = $data['checque_no'];
			$checque['bank_name'] = $data['bank_name'];
			$checque['amount_to_pay'] = $data['amount_to_pay'];
			$checque['checque_amount'] = $data['checque_amount'];
			$checque['checque_status'] = '2';
			$checque['date_checque_issued'] = $data['date_issued'];
			$checque['date_received'] = date('Y-m-d', time());

			/*for inserting data into payment table*/
			$info = array();
			$info['app_id'] = $data['application_id'];
			$info['payment_mode'] = $data['payment_mode_id'];
			$info['date_paid'] = $checque['date_received'];

			$payment_mode = $this->db->insert('payment',$info);

				if($this->db->insert('payment_mode_checque', $checque)) {
					$business_status = array('payment_status' => '1');
					$this->db->update('businessess', $business_status, array('buss_id' => $data['buss_id']));
					return true;
				} else {
					 return false;
				}
			}
		} else {
			 return false;
		}
	}

	public function delete_business($app_id = null, $bus_line_id = null, $buss_id){

		if($this->db->delete('business_line', array('bus_line_id' => $bus_line_id))) {
			if($this->db->delete('applications', array('app_id' =>$app_id))) {
				if($this->db->delete('businessess', array('buss_id' =>$buss_id))) {
					return true;
				}else {
					echo $this->db->last_query();
				}
			} else {
				echo $this->db->last_query();
			}
		} else {
			echo $this->db->_error_message();
		}
	}

	public function save_photo($path = array(), $permit_no = null, $data = array(), $buss_id = null){
		 var_dump('datas '.$path);
		if(!is_null($permit_no)){
			$this->db->update('businessess',array('image' =>$path),array('buss_id' => $data));
		}
		else{
			echo $this->db->_error_message();
		}
	}

	
	public function save_photo1($path = array(), $permit_no = null, $data = array(), $buss_id = null){
	
		if(!is_null($permit_no)){
			$this->db->update('businessess',array('image1' =>$path),array('buss_id' => $data));
		}
		else{
			echo $this->db->_error_message();
		}
	}

	public function save_photo2($path = array(), $permit_no = null, $data = array(), $buss_id = null){
	
		if(!is_null($permit_no)){
			$this->db->update('businessess',array('image2' =>$path),array('buss_id' => $data));
		}
		else{
			echo $this->db->_error_message();
		}
	}
	public function save_photo3($path = array(), $permit_no = null, $data = array(), $buss_id = null){
		
			if(!is_null($permit_no)){
				$this->db->update('businessess',array('image3' =>$path),array('buss_id' => $data));
			}
			else{
				echo $this->db->_error_message();
			}
		}
	public function save_photo4($path = array(), $permit_no = null, $data = array(), $buss_id = null){
	
		if(!is_null($permit_no)){
			$this->db->update('businessess',array('image4' =>$path),array('buss_id' => $data));
		}
		else{
			echo $this->db->_error_message();
		}
	}
		

	public function delete_business_nature($appid = null, $natureid = null, $delinquentyear = null){

		if(!is_null($appid) && !is_null($natureid)){
			return ($this->db->delete('business_line',array('app_id' =>$appid,'buss_nature_id' =>$natureid,'delinquent_year' =>$delinquentyear)));
			 //echo $this->db->_error_message();
		}else {
			return 'An error has occured';
		}
	}
	public function check_permit_no($permit_no = null){

		$result = $this->db->distinct()
			->select('b.buss_id')
			->from('businessess b')
			->where(array('permit_number' =>$permit_no))
			->get();
			//echo $this->db->_error_message();
			if($result->num_rows()){
				return 1;
			} else{
				return 0;
			}
	}

	public function check_owner($data = array()){

		return  $this->db->distinct()
												->select('o.owner_id')
												->from('owners o')
												->where(array('firstname' =>$data['firstname'],
																 'lastname' =>$data['lastname']))
												->get();

	}


	public function retire_now($data = array()) { //echo $data['brgy_id'];
		// print_r($data);
		if(!empty($data) && is_array($data)) {
			
			
			if($data['gross_count'] == 1)
			{
				$data1['gross']=$data['gross1'];
			}
			else if($data['gross_count'] == 2)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'];
			}
			elseif($data['gross_count'] == 3)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'];
			}
			elseif($data['gross_count'] == 4)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'].','.$data['gross4'];
			}
			elseif($data['gross_count'] == 5)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'].','.$data['gross4'].','.$data['gross5'];
			}
			elseif($data['gross_count'] == 6)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'].','.$data['gross4'].','.$data['gross5'].','.$data['gross6'];
			}
			elseif($data['gross_count'] == 7)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'].','.$data['gross4'].','.$data['gross5'].','.$data['gross6'].','.$data['gross7'];
			}
			elseif($data['gross_count'] == 8)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'].','.$data['gross4'].','.$data['gross5'].','.$data['gross6'].','.$data['gross7'].','.$data['gross8'];
			}
			elseif($data['gross_count'] == 9)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'].','.$data['gross4'].','.$data['gross5'].','.$data['gross6'].','.$data['gross7'].','.$data['gross8'].','.$data['gross9'];
			}
			elseif($data['gross_count'] == 10)
			{
				$data1['gross']=$data['gross1'].','.$data['gross2'].','.$data['gross3'].','.$data['gross4'].','.$data['gross5'].','.$data['gross6'].','.$data['gross7'].','.$data['gross8'].','.$data['gross9'].','.$data['gross10'];
			}

			
			$data1['buss_id']=$data['buss_id'];
			$data1['owner_name']=$data['owner_name'];
			$data1['business_name']=$data['business_name'];
			$data1['business_address']=$data['business_address'];
			$data1['stall_no']=$data['stall_no'];
			$data1['nature_retired']=$data['nature_retired'];
			$data1['typeof_retire']=$data['typeof_retire'];
			$data1['permit_no']=$data['permit_no'];
			$data1['employees']=$data['employees'];
			$data1['date_filed']=$data['date_filed'];
			// print_r($data1);
			
			$check = $this->db->select('buss_id')->from('retirement')->where('buss_id',$data1['buss_id'])->get();

			if($check->num_rows()>0){
				
			} else{
				if($this->db->insert('retirement',$data1)){
					if($data['typeof_retire']==1){
						$this->db->update('businessess',array('closed'=>1),array('buss_id'=>$data1['buss_id']));
					}else if($data['typeof_retire']==2){
						$this->db->update('businessess',array('closed'=>2),array('buss_id'=>$data1['buss_id']));
					}
					
					return true;
				} else{
					return false;
				}
			}
			
			
			
		}else{
			echo $this->db->_error_message();
		}
	}
}
