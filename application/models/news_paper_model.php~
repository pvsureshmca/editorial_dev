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
class News_paper_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}

	
	public function news_paper_list()
	{
	
	
		$query_set=array();
	
		$select=array('*');
	
		$this->db->select($select);
		$this->db->from('news_paper');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		return $query_set;
	}
	
	
	public function get_news_paper_details($id)
	{
		$select=array('*');
		$this->db->select($select);
		$this->db->from('news_paper');
		$this->db->where("md5(id)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		return false;
	}
	
	
	
	
	public function add_news_paper($data)
	{
		$this->db->insert("news_paper", $data);
		return $this->db->insert_id();
	}
	
	
	
	public function update_news_paper($set_data, $uid)
	{
	
		$this->db->where('md5(id)', $uid);
		$this->db->update('news_paper',$set_data);
		return true;
	}
         public function add_article_newspaper($data,$id)
	{
		if(!empty($id)){
			$this->db->where('newspaper_id', $id);
			$this->db->delete('article_newspaper');
		}
                 if(sizeof($data)>0){
		$this->db->insert_batch("article_newspaper", $data);
                }
		return true;
	}
	public function get_article_newspaper($id)
	{
		$select=array('A.*','N.title');
		$this->db->select($select);
		$this->db->from('article_newspaper AS A');
                $this->db->join('article AS N', 'A.article_id=N.id');
		$this->db->where("md5(A.newspaper_id)", $id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			
			return $query_set;
		}
		return array();
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
	public function delete_news_paper($uid)
	{
	
		$this->db->query("delete from article_newspaper where  md5(newspaper_id)='".$uid."'");
                $this->db->query("delete from article_newspaper_version where  md5(newspaper_id)='".$uid."'");

		$this->db->where('md5(id)', $uid);
		$this->db->delete('news_paper');
		
		return true;
	}

	
}
?>
