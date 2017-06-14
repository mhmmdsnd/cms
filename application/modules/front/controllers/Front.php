<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mstproduct_model');
	}
	
	public function index()
	{
		$data['prodtype'] = $this->mstproduct_model->prodtype_front();
		$data['prodlist'] = $this->mstproduct_model->product_front();
		
		$data['top5'] = $this->mstproduct_model->top5_product();
		
		// load view
		$this->template->set('title','Welcome');
		$this->template->load('front/vw_Home','vw_Front',$data);
	}
}
