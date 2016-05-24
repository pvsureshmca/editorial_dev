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
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function user_list()
	{
		
		
		$query_set=array();

		$select = array('u.*', 'r.name as role'
		);
		$this->db->select($select);
		$this->db->from('user AS u');
		$this->db->join('role AS r', 'u.role_id=r.id');  
		$this->db->order_by("u.id", "desc");
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}

	
	public function get_user_details($id)
	{
		$select=array('*');
		$this->db->select($select);
		$this->db->from('user');
		$this->db->where("md5(id)", $id);
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		return false;
	}



	
	public function add_user($data)
	{
		$this->db->insert("user", $data);
		return $this->db->insert_id();
	}

	
	
	public function update_user($set_data, $uid)
	{
		
		$this->db->where('md5(id)', $uid);
		$this->db->update('user',$set_data);
		return true;
	}
	
	public function delete_user($uid)
	{
		// delete quotes
		$query = $this->db->query("select id from article where  md5(user_id)='".$uid."'");
		
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

		$this->db->query("delete from bookmark where  md5(user_id)='".$uid."'");
		$this->db->where('md5(id)', $uid);
		$this->db->delete('user');
		return true;
	}

	public function role_list()
	{
		
		
		$query_set=array();

		$select=array('*');

		$this->db->select($select);
		$this->db->from('role');
		$this->db->order_by("name", "ASC");
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	

	

	

	

	
	
	

	





	

	
}
?>
