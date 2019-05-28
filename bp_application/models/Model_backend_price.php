<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Backend Price 
 */
class Model_backend_price extends CI_Model {

    /**
     * Get price List
     * 
     * @return array $result
     */
    public function get_price_list_data() {
        $this->db->select('price.price_id as price_id,'
                . 'product.product_name as product_name,'
                . 'price.sale_price as sale_price,'
                . 'price.whole_sale_price as whole_sale_price,'
                . 'price.isactive as isactive,'
                . 'price.entry_date_time as entry_date_time,'
                . 'users.name as entry_by');
        $this->db->from('price');
        $this->db->join('product', 'price.product_id = product.product_id');
        $this->db->join('users', 'users.id = price.entry_by');
        $this->db->order_by("price.price_id", "DESC");
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Save price data
     * 
     * @param int $data
     * @return bool 
     */
    public function save_price_data($data) {
        return $this->db->insert('price', $data);
    }

    /**
     * Get specific price row
     * 
     * @param type $id
     * @return type
     */
    public function get_price_row($id) {
        $this->db->select('*');
        $this->db->from('price');
        $this->db->where('price_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    /**
     * Update price data 
     * 
     * @param string $data
     * @param int $id
     * @return array $result
     */
    public function update_price_data($data, $id) {
        $this->db->where('price_id', $id);
        $result = $this->db->update('price', $data);
        return $result;
    }

    /**
     * Get product data
     * 
     * @return array result
     */
    public function get_product_data() {
        $this->db->select('product_id,product_name');
        $this->db->from('product');
        $this->db->where('isactive', 1);
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

}
