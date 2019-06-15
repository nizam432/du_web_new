<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend  controller 
 */
class Backend_faculty extends CI_Controller {

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
        $this->load->model('model_backend_faculty');
    }    
    
 	/**
	 * Show faculty List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['faculty_list'] =$this->model_backend_faculty->get_faculty_list_data();
		$data['content'] = $this->load->view('admin/faculty/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add faculty 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/faculty/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit faculty 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['faculty_edit']= $this->model_backend_faculty->get_faculty_row($id);
		$data['content']=$this->load->view('admin/faculty/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save faculty
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['faculty_title']=$this->input->post('faculty_title', TRUE);
		$data['head_of_office']=$this->input->post('head_of_office', TRUE);
		$data['designation']=$this->input->post('designation', TRUE);
		$result=$this->do_upload('faculty_head_picture');
		if(!empty($result[0]))
		{
			echo $data['faculty_head_picture'] = "uploads/faculty_head_picture/$result[0]" ;	
		}
		//$data['faculty_head_picture']=$this->input->post('faculty_head_picture', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$data['entry_by']=$this->user_id;
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('faculty_title', 'faculty Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('faculty_form_validation',validation_errors());
			redirect('backend_faculty/add');
		}
		else
		{
			//save faculty
			$this->model_backend_faculty->save_faculty_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_faculty');
		}
	}

	
	/**
	 * Update faculty
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['faculty_title']=$this->input->post('faculty_title', TRUE);
		$data['head_of_office']=$this->input->post('head_of_office', TRUE);
		$data['designation']=$this->input->post('designation', TRUE);

		$result=$this->do_upload('faculty_head_picture');
		if(!empty($result[0]))
		{
			echo $data['faculty_head_picture'] = "uploads/faculty_head_picture/$result[0]" ;	
		}			
		
		//$data['faculty_head_picture']=$this->input->post('faculty_head_picture', TRUE);
		$data['description']=$this->input->post('description', TRUE);		
		$data['update_by']=$this->user_id;
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('faculty_title', 'faculty Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('faculty_form_validation',validation_errors());
			redirect("backend_faculty/edit/$id");
		}
		else
		{
			//update faculty data
			$this->model_backend_faculty->update_faculty_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_faculty');
		}
	}
	/**
	 * publish faculty
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_faculty->publish_data($data,$ids);
	}

	/**
	 * Unpublish faculty
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_faculty->unpublish_data($data,$ids);
	}
	
		
	public function do_upload($faculty_head_picture)
	{
	    // photo upload
		$config = array();
		$config['upload_path'] = './uploads/faculty_head_picture/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['max_size'] = '10000';	
		
		$this->load->library('upload', $config,'faculty_head_picture');
		$this->faculty_head_picture->initialize($config);
		$faculty_head_picture = $this->faculty_head_picture->do_upload('faculty_head_picture');
	
	    // Check uploads success
		if ($faculty_head_picture) 
		{
			$file_name=array();
		   if($faculty_head_picture)
		  { // Both Upload Success
			
		  // Data of your cover file
		  $faculty_head_picture = $this->faculty_head_picture->data();
		  $file_name[0]=$faculty_head_picture['file_name']; 
		  }
		  
		  return $file_name;
		} 
		else {
		 echo 'Cover upload Error : ' . $this->faculty_head_picture->display_errors() . '<br/>';
		//exit;
		}
	}
}
