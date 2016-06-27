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
class Photos_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function photos_list()
	{
	
	
		$query_set=array();
	
		$select=array('P.*','U.user_name');
	
		$this->db->select($select);
		$this->db->from('photos P');
		$this->db->join('user AS U', 'P.user_id=U.id');
                if($data!=""){
                   
                    if(isset($data['cat_id']) && !empty($data['cat_id'])){
                    $this->db->where("P.id in (select photo_id from photos_category where cat_id='". $data['cat_id']."')");
                    }
                     if(isset($data['sub_cat_id']) && !empty($data['sub_cat_id'])){
                    $this->db->where("P.id in (select photo_id from photos_sub_category where sub_cat_id='". $data['sub_cat_id']."')");
                    }
                      if(isset($data['sub_two_cat_id']) && !empty($data['sub_two_cat_id'])){
                    $this->db->where("P.id in (select photo_id from photos_two_sub_category where sub_two_cat_id='". $data['sub_two_cat_id']."')");
                    }
                    if(isset($data['status']) && !empty($data['status'])){
                    $this->db->where("P.status", $data['status']);
                    }
                 }


		$this->db->order_by("id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_photo_details($id)
	{
		$select=array('*');
		$select=array('P.*','U.user_name');
	
		$this->db->select($select);
		$this->db->from('photos P');
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
	
	
	
	
	public function add_photos($data)
	{
		$this->db->insert("photos", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_photos($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('photos',$set_data);
		return true;
	}
	
	public function delete_photos($uid)
	{
	
		  // delete quotes
		
                $this->db->where('md5(photo_id)', $uid);
		$this->db->delete('photos_sub_category');
                $this->db->where('md5(photo_id)', $uid);
		$this->db->delete('photos_sub_two_category');
		$this->db->where('md5(photo_id)', $uid);
		$this->db->delete('photos_category');
                $this->db->where('md5(photo_id)', $uid);
		$this->db->delete('photos_tags');
		$this->db->where('md5(id)', $uid);
		$this->db->delete('photos');
		return true;
	}

         public function tag_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('photo_tags');
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
		$this->db->from('photo_tags');
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
		$this->db->from('photo_tags');
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
		$this->db->insert("photo_tags", $data);
		return $this->db->insert_id();
	}
        public function add_photos_tag($data,$id)
	{
		if(!empty($id)){
			$this->db->where('photo_id', $id);
			$this->db->delete('photos_tags');
		}
                if(sizeof($data)>0){
		$this->db->insert_batch("photos_tags", $data);
                 }
		return true;
	}

       public function add_photos_category($data,$id)
	{
		if(!empty($id)){
			$this->db->where('photo_id', $id);
			$this->db->delete('photos_category');
		}
                if(sizeof($data)>0){
		$this->db->insert_batch("photos_category", $data);
                 }
		return true;
	}

      public function add_photos_sub_category($data,$id)
	{
		if(!empty($id)){
			$this->db->where('photo_id', $id);
			$this->db->delete('photos_sub_category');
		}
                if(sizeof($data)>0){
		$this->db->insert_batch("photos_sub_category", $data);
                 }
		return true;
	}
     public function add_photos_sub_two_category($data,$id)
	{
		if(!empty($id)){
			$this->db->where('photo_id', $id);
			$this->db->delete('photos_sub_two_category');
		}
                if(sizeof($data)>0){
		$this->db->insert_batch("photos_sub_two_category", $data);
                 }
		return true;
	}

        public function photo_category_list()
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

        public function photo_sub_category_list($id)
	{
	
	
		$query_set=array();
	
		$select=array('id','name');
	
		$this->db->select($select);
		$this->db->from('photo_sub_category');
                if($id!=""){
		$this->db->where("cat_id", $id);
                }
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}

        public function photo_sub_two_category_list($id)
	{
	
	
		$query_set=array();
	
		$select=array('id','name');
	
		$this->db->select($select);
		$this->db->from('photo_sub_two_category');
                if($id!=""){
		$this->db->where("sub_cat_id", $id);
                }
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}

       public function get_photos_category($id)
	{
		$select=array('A.*','T.name');
		$this->db->select($select);
		$this->db->from('photos_category AS A');
                $this->db->join('photo_category  AS T', 'A.cat_id=T.id');
                $this->db->where("md5(A.photo_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}

         public function get_photos_sub_category($id)
	{
		$select=array('A.*','T.name');
		$this->db->select($select);
		$this->db->from('photos_sub_category AS A');
                $this->db->join('photo_sub_category  AS T', 'A.sub_cat_id=T.id');
                $this->db->where("md5(A.photo_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}

          public function get_photos_sub_two_category($id)
	{
		$select=array('A.*','T.name');
		$this->db->select($select);
		$this->db->from('photos_sub_two_category AS A');
                $this->db->join('photo_sub_two_category  AS T', 'A.sub_two_cat_id=T.id');
                $this->db->where("md5(A.photo_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}

       public function get_photos_tags($id)
	{
		$select=array('A.*','T.name');
		$this->db->select($select);
		$this->db->from('photos_tags AS A');
                $this->db->join('photo_tags AS T', 'A.tag_id=T.id');
		$this->db->where("md5(A.photo_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
	}
	
}
?>
