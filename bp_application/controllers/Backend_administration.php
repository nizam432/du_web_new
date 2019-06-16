<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend  controller 
 */
class Backend_administration extends CI_Controller {

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
        $this->load->model('model_backend_administration');
    }    
    

    /**
     * Show administration List
     *
     * @return void
     */
    public function index() {
        $data = array();
//        $data['administration_list'] = $this->model_backend_administration->get_administration_list_data();
        $data['content'] = $this->load->view('admin/administration/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Add administration 
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['content'] = $this->load->view('admin/administration/add', '', TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Edit administration 
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        $data = array();
        $data['administration_edit'] = $this->model_backend_administration->get_administration_row($id);
        $data['content'] = $this->load->view('admin/administration/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Save administration
     *
     * @return void
     */
    public function save() {
 //Form Validation
        $this->form_validation->set_rules('administration_or_url', 'Link', 'required', array('required' => "%s is required"));
        $this->form_validation->set_rules('administration_type', 'Link Type', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('administration_form_validation', validation_errors());
            redirect('backend_administration/add');
        } else {
            $data = array(
                'administration_title' => $this->input->post('administration_title'),
                'administration_or_url' => $this->input->post('administration_or_url'),
                'administration_type' => $this->input->post('administration_type'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );


            //save slider
            $this->model_backend_administration->save_administration_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_administration');        
        }
    }
    /**
     * Update administration
     *
     * @param int $id
     * @return void
     */
    /** save slider
     *
     * return Response 
     */
    public function update($id) {
        $this->form_validation->set_rules('administration_or_url', 'Link', 'required', array('required' => "%s is required"));
        $this->form_validation->set_rules('administration_type', 'Link Type', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('administration_form_validation', validation_errors());
            redirect("backend_administration/edit/$id");
        } else {
            $data = array(
                'administration_title' => $this->input->post('administration_title'),
                'administration_or_url' => $this->input->post('administration_or_url'),
				'administration_type' => $this->input->post('administration_type'),
                'update_by' => $this->user_id,
                'update_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );


            //save slider
            $this->model_backend_administration->update_administration_data($data, $id);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_administration');
        }
    }

    /**
     * publish administration
     *
     * @return void
     */
    public function publish() {
        $data = array();
        $data['status'] = 1;
        $ids = ( explode(',', $this->input->get_post('ids')));
        $this->model_backend_administration->publish_data($data, $ids);
    }

    /**
     * Unpublish administration
     *
     * @return void
     */
    public function unpublish() {
        $data = array();
        $data['status'] = 0;
        $ids = ( explode(',', $this->input->get_post('ids')));
        $this->model_backend_administration->unpublish_data($data, $ids);
    }
    
}
