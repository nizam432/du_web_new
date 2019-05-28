<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_backend_group extends CI_Model {
    /**
     * Get all group data
     * 
     * @return array $result
     */
    public function get_all_group_data() {
        $this->db->select('*,users.name as entry_by');
        $this->db->from('group');
        $this->db->join('users', 'users.id = group.entry_by');
        $this->db->order_by('group_id DESC');
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }
    
    /**
     * Get root group data
     * 
     * @return array $result
     */
    public function get_root_group_data() {
        $this->db->select('group_id,group_name');
        $this->db->from('group');
        $this->db->where('root_group', 0);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }
    /**
     * Get sub root group data
     * 
     * @return $result
     */
    public function get_sub_root_group_data() {
        $this->db->select('group_id,group_name');
        $this->db->from('group');
        $this->db->where('root_group!=', 0);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }
    
    /**
     * Save group data
     * 
     * @param type $data
     */
    public function save_group_data($data) {
        $this->db->insert('group', $data);
    }
    /**
     * Update group data
     * 
     * @param type $data
     */
    public function update_group_data($data, $group_id) {
        $this->db->where('group_id', $group_id);
        $this->db->update('group', $data);
    }
    /**
     * Get group row data
     * 
     * @param type $data
     */
    public function get_group_row($group_id) {
        $this->db->select('*');
        $this->db->from('group');
        $this->db->where('group_id', $group_id);
        $query = $this->db->get('');
        $result = $query->row();
        return $result;
    }

}
