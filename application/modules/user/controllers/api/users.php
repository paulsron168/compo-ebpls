<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller {
	protected $data;
	public function __construct() {
		parent::__construct();
	}

	public function get_Login($username = null, $password=null)
	{

		$u = $this->session->set_userdata('username', $username);
		//$p = $this->session->set_userdata('username', $password);
			if(empty($username) || empty($password))
			{
				response(1, 'Please fill in the missing fields.');
			}
			else{

				$this->load->model('user/users_model','users');
					$file = $this->users->getLogin($username,$password);
					// print_r($file);
						if(!empty($file)) {
							$sess_data = array(
										'username' => $file->username,
										'firstname' =>$file->firstname,
										'lastname' =>$file->lastname,
										'userid' =>$file->user_id,
										'login' => true,
										'level_id' =>$file->level_id
										 );

						$this->session->set_userdata($sess_data);
						
								response(0, 'Login successfull');
						}
						else{
								response(1,'Invalid username and password');
							}
				}
	}
	public function get_names($firstname = null, $lastname = null){

		$f = $this->session->set_userdata('firstname',$firstname);
		$l = $this->session->set_userdata('lastname',$lastname);

		$this->load->model('user/users_model','users');
		if($this->users->getnames($firstname, $lastname)->num_rows() > 0){
		 return $this->users->getnames($firstname, $lastname)->row();
		}

	}


	// ADDING NEW USERS
	public function save_new_users()
	{
		$post = $this->input->post(null, true);
		$this->load->library('form_validation');
		if(!empty($post))
		{
			$this->form_validation->set_rules('firstname' ,'First Name', 'required|xss_clean');
			$this->form_validation->set_rules('lastname' ,'Last Name', 'required|xss_clean');
			$this->form_validation->set_rules('username' ,'Username', 'callback_user_exist|	required|xss_clean');
			$this->form_validation->set_rules('password' ,'Password', 'required|xss_clean');
			$this->form_validation->set_rules('level_id' ,'Users Level', 'required|xss_clean');

			if($this->form_validation->run() == false)
				{
					response(1, 'Please fill in the missing fields');
				}
			else
			{
				$this->load->model('user/users_model', 'users');
					if($this->users->add_users($post))
						{

							response(0, 'New users saved');
						}
					else
						{
							response(1, 'Failed saving user/ Username already exist');
						}
			}
		}
			else
			{
				response(1, 'Please fill in the missing fields');
			}
	}

// GET USER'S DETAILS
	public function get_users_control($userid = null) {
		if(!is_null($userid)) {
			$this->load->model('user/users_model','get_user');

			if($this->get_user->get_all_users($userid)->num_rows() > 0) {
				response(0, 'Successfully Fetched', $this->get_user->get_all_users($userid)->row());
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'Missing user id');
		}
	}

	public function c_updateusers() {
		$post = $this->input->post(null, true);
		$this->load->model('user/users_model','get_user');

		if($this->get_user->update_users($post)) {
			response(0, 'Update successful');
		} else {
			response(1, 'Failed updating business line.');
		}
	}

//DELETE USERS
	public function delete_users($uid = null){
		if(!is_null($uid)){
			$this->load->model('user/users_model','get_user');

			if($this->get_user->delete_users($uid) >  0) {
				response(0, 'Delete required tfo successful', $this->get_user->delete_users($uid));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}


	public function logoff($uid = null){
		if(!is_null($uid)){
			$this->load->model('user/users_model','get_user');

			if($this->get_user->logoff($uid) >  0) {
				response(0, 'Successfull logout', $this->get_user->logoff($uid));
			} else {
				response(1,'Missing input data');
			}
		} else {
			response(1, 'ID not found');
		}
	}

	public function update_admin(){

		$post = $this->input->post(null, true);

			if(!empty($post)){

				$this->load->model('user/users_model','user');

					if($this->user->update_admin($post)){
						response(0,'Updated Successfully');
					}else{
						response(1,'There was an error');
					}

			} else {
				response(0,'Incomplete data');
			}
	}

	public function update_business_permit(){

		$this->load->model('user/users_model','user');

			if($this->user->permit_number()){
				response(0,'Updated Successfully');
			}else{
				response(1,'There was an error');
			}
	}

	public function backup_database(){

		$this->load->model('user/users_model','user');

			if($this->user->backup_database()){
				response(0,'Database donwloaded successfully');
			}else{
				response(1,'There was an error');
			}
	}

	public function import(){ echo 'dir bah';

		$this->load->model('user/users_model','user');

		if($this->user->import_database()){
			response(0,'Database donwloaded successfully');
		}else{
			response(1,'There was an error');
		}
	}

}
