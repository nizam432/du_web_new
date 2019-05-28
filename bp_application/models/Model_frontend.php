<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Model frontend
 */
class Model_frontend extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function get_notice_list_data()
	{
		$this->db->select('notice_id,notice,attached_file,entry_date_time');
		$this->db->from('notice');
                $this->db->where('status',1);
		$this->db->order_by("notice_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
    
    
	public function get_news_data()
	{
		$this->db->select('news_id,title,news_image,details,entry_date_time');
		$this->db->from('news');
        $this->db->where('status',1);
		$this->db->order_by("news_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
    
    
    /**
     * Get Home product data
     * 
     * @return array $result
     */
    public function get_home_product_data(){
        $this->db->select('product.product_name,'
                . 'product.product_id as product_id,'
                . 'product.master_image,'
                . 'price.sale_price as sale_price,'
                . 'price.whole_sale_price as whole_sale_price');
        $this->db->from('product');
        $this->db->join('price', 'product.product_id = price.product_id','left');
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    
    /**
     * Get specific product row  data
     * 
     * @param int $product_id
     * @return array $result
     */
    public function get_product_details_data($product_id) {
        $this->db->select('product.product_name,'
                . 'product.product_id as product_id,'
                . 'product.master_image,'
                . 'product.description,'
                . 'price.sale_price as sale_price,'
                . 'price.whole_sale_price as whole_sale_price');
        $this->db->from('product');
        $this->db->join('price', 'product.product_id = price.product_id','left');
        $this->db->where('product.product_id',$product_id);
        $query=$this->db->get();
        $result=$query->row();
        return $result;        
        
    }
    /**
     * Get category wise product data
     * 
     * @param int $category_id
     * @return array $result
     */
    public function get_category_wise_product_data($category_id) {
        $this->db->select('product.product_name,'
                . 'product.product_id as product_id,'
                . 'product.master_image,'
                . 'price.sale_price as sale_price,'
                . 'price.whole_sale_price as whole_sale_price');
        $this->db->from('product');
        $this->db->join('price', 'product.product_id = price.product_id','left');
        $this->db->where('product.category_id',$category_id);
        $query=$this->db->get();
        $result=$query->result();
        
        return $result;        
        
    }    
	
	/**
     * Get category wise product data
     * 
     * @param int $category_id
     * @return array $result
     */
    public function get_sub_category_wise_product_data($category_id) {
        $this->db->select('product.product_name,'
                . 'product.product_id as product_id,'
                . 'product.master_image,'
                . 'price.sale_price as sale_price,'
                . 'price.whole_sale_price as whole_sale_price');
        $this->db->from('product');
        $this->db->join('price', 'product.product_id = price.product_id','left');
        $this->db->where('product.sub_category_id',$category_id);
        $query=$this->db->get();
        $result=$query->result();
        
        return $result;        
        
    }
    
    
    /**
     * Get slider data
     * 
     * @return array $result
     */
    public function get_slider_data(){
        $this->db->select("*");
        $this->db->from('slider');
        $query=$this->db->get();
        $result=$query->result();
        return $result;              
    }    
	
	/**
     * Get product optional image 
     * 
     * @return array $result
     */
    public function get_product_optional_image($product_id){
        $this->db->select("*");
        $this->db->from('bp_optional_image');
		$this->db->where('product_id',$product_id);
        $query=$this->db->get();
        $result=$query->result();
        return $result;              
    }
    
    public function get_search_product_data($product_name){
        $this->db->select('product.product_name,'
                . 'product.product_id as product_id,'
                . 'product.master_image,'
                . 'price.sale_price as sale_price,'
                . 'price.whole_sale_price as whole_sale_price'
               );
        $this->db->from('product');
        $this->db->join('price', 'product.product_id = price.product_id','left');
        $query=$this->db->like('product.product_name',$product_name);
        $query=$this->db->get();
        $result=$query->result();
        return $result;      
    }
    
}