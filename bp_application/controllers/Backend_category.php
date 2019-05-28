<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend category controller 
 */
class Backend_category extends CI_Controller {
    
    protected $user_data = array();
    protected $user_id = null;
    protected $user_group = null;
    protected $privilege = array();
    protected $date_time = null;

    public function __construct() {
        parent::__construct();
        // timezone set
        date_default_timezone_set('Asia/Dhaka');
        //get session data
        $this->user_data = $this->session->userdata('login_session_data');

        $this->user_id = $this->user_data['user_id'];
        $this->privilege = $this->user_data['privilege'];
        $this->user_group = $this->user_group['user_group'];
        $this->date_time = date('Y-m-d H:i:s');

        if ($this->user_id == NULL) {
            redirect('backend_login/check_login', "refresh");
        }        
        //load backend category model
        $this->load->model('model_backend_category');
    }

    /**
     * Show category List
     *
     * @return response
     */
    public function index() {
        $data = array();
        $data['category_list'] = $this->model_backend_category->get_category_list_data();
        $data['content'] = $this->load->view('admin/category/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Add category 
     *
     * @return response
     */
    public function add() {
        $data = array();
        $data['product_group'] = $this->model_backend_category->get_product_group_data();
        $data['root_category'] = $this->model_backend_category->get_root_category_data();
        $data['sub_root_subcategory'] = $this->model_backend_category->get_sub_root_category_data();
        $data['content'] = $this->load->view('admin/category/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Edit category 
     *
     * @param int $id
     * @return response
     */
    public function edit($id) {
        $data = array();
        $data['category_edit'] = $this->model_backend_category->get_category_row($id);
        
        $data['product_group'] = $this->model_backend_category->get_product_group_data();
        $group_id=$data['category_edit']->group_id;
        $data['root_category'] = $this->model_backend_category->get_root_edit_data($group_id);
        pr($data['root_category']);
        //exit;
       // $data['sub_root_subcategory'] = $this->model_backend_category->get_sub_root_category_data();        
        $data['content'] = $this->load->view('admin/category/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Save category
     *
     * @return response
     */
    public function save() {
        //Form Validation
        $this->form_validation->set_rules('category_name', 'category Name', 'required');
        $this->form_validation->set_rules('order', 'Order', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('category_form_validation', validation_errors());
            redirect('backend_category/add');
        }else{
            
            $data = array();
            $data['category_name'] = $this->input->post('category_name', TRUE);
            $data['group_id'] = $this->input->post('group_id', TRUE);
            $data['order'] = $this->input->post('order', TRUE);
            $data['root'] = $this->input->post('root', TRUE);
            $data['sub_root'] = $this->input->post('sub_root', TRUE);
            $data['font_icon'] = $this->input->post('font_icon', TRUE);
            $data['entry_by'] = $this->user_id;
            $data['entry_date_time'] =  $this->date_time;
            $data['isactive'] = $this->input->post('isactive', TRUE);   

            //save category
            $this->model_backend_category->save_category_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_category');
        }
    }

    /**
     * Update category
     *
     * @param int $id
     * @return response
     */
    public function update($id) {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', TRUE);
        $data['group_id'] = $this->input->post('group_id', TRUE);
        $data['order'] = $this->input->post('order', TRUE);
        $data['root'] = $this->input->post('root', TRUE);
        $data['sub_root'] = $this->input->post('sub_root', TRUE);
        $data['font_icon'] = $this->input->post('font_icon', TRUE);
        $data['update_by'] = $this->user_id;
        $data['update_date_time'] = date('Y-m-d H:i:s');
        $data['isactive'] = $this->input->post('isactive', TRUE);

        
        //Form Validation
        $this->form_validation->set_rules('category_name', 'category Name', 'required');
        $this->form_validation->set_rules('order', 'Order', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('category_form_validation', validation_errors());
            redirect("backend_category/edit/$id");
        } else {
            //update category data
            $this->model_backend_category->update_category_data($data, $id);

            // Redirect with flash message
            $sdata = array();
            $sdata['message'] = "update insert successfully";
            $this->session->set_userdata($sdata);
            redirect('backend_category');
        }
    }
    
    /*
     * Get root data for ajax laod 
     * 
     * @retun array 
     */
    public function ajax_get_root_data(){
        $group_id=$this->input->post('group_id');
        $result= $this->model_backend_category->get_ajax_get_root_data($group_id);
        $data = array();
        foreach ($result as $r) {
            $data['value'] = $r->category_id;
            $data['label'] = $r->category_name;
            $json[] = $data;
        }
        echo json_encode($json);        
    }
    /*
     * Get sub root data for ajax laod 
     * 
     * @retun array 
     */
//    public function ajax_get_subroot_data(){
//        $root=$this->input->post('root');
//        $result= $this->model_backend_category->get_ajax_get_subroot_data($root);
//        $data = array();
//        foreach ($result as $r) {
//            $data['value'] = $r->category_id;
//            $data['label'] = $r->category_name;
//            $json[] = $data;
//        }
//        echo json_encode($json);        
//    }
}
