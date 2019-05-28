<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_profile extends CI_Model {

    public function get_profile_data($customer_id) {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function update_profile_data($data,$customer_id) {
        $this->db->where('customer_id',$customer_id);
        $this->db->update('customers', $data);
    }

}
