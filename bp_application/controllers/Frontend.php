<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Frontend
 */
class Frontend extends CI_Controller {

//    protected $customer_data = array();
//    protected $customer_id = null;
//    protected $customer_name = null;

    public function __construct() {
        parent::__construct();
//	$this->customer_data = $this->session->userdata('customer_login_session_array');
//        $this->customer_id = $this->customer_data['customer_id'];
//        $this->customer_name = $this->customer_data['customer_name'];
        $this->load->model('model_frontend');
    }

    /**
     * Get home page data
     * 
     * @return Response 
     */
    public function index() {
        $param = array();
        $param['notice'] = $this->model_frontend->get_notice_list_data();
        $param['slider'] = $this->model_frontend->get_slider_data();
        //$param['content'] = $this->load->view('pages/home.php', $param, TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Get product details data
     * 
     * @param int $product_id
     * @return Response 
     */
    public function details($product_id) {
        $param = array();
        $param['product'] = $this->model_frontend->get_product_details_data($product_id);
        $param['other_image'] = $this->model_frontend->get_product_optional_image($product_id);
        $param['content'] = $this->load->view('pages/details.php', $param, TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Get category wise product data 
     * 
     * @param int $category_id
     * @return Response
     */
    public function category($category_id) {
        $param = array();
        $param['product'] = $this->model_frontend->get_category_wise_product_data($category_id);
        $param['content'] = $this->load->view('pages/category.php', $param, TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Get category wise product data 
     * 
     * @param int $category_id
     * @return Response
     */
    public function sub_category($category_id) {
        $param = array();
        $param['product'] = $this->model_frontend->get_sub_category_wise_product_data($category_id);
        $param['content'] = $this->load->view('pages/sub_category.php', $param, TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Get shopping cart information
     */
    public function shopping() {
        $param = array();
        $param['content'] = $this->load->view('pages/shopping_cart.php', $param, TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Get contact us information
     *
     * @return Response
     */
    public function contact_us() {
        $param = array();
        $param['content'] = $this->load->view('pages/contact_us', $param, TRUE);
        $this->load->view('index', $param);
    }

    /**
     * Get login information
     *
     * @return Response
     */
    public function customer_login() {
        $param = array();
        $param['content'] = $this->load->view('pages/contact_us', $param, TRUE);
        $this->load->view('index', $param);
    }

    /**
     * Search product
     * @param string $product_name
     * 
     * @return Response 
     */
    public function search() {
        $product_name = db_escape($this->input->post('product_name'));
        $param = array();
        $param['product'] = $this->model_frontend->get_search_product_data($product_name);
        $param['content'] = $this->load->view('pages/show_search_product', $param, TRUE);
        $this->load->view('index', $param);
    }

}
