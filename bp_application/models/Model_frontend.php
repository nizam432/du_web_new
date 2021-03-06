<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Model frontend
 */

class Model_frontend extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_notice_list_data() {
        $this->db->select('notice_id,notice,attached_file,entry_date_time');
        $this->db->from('notice');
        $this->db->where('status', 1);
        $this->db->order_by("notice_id", "DESC");
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    public function get_news_data() {
        $this->db->select('news_id,title,news_image,details,entry_date_time');
        $this->db->from('news');
        $this->db->where('status', 1);
        $this->db->order_by("news_id", "DESC");
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Get slider data
     * 
     * @return array $result
     */
    public function get_slider_data() {
        $this->db->select("*");
        $this->db->from('slider');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    /**
     * Get link data
     * 
     * @return array $result
     */

    public function  get_link_data($type){
        $this->db->select("*");
        $this->db->from('du_link');
        $this->db->where('link_type',$type);
		$this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;        
    }
	
	public function get_notice_details_data($id)
	{
		$this->db->select('*');
		$this->db->from('notice');
		$this->db->where('notice_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function get_faculty_data(){
        $this->db->select("*");
        $this->db->from('faculty');
		$this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;		
	}		
	
	public function get_department_data($id){
        $this->db->select("*");
        $this->db->from('department');
		$this->db->where('faculty', $id);
		$this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;		
	}	
	
	public function get_faculty_details($id){
        $this->db->select("*");
        $this->db->from('faculty');
		$this->db->where('faculty_id',$id);
		$this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->row();
        return $result;		
	}	
	
	public function get_department_details($id){
        $this->db->select("*");
        $this->db->from('department');
		$this->db->where('department_id',$id);
		$this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->row();
        return $result;		
	}
	
    /**
     * Get news data
     * 
     * @return array $result
     */
	public function get_news_details_data($id)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('news_id',$id);
		//$this->db->where('status', 1);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
}
