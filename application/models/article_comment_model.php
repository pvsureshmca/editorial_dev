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
class Article_comment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function article_comment_list()
	{
	
	
		$query_set=array();
	
		$select=array('SB.*','C.title as article','U.user_name');
	
		$this->db->select($select);
		$this->db->from('article_comment SB');
		$this->db->join('article AS C', 'SB.article_id=C.id');
                $this->db->join('user AS U', 'SB.user_id=U.id');
		$this->db->order_by("SB.id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_article_comment_details($id)
	{
		$select=array('SB.*','C.title as article','U.user_name');
		$this->db->select($select);
		$this->db->from('article_comment SB');
		$this->db->join('article AS C', 'SB.article_id=C.id');
                $this->db->join('user AS U', 'SB.user_id=U.id');
		$this->db->where("md5(SB.id)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		return false;
	}
	

	public function article_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('article');
		$this->db->order_by("title", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function add_article_comment($data)
	{
		$this->db->insert("article_comment", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_article_comment($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('article_comment',$set_data);
		return true;
	}
	
	public function delete_article_comment($uid)
	{
	
		  $this->db->where('md5(id)', $uid);
		  $this->db->delete('article_comment');
			
		return true;
	}

	
}
?>
