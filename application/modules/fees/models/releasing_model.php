<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Releasing_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_for_releasing() {
	
		return $this->db
			->distinct()
			->select('r.payment_id pay_id,r.releasing_id,r.is_released')
			->select('o.firstname, o.middlename, o.lastname,o.permitee')
			->select('p.or_number, p.payment_date')
			->select('br.brgy')
			->select('bl.gross')			
			->select('b.business_name, b.permit_number, b.street_address,o.ownership_id,ot.types')			
			->from('releasing r')
			->join('payments p' ,'r.payment_id = p.pay_id','inner')
			->join('owners o', 'p.owner_id=o.owner_id', 'inner')
			->join('businessess b', 'p.buss_id=b.buss_id', 'inner')
			->join('business_line bl','b.buss_id=bl.bl_buss_id','inner')
			->join('brgys br', 'o.brgy_id=br.brgy_id', 'inner')		
			->join('ownership_type ot', 'o.ownership_id=ot.ownership_id', 'inner')		
			->where('YEAR(p.payment_date) = YEAR(NOW())')
			->where('p.status', 'pending')
			->get();
			// echo $this->db->last_query();
	}

	
	
	public function permit_release($releasing_id = null,$pay_id = null){
		if( $this->db->update('releasing',array('is_released' =>'Y'),array('releasing_id' =>$releasing_id))) {
			return $this->db->update('payments',array('status'=>'printed'),array('pay_id' =>$pay_id));
			 //echo $this->db->last_query();
		}else {
			echo $this->db->_error_message();
		}
	}
}
