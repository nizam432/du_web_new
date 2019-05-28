<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class backend_group extends CI_Controller {

    protected $user_data = array();
    protected $user_id = null;
    protected $user_group = null;
    protected $privilege = array();
    protected $date_time = null;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->user_data = $this->session->userdata('login_session_data');

        $this->user_id = $this->user_data['user_id'];
        $this->privilege = $this->user_data['privilege'];
        $this->user_group = $this->user_group['user_group'];
        $this->date_time = date('Y-m-d H:i:s');

        if ($this->user_id == NULL) {
            redirect('backend_login/check_login', "refresh");
        }

        //load model
        $this->load->model('model_backend_group');
        //load form validation
        $this->load->library('form_validation');
        //load session
        $this->load->library('session');
    }

    /**
     * Get group list
     *
     * @return array
     */
    public function index() {
        $data = array();
        $data['group_list'] = $this->model_backend_group->get_all_group_data();
        $data['content'] = $this->load->view('admin/group/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * add group
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['content'] = $this->load->view('admin/group/add', '', TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save group
     *
     * return void
     */
    public function save() {
        //Form Validation
        $this->form_validation->set_rules('group_name', 'group Name', 'required|is_unique[group.group_name]|trim', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('group_form_validation', validation_errors());
            redirect('backend_group/add');
        } else {
            $data = array(
                'group_name' => $this->input->post('group_name'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'isactive' => $this->input->post('isactive')
            );

            //save group
            $this->model_backend_group->save_group_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_group');
        }
    }

    /** Edit group
     *
     * return array
     */
    public function edit($group_id) {
        $data = array();
        $data['group_edit'] = $this->model_backend_group->get_group_row($group_id);
        $data['content'] = $this->load->view('admin/group/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save group
     *
     * return void
     */
    public function update($group_id) {
        //Form Validation
        $this->form_validation->set_rules('group_name', 'group Name', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('group_form_validation', validation_errors());
            redirect('backend_group/add');
        } else {
            $data = array(
                'group_name' => $this->input->post('group_name'),
                'update_by' => $this->user_id,
                'update_date_time' => $this->date_time,
                'isactive' => $this->input->post('isactive')
            );
            //save group
            $this->model_backend_group->update_group_data($data, $group_id);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_group');
        }
    }

}
