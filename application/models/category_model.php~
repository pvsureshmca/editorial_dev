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
class Category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function category_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('category');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_category_details($id)
	{
		$select=array('*');
		$this->db->select($select);
		$this->db->from('category');
		$this->db->where("md5(id)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		return false;
	}
	
	
	
	
	public function add_category($data)
	{
		$this->db->insert("category", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_category($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('category',$set_data);
		return true;
	}
	
	public function delete_category($uid)
	{
	
		  // delete quotes
		$query = $this->db->query("select id from article where  md5(cat_id)='".$uid."'");
		
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			$ids = array_column($query_set, 'id');
                        
                        $this->db->where_in('article_id', $ids);
		        $this->db->delete('article_comment');

                        // article_newspaper
                        
                        $this->db->where_in('article_id', $ids);
		        $this->db->delete('article_newspaper');

                         $this->db->where_in('article_id', $ids);
		        $this->db->delete('article_newspaper_version');

                         $this->db->where_in('article_id', $ids);
		        $this->db->delete('article_tags');

                        $this->db->where_in('article_id', $ids);
		        $this->db->delete('article_tags_version');

                        $this->db->where_in('article_id', $ids);
		        $this->db->delete('article_version');
		
			$this->db->where_in('id', $ids);
		        $this->db->delete('article');
		}
                $this->db->where('md5(cat_id)', $uid);
		$this->db->delete('sub_category');
		$this->db->where('md5(id)', $uid);
		$this->db->delete('category');
		
		return true;
	}

	
}
?>
