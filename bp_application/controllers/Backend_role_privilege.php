<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend role_privilege controller 
 */
class Backend_role_privilege extends CI_Controller 
{ 
    protected $user_data = array();
    protected $user_id = null;
    protected $user_group = null;
    protected $privilege = array();
	
	public function __construct()
	{
		parent::__construct();
        $this->user_data = $this->session->userdata('login_session_data');
        
        $this->user_id = $this->user_data['user_id'];
        $this->privilege= $this->user_data['privilege'];
        $this->user_group= $this->user_group['user_group'];

        if ($this->user_id == NULL) {
            redirect('backend_login/check_login', "refresh");
        }
	  //load model
	  $this->load->model('model_backend_role_privilege');
	  
	  //load form validation
	  $this->load->library('form_validation');
	  
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
	
 	/**
	 * Previlege search form  
	 *
	 * @return array
	 */	
	public function index()
	{
		$data = array();
		$data['user_group']=$this->model_backend_role_privilege->get_user_group_data(); 	
		$data['content'] = $this->load->view('admin/role_privilege/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	 /**
	 * Add role_privilege 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data['user_group']=$this->model_backend_role_privilege->get_user_group_data(); 
		$data['menu']=$this->model_backend_role_privilege->get_root_menu_data();
		$menu_info = json_decode(json_encode($data['menu']), True);
		
		foreach($data['menu'] as $key=>$value)
		{
			$menu_id=$menu_info[$key]['menu_id'];
			
			$data['sub_menu']=$this->model_backend_role_privilege->get_sub_menu_data($menu_id);
			$sub_menu = json_decode(json_encode($data['sub_menu']), True);
			$menu_info[$key]['sub_menu']=$sub_menu;
		}
		
		$data['menu_info']=$menu_info;
		$data['content']=$this->load->view('admin/role_privilege/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit role_privilege 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['role_privilege_edit']= $this->model_backend_role_privilege->get_role_privilege_row($id);
		$data['content']=$this->load->view('admin/role_privilege/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save role_privilege
	 *
	 * @return void
	 */	
	public function save()
	{		
		//Form Validation
		$this->form_validation->set_rules('user_group', 'User Group', 'required');
		$this->form_validation->set_rules('menu[]', 'Menu Select', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('role_privilege_form_validation',validation_errors());
			redirect('backend_role_privilege/add');
		}
		else
		{
			$data=array();
			$user_group=$this->input->post('user_group', TRUE);
			$menu=$this->input->post('menu', TRUE);
			
			// Transaction Start
			$this->db->trans_start();
			
			$this->model_backend_role_privilege->delete_role_privilege_data($user_group);
			foreach($menu as $value)
			{
				$data['user_group']=$user_group;
				$data['menu']=$value;
				//save role_privilege
				$this->model_backend_role_privilege->save_role_privilege_data($data);
			}
			
			$this->db->trans_complete();
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_role_privilege');
		}
	}

	
	/**
	 * Update role_privilege
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['role_privilege_title']=$this->input->post('role_privilege_title', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('role_privilege_title', 'User Group Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('role_privilege_form_validation',validation_errors());
			redirect("backend_role_privilege/edit/$id");
		}
		else
		{
			//update role_privilege data
			$this->model_backend_role_privilege->update_role_privilege_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_role_privilege');
		}
	}
	
	public function get_previlige_info(){
            $data=array();
            $data['menu']=$this->model_backend_role_privilege->get_root_menu_data();
            $menu_info = json_decode(json_encode($data['menu']), True);

            foreach($data['menu'] as $key=>$value)
            {
                    $menu_id=$menu_info[$key]['menu_id'];

                    $data['sub_menu']=$this->model_backend_role_privilege->get_sub_menu_data($menu_id);
                    $sub_menu = json_decode(json_encode($data['sub_menu']), True);
                    $menu_info[$key]['sub_menu']=$sub_menu;
            }
            $data['menu_info']=$menu_info;
            
            $data['user_group']=$user_group=$this->input->post('user_group');
            
            $privilege_result=$this->model_backend_role_privilege->get_role_privilege_data($user_group);
            
            $privilege=array();
            foreach($privilege_result as $value)
            {
                $privilege[]=$value->menu;
            }
            $data['privilege']=$privilege;
            $this->load->view('admin/role_privilege/privilege',$data);
	}
}
