<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	//Getting user's data from database 

	public function display_users($uid =null){
		return $this->db->select('*')
				->from('users')
				->where('user_id',$uid)
				->get();				
	}


}