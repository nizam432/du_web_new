<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend Dashboard controller for Apparel Television
 */
class Backend_dashboard extends CI_Controller {

    protected $user_data = array();
    protected $user_id = null;
    protected $user_group = null;
    protected $privilege = array();

    public function __construct() {
        parent::__construct();
        $this->user_data = $this->session->userdata('login_session_data');
        
        $this->user_id = $this->user_data['user_id'];
        $this->privilege= $this->user_data['privilege'];
        $this->user_group= $this->user_group['user_group'];

        if ($this->user_id == NULL) {
            redirect('backend_login/check_login', "refresh");
        }

        $this->load->model('model_dashboard');
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

        $this->load->view('admin/index', $data);
    }

}
