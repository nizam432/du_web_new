<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend  controller 
 */
class Backend_notice extends CI_Controller {

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
        $this->load->model('model_backend_notice');
    }    
    
    
    

    /**
     * Show notice List
     *
     * @return void
     */
    public function index() {
        $data = array();
        $data['notice_list'] = $this->model_backend_notice->get_notice_list_data();
        $data['content'] = $this->load->view('admin/notice/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Add notice 
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['content'] = $this->load->view('admin/notice/add', '', TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Edit notice 
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        $data = array();
        $data['notice_edit'] = $this->model_backend_notice->get_notice_row($id);
        $data['content'] = $this->load->view('admin/notice/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Save notice
     *
     * @return void
     */
    public function save() {
 //Form Validation
        $this->form_validation->set_rules('notice', 'Notice', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notice_form_validation', validation_errors());
            redirect('backend_notice/add');
        } else {
            $data = array(
                'notice' => $this->input->post('notice'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );

            $result = $this->do_upload('attached_file');
            if (!empty($result[0])) {
                $data['attached_file'] = "uploads/attached_file/" . $result[0];
            }

            //save slider
            $this->model_backend_notice->save_notice_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_notice');        
        }
    }
    /**
     * Update notice
     *
     * @param int $id
     * @return void
     */
    /** save slider
     *
     * return Response 
     */
    public function update($id) {
        $this->form_validation->set_rules('notice', 'Notice', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notice_form_validation', validation_errors());
            redirect("backend_notice/edit/$slider_id");
        } else {
            $data = array(
                'notice' => $this->input->post('notice'),
                'update_by' => $this->user_id,
                'update_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );

            $result = $this->do_upload('attached_file');
            if (!empty($result[0])) {
                $data['attached_file'] = 'uploads/attached_file/' . $result[0];
            }


            //save slider
            $this->model_backend_notice->update_notice_data($data, $id);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_notice');
        }
    }

    /**
     * publish notice
     *
     * @return void
     */
    public function publish() {
        $data = array();
        $data['status'] = 1;
        $ids = ( explode(',', $this->input->get_post('ids')));
        $this->model_backend_notice->publish_data($data, $ids);
    }

    /**
     * Unpublish notice
     *
     * @return void
     */
    public function unpublish() {
        $data = array();
        $data['status'] = 0;
        $ids = ( explode(',', $this->input->get_post('ids')));
        $this->model_backend_notice->unpublish_data($data, $ids);
    }
    
    
     /**
     * Upload attached File
     * 
     * @param string $attached_file
     * @return string
     */
    public function do_upload($attached_file) {
        $config = array();
        $config['upload_path'] = './uploads/attached_file/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|';
        $config['max_size'] = '50000000';
        $this->load->library('upload', $config, 'attached_file');
        $this->attached_file->initialize($config);
        $attached_file = $this->attached_file->do_upload('attached_file');

        // Check uploads success
        if ($attached_file) {
            $file_name = array();
            if ($attached_file) { // Both Upload Success
                // Data of your cover file
                $attached_file = $this->attached_file->data();
                $file_name[0] = $attached_file['file_name'];
            }

            return $file_name;
        } else {
            echo 'Cover upload Error : ' . $this->attached_file->display_errors() . '<br/>';
//            exit;
        }
    }

}
