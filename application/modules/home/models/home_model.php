<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_announcement(){
		return $this->db->get('announcement');
	}

	//saving new announcement

	public function save_new_announcement($data = array()){
		if(is_array($data)) {
			if(!empty($data['announce_id'])) {
				 return $this->db->update('announcement', $data, array('announce_id' => $data['announce_id']));
			} else {

				$data['created_at'] = date('Y-m-d');
			return	 $this->db->insert('announcement', $data);
			}
		} else {
			return false;
		}
	}
	// deleting announcement

	public function delete_announcement($aid = null) {

		if(!is_null($aid)) {
			return $this->db->delete('announcement', array('announce_id' => $aid));
		} else {
			return false;
		}
	}

	public function get_announcement_edit($announce_id = null){
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

}
