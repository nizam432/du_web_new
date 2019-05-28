<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class backend_menu extends CI_Controller {

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
        $this->load->model('model_backend_menu');
        //load form validation
        $this->load->library('form_validation');
        //load session
        $this->load->library('session');
    }

    /**
     * Get menu list
     *
     * @return array
     */
    public function index() {
        $data = array();
        $data['menu_list'] = $this->model_backend_menu->get_all_menu_data();
        $data['content'] = $this->load->view('admin/menu/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * add menu
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['root_menu'] = $this->model_backend_menu->get_root_menu_data();
        $data['sub_root_menu'] = $this->model_backend_menu->get_sub_root_menu_data();
        $data['content'] = $this->load->view('admin/menu/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save menu
     *
     * return void
     */
    public function save() {
        //Form Validation
        $this->form_validation->set_rules('menu_name', 'Menu Name', 'required', array('required' => "%s is required"));
        $this->form_validation->set_rules('menu_order', 'Menu Order', 'required', array('required' => "%s is required")
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('menu_form_validation', validation_errors());
            redirect('backend_menu/add');
        } else {
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'menu_link' => $this->input->post('menu_link'),
                'root_menu' => $this->input->post('root_menu'),
                'sub_root_menu' => $this->input->post('sub_root_menu'),
                'menu_order' => $this->input->post('menu_order'),
                'menu_icon' => $this->input->post('menu_icon'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );

            //save menu
            $this->model_backend_menu->save_menu_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_menu');
        }
    }

    /** Edit menu
     *
     * return array
     */
    public function edit($menu_id) {
        $data = array();
        $data['menu_edit'] = $this->model_backend_menu->get_menu_row($menu_id);
        $data['root_menu'] = $this->model_backend_menu->get_root_menu_data();
        $data['sub_root_menu'] = $this->model_backend_menu->get_sub_root_menu_data();
        $data['content'] = $this->load->view('admin/menu/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save menu
     *
     * return void
     */
    public function update($menu_id) {
        //Form Validation
        $this->form_validation->set_rules('menu_name', 'Menu Name', 'required', array('required' => "%s is required"));
        $this->form_validation->set_rules('menu_order', 'Menu Order', 'required', array('required' => "%s is required")
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('menu_form_validation', validation_errors());
            redirect('backend_menu/add');
        } else {
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'menu_link' => $this->input->post('menu_link'),
                'root_menu' => $this->input->post('root_menu'),
                'sub_root_menu' => $this->input->post('sub_root_menu'),
                'menu_order' => $this->input->post('menu_order'),
                'menu_icon' => $this->input->post('menu_icon'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'status' => $this->input->post('status')
            );
            //save menu
            $this->model_backend_menu->update_menu_data($data, $menu_id);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_menu');
        }
    }

}
