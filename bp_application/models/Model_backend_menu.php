<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_backend_menu extends CI_Model {

    /**
     * Get all menu data
     * 
     * @return array $result
     */
    public function get_all_menu_data() {
        $this->db->select('*,users.name as entry_by');
        $this->db->from('menu');
        $this->db->join('users', 'users.id = menu.entry_by');
        $this->db->order_by('menu_id DESC');
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Get root menu data
     * 
     * @return array $result
     */
    public function get_root_menu_data() {
        $this->db->select('menu_id,menu_name');
        $this->db->from('menu');
        $this->db->where('root_menu', 0);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Get sub root menu data
     * 
     * @return array $result
     */
    public function get_sub_root_menu_data() {
        $this->db->select('menu_id,menu_name');
        $this->db->from('menu');
        $this->db->where('root_menu!=', 0);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Save menu data
     * 
     * @param type $data
     * @return array 
     */
    public function save_menu_data($data) {
        $this->db->insert('menu', $data);
    }
    
    /**
     * Update menu data
     * 
     * @param type $data
     * @return array 
     */
    public function update_menu_data($data, $menu_id) {
        $this->db->where('menu_id', $menu_id);
        $this->db->update('menu', $data);
    }
    
    /**
     * Get  menu row
     * 
     * @param type $data
     * @return array 
     */
    public function get_menu_row($menu_id) {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get('');
        $result = $query->row();
        return $result;
    }

}
