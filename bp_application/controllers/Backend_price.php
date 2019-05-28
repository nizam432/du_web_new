<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend price controller 
 */
class Backend_price extends CI_Controller {

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
        $this->load->model('model_backend_price');
        //load form validation
        $this->load->library('form_validation');
        //load session
        $this->load->library('session');
    }

    /**
     * Show price List
     *
     * @return void
     */
    public function index() {
        $data = array();
        $data['price_list'] = $this->model_backend_price->get_price_list_data();
        $data['content'] = $this->load->view('admin/price/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Add price 
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['product'] = $this->model_backend_price->get_product_data();
        $data['content'] = $this->load->view('admin/price/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Edit price 
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        $data = array();
        $data['price_edit'] = $this->model_backend_price->get_price_row($id);
        $data['content'] = $this->load->view('admin/price/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * Save price
     *
     * @return void
     */
    public function save() {
        //Form Validation
        $this->form_validation->set_rules('product_id', 'Product', 'required');
        $this->form_validation->set_rules('sale_price', 'Sale Pirce', 'required');
        $this->form_validation->set_rules('whole_sale_price', 'whole_sale_price', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('price_form_validation', validation_errors());
            redirect('backend_price/add');
        } else {
            $data = array();
            $data['product_id'] = $this->input->post('product_id', TRUE);
            $data['sale_price'] = $this->input->post('sale_price', TRUE);
            $data['whole_sale_price'] = $this->input->post('whole_sale_price', TRUE);
            $data['entry_by'] = $this->user_id;
            $data['entry_date_time'] = $this->date_time;
            $data['isactive'] = 1;
            //save price
            $this->model_backend_price->save_price_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_price');
        }
    }

    /**
     * Update price
     *
     * @param int $id
     * @return void
     */
    public function update($id) {

        //Form Validation
        $this->form_validation->set_rules('product_id', 'Product', 'required');
        $this->form_validation->set_rules('sale_price', 'Sale Pirce', 'required');
        $this->form_validation->set_rules('whole_sale_price', 'whole_sale_price', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('price_form_validation', validation_errors());
            redirect("backend_price/edit/$id");
        }else{
            $data = array();
            $data['product_id'] = $this->input->post('product_id', TRUE);
            $data['sale_price'] = $this->input->post('sale_price', TRUE);
            $data['whole_sale_price'] = $this->input->post('whole_sale_price', TRUE);
            $data['update_by'] = $this->user_id;
            $data['update_date_time'] = date('Y-m-d H:i:s');
            $data['isactive'] = $this->input->post('isactive', TRUE);
            //update price data
            $this->model_backend_price->update_price_data($data, $id);

            // Redirect with flash message
            $sdata = array();
            $sdata['message'] = "update insert successfully";
            $this->session->set_userdata($sdata);
            redirect('backend_price');
        }
    }

}
