<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* CodeIgniter Account Controller
 *
* The class described User Details add update.
*
* @package        CodeIgniter
* @author         suresh
* @company	    Technologies
* @link	   http://www.Technologies.com
* @version 	   1.0
*/


include APPPATH.'/controllers/common.php';
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('user_model');
	}


	/* List user Begin*/
	public function index()
	{
		
		$data['site_title'] = STAFF_M_PAGE." - ".STAFF_M_LIST;
		$data['user_list']=$this->user_model->user_list();
		$this->load->view('header',$data);
		$this->load->view('user/list', $data);
		$this->load->view('footer');
	}
	/* List user end*/

	/* Add user Begin */
	 public function add()
	{
		$data['site_title'] = STAFF_M_PAGE." - ".STAFF_M_ADD;
		$data['ErrorMessages'] = '';
        $type="3";
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
			

			$config = array(
			
			array('field' => 'user_name',
					'label' => 'User Name',
					'rules' => 'trim|required|is_unique[user.user_name]'),
			array('field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|is_unique[user.email]'),		
			array('field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required'),
                        array('field' => 'status',
					'label' => 'Status',
					'rules' => 'trim|required'),
                         array('field' => 'role_id',
					'label' => 'Role',
					'rules' => 'trim|required')
			);
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
				$data['ErrorMessages'] = validation_errors();
			}		
			else
			{   
				$set_data=$_POST;
				$user_detail = array(
						'user_name' => $set_data['user_name'],
						'email' => $set_data['email'],
						'password' => AES_Encode($set_data['password']),
						'status' => $set_data['status'],
                    				'role_id' => $set_data['role_id'],
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
						
				);
				$this->user_model->add_user($user_detail);
				$this->session->set_flashdata ('SucMessage',STAFF_M_PAGE." ".CREATED_SUS);
				redirect(base_url().'user/',"refresh");
			}
		}
         $data['role_list']=$this->user_model->role_list();
        $this->load->view('header',$data);
		$this->load->view('user/add', $data);
		$this->load->view('footer');
	}

	/* Edit user Begin */
 public function edit($id)
	{
		$data['site_title'] = STAFF_M_PAGE." - ".STAFF_M_ADD;
		$data['ErrorMessages'] = '';
         
		
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
			$us_id=$this->user_model->get_user_details($id);
			$config = array(
					
					array('field' => 'user_name',
							'label' => 'User Name',
							'rules' => 'trim|required|edit_unique[user.user_name.'.$us_id['id'].']'),
					array('field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|edit_unique[user.email.'.$us_id['id'].']'),
					array('field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required'),
					 array('field' => 'status',
							'label' => 'Status',
							'rules' => 'trim|required'),
                                       array('field' => 'role_id',
					 		'label' => 'Role',
							'rules' => 'trim|required')
			);
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{   
				$set_data=$_POST;
				$user_detail = array(
			                        'user_name' => $set_data['user_name'],
						'email' => $set_data['email'],
						'password' => AES_Encode($set_data['password']),
						'status' => $set_data['status'],
                    				'role_id' => $set_data['role_id'],
                    			        'updated_on' => date("Y-m-d H:i:s")
				);
				$this->user_model->update_user($user_detail,$id);
				
				$this->session->set_flashdata ('SucMessage',STAFF_M_PAGE." ".UPDATED_SUS);
				redirect(base_url().'user/',"refresh");
			}
		}
		
		if($this->user_model->get_user_details($id))
		{        $data['role_list']=$this->user_model->role_list();
			 $data['details']=$this->user_model->get_user_details($id);
			 $this->load->view('header',$data);
		     $this->load->view('user/edit', $data);
		     $this->load->view('footer');
		}
		else {
			redirect(base_url().'user/','refresh');
		}
		
	}


	

	//Delete the user
	public function delete($id)
	{
		
		if ($this->user_model->get_user_details($id))
		{
			$result = $this->user_model->delete_user($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',STAFF_M_PAGE." ".DELETED_SUS);
				redirect(base_url().'user/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'user/', 'refresh');
		}
	}

	

	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
