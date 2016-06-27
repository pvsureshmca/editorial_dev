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
class Category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('photo_category_model');
	}


	/* List category Begin*/
	public function index()
	{
		$data['site_title'] = CAT_PAGE." - ".CAT_LIST;
		$data['user_list']=$this->photo_category_model->category_list();
		$this->load->view('header',$data);
		$this->load->view('photo_gallery/category/list', $data);
		$this->load->view('footer');
	}
	/* List category end*/

	
	/* Add category Begin */
	public function add()
	{
		$data['site_title'] = CAT_PAGE." - ".CAT_ADD;
		$data['ErrorMessages'] = '';
		 
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
	
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|is_unique[photo_category.name]'),
					 array('field' => 'status',
							'label' => 'Status',
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
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					$this->photo_category_model->add_category($user_detail);
					$this->session->set_flashdata ('SucMessage',CAT_PAGE." ".CREATED_SUS);
					redirect(base_url().'photo_gallery/category/',"refresh");
				
				
				
			}
		}
		$this->load->view('header',$data);
		$this->load->view('photo_gallery/category/add', $data);
		$this->load->view('footer');
	}
	
	/* Edit category Begin */
	public function edit($id)
	{
		$data['site_title'] = CAT_PAGE." - ".CAT_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
			$us_id=$this->photo_category_model->get_category_details($id);
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|edit_unique[photo_category.name.'.$us_id['id'].']'),
					 array('field' => 'status',
							'label' => 'Status',
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
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					
					$this->photo_category_model->update_category($user_detail,$id);
		
					$this->session->set_flashdata ('SucMessage',CAT_PAGE." ".UPDATED_SUS);
					redirect(base_url().'photo_gallery/category/',"refresh");
				
			}
		}
	
		if($this->photo_category_model->get_category_details($id))
		{
			$data['details']=$this->photo_category_model->get_category_details($id);
			$this->load->view('header',$data);
			$this->load->view('photo_gallery/category/edit', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'photo_gallery/category/','refresh');
		}
	
	}
	
	
	
	
	//Delete the user
	public function delete($id)
	{
		if ($this->photo_category_model->get_category_details($id))
		{
			$result = $this->photo_category_model->delete_category($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',CAT_PAGE." ".DELETED_SUS);
				redirect(base_url().'photo_gallery/category/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'photo_gallery/category/', 'refresh');
		}
	}
	

	

}

/* End of file photo_category.php */
/* Location: ./application/controllers/photo_gallery/category.php */
