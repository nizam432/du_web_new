<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_common extends CI_Model {

    /**
     * Get root menu data
     * 
     * @return array $result
     */
    public function get_root_menu_data() {
        $this->db->select('menu_id,menu_name,menu_link,menu_icon');
        $this->db->from('menu');
        $this->db->where('root_menu', 0);
        $this->db->order_by('menu_order');
        $query = $this->db->get('');
        $result = $query->result();
        
        return $result;
    }

    /**
     * Get Submenu data
     * 
     * @param int $menu_id
     * @return array
     */
    public function get_sub_menu_data($menu_id) {
        $this->db->select('menu_id,menu_name,menu_link,menu_icon');
        $this->db->from('menu');
        $this->db->where('root_menu', $menu_id);
        $this->db->where('root_menu!=', 0);
        $this->db->order_by('menu_order');
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }
    /**
     * Get root menu data
     * 
     * @return array $result
     */
    public function get_root_category_data() {
        $this->db->select('category_id,category_name,font_icon');
        $this->db->from('category');
        $this->db->where('root', 0);
        $this->db->order_by('order');
        $query = $this->db->get('');
        $result = $query->result();

        return $result;
    }

    /**
     * Get Subcategory data
     * 
     * @param int $category_id
     * @return array
     */
    public function get_sub_category_data($category_id) {
        $this->db->select('category_id,category_name');
        $this->db->from('category');
        $this->db->where('root', $category_id);
        $this->db->where('root!=', 0);
        $this->db->order_by('order');
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }
    
    public function get_group_data(){
        $this->db->select('group_id,group_name');
        $this->db->from('category');
        $this->db->where('isactive',1);
        $this->db->order_by('group_name');
        $query = $this->db->get('');
        $result = $query->result();
        return $result;        
    }

    /**
     * Get specific field data by id
     * 
     * @param type $the
     * @param int $id
     * @param string $table
     * @param string $field
     * @return string name
     */
    public function get_name($the, $id, $table, $field) {
        $the->db->select($field);
        $query = $the->db->get_where($table, array('id' => $id), 1);
        return $query->row($field);
    }

}
