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
class Photo_sub_category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function sub_category_list()
	{
	
	
		$query_set=array();
	
		$select=array('SB.*','C.name as category');
	
		$this->db->select($select);
		$this->db->from('photo_sub_category SB');
		$this->db->join('photo_category AS C', 'SB.cat_id=C.id');
		$this->db->order_by("SB.id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_sub_category_details($id)
	{
		$select=array('SB.*');
		$this->db->select($select);
		$this->db->from('photo_sub_category SB');
		$this->db->join('photo_category AS C', 'SB.cat_id=C.id');
		$this->db->where("md5(SB.id)", $id);
		$query = $this->db->get();
	
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
		$this->db->from('photo_category');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function add_sub_category($data)
	{
		$this->db->insert("photo_sub_category", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_sub_category($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('photo_sub_category',$set_data);
		return true;
	}
	
	public function delete_sub_category($uid)
	{
	
                 // delete quotes
		$query = $this->db->query("select photo_id from photos_sub_category where  md5(sub_cat_id)='".$uid."'");
		
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			$ids = array_column($query_set, 'photo_id');
                        
                        $this->db->where_in('photo_id', $ids);
		        $this->db->delete('photos_sub_category');

                        $this->db->where_in('photo_id', $ids);
		        $this->db->delete('photos_sub_two_category');

                       
		}
		  $this->db->where('md5(id)', $uid);
		  $this->db->delete('photo_sub_category');
			
		return true;
	}

	
}
?>
