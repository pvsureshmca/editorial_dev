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
class Photo_tags_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function tags_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('photo_tags');
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
		$this->db->from('photo_tags');
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
		$this->db->insert("photo_tags", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_tags($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('photo_tags',$set_data);
		return true;
	}
	
	public function delete_tags($uid)
	{
	
		
		$this->db->where('md5(id)', $uid);
		$this->db->delete('photo_tags');
               
                 $this->db->where_in('md5(tag_id)', $uid);
		 $this->db->delete('photos_tags');
		
		return true;
	}

	
}
?>
