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
error_reporting(E_ALL);
ini_set('display_errors',1);
include APPPATH.'/controllers/common.php';
class Photos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
			
		$this->load->model('photos_model');
	}


	/* List photos Begin*/
	public function index()
	{
		$data['site_title'] = PHOTOS_PAGE." - ".PHOTOS_LIST;
                 $set_data="";
                if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
                     $set_data=$_POST;
                 }
		$data['photos_list']=$this->photos_model->photos_list($set_data);
                $data['cat_list']=$this->photos_model->photos_category_list();
                $data['tag_list']=$this->photos_model->tag_list();
                $data['post_data']=$set_data;
		$this->load->view('header',$data);
		$this->load->view('photo_gallery/photos/list', $data);
		$this->load->view('footer', $data);
                
	}
	/* List photos end*/

	
	/* Add photos Begin */
	public function add()
	{
		$data['site_title'] = PHOTOS_PAGE." - ".PHOTOS_ADD;
		$data['ErrorMessages'] = '';
		$data['cat_set'] = array();
                $data['sub_cat_set'] = array();
                $data['sub_two_two_set'] = array();
		$data['tags_set'] = array();
                                               $data['description'] = "";
						
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{

                                                $data['description'] = $_POST['description'];
						
                    if(isset($_POST['cat_id'])){ $data['cat_set'] = $_POST['cat_id'];}
                    else{
                      $_POST['cat_id']= array();
                     }
                     if(isset($_POST['sub_cat_id'])){ $data['sub_cat_set'] = $_POST['sub_cat_id'];}
                    else{
                      $_POST['sub_cat_id']= array();
                     }
                     if(isset($_POST['sub_two_cat_id'])){ $data['sub_two_cat_set'] = $_POST['sub_two_cat_id'];}
                    else{
                      $_POST['sub_two_cat_id']= array();
                     }
		      if(isset($_POST['tag_id'])){ $data['tags_set'] = $_POST['tag_id'];}
                     else{
                      $_POST['tag_id']= array();
                     }
              
			
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|is_unique[photos.name]'),
					
					array('field' => 'cat_id[]',
							'label' => 'Category',
							'rules' => 'trim|required'),
					array('field' => 'sub_cat_id[]',
							'label' => 'Sub Category',
							'rules' => 'required'),
					array('field' => 'sub_two_cat_id[]',
							'label' => 'Sub level two category',
							'rules' => 'trim|required'),
					array('field' => 'event',
							'label' => 'Event',
							'rules' => 'trim|required'),
					array('field' => 'status',
							'label' => 'status',
							'rules' => 'trim|required')
			);
				
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				$set_data=$_POST;
				
                                $image_path='';
				
				
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!='')
				{   
					$fileExtension2 = explode(".", $_FILES['image']['name']);
					$fileExt = array_pop( $fileExtension2 );
					$filename = str_replace(' ', '_', $set_data['name']).".".$fileExt;
					$config['upload_path'] = PROJECT_PATH.PRODUCT_IMAGE_PATH;
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['file_name'] = $filename;
				
					$image_path = $filename;
				
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image'))
					{
						$data['ErrorMessages'] = $this->upload->display_errors();
					}
					else
					{
						$uploaddata = array('upload_data' => $this->upload->data());
						$filename = $uploaddata['upload_data']['file_name'];
						$this->_createThumbnail($filename,PROJECT_PATH.PRODUCT_IMAGE_PATH,PROJECT_PATH.PRODUCT_THUMB_IMAGE_PATH);
					}
				}
				if($data['ErrorMessages']==""){
				
				
				
					$user_detail = array(
						'name' => $set_data['name'],
						'event' => $set_data['event'],
						'user_id' => $this->session->userdata('uid'),
                                                'last_update_by' => $this->session->userdata('uid'),
                                                'description' => $set_data['description'],
						'status' => $set_data['status'],
                                                'file_name' => $image_path,
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					
					$p_id=$this->photos_model->add_photos($user_detail);

                                       
                                        $cat_data = array();$sub_cat_data=array(); $tag_data=array();$sub_two_cat_data=array();
                                     if($_POST['cat_id']!="" && sizeof($_POST['cat_id'])>0){
					for ($i=0;$i< sizeof($_POST['cat_id']);$i++){
						$cat_data[] = array(
								
								'cat_id' => $_POST['cat_id'][$i], 
                                                                 'photo_id' => $p_id
						);
                                              
					}
                                    }

                                         if($_POST['sub_cat_id']!="" && sizeof($_POST['sub_cat_id'])>0){
					for ($i=0;$i< sizeof($_POST['sub_cat_id']);$i++){
						$sub_cat_data[] = array(
								
								'sub_cat_id' => $_POST['sub_cat_id'][$i], 
                                                                 'photo_id' => $p_id
						);
                                              
					}
                                    }
                                       if($_POST['sub_two_cat_id']!="" && sizeof($_POST['sub_two_cat_id'])>0){
					for ($i=0;$i< sizeof($_POST['sub_two_cat_id']);$i++){
						$sub_two_cat_data[] = array(
								
								'sub_two_cat_id' => $_POST['sub_two_cat_id'][$i], 
                                                                 'photo_id' => $p_id
						);
                                              
					}
                                    }

                                        for ($i=0;$i< sizeof($_POST['tag_id']);$i++){
                                                 
                                              if($res_id=$this->photos_model->get_tag_id($_POST['tag_id'][$i])){
                                                 $tags_id= $res_id;
                                              }
                                         else{
                                              $tag_detail = array(
						'name' => $_POST['tag_id'][$i],
						'status' => '1',
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					       );
					$tags_id= $this->photos_model->add_tags($tag_detail);
                                        }    

						$tag_data[] = array(
								
								'tag_id' => $tags_id, 
                                                                 'photo_id' => $p_id
						);
                                              
					}

                                            


 
					$this->photos_model->add_photos_category($cat_data, $id="");
                                        $this->photos_model->add_photos_tag($tag_data,$id="");
                                        $this->photos_model->add_photos_sub_category($sub_cat, $id="");
                                        $this->photos_model->add_photos_sub_two_category($sub_two_cat, $id="");

                                          
                                        
					$this->session->set_flashdata ('SucMessage',PHOTOS_PAGE." ".CREATED_SUS);
					redirect(base_url().'photo_gallery/photos/',"refresh");

                            }
				
				
				
			}
		}
		$data['cat_list']=$this->photos_model->photo_category_list($val="");
                $data['sub_cat_list']=$this->photos_model->photo_sub_category_list($val="");
                $data['tag_list']=$this->photos_model->tag_name_list();
                $data['sub_two_cat_list']=$this->photos_model->photo_sub_two_category_list($val="");
                $this->load->view('header',$data);
		$this->load->view('photo_gallery/photos/add', $data);
		$this->load->view('footer');
	}
	
	/* Edit photos Begin */
	public function edit($id)
	{
		$data['site_title'] = PHOTOS_PAGE." - ".PHOTOS_EDIT;
		$data['ErrorMessages'] = '';
	
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
                        if(isset($_POST['cat_id'])){ $data['cat_set'] = $_POST['cat_id'];}
                    else{
                      $_POST['cat_id']= array();
                     }
                     if(isset($_POST['sub_cat_id'])){ $data['sub_cat_set'] = $_POST['sub_cat_id'];}
                    else{
                      $_POST['sub_cat_id']= array();
                     }
                     if(isset($_POST['sub_two_cat_id'])){ $data['sub_two_cat_set'] = $_POST['sub_two_cat_id'];}
                    else{
                      $_POST['sub_two_cat_id']= array();
                     }
		      if(isset($_POST['tag_id'])){ $data['tags_set'] = $_POST['tag_id'];}
                     else{
                      $_POST['tag_id']= array();
                     }
				
			$us_id=$this->photos_model->get_photo_details($id);
			$config = array(
					array('field' => 'name',
							'label' => 'Name',
							'rules' => 'trim|required|edit_unique[photos.name.'.$us_id['id'].']'),
					array('field' => 'cat_id[]',
							'label' => 'Category',
							'rules' => 'trim|required'),
					array('field' => 'sub_cat_id[]',
							'label' => 'Sub Category',
							'rules' => 'required'),
					array('field' => 'sub_two_cat_id[]',
							'label' => 'Sub level two category',
							'rules' => 'trim|required'),
					array('field' => 'event',
							'label' => 'Event',
							'rules' => 'trim|required'),
					array('field' => 'status',
							'label' => 'status',
							'rules' => 'trim|required')
			);
				
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				$set_data=$_POST;
				$image_path='';
				
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!='')
				{    $this->load->library('image_lib');
					$fileExtension2 = explode(".", $_FILES['image']['name']);
					$fileExt = array_pop( $fileExtension2 );
					$filename = str_replace(' ', '_', $set_data['name']).".".$fileExt;
					$config['upload_path'] = PROJECT_PATH.PRODUCT_IMAGE_PATH;
					$config['allowed_types'] = 'jpg|png|jpeg|gif';
					$config['file_name'] = $filename;
				
					$image_path = $filename;
				 
					
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image'))
					{
						
						$data['ErrorMessages'] = $this->upload->display_errors();
					}
					else
					{
						
						$uploaddata = array('upload_data' => $this->upload->data());
						$filename = $uploaddata['upload_data']['file_name'];
						$this->_createThumbnail($filename,PROJECT_PATH.PRODUCT_IMAGE_PATH,PROJECT_PATH.PRODUCT_THUMB_IMAGE_PATH);
						if($us_id['file_name']!="" && file_exists(PROJECT_PATH.PRODUCT_IMAGE_PATH.$us_id['file_name'])){
						    unlink ( PROJECT_PATH.PRODUCT_IMAGE_PATH.$us_id['file_name'] );
						    unlink ( PROJECT_PATH.PRODUCT_THUMB_IMAGE_PATH.$us_id['file_name']);
						}
						
					}
				}
				if($data['ErrorMessages']==""){
					$user_detail = array(
						'name' => $set_data['name'],
						'event' => $set_data['event'],
						'last_update_by' => $this->session->userdata('uid'),
                                                'description' => $set_data['description'],
                                                'file_name' => $image_path,
						'status' => $set_data['status'],
                   				'updated_on' => date("Y-m-d H:i:s")
					);
					
					$this->photos_model->update_photos($user_detail,$id);
					
                                        $p_id=$us_id['id'];
                                         $cat_data = array();$sub_cat_data=array(); $tag_data=array();$sub_two_cat_data=array();
                                     if($_POST['cat_id']!="" && sizeof($_POST['cat_id'])>0){
					for ($i=0;$i< sizeof($_POST['cat_id']);$i++){
						$cat_data[] = array(
								
								'cat_id' => $_POST['cat_id'][$i], 
                                                                 'photo_id' => $p_id
						);
                                              
					}
                                    }

                                         if($_POST['sub_cat_id']!="" && sizeof($_POST['sub_cat_id'])>0){
					for ($i=0;$i< sizeof($_POST['sub_cat_id']);$i++){
						$sub_cat_data[] = array(
								
								'sub_cat_id' => $_POST['sub_cat_id'][$i], 
                                                                 'photo_id' => $p_id
						);
                                              
					}
                                    }
                                       if($_POST['sub_two_cat_id']!="" && sizeof($_POST['sub_two_cat_id'])>0){
					for ($i=0;$i< sizeof($_POST['sub_two_cat_id']);$i++){
						$sub_two_cat_data[] = array(
								
								'sub_two_cat_id' => $_POST['sub_two_cat_id'][$i], 
                                                                 'photo_id' => $p_id
						);
                                              
					}
                                    }

                                        for ($i=0;$i< sizeof($_POST['tag_id']);$i++){
                                                 
                                              if($res_id=$this->photos_model->get_tag_id($_POST['tag_id'][$i])){
                                                 $tags_id= $res_id;
                                              }
                                         else{
                                              $tag_detail = array(
						'name' => $_POST['tag_id'][$i],
						'status' => '1',
                    				'created_on' => date("Y-m-d H:i:s"),
                   				'updated_on' => date("Y-m-d H:i:s")
					       );
					$tags_id= $this->photos_model->add_tags($tag_detail);
                                        }    

						$tag_data[] = array(
								
								'tag_id' => $tags_id, 
                                                                 'photo_id' => $p_id
						);
                                              
					}

                                            


 
					$this->photos_model->add_photos_category($cat_data, $p_id);
                                        $this->photos_model->add_photos_tag($tag_data,$p_id);
                                        $this->photos_model->add_photos_sub_category($sub_cat, $p_id);
                                        $this->photos_model->add_photos_sub_two_category($sub_two_cat, $p_id);

					$this->session->set_flashdata ('SucMessage',PHOTOS_PAGE." ".UPDATED_SUS);
					redirect(base_url().'photo_gallery/photos/',"refresh");
			}	
			}
		}
	
		if($this->photos_model->get_photos_details($id))
		{
			$news_set_val=array();
                        $data['details']=$this->photos_model->get_photos_details($id);
                        $data['cat_list']=$this->photos_model->photo_category_list($val="");
                        $data['sub_cat_list']=$this->photos_model->photo_sub_category_list($val="");
                        $data['tag_list']=$this->photos_model->tag_name_list();
                        $data['sub_two_cat_list']=$this->photos_model->photo_sub_two_category_list($val="");

		        $data['tags_set'] = $this->photos_model->get_photos_tags($id);
                        $data['cat_set'] = $this->photos_model->get_photos_category($id);
                        $data['sub_cat_set'] = $this->photos_model->get_photos_sub_category($id);
                        $data['sub_two_cat_set'] = $this->photos_model->get_photos_sub_two_category($id);
			$this->load->view('header',$data);
			$this->load->view('photo_gallery/photos/edit', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'photo_gallery/photos/','refresh');
		}
	
	}


       public function view_photo($id)
	{
		$data['site_title'] = PHOTOS_PAGE." - ".PHOTOS_VIEW;
		$data['ErrorMessages'] = '';
	
		
		if($this->photos_model->get_photo_details($id))
		{
			$news_set_val=array();
                        $data['details']=$this->photos_model->get_photos_details($id);
                        $data['cat_list']=$this->photos_model->photos_category_list($id);
			$this->load->view('header',$data);
			$this->load->view('photo_gallery/photos/view', $data);
			$this->load->view('footer');
		}
		else {
			redirect(base_url().'photo_gallery/photos/','refresh');
		}
	
	}
	
	
	
	
	//Delete the user
	public function delete_photo($id)
	{
		if($this->photos_model->get_photo_details($id))
		{
			$result = $this->photos_model->delete_photos($id);
			if($result){
				$this->session->set_flashdata ('SucMessage',PHOTOS_PAGE." ".DELETED_SUS);
				redirect(base_url().'photo_gallery/photos/', 'refresh');
			}
		}
		else
		{
			redirect(base_url().'photo_gallery/photos/', 'refresh');
		}
	}
	
	
	public function ajax_sub_category_list()
	{
		$SelId=(isset($_POST['SelId'])) ? $_POST['SelId']:'';
                $SelType=(isset($_POST['SelType'])) ? $_POST['SelType']:'';


                switch ($SelType) {
		    case "SubCat":
			
                       if(!empty($SelId)){
				$data=$this->photos_model->photo_sub_category_list($SelId);
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
		    case "SubTwoCat":
			
                         if(!empty($SelId)){
				$data=$this->photos_model->photo_sub_two_category_list($SelId);
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

       

public function _createThumbnail($filename,$imagepath,$thumb_path)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = $imagepath.$filename;
		$config['new_image']=$thumb_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = FALSE;
		$config['overwrite'] = true;
		$config['thumb_marker'] = '';
		$config['width']  = 150;
		$config['height'] = 100;
		$config['master_dim'] = 'auto';
	
		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}

	

}

/* End of file photos.php */
/* Location: ./application/controllers/photos.php */
