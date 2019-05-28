<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Backend login controller for Nanosoft News Site
 */
class Backend_login extends CI_Controller {
    protected $user_data=array();
    protected $user_id = null;
    
    public function __construct() {
        parent::__construct();
        $this->user_data = $this->session->userdata('login_session_data');
        
        $this->user_id = $this->user_data['user_id'];
        if ($this->user_id != NULL) {
            redirect('backend_dashboard', "refresh");
        }
	$this->load->model('model_backend_login');		
    }

    /**
     * Add Login Page
     *
     * @return void
     */
    public function index() {
        $this->load->view('admin/login');
    }

    /**
     * check_login
     *
     * @return void
     */
    public function check_login() {
        $email = db_escape($this->input->post('email', TRUE));
        $password = db_escape($this->input->post('password', TRUE));
		$password=md5($password);
        $result = $this->model_backend_login->check($email, $password);
        if ($result) {

            $user_group= $result->user_group;
		  
            $privilege_result= $this->model_backend_login->privilege_data($user_group);
            $privilege=array();
            foreach ($privilege_result as $value)
            {
                $privilege[]=$value->menu;
            }
            
            $login_session_array = array();
            $login_session_array['user_id'] = $result->id;
            $login_session_array['user_name'] = $result->name;           
            $login_session_array['user_group'] = $result->user_group;  
            $login_session_array['college_code'] = $result->college_code;  
            $login_session_array['privilege'] = $privilege;
            
            $this->session->set_userdata('login_session_data',$login_session_array);
            redirect('backend_dashboard');
        } else {
            $sdata = array();
            $sdata['message'] = "Invalid Email Or Password";
            $this->session->set_userdata($login_session_array);
            redirect('backend_login/index');
        }
    }

}
