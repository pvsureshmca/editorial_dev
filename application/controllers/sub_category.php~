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

ini_set('display_errors',1);
include APPPATH.'/controllers/common.php';
class Sub_category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('sub_category_model');
	}


	/* List sub_category Begin*/
	public function index()
	{
		$data['site_title'] = SUBCAT_PAGE." - ".SUBCAT_LIST;
		$data['user_list']=$this->sub_category_model->sub_category_list();
		$this->load->view('header',$data);
		$this->load->view('sub_category/list', $data);
		$this->load->view('footer');
	}
	/* List sub_category end*/

	
	/* Add sub_category Begin */
	public function add()
	{
		$data['site_title'] = SUBCAT_PAGE." - ".SUBCAT_ADD;
		$data['ErrorMessages'] = '';
		 
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
	
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required'),
					array('field' => 'status',
							'label' => 'Status',
							'rules' => 'trim|required'),
					array('field' => 'cat_id',
							'label' => 'Category',
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
						'name' => $set_data['name'],
						'status' => $set_data['status'],
						'cat_id' => $set_data['cat_id'],
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					$this->sub_category_model->add_sub_category($user_detail);
					$this->session->set_flashdata ('SucMessage',SUBCAT_PAGE." ".CREATED_SUS);
					redirect(base_url().'sub_category/',"refresh");
				
				
				
			}
		}
		$data['category_list']=$this->sub_category_model->category_list();
		$this->load->view('header',$data);
		$this->load->view('sub_category/add', $data);
		$this->load->view('footer');
	}
	
	/* Edit sub_category Begin */
	public function edit($id)
	{
		$data['site_title'] = SUBCAT_PAGE." - ".SUBCAT_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
			$us_id=$this->sub_category_model->get_sub_category_details($id);
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required'),
					array('field' => 'status',
							'label' => 'Status',
							'rules' => 'trim|required'),
					array('field' => 'cat_id',
							'label' => 'Category',
							'rules' => 'trim|required')
			);
				
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				$set_data=$_POST;
				
				
					$user_detail = array('name' => $set_data['name'],
							'status' => $set_data['status'],
                   				        'updated_on' => date("Y-m-d H:i:s"),
							'cat_id' => $set_data['cat_id']
					);
					
					$this->sub_category_model->update_sub_category($user_detail,$id);
		
					$this->session->set_flashdata ('SucMessage',SUBCAT_PAGE." ".UPDATED_SUS);
					redirect(base_url().'sub_category/',"refresh");
				
			}
		}
	
		if($this->sub_category_model->get_sub_category_details($id))
		{
			$data['details']=$this->sub_category_model->get_sub_category_details($id);
			$data['category_list']=$this->sub_category_model->category_list();
			$this->load->view('header',$data);
			$this->load->view('sub_category/edit', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'sub_category/','refresh');
		}
	
	}
	
	
	
	
	//Delete the user
	public function delete($id)
	{
		if ($this->sub_category_model->get_sub_category_details($id))
		{
			$result = $this->sub_category_model->delete_sub_category($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',SUBCAT_PAGE." ".DELETED_SUS);
				redirect(base_url().'sub_category/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'sub_category/', 'refresh');
		}
	}
	

	

}

/* End of file sub_category.php */
/* Location: ./application/controllers/sub_category.php */
