<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#session_start(); //we need to call PHP's session object to access it through CI
class Category extends CI_Controller {
	
	private $limit = 10;
	function __construct()
	{
	   parent::__construct();
		$this->load->model(Master_model::class);
        $this->master_model = new Master_model();
		$this->load->helper('form');
	   	$this->load->library('pagination');
	}
    function index($offset=0, $order_column='id', $order_type='asc')
    {
        if($this->session->userdata('logged_in'))
        {
            if (!$offset) $offset=0;
            if (!$order_column) $order_column = 'id';
            if (!$order_type) $order_type = 'asc';

            $data['result'] = $this->master_model->lokasi_get_paged_list($this->limit,$offset, $order_column, $order_type);

            $config['base_url']=site_url('category/index/');
            $config['total_rows']= $this->master_model->lokasi_count_all();
            $config['per_page']=$this->limit;
            $config['uri_segment']='3';
            $this->pagination->initialize($config);
            $data['paginator']=$this->pagination->create_links();

            //table data
            $this->template->set('title','Category');
            $this->template->load('cpanel/template','categoryList',$data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    function create()
    {
        if($this->session->userdata('logged_in'))
        {
            $this->template->set('title','Category :: Add Category');
            $this->template->load('cpanel/template','categoryAddUpdate');
        }
        else
        {
            redirect('login', 'refresh');
        }
    }
    function update($id)
    {
        if($this->session->userdata('logged_in'))
        {
            $this->template->set('title','Category :: Edit Category');
            $this->template->load('cpanel/template','categoryAddUpdate');
        }
        else
        {
            redirect('login', 'refresh');
        }
    }
    function delete($id)
    {
        if($this->session->userdata('logged_in'))
        {

        }
        else
        {
            redirect('login', 'refresh');
        }
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