<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirements_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_nature($natureID = null, $application_id = null) {
		if(!is_null($natureID)) {
			$requirements = $this->db
				->select('business_nature nature, requirements')
				->from('business_nature')
				->where(array('buss_nature_id' => $natureID,
							  'application_id' => $application_id
						))
				//->limit(1, 0)
				->get();
//echo $this->db->last_query();
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

	
	public function get_rem_reqts($natureID){
		$requirements = Array();
		$all_req = $this->db->select('requirement_id,description')
					  ->from('requirements')
					  ->get();
		
		//get reqt for buss nature
		$buss_nat_req = $this->db
						->select('requirements')
						->from('business_nature')
						->where('buss_nature_id',$natureID)
						->get();
		
		if($buss_nat_req->num_rows() > 0 ){ 
		  $res_buss_req = $buss_nat_req->row();
		  $res_buss_req2 = json_decode($res_buss_req->requirements);
		//  print_r((array)$res_buss_req2);
			if(!empty($res_buss_req2)){
				foreach ($all_req->result() as $req){			
					$requirements[] = $req->requirement_id;
				}		
				return (array_diff($requirements,$res_buss_req2));
			} else {  
				//return $all_req->result(); 
				foreach ($all_req->result() as $req){			
					$requirements[] = $req->requirement_id;
				}	
				return ($requirements);
			}
		} else {
		  return $all_req->result();
		}
		
		//return (Array) $query->result();
	}

    /**
     * @param null $natureID
     * @param null $app_id
     * @return bool
     */
    public function get_required_tfo($natureID = null, $app_id = null) {
		//if(!is_null($natureID) && !is_null($app_id)) {
		if(!is_null($natureID)) {
			 return $tfo = $this->db
				->distinct()
				->select('t.tfo_id,t.tfo, t.payment_id, bn.business_nature, t.amount')
				->select('rt.req_tfo_id,rt.type behavior, rt.value, rt.application_id,rt.buss_nature_id,rt.subtype')
				->from('required_tfo rt')
				->join('tfo t', 'rt.tfo_id=t.tfo_id', 'inner')
				//->join('application_type at', 'rt.application_id=at.application_id', 'inner')
				->join('business_nature bn', 'rt.buss_nature_id=bn.buss_nature_id', 'inner')
				//->join('payment_type p', 't.payment_id=p.payment_id', 'inner')
				->where(array ('rt.buss_nature_id' => $natureID,
                    'rt.application_id' => $app_id
                    ))
				->get();
			// echo $this->db->last_query();
		} else {
			return false;
		}
	}

	public function requirement($requirement_id = null) {
		if(!is_null($requirement_id)) {
			return $this->db->get_where('requirements', array('requirement_id' => $requirement_id)); //echo $this->db->last_query();
		} else {
			return false;
		}
	}

	public function requirements() {
		return $this->db->get('requirements');
	}

	public function add_requirement($data = array()) {
		//print_r($data);
		if(is_array($data)) { 
			if(isset($data['requirement_id'])) {
					if(isset($data['buss_nature_id'])) {
						$nature = $this->db->get_where('business_nature', array('buss_nature_id' => $data['buss_nature_id']));
						if($nature->num_rows() > 0) {
							$nature = $nature->row();
							$requirements = !empty($nature->requirements) ? json_decode($nature->requirements, true) : array();

							if(!in_array($data['requirement_id'], (array)$requirements)) {
								foreach ($data['requirement_id'] as $key){
									array_push($requirements, (int)$key);
								}
							}

							return $this->db->update('business_nature', array(
								'requirements' => json_encode($requirements)
							), array('buss_nature_id' => $data['buss_nature_id'],'application_id' =>$data['application_id']));
						} else {
							return false;
						}
					} else {
						return false;
					}
			} else {
				return false;
			}
		}
	}
	
	public function get_all_reqts(){
		$query = $this->db->select('requirement_id,description')
					  ->from('requirements')
					  ->get();
		return (Array) $query->result();
	}
	
	public function get_buss_nature($natureID){
		if(!is_null($natureID)){
			return $this->db->get_where('business_nature', array(
					'buss_nature_id' => $natureID
				));			
		} else {
			return false;
		}
	}
}