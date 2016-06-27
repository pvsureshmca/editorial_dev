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
class Photo_sub_two_category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function sub_two_category_list()
	{
	
	
		$query_set=array();
	
		$select=array('SBT.*','C.name as category','SB.name as sub_category');
	
		$this->db->select($select);
		$this->db->from('photo_sub_two_category SBT');
		$this->db->join('photo_category AS C', 'SBT.cat_id=C.id');
                $this->db->join('photo_sub_category AS SB', 'SBT.sub_cat_id=SB.id');
		$this->db->order_by("SBT.id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_sub_two_category_details($id)
	{
		$select=array('SBT.*','C.name as category','SB.name as sub_category');
	
		$this->db->select($select);
		$this->db->from('photo_sub_two_category SBT');
		$this->db->join('photo_category AS C', 'SBT.cat_id=C.id');
                $this->db->join('photo_sub_category AS SB', 'SBT.sub_cat_id=SB.id');
		$this->db->where("md5(SBT.id)", $id);
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
	
	
	public function add_sub_two_category($data)
	{
		$this->db->insert("photo_sub_two_category", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_sub_two_category($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('photo_sub_two_category',$set_data);
		return true;
	}
	
	public function delete_sub_two_category($uid)
	{
	
                 // delete quotes
		$query = $this->db->query("select photo_id from photos_sub_two_category where  md5(sub_cat_id)='".$uid."'");
		
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			$ids = array_column($query_set, 'photo_id');
                        
                       
                        $this->db->where_in('photo_id', $ids);
		        $this->db->delete('photos_sub_two_category');

                       
		}
		  $this->db->where('md5(id)', $uid);
		  $this->db->delete('photo_sub_two_category');
			
		return true;
	}

     public function sub_category_list($id)
	{
	
	
		$query_set=array();
	
		$select=array('id','name');
	
		$this->db->select($select);
		$this->db->from('photo_sub_category');
		$this->db->where("cat_id", $id);
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}

	
}
?>
