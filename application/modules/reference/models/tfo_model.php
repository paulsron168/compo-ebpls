<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tfo_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function save_tfo($data = array()) {
		if(is_array($data)) {

			if(isset($data['tfo_id'])) {
				return $this->db->update('tfo', $data, array('tfo_id' => $data['tfo_id']));
			} else {
				return $this->db->insert('tfo', $data);
			}
		} else {
			return false;
		}
	}


	public function save_required_tfo($data = array()) {
	// print_r($data);
	
		if(is_array($data)) {
			if(isset($data['type'])) {
				if($data['type'] == 1) {		// Constant

					unset($data['range']);
					unset($data['variable']);
					unset($data['formula']);

				} elseif($data['type'] == 2) {	//Formula
					$data['value'] = $data['formula'];
					$data['variables'] = json_encode($data['variable']);
					unset($data['formula']);
					unset($data['range']);
					unset($data['variable']);

				} elseif($data['type'] == 3) {	// Range
					unset($data['variable']);
					unset($data['formula']);
					$check = $this->db->get_where('required_tfo',
					array('tfo_id' =>$data['tfo_id'],
							'buss_nature_id' =>$data['buss_nature_id'],
							'application_id' =>$data['application_id']
						)
					); //echo $this->db->last_query();
					$num = $check->num_rows();
					$check = $check->result();

					$values = $num == 0 ?  array() : json_decode($check[0]->value,true);
						foreach($data['range'] as $range){
							$range['id']=count($values)+1;
							array_push($values,$range);
						}

						if ($num > 0 ){
							 return $this->db->update('required_tfo',array(
																  'value' => json_encode($values)
														),array('req_tfo_id' =>$data['req_tfo_id']));
						} elseif(empty($check)){
							$data['value'] = json_encode($values);
							$data['subtype'] = $data['chosentype'];
							unset($data['range']);
							unset($data['chosentype']);
								if ($this->db->insert('required_tfo', $data)){
									return true;
								} else{
		
									echo $this->db->_error_message();
								}
						} else {
							echo $this->db->_error_message();

						}
				} //end of range
				 /* elseif ($data['type'] == 4) {
					$data['value'] = json_encode(array('min' => $data['min'],'formula' => $data['formula2']));
					unset($data['range']);
					unset($data['variable']);
					unset($data['formula']);
					unset($data['formula2']);
					unset($data['min']);
					//echo $data['value'];
				}
				 */
				unset($data['req_tfo_id']);
				unset($data['chosentype']);
				unset($data['range']);
				unset($data['chosentype']);
				//print_r($data);
				if(empty($num)){
					if($this->db->insert('required_tfo', $data)) {
						return array('msg' => 'TFO added', 'error' => 0);
					} else {
						//echo $this->db->_error_message();
						return array('msg' => $this->db->_error_message(),'error' =>1);
					}
				} else{
					return array('msg' => 'Failed saving tfo. Please review if the tfo choosen has already been added.','error' =>1);
				}

			} else {
				return array('msg' => 'Please select a behavior','error' =>1);
			}
		} else {
			return array('msg' => 'No inputs to save','error' =>1);
		}
	}

	public function save_new_tfo($data = array()){
		if(is_array($data)) {
			//print_r($data);
			if(isset($data['tfo_id'])) {
				return $this->db->update('tfo', $data, array('tfo_id' => $data['tfo_id']));
			} else {
				$data['amount'] = $data['amount'].'.00';
				return $this->db->insert('tfo', $data);
			}
		} else {
			return false;
		}
	}

	public function save_new_ranges($data = array(),$exist =  null) {
		if(is_array($data)) {
		//print_r($data);
		unset($data['sub-desc']);
		unset($data['id']);

		$data['value'] = json_encode($data['value']);

			if($exist!=1){
				unset($data['rid']);
				if ($this->db->insert('range',$data)){
					return true;
				} else {
					return false;
				}
			} else {
				if($this->db->update('range',$data,array('rid' =>$data['rid']))){
					return true;
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}

	public function save_garbage_fee($data = array(),$exist =  null) {
		if(is_array($data)) {

		unset($data['sub-desc']);
		unset($data['id']);

		$data['range'] = json_encode($data['range']);
		$data['value'] = $data['range'];
		unset($data['range']);
		//print_r($data);
			if($exist!=1){
				unset($data['gid']);
				if ($this->db->insert('garbage_fee',$data)){
					return true;
				} else {
					//return false;
					echo $this->db->_error_message();
				}
			} else {
				if($this->db->update('garbage_fee',$data,array('gid' =>$data['gid']))){
					return true;
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}

	public function copy_tfo($buss_nature_id = null){

		$get_tfo = $this->db
						->get_where('required_tfo',array('buss_nature_id' =>$buss_nature_id));
		$get_tfo = $get_tfo->result();

		foreach($get_tfo as $tfo){
			$this->db->insert('required_tfo',array('buss_nature_id' =>$buss_nature_id,
													'tfo_id' =>$tfo->tfo_id,
													'application_id' =>'2',
													'type' =>$tfo->type,
													'value' =>$tfo->value,
													'variables' =>$tfo->variables
													)
							);
		}
	}
}
