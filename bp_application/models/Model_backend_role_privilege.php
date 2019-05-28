<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_backend_role_privilege extends CI_Model{
	
	public function get_user_group_data()
	{
		$this->db->select('user_group_id,user_group_title');
		$this->db->from('user_group');
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	
	public function get_root_menu_data()
	{
		$this->db->select('menu_id,menu_name');
		$this->db->from('menu');
		$this->db->where('root_menu',0);
		$query=$this->db->get('');
		$result=$query->result();
		
		return $result;
	}	
	
	public function get_sub_menu_data($menu_id)
	{
		$this->db->select('menu_id,menu_name');
		$this->db->from('menu');
		$this->db->where('root_menu',$menu_id);
		$this->db->where('root_menu!=',0);
		$query=$this->db->get('');
		$result=$query->result();
		
		return $result;
	}
	
	public function save_role_privilege_data($data)
	{
		$this->db->insert('role_privilege',$data);
	}
	
	public function delete_role_privilege_data($user_group)
	{
		$this->db->where('user_group',$user_group);
		$this->db->delete('role_privilege');
	}
	
	public function get_role_privilege_data($user_group)
	{
		$this->db->select('*');
		$this->db->from('role_privilege');
		$this->db->where('user_group',$user_group);
		$query=$this->db->get('');
		$result=$query->result();
		
		return $result;		
	}
	
}
