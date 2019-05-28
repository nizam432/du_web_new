<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_user extends  CI_Model
{
	public function get_user_list_data($per_page,$offset)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by("id", "DESC");
		$query=$this->db->get('',$per_page,$offset);
		$result=$query->result();
		return $result;
	}
	
	public function save_user_data($data)
	{
		$this->db->insert('users',$data);
	}	
	
	public function update_user_data($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
	
	public function get_user_row_data($id)
	{
		return $result=$this->db->get_where('users',array('id'=>$id))->row();
	}
	
	public function get_user_group_data()
	{
		$this->db->from('user_group');
		$this->db->order_by("user_group_id", "DESC");
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

}