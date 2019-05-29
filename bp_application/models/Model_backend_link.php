<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_link extends  CI_Model
{
	public function get_link_list_data()
	{
		$this->db->select('link.link_id,link.link_title,link.link_type,link.link_or_url,link.status,link.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('link');
		$this->db->join('users', 'users.id = link.entry_by');
		$this->db->order_by("link.link_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_link_data($data)
	{
		$this->db->insert('link',$data);
	}
	

	public function get_link_row($id)
	{
		$this->db->select('*');
		$this->db->from('link');
		$this->db->where('link_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_link_data($data, $id)
	{
		$this->db->where('link_id', $id);
		$result=$this->db->update('link', $data);
		return $result;		
	}
	
        public function publish_data($data, $ids) {
        $count = 0;
        foreach ($ids as $id) {
            $did = intval($id) . '<br>';
            $this->db->where('link_id', $id);
            $this->db->update('link', $data);
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
            $this->db->where('link_id', $id);
            $this->db->update('link', $data);
            $count = $count + 1;
        }

        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            ' . $count . ' Item UnPublished successfully
            </div>';
        $count = 0;
    }

}