<?php
class Login_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function login_verify($user_name, $psw)
	{
		
		
                $role_ids = array('1','2','3','4');
		$select = array('u.id', 'u.user_name','u.email', 'u.status',
                                 'u.role_id', 'r.name'
		);
		$this->db->select($select);
		$this->db->from('user AS u');
		$this->db->join('role AS r', 'u.role_id=r.id');               
		$this->db->where('u.user_name', $user_name);
		$this->db->where('u.password', AES_Encode($psw));
		$this->db->where_in('r.id', $role_ids);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;

		if($query->num_rows()>0)
		{
			$Data=$query->result_array();
			if($Data[0]['status']=='1')
			{
				$session_data = array('uid' => $Data[0]['id'], 'name' => $Data[0]['name'], 'user_name' => $Data[0]['user_name'], 'email' => $Data[0]['email'], 'role_id'=>$Data[0]['role_id'],'logged_in'=>true);

				$this->session->set_userdata($session_data);
				//echo '<pre>'; print_r($this->session->all_userdata());exit;
				return "TRUE";
			}
			else
			{
				return 'DEACTIVATE';
			}
		}
		else
		{
			return false;
		}
	}
	
	
	public function forgot_password($email)
	{
		 $role_ids = array('1', '2','3','4');
		$select = array('u.id', 'u.user_name','u.password', 'u.email', 'u.status',
				'u.role_id', 'r.name');
		$this->db->select($select);
		$this->db->from('user AS u');
		$this->db->join('role AS r', 'u.role_id=r.id');
		$this->db->where('u.email', $email);
		$this->db->where_in('r.id', $role_ids);
		$query = $this->db->get();
		
		if($query->num_rows()>0)
		{
			$Datas=$query->result_array();
			if($Datas[0]['status']=='1')
			{
				
				return $Datas;
			}
			else
			{
				return 'DEACTIVATE';
			}
		}
		else
		{
			return false;
		}
		
		
		
	}
	

      // check login sessionpublic 

    function check_login()
	{
		$select = array('u.id');
		$this->db->select($select);
		$this->db->from('user AS u');
		$this->db->join('role AS r', 'u.role_id=r.id');
        	$this->db->where('r.id', $this->session->userdata('role_id'));
		$this->db->where('u.status', '1');
		$this->db->where('u.id', $this->session->userdata('uid'));
		$query = $this->db->get();
		//echo '<pre>'; print_r($this->session->all_userdata());
		//echo $this->db->last_query();exit;
		if($query->num_rows()>0)
		{
		         
			return true;
		}
                else{
		$this->logout();
			
                }
		
	}
	
	

//logout
     public function logout()
	{
		
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('login/','refresh');
                
		
	}
}
?>
