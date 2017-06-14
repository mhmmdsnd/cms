<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#session_start(); //we need to call PHP's session object to access it through CI
class Cpanel extends CI_Controller {

 function __construct()
 {
   parent::__construct();
  }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['loginname'] = $session_data['loginname'];
     
    $this->template->set('title','Dashboard');
	$this->template->load('template','cpanel_view',$data);
   	 //$this->load->view('home_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('', 'refresh');
 }

}
?>