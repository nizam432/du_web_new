<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend Dashboard controller for Apparel Television
 */
class Dashboard extends CI_Controller {

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

      //  $this->load->model('customer/Model_dashboard');
    }

    /**
     * show on dashboard totat category,article,user 
     */
    public function index() {
        $data = array();
       // $data['unit'] = array(1 => 'Science', 2 => 'Business', 3 => 'Arts & Social Science');
        //$data['total_application_unit_wise'] = $this->model_dashboard->get_application_unit_wise();
        //$data['everyday_application'] = $this->model_dashboard->get_every_day_application();
        //$data['total_application'] = $this->model_dashboard->get_total_application();
       // $data['content'] = $this->load->view('admin/dashboard/dashboard', $data, TRUE);

        $data['content']=$this->load->view('customer/dashboard','',True);
        $this->load->view('index', $data);
    }

}
