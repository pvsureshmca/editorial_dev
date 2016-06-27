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
class Tags extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('photo_tags_model');
	}


	/* List tags Begin*/
	public function index()
	{
		$data['site_title'] = TAGS_PAGE." - ".TAGS_LIST;
		$data['user_list']=$this->photo_tags_model->tags_list();
		$this->load->view('header',$data);
		$this->load->view('photo_gallery/tags/list', $data);
		$this->load->view('footer');
	}
	/* List tags end*/

	
	/* Add tags Begin */
	public function add()
	{
		$data['site_title'] = TAGS_PAGE." - ".TAGS_ADD;
		$data['ErrorMessages'] = '';
		 
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
	
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|is_unique[photo_tags.name]'),
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
					$this->photo_tags_model->add_tags($user_detail);
					$this->session->set_flashdata ('SucMessage',TAGS_PAGE." ".CREATED_SUS);
					redirect(base_url().'photo_gallery/tags/',"refresh");
				
				
				
			}
		}
		$this->load->view('header',$data);
		$this->load->view('photo_gallery/tags/add', $data);
		$this->load->view('footer');
	}
	
	/* Edit tags Begin */
	public function edit($id)
	{
		$data['site_title'] = TAGS_PAGE." - ".TAGS_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
			$us_id=$this->photo_tags_model->get_tags_details($id);
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|edit_unique[photo_tags.name.'.$us_id['id'].']'),
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
					
					$this->photo_tags_model->update_tags($user_detail,$id);
		
					$this->session->set_flashdata ('SucMessage',TAGS_PAGE." ".UPDATED_SUS);
					redirect(base_url().'photo_gallery/tags/',"refresh");
				
			}
		}
	
		if($this->photo_tags_model->get_tags_details($id))
		{
			$data['details']=$this->photo_tags_model->get_tags_details($id);
			$this->load->view('header',$data);
			$this->load->view('photo_gallery/tags/edit', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'photo_gallery/tags/','refresh');
		}
	
	}
	
	
	
	
	//Delete the user
	public function delete($id)
	{
		if ($this->photo_tags_model->get_tags_details($id))
		{
			$result = $this->photo_tags_model->delete_tags($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',TAGS_PAGE." ".DELETED_SUS);
				redirect(base_url().'photo_gallery/tags/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'photo_gallery/tags/', 'refresh');
		}
	}
	

	

}

/* End of file tags.php */
/* Location: ./application/controllers/tags.php */
