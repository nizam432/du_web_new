<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_checkout extends CI_Model {

    /**
     * Save checkout data 
     * 
     * @param strng $data
     * @return array result
     */
    public function save_chekout_address($data) {
        $this->db->insert('checkout', $data);
        return $this->db->insert_id();
    }

    /**
     * add payment option
     *  
     * @param array $data
     * @param int $checkout_id
     * @param int $customer_id
     */
    public function add_payment_option($data, $checkout_id, $customer_id) {
        $this->db->where('checkout_id', $checkout_id);
        $this->db->where('customer_id', $customer_id);
        $this->db->update('checkout', $data);
    }
    
    public function save_checkout_details($data)
    {
        $this->db->insert('checkout_details', $data);
        
    }

}
