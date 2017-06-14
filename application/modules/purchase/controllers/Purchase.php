<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Purchase extends CI_Controller{
	
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->load->model('trnorder_model');
		$this->load->helper('form');
		$this->load->library('pagination');		
	}
	function index($offset=0, $order_column='buyId', $order_type='asc')
	{
		if (!$offset) $offset=0;
		if (!$order_column) $order_column = 'buyId';
		if (!$order_type) $order_type = 'desc';

		$data['result'] = $this->trnorder_model->purchase_paged_list($this->limit, $offset, $order_column, $order_type);
		$config['base_url']=site_url('purchase/index/');
		$config['total_rows']=$this->trnorder_model->purchase_count_all();
		$config['uri_segment']='3';
		//$config['per_page']=$this->limit;
		$this->pagination->initialize($config);
		$data['paginator']=$this->pagination->create_links();
	
		#table data
		$this->template->set('title','Inventory In :: List');
		$this->template->load('cpanel/template','purchaseList',$data);
	}
	function create()
	{	
		$user = $this->session->userdata('logged_in');
		if($this->input->post('action')=="Save"){
			$data_purchase = array('buyDate'=>date('Y-m-d H:i:s'),
                'supplier_id'=>$this->input->post('id'),
				'buyItemId'=>$this->input->post('productId'),
				'buyDescription'=>$this->input->post('purchasedesc'),
				'buyQty'=>$this->input->post('purchaseqty'),
				'buyPrice'=>$this->input->post('purchaseprice'),
				'isProccess'=>1,
				'created_by'=>$user['loginname'],
				'created_at'=>date('Y-m-d H:i:s'));
			$id = $this->trnorder_model->purchase_save($data_purchase);
			#ADD STOK
			$this->trnorder_model->add_stok($this->input->post('productId'),$this->input->post('purchaseqty'));
			
			redirect('purchase');
		}
		
		#table data
		$this->template->set('title','Inventory In :: Add Inventory In');
		$this->template->load('cpanel/template','purchaseAddUpdate');
	}
	function update($id)
	{
		$data['detail'] = $this->trnorder_model->purchase_by_id($id)->row();
		#table data
		$this->template->set('title','Inventory In :: Add Inventory In');
		$this->template->load('cpanel/template','purchaseAddUpdate',$data);
	}
	function detail($id)
	{
		$data['detail'] = $this->trnorder_model->purchase_by_id($id)->row();
		#table data
		$this->template->set('title','Inventory In :: Add Inventory In');
		$this->template->load('cpanel/template','purchaseAddUpdate',$data);
	}
}