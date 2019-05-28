<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Backend Category 
 */
class Model_backend_category extends CI_Model {

    /**
     * 
     * 
     * @return array $result
     */
    public function get_category_list_data() {
        $this->db->select('category.category_id as category_id,category.category_name as category_name,category.isactive as isactive,category.entry_date_time as entry_date_time,users.name as entry_by');
        $this->db->from('category');
        $this->db->join('users', 'users.id = category.entry_by');
        $this->db->order_by("category.category_id", "DESC");
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    public function save_category_data($data) {
        $this->db->insert('category', $data);
    }

    public function get_category_row($id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function update_category_data($data, $id) {
        $this->db->where('category_id', $id);
        $result = $this->db->update('category', $data);
        return $result;
    }

    public function get_product_group_data() {
        $this->db->select('group_id,group_name');
        $this->db->from('group');
        $this->db->where('isactive',1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }
    public function get_root_category_data() {
        $this->db->select('category_id,category_name');
        $this->db->from('category');
        $this->db->where('root', 0);
        $this->db->where('isactive', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    public function get_sub_root_category_data() {
        $this->db->select('category_id,category_name');
        $this->db->from('category');
        $this->db->where('root!=', 0);
        $this->db->where('isactive', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }
    
    public function get_ajax_get_root_data($group_id){
        $this->db->select('category_id,category_name');
        $this->db->from('category');
        $this->db->where('root=', 0);
        $this->db->where('group_id', $group_id);
        $this->db->where('isactive', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;        
    }
    public function get_root_edit_data($group_id){
        $this->db->select('category_id,category_name');
        $this->db->from('category');
        $this->db->where('root=', 0);
        $this->db->where('group_id', $group_id);
        $this->db->where('isactive', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;        
    }
//    public function get_ajax_get_subroot_data($root){
//        $this->db->select('category_id,category_name');
//        $this->db->from('category');
//        $this->db->where('root!=', 0);
//        $this->db->where('root', $root);
//        $this->db->where('isactive', 1);
//        $query = $this->db->get('');
//        $result = $query->result();
//        return $result;        
//    }
}
