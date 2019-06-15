<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Backend  controller 
 */
class Backend_department extends CI_Controller {

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
        $this->load->model('model_backend_department');
    }
 	/**
	 * Show department List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['department_list'] =$this->model_backend_department->get_department_list_data();
		$data['content'] = $this->load->view('admin/department/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add department 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['faculty']=$this->model_backend_department->get_faculty_data();
		$data['content']=$this->load->view('admin/department/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit department 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['department_edit']= $this->model_backend_department->get_department_row($id);
		$data['faculty']=$this->model_backend_department->get_faculty_data();
		$data['content']=$this->load->view('admin/department/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save department
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['department_title']=$this->input->post('department_title', TRUE);
		$data['faculty']=$this->input->post('faculty', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$data['head_of_department']=$this->input->post('head_of_department', TRUE);
		$data['designation']=$this->input->post('designation', TRUE);
		$data['address']=$this->input->post('address', TRUE);
		$data['phone']=$this->input->post('phone', TRUE);
		$data['fax']=$this->input->post('fax', TRUE);
		$data['website']=$this->input->post('website', TRUE);
		$data['email_id']=$this->input->post('email_id', TRUE);
		$data['entry_by']=$this->user_id;
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('department_title', 'Department Title', 'required');
		$this->form_validation->set_rules('faculty', 'Faculty', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('department_form_validation',validation_errors());
			redirect('backend_department/add');
		}
		else
		{
			//save department
			$this->model_backend_department->save_department_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_department');
		}
	}

	
	/**
	 * Update department
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['department_title']=$this->input->post('department_title', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$data['head_of_department']=$this->input->post('head_of_department', TRUE);
		$data['designation']=$this->input->post('designation', TRUE);
		$data['address']=$this->input->post('address', TRUE);
		$data['phone']=$this->input->post('phone', TRUE);
		$data['fax']=$this->input->post('fax', TRUE);
		$data['website']=$this->input->post('website', TRUE);		
		$data['email_id']=$this->input->post('email_id', TRUE);		
		$data['faculty']=$this->input->post('faculty', TRUE);
		$data['update_by']=$this->user_id;
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('department_title', 'department Title', 'required');
		$this->form_validation->set_rules('faculty', 'Faculty', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('department_form_validation',validation_errors());
			redirect("backend_department/edit/$id");
		}
		else
		{
			//update department data
			$this->model_backend_department->update_department_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_department');
		}
	}
	/**
	 * publish department
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_department->publish_data($data,$ids);
	}

	/**
	 * Unpublish department
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_department->unpublish_data($data,$ids);
	}
}
