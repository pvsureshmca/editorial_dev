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
class Bookmark extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('bookmark_model');
	}


	/* List bookmark Begin*/
	public function index()
	{
		$data['site_title'] = BOOKMARK_PAGE." - ".BOOKMARK_LIST;
                
		$data['bookmark_list']=$this->bookmark_model->bookmark_list();
                
		$this->load->view('header',$data);
		$this->load->view('bookmark/list', $data);
		$this->load->view('footer', $data);
	}
	/* List bookmark end*/

	
	/* Add bookmark Begin */
	public function add()
	{
		$data['site_title'] = BOOKMARK_PAGE." - ".BOOKMARK_ADD;
		$data['ErrorMessages'] = '';
		
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{

                                               
			
			$config = array(
					array('field' => 'title',
							'label' => 'Title',
							'rules' => 'trim|required|is_unique[bookmark.title]'),
					 array('field' => 'url',
							'label' => 'URL',
							'rules' => 'trim|required'),
					array('field' => 'description',
							'label' => 'Description',
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
						'title' => $set_data['title'],
						'url' => $set_data['url'],
                                                'user_id' => $this->session->userdata('uid'),
                                                'description' => $set_data['description'],
                                                'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					
					$this->bookmark_model->add_bookmark($user_detail);
                                        
					$this->session->set_flashdata ('SucMessage',BOOKMARK_PAGE." ".CREATED_SUS);
					redirect(base_url().'bookmark/',"refresh");
				
				
				
			}
		}
		
		$this->load->view('header',$data);
		$this->load->view('bookmark/add', $data);
		$this->load->view('footer');
	}
	
	/* Edit bookmark Begin */
	public function edit($id)
	{
		$data['site_title'] = BOOKMARK_PAGE." - ".BOOKMARK_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
                       	
			$us_id=$this->bookmark_model->get_bookmark_details($id);
			$config = array(
					array('field' => 'title',
							'label' => 'Title',
							'rules' => 'trim|required|edit_unique[bookmark.title.'.$us_id['id'].']'),
					array('field' => 'url',
							'label' => 'URL',
							'rules' => 'trim|required'),
					array('field' => 'description',
							'label' => 'Description',
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
						'title' => $set_data['title'],
						'url' => $set_data['url'],
                                                'description' => $set_data['description'],
						'updated_on' => date("Y-m-d H:i:s")
					);
					
					$this->bookmark_model->update_bookmark($user_detail,$id);
					
                                       
					$this->session->set_flashdata ('SucMessage',BOOKMARK_PAGE." ".UPDATED_SUS);
					redirect(base_url().'bookmark/',"refresh");
				
			}
		}
	
		if($this->bookmark_model->get_bookmark_details($id))
		{
			$news_set_val=array();
                        $data['details']=$this->bookmark_model->get_bookmark_details($id);
                       
			$this->load->view('header',$data);
			$this->load->view('bookmark/edit', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'bookmark/','refresh');
		}
	
	}


      //Delete the user
	public function delete($id)
	{
		if ($this->bookmark_model->get_bookmark_details($id))
		{
			$result = $this->bookmark_model->delete_bookmark($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',BOOKMARK_PAGE." ".DELETED_SUS);
				redirect(base_url().'bookmark/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'bookmark/', 'refresh');
		}
	}
	
	

}

/* End of file bookmark.php */
/* Location: ./application/controllers/bookmark.php */
