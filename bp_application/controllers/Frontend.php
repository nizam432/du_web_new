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
        $param['news'] = $this->model_frontend->get_news_data();
        $param['use_full_link'] = $this->model_frontend->get_link_data(1);
        $param['quick_link'] = $this->model_frontend->get_link_data(2);
        $param['content'] = $this->load->view('pages/home/home.php', $param, TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Get notice details data
     * 
     * @param int $product_id
     * @return Response 
     */
    public function notice_details($id) {
        $param = array();
        $param['notice'] = $this->model_frontend->get_notice_details_data($id);
        $param['content'] = $this->load->view('pages/notice_details.php', $param, TRUE);
        $this->load->view('index.php', $param);
    }

    /**
     * Get about us information
     *
     * @return Response
     */
    public function about_us() {
        $param = array();
        $param['content'] = $this->load->view('pages/about_us', $param, TRUE);
        $this->load->view('index', $param);
    }
    /**
     * Get news details
     *
     * @return Response
     */
    public function news_details($id) {
        $param = array();
		$param['news'] = $this->model_frontend->get_news_details_data($id);
        $param['content'] = $this->load->view('pages/news_details', $param, TRUE);
        $this->load->view('index', $param);
    }


}
