<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend  controller 
 */
class Backend_link extends CI_Controller {

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
        $this->load->model('model_backend_link');
    }    
    

    /**
     * Show link List
     *
     * @return void
     */
    public function index() {
        $data = array();
        $data['link_list'] = $this->model_backend_link->get_link_list_data();
        $data['content'] = $this->load->view('admin/link/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Add link 
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['content'] = $this->load->view('admin/link/add', '', TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Edit link 
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        $data = array();
        $data['link_edit'] = $this->model_backend_link->get_link_row($id);
        $data['content'] = $this->load->view('admin/link/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Save link
     *
     * @return void
     */
    public function save() {
 //Form Validation
        $this->form_validation->set_rules('link', 'Link', 'required', array('required' => "%s is required"));
        $this->form_validation->set_rules('link', 'Link Type', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('link_form_validation', validation_errors());
            redirect('backend_link/add');
        } else {
            $data = array(
                'link_title' => $this->input->post('link_title'),
                'link' => $this->input->post('link'),
                'link_type' => $this->input->post('link_type'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );


            //save slider
            $this->model_backend_link->save_link_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_link');        
        }
    }
    /**
     * Update link
     *
     * @param int $id
     * @return void
     */
    /** save slider
     *
     * return Response 
     */
    public function update($id) {
        $this->form_validation->set_rules('link', 'Link', 'required', array('required' => "%s is required"));
        $this->form_validation->set_rules('link', 'Link Type', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('link_form_validation', validation_errors());
            redirect("backend_link/edit/$slider_id");
        } else {
            $data = array(
                'link_title' => $this->input->post('link_title'),
                'link' => $this->input->post('link'),
		'link_type' => $this->input->post('link_type'),
                'update_by' => $this->user_id,
                'update_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );


            //save slider
            $this->model_backend_link->update_link_data($data, $id);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_link');
        }
    }

    /**
     * publish link
     *
     * @return void
     */
    public function publish() {
        $data = array();
        $data['status'] = 1;
        $ids = ( explode(',', $this->input->get_post('ids')));
        $this->model_backend_link->publish_data($data, $ids);
    }

    /**
     * Unpublish link
     *
     * @return void
     */
    public function unpublish() {
        $data = array();
        $data['status'] = 0;
        $ids = ( explode(',', $this->input->get_post('ids')));
        $this->model_backend_link->unpublish_data($data, $ids);
    }
    
    

}
