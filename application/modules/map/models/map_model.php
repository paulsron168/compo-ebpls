<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	

	public function getList() {
	
		if(isset($_GET['year'])){
			$yearcon = '%'.$_GET['year'].'%';
			$where =  "b.permit_number LIKE '".$yearcon."'";
			$approval =  $this->db
			->select('st.id, st.stall_area, st.stall_num, st.stall_val')
			->select('b.permit_number, b.business_name, b.ownership_id, b.brgy_id')
			->select('o.firstname, o.middlename, o.lastname,o.owner_id,o.permitee')
			->from('stalls st')
			->join('businessess b', 'st.stall_num=b.stall_num', 'left')
			->join('owners o', ' b.owner_id=o.owner_id', 'left')
			->where($where)
			->get();
		}else{
			$year = date('Y');
			$yearcon = '%'.$year.'-%';
			$where =  "b.permit_number LIKE '".$yearcon."'";
			$approval =  $this->db
			->select('st.id, st.stall_area, st.stall_num, st.stall_val')
			->select('b.permit_number, b.business_name, b.ownership_id, b.brgy_id')
			->select('o.firstname, o.middlename, o.lastname,o.owner_id,o.permitee')
			->from('stalls st')
			->join('businessess b', 'st.stall_num=b.stall_num', 'left')
			->join('owners o', ' b.owner_id=o.owner_id', 'left')
			->where($where)
			->get();
		}
		
		return $approval;
	
		}
	
	
}
