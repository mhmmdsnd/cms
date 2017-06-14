<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#session_start(); //we need to call PHP's session object to access it through CI
class Inventory extends CI_Controller {
	
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->load->model('trninventory_model');
		$this->load->model('mstsupplier_model');
		$this->load->model('mstwh_model');
		$this->load->model('mstitem_model');
		$this->load->helper('form');
		$this->load->library('pagination');
	}
	function index($offset=0, $order_column='transId', $order_type='desc')
	{
		if($this->session->userdata('logged_in'))
		{
			if (!$offset) $offset=0;
			if (!$order_column) $order_column = 'transId';
			if (!$order_type) $order_type = 'desc';
	
			$data['result'] = $this->trninventory_model->get_paged_list($this->limit, $offset, $order_column, $order_type);
	
			$config['base_url']=site_url('inventory/index/');
			$config['total_rows']=$this->trninventory_model->count_all();
			$config['per_page']=$this->limit;
			$config['uri_segment']='3';
			$this->pagination->initialize($config);
			$data['paginator']=$this->pagination->create_links();
	
	
			//$data = array('result'=>$result, 'paginator'=>$paginator);
	
			//table data
			$this->template->set('title','Inventory In :: List');
			$this->template->load('cpanel/template','inventoryList',$data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	//FUNCTION UNTUK CREATE TRANSAKSI INVENTORY IN
	function create ()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['loginname'] = $session_data['loginname'];
		
		if($this->input->post('action')){
			$data_inventoryin = array('transDate' => $this->input->post('transDate'),'transnumber'=> $this->input->post('transnumber'),
						'supplierId'=> $this->input->post('supplierId'),'whId'=> $this->input->post('whId'),
						'createdDate'=> date('Y-m-d H:i:s'),'createdBy'=> $session_data['loginname']);
			//$inventoryinId = $this->trninventory_model->save($data_inventoryin);
	
			//START INVENTORY ITEM
			$count = count($this->input->post('itemId'));
			/*for($i=0; $i<$count; $i++) {
				$data_insert = array(
						'transId'=>$inventoryinId, 'itemId' => $_POST['itemId'][$i],'qty' => $_POST['qty'][$i],
						'price' => $_POST['price'][$i],'total' => $_POST['total'][$i]);
				if ($_POST['itemId'][$i]) $this->trninventory_model->save_detail($data_insert);
			}*/
			
			//redirect
			//redirect('inventory/index/');
		}
		// load view
		$this->template->set('title','Inventory In :: Add Inventory In');
		$this->template->load('cpanel/template','inventoryAddUpdate',$data);
	}
	function update($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$data['loginname'] = $session_data['loginname'];
		//data detail (header)
		$data['detail'] = $this->trninventory_model->trans_by_id($id)->row();		
		
		// load view
		$this->template->set('title','Inventory In :: Add Inventory In');
		$this->template->load('cpanel/template','inventoryAddUpdate',$data);
	}
}
?>