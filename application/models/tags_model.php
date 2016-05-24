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
class Tags_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function tags_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('tags');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_tags_details($id)
	{
		$select=array('*');
		$this->db->select($select);
		$this->db->from('tags');
		$this->db->where("md5(id)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		return false;
	}
	
	
	
	
	public function add_tags($data)
	{
		$this->db->insert("tags", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_tags($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('tags',$set_data);
		return true;
	}
	
	public function delete_tags($uid)
	{
	
		
		$this->db->where('md5(id)', $uid);
		$this->db->delete('tags');
		
		return true;
	}

	
}
?>
