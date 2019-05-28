<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class backend_slider extends CI_Controller {

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
        $this->load->model('model_backend_slider');
    }

    /**
     * Get slider list
     *
     * @return Response
     */
    public function index() {
        $data = array();
        $data['slider_list'] = $this->model_backend_slider->get_all_slider_data();
        $data['content'] = $this->load->view('admin/slider/list', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /**
     * add slider
     *
     * @return Response
     */
    public function add() {
        $data = array();
        $data['content'] = $this->load->view('admin/slider/add', '', TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save slider
     *
     * @return Response
     */
    public function save() {
        //Form Validation
        $this->form_validation->set_rules('slider_caption', 'Slider Cation', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('slider_form_validation', validation_errors());
            redirect('backend_slider/add');
        } else {
            $data = array(
                'slider_caption' => $this->input->post('slider_caption'),
                'link' => $this->input->post('link'),
                'short_description' => $this->input->post('short_description'),
                'entry_by' => $this->user_id,
                'entry_date_time' => $this->date_time,
                'isactive' => $this->input->post('isactive')
            );

            $result = $this->do_upload('slider_image');
            if (!empty($result[0])) {
                $data['slider_image'] = "uploads/slider_image/" . $result[0];
            }

            //save slider
            $this->model_backend_slider->save_slider_data($data);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_slider');
        }
    }

    /** Edit slider
     *
     * return Response
     */
    public function edit($slider_id) {
        $data = array();
        $data['slider_edit'] = $this->model_backend_slider->get_slider_row($slider_id);
        $data['content'] = $this->load->view('admin/slider/edit', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /** save slider
     *
     * return Response 
     */
    public function update($slider_id) {
        $this->form_validation->set_rules('slider_caption', 'slider Caption', 'required', array('required' => "%s is required"));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('slider_form_validation', validation_errors());
            redirect("backend_slider/edit/$slider_id");
        } else {
            $data = array(
                'slider_caption' => $this->input->post('slider_caption'),
                'link' => $this->input->post('link'),
                'short_description' => $this->input->post('short_description'),
                'update_by' => $this->user_id,
                'update_date_time' => $this->date_time,
                'isactive' => $this->input->post('isactive')
            );

            $result = $this->do_upload('slider_image');
            if (!empty($result[0])) {
                $data['slider_image'] = 'uploads/slider_image/' . $result[0];
            }


            //save slider
            $this->model_backend_slider->update_slider_data($data, $slider_id);

            // Redirect with flash message
            $result = array();
            $result['message'] = "Data insert successfully";
            $this->session->set_userdata($result);
            redirect('backend_slider');
        }
    }

    /**
     * Upload Picture
     * 
     * @param string $slider_image
     * @return string
     */
    public function do_upload($slider_image) {
        $config = array();
        $config['upload_path'] = './uploads/slider_image/';
        $config['allowed_types'] = 'gif|jpg|png|';
        $config['max_size'] = '5000';

        $this->load->library('upload', $config, 'slider_image');
        $this->slider_image->initialize($config);
        $slider_image = $this->slider_image->do_upload('slider_image');

        // Check uploads success
        if ($slider_image) {
            $file_name = array();
            if ($slider_image) { // Both Upload Success
                // Data of your cover file
                $slider_image = $this->slider_image->data();
                $file_name[0] = $slider_image['file_name'];
            }

            return $file_name;
        } else {
           // echo 'Cover upload Error : ' . $this->student_photo->display_errors() . '<br/>';
           // exit;
        }
    }

}
