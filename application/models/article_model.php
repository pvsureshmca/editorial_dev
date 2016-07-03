<?php
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
class Article_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function article_list($data)
	{
	
	
		$query_set=array();
	
		$select=array('P.*','SB.name as sub_category','C.name as category','U.user_name');
	
		$this->db->select($select);
		$this->db->from('article P');
		$this->db->join('sub_category AS SB', 'P.sub_cat_id=SB.id');
		$this->db->join('category AS C', 'P.cat_id=C.id');
                $this->db->join('user AS U', 'P.user_id=U.id');
                if($data!=""){
                     if(isset($data['cat_id']) && !empty($data['cat_id'])){$this->db->where("P.cat_id",$data['cat_id']);}
                     if(isset($data['sub_cat_id']) && !empty($data['sub_cat_id'])){$this->db->where("P.sub_cat_id",$data['sub_cat_id']);}
                     if(isset($data['user_id']) && !empty($data['user_id'])){$this->db->where("P.user_id",$data['user_id']);}
                    if(isset($data['from']) && !empty($data['from']) && isset($data['to']) && !empty($data['to']) ){
                    $this->db->where("DATE_FORMAT(P.created_on, '%m/%d/%Y') BETWEEN '". $data['from']. "' and '". $data['to']."'");
                    }
                    if(isset($data['newspaper_id']) && !empty($data['newspaper_id'])){
                    $this->db->where("P.id in (select article_id from article_newspaper where newspaper_id='". $data['newspaper_id']."')");
                    }
   
                     if(isset($data['photos_id']) && !empty($data['photos_id'])){
                    $this->db->where("(P.paper_summary like '%". $data['photos_id']."%' OR
                                       P.web_summary like '%". $data['photos_id']."%' OR 
                                       P.mobile_summary like '%". $data['photos_id']."%' OR
                                       P.paper_description like '%". $data['photos_id']."%' OR
                                       P.web_description like '%". $data['photos_id']."%' OR
                                       P.mobile_description like '%". $data['photos_id']."%' )");
                    }

                    if(isset($data['status']) && !empty($data['status'])){
                    $this->db->where("P.status", $data['status']);
                    }
                 }
                else{
        
                      $this->db->where("DATE_FORMAT(P.created_on, '%m/%d/%Y') = DATE_FORMAT(CURDATE(), '%m/%d/%Y')");
                      $this->db->where("P.status !=", '3');

                 }
		$this->db->order_by("P.id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_article_details($id)
	{
		$query_set=array();
	//echo $id;exit;
		$select=array('P.*','SB.name as sub_category','C.name as category','U.user_name','PG.name as page','L.name as layout');
	
		$this->db->select($select);
		$this->db->from('article P');
		$this->db->join('category AS C', 'P.cat_id=C.id');
		$this->db->join('sub_category AS SB', 'P.sub_cat_id=SB.id');
                $this->db->join('user AS U', 'P.user_id=U.id');
                $this->db->join('page AS PG', 'P.page_id=PG.id');
                $this->db->join('layout AS L', 'P.layout_id=L.id');
		$this->db->where("md5(P.id)", $id);
		$query = $this->db->get();
	//echo $this->db->last_query();exit;
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		return false;
	}
	
	

	public function category_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('category');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	public function sub_category_list($id)
	{
	
	
		$query_set=array();
	
		$select=array('id','name');
	
		$this->db->select($select);
		$this->db->from('sub_category');
		$this->db->where("cat_id", $id);
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	public function news_paper_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('news_paper');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	public function user_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('user');
		$this->db->order_by("user_name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
        public function tag_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('tags');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}

         public function tag_name_list()
	{
	
	
		$query_set=array();
	
		$select=array('name');
	
		$this->db->select($select);
		$this->db->from('tags');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$array_set = $query->result_array();
			
			foreach ($array_set as $item) {
			    $query_set[] = $item['name'];
			}
                      
			return $query_set;
		}
		return $query_set;
	}

         public function get_tag_id($name)
	{
	
	
		$select=array('id');
		$this->db->select($select);
		$this->db->from('tags');
		$this->db->where("LOWER(name)", strtolower($name));
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0]['id'];
		}
		return false;
	}

         public function add_tags($data)
	{
		$this->db->insert("tags", $data);
		return $this->db->insert_id();
	}
        
          public function page_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('page');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}

         public function layout_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('layout');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}

	public function add_article($data)
	{
		$this->db->insert("article", $data);
		return $this->db->insert_id();
	}
	public function add_article_version($data)
	{
		$this->db->insert("article_version", $data);
		return $this->db->insert_id();
	}
	
	
	public function update_article($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('article',$set_data);
		return true;
	}
	
	public function get_article_newspaper($id)
	{
		$select=array('A.*','N.name');
		$this->db->select($select);
		$this->db->from('article_newspaper AS A');
                $this->db->join('news_paper AS N', 'A.newspaper_id=N.id');
		$this->db->where("md5(A.article_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}
	public function get_article_tags($id)
	{
		$select=array('A.*','T.name');
		$this->db->select($select);
		$this->db->from('article_tags AS A');
                $this->db->join('tags AS T', 'A.tag_id=T.id');
		$this->db->where("md5(A.article_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}
	
	public function add_article_newspaper($data,$id)
	{
		if(!empty($id)){
			$this->db->where('article_id', $id);
			$this->db->delete('article_newspaper');
		}
                 if(sizeof($data)>0){
		$this->db->insert_batch("article_newspaper", $data);
                }
		return true;
	}
	public function add_article_tag($data,$id)
	{
		if(!empty($id)){
			$this->db->where('article_id', $id);
			$this->db->delete('article_tags');
		}
                if(sizeof($data)>0){
		$this->db->insert_batch("article_tags", $data);
                 }
		return true;
	}

        public function add_article_newspaper_version($data)
	{
		if(sizeof($data)>0){
		$this->db->insert_batch("article_newspaper_version", $data);
                 }
		return true;
	}
	public function add_article_tag_version($data)
	{
		if(sizeof($data)>0){
		$this->db->insert_batch("article_tags_version", $data);
                }
		return true;
	}
        public function get_article_comment($id)
	{
		$select=array('A.*','U.user_name');
		$this->db->select($select);
		$this->db->from('article_comment AS A');
                $this->db->join('user AS U', 'A.user_id=U.id');
                $this->db->where("md5(A.article_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}
        public function article_version_list($id)
	{
		$select=array('A.id');
		$this->db->select($select);
		$this->db->from('article_version AS A');
                $this->db->where("md5(A.article_id)", $id);
		
                $this->db->order_by("A.id", "DESC");
                $query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}
        public function article_version_list_id($id, $type)
	{
		$select=array('A.id','A.paper_summary','A.web_summary','A.mobile_summary',
                                     'A.paper_description','A.web_description','A.mobile_description');
		$this->db->select($select);
		$this->db->from('article_version AS A');
                $this->db->where("id", $id);
		$query = $this->db->get();
                
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set['0'][$type];
		}
		return false;
	}
	public function delete_article($uid)
	{
	
		
			
                        $this->db->where_in('article_id', $uid);
		        $this->db->delete('article_comment');

                        // article_newspaper
                        
                        $this->db->where('md5(article_id)', $uid);
		        $this->db->delete('article_newspaper');

                         $this->db->where('md5(article_id)', $uid);
		        $this->db->delete('article_newspaper_version');

                         $this->db->where('md5(article_id)', $uid);
		        $this->db->delete('article_tags');

                        $this->db->where('md5(article_id)', $uid);
		        $this->db->delete('article_tags_version');

                        $this->db->where('md5(article_id)', $uid);
		        $this->db->delete('article_version');
		
						
			$this->db->where('md5(id)', $uid);
			$this->db->delete('article');
			
		return true;
	}
	
	 public function photos_list()
	{
	
	
		$query_set=array();
	
		$select=array('P.*');
	
		$this->db->select($select);
		$this->db->from('photos P');
		$this->db->order_by("P.name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
}
?>
