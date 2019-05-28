<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_checkout extends CI_Controller {
    protected $customer_data = array();
    protected $customer_id = null;
    protected $customer_name = null;
    protected $date_time = null;
    function __construct() {
        parent::__construct();  
        date_default_timezone_set('Asia/Dhaka');
        $this->date_time = date('Y-m-d H:i:s');
        $this->customer_data = $this->session->userdata('customer_login_session_array');
        $this->customer_id = $this->customer_data['customer_id'];
        if ($this->customer_id == NULL) {
            redirect('customer/login/check_login', "refresh");
        }
        $this->load->model('model_checkout');
    }

    /**
     * Get checkout page
     */
    public function index() {
        $param=array();
        $param['content']=$this->load->view('pages/checkout', $param,TRUE);
        $this->load->view('index',$param);
    }

    /**
     * Save checkout data
     * 
     * @return Response
     */
    public function save_checkout(){
      
        $customer_id = $this->customer_id;  //customer id
        $ip_address = $_SERVER['REMOTE_ADDR']; //get order ip address
        //checkout data array
        $checkout_data = array(
            'full_name' => $this->input->post('full_name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'order_date' => $this->date_time,
            'customer_id' => $customer_id,
            'ip_address' => $ip_address,
        );
        // save checkout data and get checkout id
        $checkout_id = $this->model_checkout->save_chekout_address($checkout_data);
        
        //payment data array
        $payment_data = array(
            'payment_option' => $this->input->post('payment_option')
        );
        $this->model_checkout->add_payment_option($payment_data, $checkout_id, $customer_id);

        //save order product data
        foreach ($this->cart->contents() as $items){
          
            $order_data=array(
                'checkout_id'=>$checkout_id,
                'product_id'=>$items['id'],
                'price'=>$items['price'],
                'qty'=>$items['qty']
            );
            $this->model_checkout->save_checkout_details($order_data);
        }
       
      $this->cart->destroy();
      $this->session->set_flashdata('checkout', 'Your Order Successfully Placed');
      redirect('frontend_checkout');
    }

    public function step_1() {
        if ($this->input->post('submit')) {
            if (!empty($_POST)) {
               // $uid = $this->session->userdata('userid');

                $data=array(
                    'full_name'=>$this->input->post('full_name'),
                    'phone'=>$this->input->post('phone'),
                    'address'=>$this->input->post('address'),
                    'order_date'=>$this->date_time, 
                    'customer_id'=>$this->customer_id, 
                );

                $insert_id = $this->model_checkout->save_chekout_address($data);
                $in = $this->db->insert_id();
                $checkout_id = $this->session->userdata('checkout_id');
                //$this->session->set_userdata('checkout_id', $in);
               // redirect('frontend_checkout/step_2');
            }
        }
    }


    public function step_2() {
        if ($this->input->post('submit')) {
            if (!empty($_POST)) {
                
                $data=array(
                    'payment_option'=>$this->input->post('payment_option')
                );
                
                $checkout_id = $this->session->userdata('checkout_id');
                $customer_id=$this->customer_id;                
                $this->model_checkout->add_payment_option($data, $checkout_id,$customer_id);
                redirect('frontend_checkout/step_3');
            }
        }
        
        $param=array();
        $param['content']=$this->load->view('pages/checkout_step_two.php', $param,TRUE);
        $this->load->view('index',$param);        
    }

    public function step_3() {
        if ($this->input->post('confirm')) {
            $uid = $this->session->userdata('userid');
            $total = 0;
            $qu = 0;
            //add to cart in database
            if (!empty($this->cart->contents())) {
                $total = 0;
                $total_cart = $this->cart->total_items();
                $this->Checkout_Model->insertcart($total_cart);
                $insert_id = $this->db->insert_id();
                $checkout_id = $this->session->userdata('checkout_id');
                $this->Checkout_Model->addcheckoutcart($insert_id, $checkout_id, $uid);
                foreach ($this->cart->contents() as $items):
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $total = $total + (($items['qty']) * ($items['price']));
                    $qu = $qu + $items['qty'];
                    $this->Checkout_Model->insertcartproductdetail($insert_id, $items['id'], $items['price'], $items['qty'], $ip, $items['color'], $items['size']);
                endforeach;
            }
            //add sales detail to database
            $byname = $this->session->userdata('firstname');
            //				$createby=$this->session->userdata('mem_id');
            $createby = '0';
            $this->Checkout_Model->addsale($byname, $total, $createby, $qu);
            $insert = $this->db->insert_id();
            $this->Checkout_Model->addcheckoutcart($insert, $checkout_id, $uid);
            $output['cartdetail'] = $this->Checkout_Model->getcartdata($uid);
            foreach ($output['cartdetail'] as $select4):
                $this->Checkout_Model->addsaledetail($insert, $select4);
            endforeach;
            $this->cart->destroy();
            $this->db->set('is_shipped', 1);
            $this->db->where('userid', $uid);
            $this->db->update('tbl_cart');
            $this->session->set_flashdata('SUCCESSMSG', 'Your Order Successfully Placed!!');
            redirect('cart');
        }
        $param=array();
        $param['content']=$this->load->view('pages/checkout_step_three', $param,TRUE);
        $this->load->view('index',$param);   
    }

}
