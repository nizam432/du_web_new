<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend Dashboard controller for Apparel Television
 */
class Profile extends CI_Controller {

    protected $customer_data = array();
    protected $customer_id = null;
    protected $customer_name = null;


    public function __construct() {
        parent::__construct();
        $this->customer_data = $this->session->userdata('customer_login_session_array');
        $this->customer_id = $this->customer_data['customer_id'];

        if ($this->customer_id == NULL) {
            redirect('customer/login/check_login', "refresh");
        }

        $this->load->model('customer/model_profile');
    }

    /**
     * Show on dashboard  category,article,user 
     */
    public function index() {
        $data = array();
        $data['profile_data']=$this->model_profile->get_profile_data($this->customer_id);
        $data['content']=$this->load->view('customer/profile',$data,True);
        $this->load->view('index', $data);
    }
    
    /**
     * Update Customer profile information
     */    
    public function update(){
        $data=array(
            'customer_name'=>$this->input->post('customer_name'),
            'gender'=>$this->input->post('gender'),
            'email_id'=>$this->input->post('email_id'),
            'phone'=>$this->input->post('phone'),
        );
        $this->model_profile->update_profile_data($data,$this->customer_id);
        $this->session->set_flashdata('customer_info','Customer information updated successfully');
        redirect('customer/profile');
    }

}
