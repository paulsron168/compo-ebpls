<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reference_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_tfo_amt($tfo_ID)
	{
		$ftoamt =  $this->db
			->select('amount')
			->from('jcit_tfo')
			->where('tfo_id', $tfo_ID)
			->get()->result();
		foreach($ftoamt as $amt)
		{
			$amount = $amt->amount;
		}

		return array(
			'amount' =>  $amount
		);
		
	}
	/* -------------------
	 * Saving Requirements
	 * ------------------- */
	public function saveRequirements($data = array()) { //print_r($data);
		if(is_array($data)) {
			//$data['application_id'] = '1';
			$requirements = $this->db->get_where('requirements', array('description' => ucfirst($data['description'])));
			if($requirements->num_rows() > 0) {
				return false;
			} else {
				if(isset($data['requirement_id'])) {
					return $this->db->update('requirements', $data, array('requirement_id' => $data['requirement_id']));
				} else {
					return $this->db->insert('requirements', $data);
				}
			}
		} else {
			echo 'data is not an array<br />';
		}
	}

	/* -------------------
	 * Saving Surcharge
	 * ------------------- */

	public function saveSurcharge($data = array()) {
		 if(is_array($data)) {
			if(isset($data['surcharge_id'])) {
				return $this->db->update('surcharge', $data, array('surcharge_id' => $data['surcharge_id']));
			} else {
				return $this->db->insert('surcharge', $data);
			}
		} else {
			return false;
		}
	}


	public function save_nature($data = array()) {
		if(is_array($data)) {

			if($data['buss_nature_id'] == 0){
				$buss_nature_id = $this->db
							  ->select('MAX(buss_nature_id) as maz')
							  ->from('business_nature')
							  ->get()
							  ->result();
				$array = (array) $buss_nature_id[0]	;
				$data['buss_nature_id'] = $array['maz'] + 1;
				//print_r($data);
				if($this->db->insert('business_nature', $data)){

					if($data['application_id'] == '1'){
						$buss_data['application_id'] = 2;
						$buss_data['buss_nature_id'] = $data['buss_nature_id'];
						$buss_data['business_nature'] = $data['business_nature'];
						if ($this->db->insert('business_nature',$buss_data)){
							return true;
							// echo $this->db->last_query();
						}else{ return false; }
					}
				}

			}else{
				$exs = $this->db->get_where('business_nature',array('buss_nature_id'=>$data['buss_nature_id']));
				$ex = $this->db->get_where('business_nature', array('buss_nature_id'=>$data['buss_nature_id'], 'application_id'=>$data['application_id']));
				if($ex->num_rows() > 0){
					return 100;
				}else{
					$exs = $exs->result();
					$data['business_nature'] = $exs[0]->business_nature;
					//print_r($data);
					//return $this->db->insert('business_nature', $data);
				}
			}
		} else {
			return false;
		}
	}

	public function get_barangays() {
		return $this->db->get('brgys');
	}

	public function get_duedate() {
		return $this->db->get('settings');
	}

	public function get_signatory() {
		return $this->db->get('signatory');
	}
	public function save_barangay($data = array()) {
		 if(is_array($data) && !empty($data)) {
			if(isset($data['brgy_id'])) {
				return $this->db->update('brgys', $data, array('brgy_id' => $data['brgy_id']));
			} else {
				return $this->db->insert('brgys', $data);
			}
		} else {
			return false;
		}
	}

	public function save_requirements($data = array()) {
		if(!empty($data)) {
			$req = $this->db->get_where('requirements', array(
				'description' => ucfirst($data['description'])
			));

			if($req->num_rows() > 0) {
				///echo 'found something';
				return false;
			} else {
				$requirements = array();
				if(!empty($data['requirements'])) {
					// Loop through the requirements
					foreach ($data['requirements'] as $item) {
						$nature = $this->db->select('requirements')->where('buss_nature_id', $item)->get('business_nature');

						if($nature->num_rows() > 0) {
							$req = $nature->row();

							if(empty($req->requirements)) {
								// If there are no requirements yet then add it

							} else {
								// If there are requirements, append the requirements

							}
							// $this->db->update('business_nature', array('requirements' => ''), array('buss_nature_id' => $item));
							foreach ($req as $r) {
								echo $r."\r\n";
							}
						} else {
							//echo 'No record';
							// business nature does not exist
							 return false;
						}
					}
				} else {
					//echo 'not here';
				}
			}
		} else {
			echo 'test';
			return false;
		}
	}

	public function get_business_nature($buss_id = null,$buss_applid = null) {
		//return $this->db->get('buss_nature_id,business_nature');
		if(!is_null($buss_id)){
			return $this->db->get_where('business_nature', array(
					'buss_nature_id' => $buss_id,
					'application_id' => $buss_applid
				));

		} else {
			return false;
		}
	}

	public function get_barangay($brgy_id = null){
		if(!is_null($brgy_id)){
				/*return $this->db->get_where('brgys', array(
					'brgy_id' => $brgy_id
				));	*/
				return $this->db
				->select('*')
				->from('brgys')
				->where('brgy_id',$brgy_id)
				->get();
		} else {
			return false;
		}

	}

	public function get_duedate2($sett_id= array()) {
		if(!is_null($sett_id)){
			return $this->db
			 ->select('setting_id, field, value, created_at')
			 ->from('settings')
			 ->where('setting_id',$sett_id)
			 ->get();
		} else {
			return false;
		}
	}

	public function display_nature() {
		return $this->db->select('application_id,buss_nature_id,business_nature,psic')
				//  ->where('buss_nature_id !=0')
				  ->order_by('business_nature','ASC') //echo $this->db->last_query();
				  ->get('business_nature');

	}

	public function get_require_tfo($natureID) {
		return $this->db
			->select('bn.business_nature')
			->select('t.tfo, t.amount, t.indicator, t.type tfo_type')
			->select('rt.type, rt.value')
			->select('at.types app_type')
			->from('required_tfo rt')
			->join('tfo t', 'rt.tfo_id=t.tfo_id', 'inner')
			->join('application_type at', 'rt.application_id=at.application_id', 'inner')
			->join('business_nature bn', 'rt.buss_nature_id=bn.buss_nature_id')
			->where('rt.buss_nature_id', $natureID)
			->get();
	}

	public function get_requirements() {
		return $this->db
			->select('requirement_id id, description')
			->get('requirements');
		//echo $this->db->last_query();
	}

	public function get_requirements_by_nature($nature_id) {
		return $this->db
			->select('requirements')
			->from('business_nature')
			->where('buss_nature_id',$nature_id)
			->get();
	}

	//added by girlie
	public function get_req_description($req_id= array()) {
		// return $this->db
		// 	->select('requirement_id id, description')
		// 	->get('requirements');
		if(!is_null($req_id)){
			return $this->db
			 ->select('requirement_id, description')
			 ->from('requirements')
			 ->where('requirement_id',$req_id)
			 ->get();
		} else {
			return false;
		}
	}
	// public function get_requirements($requirement_id = null) {
	// 	if(!is_null($requirement_id)) {
	// 		$this->db->where('requirement_id', $requirement_id);
	// 	}
	// 	return $this->db
	// 		->select('r.requirement_id, r.description, p.permit_id, p.types')
	// 		->from('requirements r')
	// 		->join('permit_type p', 'r.permit_id=p.permit_id', 'inner')
	// 		->get();
	// }

	public function remove_requirements($requirement_id = null, $nature_id = null) {
	$new_requirement = array();
		if(!is_null($requirement_id) && !is_null($nature_id)) {
		$get_requirement = $this->get_requirements_by_nature($nature_id)->row();
		$get_requirement = str_replace('[','',$get_requirement->requirements);
		$get_requirement = str_replace(']','',$get_requirement);
		$get_requirement = explode(',',$get_requirement);
			foreach ($get_requirement as $key =>$value){

				if($requirement_id == $value){
				unset($get_requirement[$key]);
				} else {
					array_push($new_requirement,(int)$value);
				}
			}
			return $this->db->update('business_nature', array('requirements' => json_encode($new_requirement)), array('buss_nature_id' => $nature_id));
			//return $this->db->delete('requirements', array('requirement_id' => $requirement_id));
			//echo $this->db->last_query();
		} else {
			return false;
			//echo $this->db->last_query();
		}
	}

	public function remove_gen_requirements($requirement_id = null) {
	$new_requirement = array();
		if(!is_null($requirement_id)) {
			return $this->db->delete('requirements', array('requirement_id' => $requirement_id));
			//echo $this->db->last_query();
		} else {
			return false;
			//echo $this->db->last_query();
		}
	}

	// Common functions
	/* public function get_types($type = null, $isType = false, $field = '', $order_by = '') {
		if(!is_null($type)) {
			if($isType && !empty($field)) {
				return $this->get($type, $field, null, $order_by)->result();
			} else {
				return $this->get($type.'_type', $type.'_id, types', null, $type.'_id')->result();
			}
		} else {
			return new stdClass();
		}
	} */
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

	// Common functions
	private function get($table = '', $fields = '*', $where = null, $order_by = 'ID', $order = 'ASC') {
		$this->db
			->select($fields)
			->from($table);

		if(!is_null($where)) {
			$this->db->where($where);
		}
		//echo $this->db->last_query();
		 return $this->db->order_by($order_by, $order)
			->get();
	}

	/*--------------------------
	* for adding new tfo
	*----------------------------*/

	public function get_tfo(){
		return $this->db
			 ->select('b.tfo_id,b.payment_id ,b.tfo,b.all,b.type, b.amount, a.types, c.tfotype')
			 ->from('tfo b')
			 ->join('payment_type a', 'b.payment_id=a.payment_id', 'inner')
			 ->join('tfotype c', 'b.type=c.type_id','inner')
			 ->order_by('b.tfo','ASC')
			 ->get();
	}

	public function get_tfotest($tfo_id = null){
		if(!is_null($tfo_id)){
			/*return $this->db->get_where('tfo', array(
				'tfo_id' => $tfo_id
			));*/
			return $this->db
			 ->select('b.tfo_id,b.payment_id ,b.tfo,b.all,b.type, b.amount, a.types, c.tfotype')
			 ->from('tfo b')
			 ->join('payment_type a', 'b.payment_id=a.payment_id', 'inner')
			 ->join('tfotype c', 'b.type=c.type_id','inner')
			 ->where('tfo_id',$tfo_id)
			 ->get();
		} else {
			return false;
		}
	}

	public function get_required_tfo_by_nature($tfo_id = null, $nature_id = null){

	if(!is_null($tfo_id) && !is_null($nature_id)){
		return $this->db
		 	->distinct()
			->select('t.tfo_id,rt.req_tfo_id,t.tfo,t.type AS app_type,rt.application_id')
			->select('rt.type AS behavior,rt.value')
			->select('rt.buss_nature_id')
			->from('tfo t')
			->join ('required_tfo rt','rt.tfo_id=t.tfo_id','inner')
			->join ('business_nature bn','bn.buss_nature_id=rt.buss_nature_id','inner')
			->where(array('rt.buss_nature_id' =>$nature_id,
						  'rt.tfo_id' =>$tfo_id))
			->get();
			//qecho $this->db->_error_message();
	} else {
			return false;
		}
	}

	public function delete_required_tfo_by_nature($tfo_id = null,$buss_nature_id) {
		if(!is_null($tfo_id)) {
			return $this->db->delete('required_tfo', array('tfo_id' => $tfo_id,'buss_nature_id' =>$buss_nature_id));
		} else {
			return false;
		}
	}


	public function get_tfotype(){
		return $this->get('tfotype','type_id,tfotype',null,'type_id');
	}

	public function get_paymenttype(){
		return $this->get('payment_type','payment_id,types',null,'payment_id');
	}

	public function get_behavior(){
		return array("1" => "Applied to all", "0" => "Optional");
	}

	//workin biyatses
	//AMAW!
	public function update_tfo($data = array()) {
		if(is_array($data)) {
			//print_r($data);
			return $this->db->update('tfo', $data, array('tfo_id' => $data['tfo_id']));
		}
	}
	public function edit_required_tfo($data = array()) {
		//print_r($data);
		if(is_array($data)) {
			if($data['type'] == 1){

				$item['req_tfo_id'] = $data['req_tfo_id'];
				$item['buss_nature_id'] = $data['buss_nature_id'];
				$item['tfo_id'] = $data['tfo_id'];
				$item['application_id'] = $data['application_id'];
				$item['type'] = $data['type'];
				$item['value'] = $data['value'];
				unset($data['id']);

				return $this->db->update('required_tfo', $item, array('req_tfo_id' => $data['req_tfo_id']));
				/*$this->db->update('required_tfo', $item, array('req_tfo_id' => $data['req_tfo_id']));
				echo $this->db->last_query();*/

			} elseif($data['type'] == 2){

				$item['req_tfo_id'] = $data['req_tfo_id'];
				$item['buss_nature_id'] = $data['buss_nature_id'];
				$item['tfo_id'] = $data['tfo_id'];
				$item['application_id'] = $data['application_id'];
				$item['type'] = $data['type'];
				$item['value'] = $data['formula'];
				unset($data['id']);
				//print_r($item);
				return $this->db->update('required_tfo', $item, array('req_tfo_id' => $data['req_tfo_id']));

			} elseif($data['type'] == 3){ //echo '3';
				$item['req_tfo_id'] = $data['req_tfo_id'];
				$item['buss_nature_id'] = $data['buss_nature_id'];
				$item['tfo_id'] = $data['tfo_id'];
				$item['application_id'] = $data['application_id'];
				$item['type'] = $data['type'];

					$values = $this->db
							->select('value')
							->from('required_tfo')
							->where('req_tfo_id', $data['req_tfo_id'])
							->get();
					//echo $this->db->last_query();
					if($values->num_rows() > 0) {
						$data['range'] = (array) $data['range'];
						$values = $values->row();
						$vali = empty($values->value) ?  array() : json_decode($values->value,true);
						$val = array();
						$ids = array();
						$i = 0;
					}
				//	print_r($vali);
					foreach($vali as $v){
						$ids[$i] = $v['id'];
						$i++;
					}

					if(in_array($data['id'], $ids)){
						foreach($vali as $vi){
							if($data['id'] == $vi['id']){
								/*added on december 16,2014
									Code by: Diane
								*/

								foreach($data['range'] as $d){
									if(!empty($d['type'])){
										if($d['type'] == 'formula'){
											$vi['min'] = $d['min'];
											$vi['e1'] = $d['e1'];
											$vi['e2'] = $d['e2'];
											$vi['valueadded'] = $d['valueadded'];
											$vi['base'] = $d['base'];
											$vi['formula'] = $d['formula'];
										}elseif($d['type'] == 'hectare'){
											$vi['min'] = $d['min'];
											$vi['max'] = $d['max'];
											$vi['value'] = $d['value'];
										}
									}else{
										$vi['min'] = $d['min'];
										$vi['max'] = $d['max'];
										$vi['value'] = $d['value'];
									}
								}
								array_push($val,$vi);
							}else{
								array_push($val,$vi);
							}
						}
					}else{
						foreach ($data['value'] as $v){
							$val = $vali;
							array_push($val, $v);
						}
					}
				$item['value'] =  json_encode($val);	print_r($item);
				unset($data['id']);
			  return 	$this->db->update('required_tfo', $item, array('req_tfo_id' => $data['req_tfo_id']));
			  //echo $this->db->last_query();
			}
		}
	}

	public function update_brgy($data = array()) {
		if(is_array($data)) {
			return $this->db->update('brgys', $data, array('brgy_id' => $data['brgy_id']));
		}
	}

	public function update_buss_nature($data = array()) {
		if(is_array($data)) {
			//print_r ($data);
			//$data['requirements'] =
			//echo $this->db->_error_message();
			//unset($data['application_id']);
			return $this->db->update('business_nature', array('business_nature' => $data['business_nature'],'application_id' =>$data['application_id']), array('buss_nature_id' => $data['buss_nature_id']));
		}
	}

	public function update_requirements($data = array()) {

		if(is_array($data)) {
				$data['application_id'] = '1';
			return $this->db->update('requirements', $data, array('requirement_id' => $data['requirement_id']));

		}
	}

	public function save_new_duedate($data = array()){
		if(is_array($data)) {
			if(isset($data['setting_id'])) {
				return $this->db->update('settings', $data, array('setting_id' => $data['setting_id']));
			} else {
				$data['created_at'] = date('Y-m-d H:i:s');
				return $this->db->insert('settings', $data);
			}
		} else {
			return false;
		}
	}

	public function update_duedate($data = array()) {
		if(is_array($data)) {
			$data['modified_at'] = date('Y-m-d H:i:s');
			return $this->db->update('settings', $data, array('setting_id' => $data['setting_id']));
		}
	}


	//display surcharge data
	public function display_surcharge() {
		return $this->db->select('surcharge_id,date_renew,surcharge, interest')
				->get('surcharge');

	}

	public function display_announcement() {
		return $this->db->select('announce_id,title,announce_content, added_by, created_at')
				->get('announcement');

	}
	public function get_all_surcharge($surch_id= array()) {
		if(!is_null($surch_id)){
			return $this->db
			 ->select('surcharge_id, date_renew, surcharge, interest')
			 ->from('surcharge')
			 ->where('surcharge_id',$surch_id)
			 ->get();
		} else {
			return false;
		}
	}

	public function update_all_surcharge($data = array()) {
		if(is_array($data)) {
			//print_r($data['date_renew']);
			return $this->db->update('surcharge', $data, array('surcharge_id' => $data['surcharge_id']));
		}
	}

	/*UPDATE ANNOUNCEMENT*/
	public function get_announcement($announce_id = null){
		if(!is_null($announce_id)){
				return $this->db
				->select('*')
				->from('announcement')
				->where('announce_id',$announce_id)
				->get();
		} else {
			return false;
		}

	}

	public function update_all_announcement($data = array()) {
		if(is_array($data)) {
			//print_r($data);
			$data['modied_at'] = date('Y-m-d H:i:s');
			return $this->db->update('announcement', $data, array('announce_id' => $data['announce_id']));
		}
	}


	public function delete_tfo($tfo_id = null) {
		if(!is_null($tfo_id)) {
			return $this->db->delete('tfo', array('tfo_id' => $tfo_id));
		} else {
			return false;
		}
	}

	public function delete_business_nature($nature_id = null) {
		if(!is_null($nature_id)) {
			return $this->db->delete('business_nature', array('buss_nature_id' => $nature_id));
		} else {
			return false;
		}
	}

	public function delete_surcharges($surcharge_id = null) {
		if(!is_null($surcharge_id)) {
			return $this->db->delete('surcharge', array('surcharge_id' => $surcharge_id));
		} else {
			return false;
		}
	}



	public function delete_barangay($brgy_id = null) {
		if(!is_null($brgy_id)) {
			return $this->db->delete('brgys', array('brgy_id' => $brgy_id));
		} else {
			return false;
		}
	}


	public function delete_duedate($setting_id = null) {
		if(!is_null($setting_id)) {
			return $this->db->delete('settings', array('setting_id' => $setting_id));
		} else {
			return false;
		}
	}

	/*----------------------------------------------
	* display range for renew ...www.yopak.com
	*-----------------------------------------------*/

	public	function display_range(){
		$range = array();
			$get_ranges = $this->db
					 ->select('r.rid,r.classification,r.value,ct.types')
					 ->from('range r')
					 ->join('classification_type ct', 'r.classification = ct.classification_id', 'inner')
					 ->order_by('r.rid','ASC')
					 ->get()->result();
			//echo $this->db->_error_message();
			return $get_ranges;
	}


	/*----------------------------------------------
	* display garbage_fee ...www.yopak.com
	*-----------------------------------------------*/

	public	function display_garbage_fee(){
		$range = array();
			$get_ranges = $this->db
					 ->select('g.gid,g.classification,g.value,ct.types')
					 ->from('garbage_fee g')
					 ->join('classification_type ct', 'g.classification = ct.classification_id', 'inner')
					 ->order_by('g.gid','ASC')
					 ->get()->result();
			//echo $this->db->_error_message();
			return $get_ranges;
	}


	/*----------------------------------------------
	* display range for garbage fee ...www.yopak.com
	*-----------------------------------------------*/

	public	function garbage_fee(){
		$range = array();
			$get_ranges = $this->db
					 ->select('g.gid,g.classification,g.value,ct.types')
					 ->from('garbage_fee g')
					 ->join('classification_type ct', 'g.classification = ct.classification_id', 'inner')
					 ->order_by('g.gid','ASC')
					 ->get()->result();
			//echo $this->db->_error_message();
			return $get_ranges;
	}
	/*----------------------------------------------
	* for getting classification i.e(small,medium..)
	*-----------------------------------------------*/

	public function get_classification() {
		return $this->get('classification_type','classification_id, types', null, 'classification_id')->result();
	}

	public function does_exist($rid){ //echo $rid;
		return  (
					($this->db->get_where('range',array('rid' =>$rid))->num_rows()
					) > 0
				) ? true : false;
				//echo $this->db->last_query();
	}

	public function does_exist_garbage_fee($rid){ //echo $rid;
		return  (
					($this->db->get_where('garbage_fee',array('gid' =>$rid))->num_rows()
					) > 0
				) ? true : false;
				//echo $this->db->last_query();
	}
}
