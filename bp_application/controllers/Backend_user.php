<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend user controller for Nanosoft user List
 */
class Backend_user extends CI_Controller {

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
        $this->load->model('model_user');
    }

    public function index() {
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'backend_user/index';
        $config['total_rows'] = $this->db->count_all('users');
        $config['per_page'] = 5;
        $offset = $this->uri->segment(3);
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous ';
        $config['num_links'] = 10;
        $this->pagination->initialize($config);

        $data = array();
        $data['register_list'] = $this->model_user->get_user_list_data($config['per_page'], $offset);
        $data['content'] = $this->load->view('admin/user/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data = array();
        $data['user_group'] = $this->model_user->get_user_group_data();
        $data['content'] = $this->load->view('admin/user/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {
        $data = array();
        $data['user_edit_data'] = $this->model_user->get_user_row_data($id);
        $data['user_group'] = $this->model_user->get_user_group_data();
        $data['content'] = $this->load->view('admin/user/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function save() {
        $data = array();

        $data['name'] = $this->input->post('name', TRUE);
        $data['email_id'] = $this->input->post('email_id', TRUE);
        $data['password'] = md5($this->input->post('password', TRUE));
        $data['user_group'] = $this->input->post('user_group', TRUE);
        //$data['college_code'] = $this->input->post('college_code', TRUE);
        $data['status'] = $this->input->post('status', TRUE);
        $this->model_user->save_user_data($data);
        $result = array();
        $result['message'] = "Data insert successfully";
        $this->session->set_userdata($result);
        redirect('backend_user/index');
    }

    public function update($id) {
        $data = array();
        $data['name'] = $this->input->post('name', TRUE);
        $data['email_id'] = $this->input->post('email_id', TRUE);
        if (!empty($password)) $data['password'] = md5($password);
        $data['user_group'] = $this->input->post('user_group', TRUE);
       // $data['college_code'] = $this->input->post('college_code', TRUE);        
        $data['status'] = $this->input->post('status', TRUE);
        $this->model_user->update_user_data($data, $id);
        $result = array();
        $result['message'] = "Update user data successfully";
        $this->session->set_userdata($result);
        redirect('backend_user/index');
    }

}
