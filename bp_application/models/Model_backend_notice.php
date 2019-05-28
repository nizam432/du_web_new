<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_notice extends  CI_Model
{
	public function get_notice_list_data()
	{
		$this->db->select('notice.notice_id,notice.notice,notice.attached_file,notice.status,notice.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('notice');
		$this->db->join('users', 'users.id = notice.entry_by');
		$this->db->order_by("notice.notice_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_notice_data($data)
	{
		$this->db->insert('notice',$data);
	}
	

	public function get_notice_row($id)
	{
		$this->db->select('*');
		$this->db->from('notice');
		$this->db->where('notice_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_notice_data($data, $id)
	{
		$this->db->where('notice_id', $id);
		$result=$this->db->update('notice', $data);
		return $result;		
	}
	
        public function publish_data($data, $ids) {
        $count = 0;
        foreach ($ids as $id) {
            $did = intval($id) . '<br>';
            $this->db->where('notice_id', $id);
            $this->db->update('notice', $data);
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
            $this->db->where('notice_id', $id);
            $this->db->update('notice', $data);
            $count = $count + 1;
        }

        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            ' . $count . ' Item UnPublished successfully
            </div>';
        $count = 0;
    }

}