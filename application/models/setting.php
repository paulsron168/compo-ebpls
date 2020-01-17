<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_setting($field) {
		$settings = $this->db->get_where('settings', array('field' => $field));
		if($settings->num_rows() > 0) {
			$value = $settings->row();
			return $value;
		} else {
			return null;
		}
	}
}