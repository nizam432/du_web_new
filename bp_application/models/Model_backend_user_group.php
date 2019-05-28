<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_user_group extends  CI_Model
{
	public function get_user_group_list_data()
	{
		$this->db->select('user_group.user_group_id as user_group_id,
						user_group.user_group_title as user_group_title,
						user_group.description as description,
						user_group.status as status,
						user_group.entry_date_time as entry_date_time,
						users.name as entry_by');
		$this->db->from('user_group');
		$this->db->join('users', 'users.id = user_group.entry_by','left');
		$this->db->order_by("user_group.user_group_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_user_group_data($data)
	{
		$this->db->insert('user_group',$data);
	}
	

	public function get_user_group_row($id)
	{
		$this->db->select('*');
		$this->db->from('user_group');
		$this->db->where('user_group_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_user_group_data($data, $id)
	{
		$this->db->where('user_group_id', $id);
		$result=$this->db->update('user_group', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('user_group_id',$id);
			$this->db->update('user_group',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item Published successfully
            </div>';
        $count = 0;
	}
	
	public function unpublish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('user_group_id',$id);
			$this->db->update('user_group',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}