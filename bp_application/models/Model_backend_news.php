<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_news extends  CI_Model
{
	public function get_news_list_data()
	{
		$this->db->select('news.news_id,news.title,news.details,news.news_image,news.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('news');
		$this->db->join('users', 'users.id = news.entry_by');
		$this->db->order_by("news.news_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_news_data($data)
	{
		$this->db->insert('news',$data);
	}
	

	public function get_news_row($id)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('news_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_news_data($data, $id)
	{
		$this->db->where('news_id', $id);
		$result=$this->db->update('news', $data);
		return $result;		
	}
	
        public function publish_data($data, $ids) {
        $count = 0;
        foreach ($ids as $id) {
            $did = intval($id) . '<br>';
            $this->db->where('news_id', $id);
            $this->db->update('news', $data);
            $count = $count + 1;
        }

        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            ' . $count . ' Item Published successfully
            </div>';
        $count = 0;
    }

    public function unpublish_data($data, $ids) {
        $count = 0;
        foreach ($ids as $id) {
            $did = intval($id) . '<br>';
            $this->db->where('news_id', $id);
            $this->db->update('news', $data);
            $count = $count + 1;
        }

        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            ' . $count . ' Item UnPublished successfully
            </div>';
        $count = 0;
    }

}