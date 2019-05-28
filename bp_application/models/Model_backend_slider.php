<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Model backend slider 
 */
class Model_backend_slider extends CI_Model {

    /**
     * Get All Product 
     * 
     * @return array $result
     */
    public function get_all_slider_data() {
        $this->db->select('*,users.name as entry_by');
        $this->db->from('slider');
        $this->db->join('users', 'users.id = slider.entry_by');
        $this->db->order_by('slider_id DESC');
        $query = $this->db->get('');
        $result = $query->result();
        return $result;
    }

    /**
     * Get save slider data
     * 
     * @param array $data
     * @return boolean 
     */
    public function save_slider_data($data) {
        return $this->db->insert('slider', $data);
    }

    /**
     * Update slider data
     * 
     * @param array $data
     * @param int $slider_id
     */
    public function update_slider_data($data, $slider_id) {
        $this->db->where('slider_id', $slider_id);
        $this->db->update('slider', $data);
    }

    /**
     * Get slider row dta
     * 
     * @param int $slider_id
     * @return array $result
     */
    public function get_slider_row($slider_id) {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('slider_id', $slider_id);
        $query = $this->db->get('');
        $result = $query->row();
        return $result;
    }

}
