<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_dashboard extends  CI_Model
{
	public function get_total_application()
	{
	 	$result=$this->db->count_all('applicant_data');
		return $result;
	}
	
	public function get_every_day_application()
	{
		$this->db->select("COUNT(id) as date_wise_appliction,applicationdate");
		$this->db->from("applicant_data");
		$this->db->group_by('applicationdate');
		$query=$this->db->get();
		$result=$query->result();
		return $result;		
	}	
    
    public function get_application_unit_wise()
	{
		$this->db->select("COUNT(uid) as total_application_unit_wise,unitid");
		$this->db->from("unit_data");
		$this->db->group_by('unitid');
		$query=$this->db->get();
		$result=$query->result();
		return $result;		
	}
}

