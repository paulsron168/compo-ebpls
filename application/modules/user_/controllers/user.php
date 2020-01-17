<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if(!$this->session->userdata('username')){
			$this->login();
		}

		else{
			$this->load->model('user/users_model','users');
			show(array(
				'get' =>$this->users->users_details(),
				'page'=>'user/index',
				'sub_title'=>'User List',
				'view'=>'user/index',
				'script'=>'user/login'
				));
		}
	}

	public function login() {
		show(array(
			'page' => 'login',
			'sub_title' => 'Login',
			'script' => 'user/login',
			'view' => 'user/login'
		));
	}
	
	// John is trying for the activity tab
	public function activity_log() {
		$this->load->model('user/users_model','users');
		show(array(
			'page' => 'activity_log',
			'get' =>$this->users->users_details(),
			'script' => 'user/login',
			'sub_title' => 'Activity Log',
			'view' => 'user/activity_log'
		));
	}

	// John is trying for the system settings tab
	public function system_settings() {
		show(array(
			'page' => 'system_settings',
			'sub_title' => 'System Settings',
			'script' => 'user/login',
			'view' => 'user/system_settings'
		));
	}
	public function get_logout(){
		$this->session->sess_destroy();
						 $this->login();
	}

	public function logout($data = array()){
		date_default_timezone_set("Asia/Taipei"); 
		$username = $this->session->userdata('username');
		$result = $this->db
				->select('users')
				->where('username', $username)
				->get();

			if(!$result){
				$data['online_status'] = 'Offline';
				$data['time_loggedout'] = date('Y-m-d H:i:s');
				
				if($this->db->update('users',$data,array('username'=>$username))){
					return $this->get_logout();
				}			
		}
	}

	public function admin()	{

		$this->load->model('user/users_model','users');
			show(array(
				'admin' =>$this->users->get_admin_details()->result(),
				'page'=>'user/admin',
				'sub_title'=>'Admin Settings',
				'view'=>'user/admin',
				'script'=>'user/login'
				));
	}	

}
