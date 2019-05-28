<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Model_login extends CI_Model{

    /**
     * Check user authentication 
     * 
     * @param string $email
     * @param string $password
     * @return array result
     */
    public function check($email,$password){ 
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('email_id',$email);
        $this->db->where('password',$password);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
	
	public function save_login_data($data){
		$this->db->insert('customers', $data);
	}
}