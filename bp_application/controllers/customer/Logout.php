<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Backend logout controller for nanosoft news site
 */
class Logout extends CI_Controller
{
    /**
      * Logout user
      *
      * @return void
     */            
    public function customer_logout() 
	{
        $this->session->unset_userdata('customer_login_session_array');
        $sdata = array();
        $sdata['logout'] = "Successfully Logout";
        $this->session->set_userdata($sdata);
        redirect('customer/login');
    }
}
















