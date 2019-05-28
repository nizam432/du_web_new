<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Model_backend_login extends CI_Model{

    /**
     * Check user authentication 
     * 
     * @param string $email
     * @param string $password
     * @return array result
     */
    public function check($email,$password){ 
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email_id',$email);
        $this->db->where('password',$password);
        $query=$this->db->get();
        $result=$query->row();
        return $result;
    }
    
    /**
     * Get this user gorup privilege
     * 
     * @param int $user_group
     */
    public function privilege_data($user_group){
        $this->db->select('menu');
        $this->db->from('role_privilege');
	    $this->db->where('user_group',$user_group);
        $query=$this->db->get();
        $result=$query->result();
        return $result; 
    }
}