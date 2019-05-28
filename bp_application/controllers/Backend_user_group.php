<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend user_group controller 
 */
class Backend_user_group extends CI_Controller {

    protected $user_data = array();
    protected $user_id = null;
    protected $user_group = null;
    protected $privilege = array();

    public function __construct() {
        parent::__construct();
        $this->user_data = $this->session->userdata('login_session_data');

        $this->user_id = $this->user_data['user_id'];
        $this->privilege = $this->user_data['privilege'];
        $this->user_group = $this->user_group['user_group'];
        $this->date_time = date('Y-m-d H:i:s');

        if ($this->user_id == NULL) {
            redirect('backend_login/check_login', "refresh");
        }
        //load model
        $this->load->model('model_backend_user_group');
        //load form validation
        $this->load->library('form_validation');
        //load session
        $this->load->library('session');
        date_default_timezone_set('Asia/Dhaka');
    }

    /**
     * Show user_group List
     *
     * @return void
     */
    public function index() {
        $data = array();
        $data['user_group_list'] = $this->model_backend_user_group->get_user_group_list_data();
        $data['content'] = $this->load->view('admin/user_group/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Add user_group 
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['content'] = $this->load->view('admin/user_group/add', '', TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Edit user_group 
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        $data = array();
        $data['user_group_edit'] = $this->model_backend_user_group->get_user_group_row($id);
        $data['content'] = $this->load->view('admin/user_group/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Save user_group
     *
     * @return void
     */
    public function save() {
        $data = array();
        $data['user_group_title'] = $this->input->post('user_group_title', TRUE);
        $data['description'] = $this->input->post('description', TRUE);
        $data['entry_by'] = $this->user_id;
        $data['entry_date_time'] = $this->date_time;
        $data['status'] = $this->input->post('status', TRUE);

        //Form Validation
        $this->form_validation->set_rules('user_group_title', 'user_group Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('user_group_form_validation', validation_errors());
            redirect('backend_user_group/add');
        } else {
            //save user_group
            $this->model_backend_user_group->save_user_group_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_user_group');
        }
    }

    /**
     * Update user_group
     *
     * @param int $id
     * @return void
     */
    public function update($id) {
        $data = array();
        $data['user_group_title'] = $this->input->post('user_group_title', TRUE);
        $data['description'] = $this->input->post('description', TRUE);
        $data['update_by'] = $this->session->userdata('admin_id');
        $data['update_date_time'] =$this->date_time;
        $data['status'] = $this->input->post('status', TRUE);

        //Form Validation
        $this->form_validation->set_rules('user_group_title', 'User Group Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('user_group_form_validation', validation_errors());
            redirect("backend_user_group/edit/$id");
        } else {
            //update user_group data
            $this->model_backend_user_group->update_user_group_data($data, $id);

            // Redirect with flash message
            $sdata = array();
            $sdata['message'] = "update insert successfully";
            $this->session->set_userdata($sdata);
            redirect('backend_user_group');
        }
    }

}
