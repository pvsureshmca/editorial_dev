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
class Article_comment extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('article_comment_model');
	}


	/* List article_comment Begin*/
	public function index()
	{
		$data['site_title'] = ARTCMD_PAGE." - ".ARTCMD_LIST;
		$data['user_list']=$this->article_comment_model->article_comment_list();
		$this->load->view('header',$data);
		$this->load->view('article_comment/list', $data);
		$this->load->view('footer');
	}
	/* List article_comment end*/

	
	/* Add article_comment Begin */
	public function add()
	{
		$data['site_title'] = ARTCMD_PAGE." - ".ARTCMD_ADD;
		$data['ErrorMessages'] = '';
		 
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
	
			$config = array(
					array('field' => 'description',
							'label' => 'Description',
							'rules' => 'trim|required'),
					array('field' => 'article_id',
							'label' => 'Article',
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
						'description' => $set_data['description'],
						'user_id' => $this->session->userdata('uid'),
						'article_id' => $set_data['article_id'],
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					$this->article_comment_model->add_article_comment($user_detail);
					$this->session->set_flashdata ('SucMessage',ARTCMD_PAGE." ".CREATED_SUS);
					redirect(base_url().'article_comment/',"refresh");
				
				
				
			}
		}
		$data['article_list']=$this->article_comment_model->article_list();
		$this->load->view('header',$data);
		$this->load->view('article_comment/add', $data);
		$this->load->view('footer');
	}
	
	/* Edit article_comment Begin */
	public function edit($id)
	{
		$data['site_title'] = ARTCMD_PAGE." - ".ARTCMD_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
			$us_id=$this->article_comment_model->get_article_comment_details($id);
			$config = array(
					array('field' => 'description',
							'label' => 'Description',
							'rules' => 'trim|required'),
					array('field' => 'article_id',
							'label' => 'Article',
							'rules' => 'trim|required')
			);
				
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				$set_data=$_POST;
				
				
					$user_detail = array('description' => $set_data['description'],
                   				        'updated_on' => date("Y-m-d H:i:s"),
							'article_id' => $set_data['article_id']
					);
					
					$this->article_comment_model->update_article_comment($user_detail,$id);
		
					$this->session->set_flashdata ('SucMessage',ARTCMD_PAGE." ".UPDATED_SUS);
					redirect(base_url().'article_comment/',"refresh");
				
			}
		}
	
		if($this->article_comment_model->get_article_comment_details($id))
		{
			$data['details']=$this->article_comment_model->get_article_comment_details($id);
			$data['article_list']=$this->article_comment_model->article_list();
			$this->load->view('header',$data);
			$this->load->view('article_comment/edit', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'article_comment/','refresh');
		}
	
	}
	
	
	
	
	//Delete the user
	public function delete($id)
	{
		if ($this->article_comment_model->get_article_comment_details($id))
		{
			$result = $this->article_comment_model->delete_article_comment($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',ARTCMD_PAGE." ".DELETED_SUS);
				redirect(base_url().'article_comment/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'article_comment/', 'refresh');
		}
	}
	

	

}

/* End of file article_comment.php */
/* Location: ./application/controllers/article_comment.php */
