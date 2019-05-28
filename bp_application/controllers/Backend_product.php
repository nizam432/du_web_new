<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class backend_product extends CI_Controller {

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
        $this->load->model('model_backend_product');
    }

    /**
     * Get product list
     *
     * @return array
     */
    public function index() {
        $data = array();
        $data['product_list'] = $this->model_backend_product->get_all_product_data();
        $data['content'] = $this->load->view('admin/product/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * add product
     *
     * @return void
     */
    public function add() {
        $data = array();
        $data['product_group'] = $this->model_backend_product->get_product_group_data();
        $data['content'] = $this->load->view('admin/product/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save product
     *
     * @return Response
     */
    public function save() {
        //Form Validation
        $this->form_validation->set_rules('product_name', 'product Name', 'required', array('required' => "%s is required"));
        //$this->form_validation->set_rules('group_id', 'product Group', 'required', array('required' => "%s is required"));
        //$this->form_validation->set_rules('category_id', 'product Category', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('product_form_validation', validation_errors());
            redirect('backend_product/add');
        } else {

            $data = array(
                'product_name' => $this->input->post('product_name'),
                'group_id' => $this->input->post('group_id'),
                'category_id' => $this->input->post('category_id'),
                'sub_category_id' => $this->input->post('sub_category_id'),
                'description' => $this->input->post('description'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'isactive' => $this->input->post('isactive')
            );
            
            //Upload master image
            $master_image = $this->do_upload_optional_image($_FILES['master_image']);

            if (!empty($master_image)) {
                $data['master_image'] = 'uploads/product_image/' . date('Y') . '/' . date('m') . '/' . $master_image[0];
            }
            //save product
            $this->model_backend_product->save_product_data($data);
            //Get product id
            $product_id = $this->db->insert_id();
            
            //UPload optional image
            $optional_image = $this->do_upload_optional_image($_FILES['optional_image']);
            
            foreach ($optional_image as $optional_image_name) {
                $optional_image_data = array(
                    'product_id' => $product_id,
                    'optional_image' => 'uploads/product_image/' . date('Y') . '/' . date('m') . '/' . $optional_image_name,
                );
                // save optional image
                $this->model_backend_product->save_optional_image_data($optional_image_data);
            }

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_product');
        }
    }

    /** Edit product
     *
     * @param int $product_id 
     * return array
     */
    public function edit($product_id) {
        $data = array();
        $data['product_edit'] = $this->model_backend_product->get_product_row($product_id);
        $data['product_group'] = $this->model_backend_product->get_product_group_data();
        //product group id
        $group_id = $data['product_edit']->group_id;
        $data['root_category'] = $this->model_backend_product->get_root_category_data($group_id);
        //Category id
        $category_id = $data['product_edit']->category_id;
        $data['sub_root_subcategory'] = $this->model_backend_product->get_sub_root_category_data($category_id);
        // echo $this->db->last_query();
        // pr($data['sub_root_subcategory']);
        // exit;
        $data['content'] = $this->load->view('admin/product/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save product
     *
     * return string 
     */
    public function update($product_id) {
        //Form Validation
        $this->form_validation->set_rules('product_name', 'product Name', 'required|trim', array('required' => "%s is required"));
        // $this->form_validation->set_rules('group_id', 'product Group', 'required', array('required' => "%s is required"));
        // $this->form_validation->set_rules('category_id', 'product Category', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('product_form_validation', validation_errors());
            redirect("backend_product/edit/$product_id");
        } else {
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'group_id' => $this->input->post('group_id'),
                'category_id' => $this->input->post('category_id'),
                'sub_category_id' => $this->input->post('sub_category_id'),
                'description' => $this->input->post('description'),
                'update_by' => $this->user_id,
                'update_date_time' => $this->date_time,
                'isactive' => $this->input->post('isactive')
            );

            $master_image = $this->do_upload_optional_image($_FILES['master_image']);

            if (!empty($master_image)) {
                $data['master_image'] = 'uploads/product_image/' . date('Y') . '/' . date('m') . '/' . $master_image[0];
            }
            $this->model_backend_product->update_product_data($data, $product_id);

            //call photo upload function
            $optional_image = $this->do_upload_optional_image($_FILES['optional_image']);
            foreach ($optional_image as $optional_image_name) {
                $optional_image_data = array(
                    'product_id' => $product_id,
                    'optional_image' => 'uploads/product_image/' . date('Y') . '/' . date('m') . '/' . $optional_image_name,
                );

                $this->model_backend_product->save_optional_image_data($optional_image_data);
            }
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_product');
        }
    }

    public function do_upload_optional_image($optional_image) {
        $i = 0;
        foreach ($optional_image['name'] as $optional_image_data) {
            $path = './uploads/product_image/' . date('Y') . '/' . date('m');
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            $_FILES['optional_image3']['name'] = $optional_image_data;
            $_FILES['optional_image3']['type'] = $optional_image['type'][$i];
            $_FILES['optional_image3']['tmp_name'] = $optional_image['tmp_name'][$i];
            $_FILES['optional_image3']['error'] = $optional_image['error'][$i];
            $_FILES['optional_image3']['size'] = $optional_image['size'][$i];
            $config = array();
            $config['upload_path'] = $path;
            // $config['file_name'] = $optional_image_data;
            $config['allowed_types'] = 'gif|jpg|png|';
            $config['max_size'] = '5000';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('optional_image3')) {
                $file_name[] = $this->upload->data('file_name');
            }
            $i++;
        }
        return $file_name;
    }

    /*
     * Get category data for ajax laod 
     * 
     * @retun array 
     */

    public function ajax_get_category_data() {
        $group_id = $this->input->post('group_id');
        $result = $this->model_backend_product->get_root_category_data($group_id);
        $data = array();
        foreach ($result as $r) {
            $data['value'] = $r->category_id;
            $data['label'] = $r->category_name;
            $json[] = $data;
        }
        echo json_encode($json);
    }

    /*
     * Get category data for ajax laod 
     * 
     * @retun array 
     */

    public function ajax_get_sub_category_data() {
        $category_id = $this->input->post('category_id');
        $result = $this->model_backend_product->get_sub_root_category_data($category_id);
        $data = array();
        foreach ($result as $r) {
            $data['value'] = $r->category_id;
            $data['label'] = $r->category_name;
            $json[] = $data;
        }
        echo json_encode($json);
    }

}
