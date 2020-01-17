<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_requirements($req_id = null) {
		if(!is_null($req_id)) {
			return $this->db->get_where('requirements', array('requirement_id' => $req_id));
		} else {
			return false;
		}
	}
	
	public function get_all_req() {		
			return $this->db->get('requirements');		
	}
}
