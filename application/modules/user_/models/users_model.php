
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	//Getting user's data from database 
// 	public function getLogin($username=null, $password=null){
// 		date_default_timezone_set("Asia/Taipei"); 
// 		$result = $this->db
// 			->from('users')
// 			->where('username',$username)
// 			->where('password',$password)
// 			->get();
// //echo $this->db->last_query();
// 		if($result->num_rows() > 0 )
// 			{
// 				$data['online_status'] = 'Online';
// 				$data['time_logged'] = date('Y-m-d : h:i:s');
// 				//$this->create_log($username,'Login',date('Y-m-d : h:i:s'));
// 					return $this->db->update('users',$data,array('username'=>$username));
// 			}
// 		else
// 			{
// 				return false;
// 			}

// 	}
public function getLogin($username=null, $password=null,$data=array()){ //echo $username. ' '.$password;
		date_default_timezone_set("Asia/Taipei");
		$result = $this->db
			->from('users')
			->where('username',$username)
			->where('password',$password)
			->get();

		//echo $this->db->last_query();
		if($result->num_rows() > 0 ){
			$result = $result->row();

				$data['online_status'] = 'Online';
				$data['time_logged'] = date('Y-m-d : h:i:s');
					$result2 = $this->db
						->from('users')
						->where(array('online_status' => 'Online',
									  'username' =>$username
									))
						->get();
						if($result2->num_rows() > 0 ){
							//return false;
						}
						else{
							 $this->db->update('users',$data,array('username'=>$username));
						}
		return $result;
		}
		else
			{
				return false;
			}

	}
		

	public function getnames($firstname=null, $lastname=null){
		$result=$this->db
				->from('users')
				->where('firstname', $firstname)
				->where('lastname', $lastname)
				->get();
				if($result->num_rows() > 0){
					return $result->row();
				}
				else{
					return false;
				}
	}
	private function hash_password($userID, $password) {
		$pass = $this->db->get_where('users', array('user_id' => $userID));
		if($pass->num_rows() > 0) {
			$dbPass = $pass->row();

		} else {
			return false;
		}
	}

	public function display_users($userid = null){
		$result =  $this->db->select('*')
				->from('users')
				->where('user_id',$userid)
				->get();	

				if($result->num_rows>0)
				{
					return $result->row();
				}		
				else
				{
					return false;
				}
	}

	//ADDING NEW USER
	public function add_users($data = array()) { 
		date_default_timezone_set("Asia/Taipei"); 
		 if(is_array($data)) {
		 	$user = $this->db->get_where('users', array('username'=>ucfirst($data['username'])));
		 	if($user->num_rows()>0){ 
		 		return false;
		 	}
			if(!empty($data['user_id'])) {
				return $this->db->update('users', $data, array('user_id' => $data['user_id']));
			} else { 
				//$data['level_id'] = '1';
					$data['online_status'] = 'Offline';
					$data['created_at'] = date('Y-m-d H:i:s');
					$this->session->set_userdata('user_id', $this->db->insert_id());
					return $this->db->insert('users', $data);
			}
		} else {
			return false;
		}  
	}

	//Getting USERS details for editing
	public function users_details() { 
		return $this->db->select('*')
				->from('users')
				->join('user_level','users.level_id = user_level.level_id')
				->get();//echo $this->db->last_query();

	}
	public function get_user_type($levelid =null){
	return $this->db->select('b.type, b.level_id')
				->from('user_level b')
				->join('users a', 'a.level_id = b.level ','inner')
				->get();
	}
	public function get_all_users($uid=array()) {
		if(!is_null($uid)){
			return $this->db
			 ->select('user_id,username,password,firstname, lastname')
			 ->from('users')			
			 ->where('user_id',$uid)
			 ->get();
			// echo $uid;
		} else {
			return false;
		}
	}

	public function update_users($data = array()) {
	date_default_timezone_set("Asia/Taipei"); 
		if(is_array($data)) {
			//print_r($data['date_renew']);
			$data['modified_at'] = date('Y-m-d H:i:s');
			return $this->db->update('users', $data, array('user_id' => $data['user_id']));
		}
	}

	//DELETE USERS
		public function delete_users($userid = null) {
		
		if(!is_null($userid)) {
			return $this->db->delete('users', array('user_id' => $userid));
		} else {
			return false;
		}
	}

		public function logoff($userid = null) {
		
		if(!is_null($userid)) {
			$data['online_status'] = 'Offline';
			
			return $this->db->update('users', $data,array('user_id' => $userid));
		} else {
			return false;
		}
	}


	private function create_log($username,$activity,$date){
			//echo 'server='.$this->input->server();
		$log = gethostname()." ".$activity." ".site_url()." ".$date."\r\n";
		$file = $username.".txt";
		$current_dir = $this->input->server().'/logs/'.$username; 
		$save_dir = $current_dir."/logs/";

			if (!file_exists($save_dir)) { echo 'hi';
				mkdir($current_dir, 0777, true);
			}
			if (file_exists($save_dir.$file)) { //echo '2nd if';
				$fh = fopen($current_dir.'/'.$file, 'a');
			} else { //echo 'else';
				$fh = fopen($current_dir.'/'.$file, 'w+');
			}
			fwrite($fh, $log);
	}


	public function display_log($username,$path){
		//$page = $_REQUEST['page'];
        $lines = file($path);	
        $cnt = count($lines);	
        $itemsPerPage = 10;
        $page = (isset($_REQUEST['page'])) ? (int)$_REQUEST['page']:1;
    	$start = ($page-1)* $itemsPerPage;
    	$pages = ceil($cnt/$itemsPerPage);
    	$lastpage = $cnt % $itemsPerPage;
    	if($page == $pages){
    		$end = (($page -1)* $itemsPerPage) + $lastpage;
    	}else{
    		$end = ($page * $itemsPerPage)-1;
    	}
    	$next = $page + 1;
    	$prev = $page - 1;

		echo '
		<table class="table table-stripped table-highlight table-bordered table-striped table-hover">';
			echo '<thead>
				<tr>
					<th width="15%">User Name</th>
					<th width="25%">Activity</th>
					<th width="20%">Date</th>
					<th width="20%">Time</th>
			      </tr>
			      </thead>';
		 for($i=$start; $i<$end; $i++){
		 	echo '<tr>';
				$data = explode(' ' ,$lines[$i]);				
					foreach ($data as $d){
						echo '<td>'.$d.'</td>';
					}
			echo '</tr>';
		 }		
		echo '</table>'; 	

		//pagination
		echo '<div class="paginate">
        <div class="pagination pagination-small">
          <ul>';	
          
          if($pages == 1){
          	echo '';
          }else{
          	if($page > 1){
          		echo '<li><a onclick="paginate(1);">first</a></li>';
          		echo '<li><a onclick="paginate('.$prev.');">prev</a></li>';
          	}else{
          		echo'<li><a class="navlink">first</a></li> ';
        		echo'<li><a class="navlink">prev</a></li> ';
          	}
          	echo '<li><a style="background-color:#f6ca6c; color:#000000;"><strong>'.$page.'</strong></a></li> ';
          	if($page < $pages){
          		echo '<li><a onclick="paginate('.$next.');">next</a></li>';
          		echo '<li><a onclick="paginate('.$pages.');">last</a></li>';
          	}else{
          		echo'<li><a class="navlink">next</a></li> ';
        		echo'<li><a class="navlink">last</a></li> ';
          	}
          }
         echo '</ul><br><ul><li><a align="center" style="color:#000000; width:175px; font-size:15px;pointer-events: none;">Page <strong style="color:#ff9933;">'.$page.'</strong> of '.$pages.'</a></li></ul></div></div>';
          
	}

	public function save_new_announcement($data = array()){
		if(is_array($data)) {
			//print_r($data);
			if(isset($data['announce_id'])) {
				//print_r($data['announce_id']);
				return $this->db->update('announcement', $data, array('announce_id' => $data['announce_id']));
			} else {
				$data['created_at'] = date('Y-m-d');
				$data['added_by'] = 'ryan';
				return $this->db->insert('announcement', $data);
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

	public function get_admin_details(){

		return $this->db->get('bplissettings');
	}

	public function  update_admin($data = array()){
	 	
	 	$cnt=count($data['id']);
	 	$flag=false;

		if(!empty($data) && is_array($data)) {

			for($i=0;$i<$cnt;$i++){				
				$da = array('firstName' =>$data['firstname'][$i],'middleName' =>$data['middlename'][$i],'lastName' => $data['lastname'][$i],'designation' =>$data['designation'][$i]);				
				$this->db->update('bplissettings',$da,array('id' =>$data['id'][$i]));
				$flag=true;
			}
			if($flag) return true;
			else false;
		}else {
			return false;
		}

	}

}