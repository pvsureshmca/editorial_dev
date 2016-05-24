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
class Bookmark_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function bookmark_list()
	{
	
	
		$query_set=array();
	
		$select=array('P.*','U.user_name');
	
		$this->db->select($select);
		$this->db->from('bookmark P');
		$this->db->join('user AS U', 'P.user_id=U.id');
                $this->db->order_by("P.id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_bookmark_details($id)
	{
		$query_set=array();
	
		$select=array('P.*','U.user_name');
	
		$this->db->select($select);
		$this->db->from('bookmark P');
		$this->db->join('user AS U', 'P.user_id=U.id');
                $this->db->where("md5(P.id)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		return false;
	}
	
	

	

	public function add_bookmark($data)
	{
		$this->db->insert("bookmark", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_bookmark($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('bookmark',$set_data);
		return true;
	}
	
	

	public function delete_bookmark($uid)
	{
	
		
		
			
			$this->db->where('md5(id)', $uid);
			$this->db->delete('bookmark');
			
		return true;
	}
	
	
	
}
?>
