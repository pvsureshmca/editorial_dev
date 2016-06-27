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
class Sub_two_category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('photo_sub_two_category_model');
	}


	/* List sub_two_category Begin*/
	public function index()
	{
		$data['site_title'] = SUBTWOCAT_PAGE." - ".SUBTWOCAT_LIST;
		$data['user_list']=$this->photo_sub_two_category_model->sub_two_category_list();
		$this->load->view('header',$data);
		$this->load->view('photo_gallery/sub_two_category/list', $data);
		$this->load->view('footer');
	}
	/* List sub_two_category end*/

	
	/* Add sub_two_category Begin */
	public function add()
	{
		$data['site_title'] = SUBTWOCAT_PAGE." - ".SUBTWOCAT_ADD;
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
							'rules' => 'trim|required'),
                                        array('field' => 'sub_cat_id',
							'label' => 'Sub level two category',
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
                                                'sub_cat_id' => $set_data['sub_cat_id'],
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					$this->photo_sub_two_category_model->add_sub_two_category($user_detail);
					$this->session->set_flashdata ('SucMessage',SUBTWOCAT_PAGE." ".CREATED_SUS);
					redirect(base_url().'photo_gallery/sub_two_category/',"refresh");
				
				
				
			}
		}
		$data['category_list']=$this->photo_sub_two_category_model->category_list();
		$this->load->view('header',$data);
		$this->load->view('photo_gallery/sub_two_category/add', $data);
		$this->load->view('footer');
                $this->load->view('photo_gallery/sub_two_category/script');
	}
	
	/* Edit sub_two_category Begin */
	public function edit($id)
	{
		$data['site_title'] = SUBTWOCAT_PAGE." - ".SUBTWOCAT_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
				
			$us_id=$this->photo_sub_two_category_model->get_sub_two_category_details($id);
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required'),
					array('field' => 'status',
							'label' => 'Status',
							'rules' => 'trim|required'),
					array('field' => 'cat_id',
							'label' => 'Category',
							'rules' => 'trim|required'),
                                       array('field' => 'sub_cat_id',
							'label' => 'Sub level two category',
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
							'cat_id' => $set_data['cat_id'],
                                                        'sub_cat_id' => $set_data['sub_cat_id'],
					);
					
					$this->photo_sub_two_category_model->update_sub_two_category($user_detail,$id);
		
					$this->session->set_flashdata ('SucMessage',SUBTWOCAT_PAGE." ".UPDATED_SUS);
					redirect(base_url().'photo_gallery/sub_two_category/',"refresh");
				
			}
		}
	
		if($this->photo_sub_two_category_model->get_sub_two_category_details($id))
		{
			$data['details']=$this->photo_sub_two_category_model->get_sub_two_category_details($id);
			$data['category_list']=$this->photo_sub_two_category_model->category_list();
			$this->load->view('header',$data);
			$this->load->view('photo_gallery/sub_two_category/edit', $data);
			$this->load->view('footer');
                         $this->load->view('photo_gallery/sub_two_category/script');
		}
		else {
			redirect(base_url().'photo_gallery/sub_two_category/','refresh');
		}
	
	}
	
	
	
	
	//Delete the user
	public function delete($id)
	{
		if ($this->photo_sub_two_category_model->get_sub_two_category_details($id))
		{
			$result = $this->photo_sub_two_category_model->delete_sub_two_category($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',SUBTWOCAT_PAGE." ".DELETED_SUS);
				redirect(base_url().'photo_gallery/sub_two_category/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'photo_gallery/sub_two_category/', 'refresh');
		}
	}

         
       
	public function ajax_list()
	{
		$SelId=(isset($_POST['SelId'])) ? $_POST['SelId']:'';
                $SelType=(isset($_POST['SelType'])) ? $_POST['SelType']:'';


                switch ($SelType) {
		    case "SubCat":
			
                       if(!empty($SelId)){
				$data=$this->photo_sub_two_category_model->sub_category_list($SelId);
				if(sizeof($data)>0){
					$JSonText='{"": "Select Sub category"}';
					foreach($data as $val)
					{
						$JSonText.=',{"'.$val['id'].'": "'.$val['name'].'"}';
					}
					echo '{"ajax_res":"true","sel_list":['.$JSonText.']}';
				}
				else{
					echo '{"ajax_res":"true","sel_list":[{"": "Select Sub category"}]}';
				}
			}
			else{	echo '{"ajax_res":"false","ajax_msg":"Please Select valid action"}';	}


			break;
		    
		    
		    default:
			echo '{"ajax_res":"false","ajax_msg":"Please Select valid action"}';	
		}
		

		
		
	}
	

	

}

/* End of file sub_two_category.php */
/* Location: ./application/controllers/sub_two_category.php */
