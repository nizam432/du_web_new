<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Model backend product 
 */
class Model_backend_product extends CI_Model {

    /**
     * Get All Product 
     * 
     * @return array $result
     */
    public function get_all_product_data() {
        $this->db->select(
                'product.product_id as product_id,'
                .'product.product_name,'
                .'product.master_image as master_image,'
                .'product.isactive,'
              //  . 'price.sale_price as sale_price,'
              //  . 'price.whole_sale_price as whole_sale_price,'
                . 'users.name as entry_by');
        $this->db->from('product');
        $this->db->join('users', 'users.id = product.entry_by');
		$this->db->order_by("product.product_id", "DESC");
        //$this->db->join('price', 'price.product_id = product.product_id','left');
       // $this->db->where('price.status','1');
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Get save product data
     * 
     * @param array $data
     * @return boolean 
     */
    public function save_product_data($data) {
        return $this->db->insert('product', $data);
    }
    
    /**
     * Get save optional image data
     * 
     * @param array $data
     * @return boolean 
     */
    public function save_optional_image_data($data) {
        return $this->db->insert('optional_image', $data);
    }

    /**
     * Update product data
     * 
     * @param array $data
     * @param int $product_id
     */
    public function update_product_data($data, $product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->update('product', $data);
    }

    /**
     * Get Product row dta
     * 
     * @param int $product_id
     * @return array $result
     */
    public function get_product_row($product_id) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('');
        $result = $query->row();
        return $result;
    }

    /**
     * Get product group data
     * 
     * @return array $result
     */
    public function get_product_group_data() {
        $this->db->select('group_id,group_name');
        $this->db->from('group');
        $this->db->where('isactive', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Get category data
     * 
     * @return array $result
     */
    public function get_root_category_data($group_id) {
        $this->db->select('category_id,category_name');
        $this->db->from('category');
        $this->db->where('root', 0);
        $this->db->where('group_id', $group_id);
        $this->db->where('isactive', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Get sub category data
     * 
     * @return array $result
     */
    public function get_sub_root_category_data($category_id) {
        $this->db->select('category_id,category_name');
        $this->db->from('category');
        $this->db->where('root=',$category_id);
        $this->db->where('isactive=', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }    
		
	

	

}
