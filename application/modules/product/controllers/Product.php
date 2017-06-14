<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#session_start(); //we need to call PHP's session object to access it through CI
class Product extends CI_Controller {
	
	private $limit = 25;
	function __construct()
	{
	   parent::__construct();
		$this->load->model('mstproduct_model');
		$this->load->helper('form');
	   	$this->load->library('pagination');
	}
	function index($offset=0, $order_column='productId', $order_type='asc')
	{
		if($this->session->userdata('logged_in'))
		{
			if(isset($_POST['submit']))
			{
				$data['productName'] = $this->input->post('productName');
				//set session user data untuk pencarian, untuk paging pencarian
				$this->session->set_userdata('sess_product', $data['productName']);
			} else {
				$data['productName'] = $this->session->userdata('sess_product');
			}
			if (!$offset) $offset=0;
			if (!$order_column) $order_column = 'productId';
			if (!$order_type) $order_type = 'asc';
		
			$data['result'] = $this->mstproduct_model->product_get_paged_list($this->limit, $offset, $order_column, $order_type, $data['productName']);
		
			$config['base_url']=site_url('product/index/');
			$config['total_rows']=$this->mstproduct_model->product_count_all($data['productName']);
			//$config['per_page']=$this->limit;
			$config['uri_segment']='3';
			$this->pagination->initialize($config);
			$data['paginator']=$this->pagination->create_links();
		
			//$data = array('result'=>$result, 'paginator'=>$paginator);
		
			//table data
			$this->template->set('title','Product');
			$this->template->load('cpanel/template','productList',$data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	function create()
	{
		$data['dropdown'] = $this->mstproduct_model->prodtype_get_dropdown();
		$user = $this->session->userdata('logged_in');
		if($this->input->post('action')){
			
			$data_product = array('ProductCode' => $this->input->post('productCode'),
					'ProductName' => $this->input->post('productName'),
					'ProductType' => $this->input->post('prodtypeId'),
					'productQty' => $this->input->post('productqty'),
					'ProductDesc'=>$this->input->post('productdesc'),
					'ProductPrice'=>$this->input->post('productprice'),
					'createdBy'=> $user['loginname'],
					'createdDate'=> date('Y-m-d h:i:s'));
			$id = $this->mstproduct_model->product_save($data_product);
			
			//redirect
			redirect('product/index/');
		}
		// load view
		$this->template->set('title','Product :: Add Product');
		$this->template->load('cpanel/template','productAddUpdate',$data);
	}
	function update($id)
	{
		$user = $this->session->userdata('logged_in');
		$data['detail'] = $this->mstproduct_model->product_get_by_id($id)->row();
		//DROPDOWN PROD TYPE
		$data['dropdown'] = $this->mstproduct_model->prodtype_get_dropdown();

		if($this->input->post('action')){
			$data_product = array('productCode' => $this->input->post('productCode'),
					'productName' => $this->input->post('productName'),
					'ProductType' => $this->input->post('prodtypeId'),
					'ProductDesc'=>$this->input->post('productdesc'),
					'ProductPrice'=>$this->input->post('productprice'));
			$this->mstproduct_model->product_update($id,$data_product);
			
			//redirect
			redirect('product/index/');
		}
		// load view
		$this->template->set('title','Product :: Edit Product');
		$this->template->load('cpanel/template','productAddUpdate',$data);
	}
	function delete ($id)
	{
		$this->mstproduct_model->product_delete($id);
		redirect('product/index/', 'refresh');
	}
	//LOOKUP UNTUK TABEL TRANSAKSI
	function lookup ()
	{
		$keyword = $this->input->post('term');
		$data['response'] = 'false';
		$data_lookup = $this->mstproduct_model->product_lookup($keyword);
		$query = $data_lookup->result();
		
		if(!empty($query) ) {
			$data['response'] = 'true';
			$data['message'] = array();
		
			foreach($query as $row)
			{
				$data['message'][] = array('label'=>$row->productCode,'id'=>$row->productId,'value'=>$row->productCode,
                    'productName'=>$row->productName,'productPrice'=>$row->ProductPrice,'stok'=>$row->stokIn);
			}
		}
		
		echo json_encode($data);
	}
}
?>