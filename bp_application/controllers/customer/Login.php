<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Backend login controller for Nanosoft News Site
 */
class Login extends CI_Controller {

    protected $customer_data = array();
    protected $customer_id = null;
    protected $date_time = null;

    public function __construct() {
        parent::__construct();
        $this->customer_data = $this->session->userdata('customer_login_session_array');

        $this->customer_id = $this->customer_data['customer_id'];
        if ($this->customer_id != NULL) {
            redirect('customer/dashboard', "refresh");
        }

        $this->date_time = date('Y-m-d H:i:s');
        $this->load->model('customer/model_login');
    }

    /**
     * Add Login Page
     *
     * @return void
     */
    public function index() {
        $param = array();
        $param['content'] = $this->load->view('customer/login', '', TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Save customer account data
     * 
     * @return Response
     */
    public function save_singup() {

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email_id', 'Email Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('category_form_validation', validation_errors());
            redirect("customer/login/singup");
        } else {
            $param = array();

            $data = array(
                'customer_name' => db_escape($this->input->post('customer_name', TRUE)),
                'gender' => db_escape($this->input->post('gender', TRUE)),
                'phone' => db_escape($this->input->post('phone', TRUE)),
                'ip_address' => $this->input->ip_address(),
                'email_id' => db_escape($this->input->post('email_id', TRUE)),
                'password' => db_escape($this->input->post('password', TRUE)),
                'entry_date_time' => $this->date_time,
            );

            //save category
            $this->model_login->save_login_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('customer/login/singup');

            $param['content'] = $this->load->view('customer/singup', '', TRUE);
            $this->load->view('index.php', $param);
        }
    }

    /**
     * Create customer account 
     * 
     * @return Response
     */
    public function singup() {
        $param = array();
        $param['content'] = $this->load->view('customer/singup', '', TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * check_login
     *
     * @return Response
     */
    public function check_login() {
        echo $email_id = db_escape($this->input->post('email_id', TRUE));
        echo $password = db_escape($this->input->post('password', TRUE));

        $result = $this->model_login->check($email_id, $password);
        if ($result) {
            $customer_login_session_array = array();
            $customer_login_session_array['customer_id'] = $result->customer_id;
            $customer_login_session_array['customer_name'] = $result->customer_name;
            $customer_login_session_array['gender'] = $result->gender;

            $this->session->set_userdata('customer_login_session_array', $customer_login_session_array);
            redirect('customer/dashboard');
        } else {
            $sdata = array();
            $sdata['message'] = "Invalid Email Or Password";
            $this->session->set_userdata($customer_login_session_array);
            redirect('customer/login');
        }
    }

}
