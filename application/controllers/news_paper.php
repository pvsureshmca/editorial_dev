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
class News_paper extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('news_paper_model');
	}


	/* List news_paper Begin*/
	public function index()
	{
		$data['site_title'] = NEWS_PAGE." - ".NEWS_LIST;
		$data['user_list']=$this->news_paper_model->news_paper_list();
		$this->load->view('header',$data);
		$this->load->view('news_paper/list', $data);
		$this->load->view('footer');
	}
	/* List news_paper end*/

	
	/* Add news_paper Begin */
	public function add()
	{
		$data['site_title'] = NEWS_PAGE." - ".NEWS_ADD;
		$data['ErrorMessages'] = '';
		 $data['article_set'] = array();
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
			if(isset($_POST['article_id'])){ $data['article_set'] = $_POST['article_id'];}
                    else{
                      $_POST['article_id']= "";
                     }	
	
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|is_unique[news_paper.name]'),
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
					$p_id=$this->news_paper_model->add_news_paper($user_detail);
                                        $article_data = array();
                                       if($_POST['article_id']!="" && sizeof($_POST['article_id'])>0){
                                        for ($i=0;$i< sizeof($_POST['article_id']);$i++){
						$article_data[] = array(
								
								'newspaper_id' =>  $p_id, 
                                                                 'article_id' => $_POST['article_id'][$i]
						);
                                              
					}
                                     }
                                        $this->news_paper_model->add_article_newspaper($article_data,$id="");
					$this->session->set_flashdata ('SucMessage',NEWS_PAGE." ".CREATED_SUS);
					redirect(base_url().'news_paper/',"refresh");
				
				
				
			}
		}
                $data['article_list']=$this->news_paper_model->article_list();
		$this->load->view('header',$data);
		$this->load->view('news_paper/add', $data);
		$this->load->view('footer');
	}
	
	/* Edit news_paper Begin */
	public function edit($id)
	{
		$data['site_title'] = NEWS_PAGE." - ".NEWS_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
			 if(!isset($_POST['article_id'])){
                             $_POST['article_id']= "";
                        }	
			$us_id=$this->news_paper_model->get_news_paper_details($id);
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|edit_unique[news_paper.name.'.$us_id['id'].']'),
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
					
					$this->news_paper_model->update_news_paper($user_detail,$id);
		                         $article_data = array();
                                      if($_POST['article_id']!="" && sizeof($_POST['article_id'])>0){
					for ($i=0;$i< sizeof($_POST['article_id']);$i++){
						$article_data[] = array(
								
								'newspaper_id' => $us_id['id'], 
                                                                 'article_id' => $_POST['article_id'][$i]
						);
                                              
					}
                                    }
                                          $this->news_paper_model->add_article_newspaper($article_data,$us_id['id']);
					$this->session->set_flashdata ('SucMessage',NEWS_PAGE." ".UPDATED_SUS);

					redirect(base_url().'news_paper/',"refresh");
				
			}
		}
	
		if($this->news_paper_model->get_news_paper_details($id))
		{
			$data['details']=$this->news_paper_model->get_news_paper_details($id);
                        $data['article_list']=$this->news_paper_model->article_list();
                         $article_set = $this->news_paper_model->get_article_newspaper($id);
                          $article_set_val=array();
                         foreach ($article_set as $item) {
			     $article_set_val[] = $item['article_id'];
			}
                        $data['article_set'] =$article_set_val;
			$this->load->view('header',$data);
			$this->load->view('news_paper/edit', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'news_paper/','refresh');
		}
	
	}
	
	
	
	
	//Delete the user
	public function delete($id)
	{
		if ($this->news_paper_model->get_news_paper_details($id))
		{
			$result = $this->news_paper_model->delete_news_paper($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',NEWS_PAGE." ".DELETED_SUS);
				redirect(base_url().'news_paper/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'news_paper/', 'refresh');
		}
	}
	

	

}

/* End of file news_paper.php */
/* Location: ./application/controllers/news_paper.php */
