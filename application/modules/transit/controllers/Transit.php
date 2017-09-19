<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Transit extends CI_Controller{
	
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
        $this->load->model(Trntransfer_model::class);
        $this->trntransfer = New Trntransfer_model();

		$this->load->library('pagination');		
	}
	function index($offset=0, $order_column='id', $order_type='asc')
	{
		if (!$offset) $offset=0;
		if (!$order_column) $order_column = 'id';
		if (!$order_type) $order_type = 'desc';

		$data['result'] = $this->trntransfer->transfer_paged_list($this->limit, $offset, $order_column, $order_type);
		$config['base_url']=site_url('invoice/index/');
		$config['total_rows']=$this->trntransfer->transfer_count_all();
		$config['uri_segment']='3';
		//$config['per_page']=$this->limit;
		$this->pagination->initialize($config);
		$data['paginator']=$this->pagination->create_links();
	
		#table data
		$this->template->set('title','Transit TO :: List');
		$this->template->load('cpanel/template','transit_view',$data);
	
	}
	function create()
    {
        $user = $this->session->userdata('logged_in');

        if($this->input->post('action')=="Save"){
            if($this->input->post('deliveryDate')) $deliverydate = $this->input->post('deliveryDate');
            else $deliverydate = date('Y-m-d', mktime(0, 0, 0, date(m), date(d) + 7, date(Y)));
            $ticketId = mt_rand(111111, 999999); #NO TICKET ORDER
            $data_order = array('orderPrice' => $this->input->post('invoiceprice'),
                'orderItemId' => $this->input->post('productId'),
                'customer_id' => $this->input->post('id'),
                'orderQty' => $this->input->post('invoiceqty'),
                'orderDeliveryDate'=>$deliverydate,
                'ticketId' => $ticketId, 'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $user['loginname']);
            $orderId = $this->trnorder_model->order_save($data_order);

            redirect('invoice');
        }

        #table data
        $this->template->set('title','Inventory Out :: Add Inventory Out');
        $this->template->load('cpanel/template','invoiceAddUpdate');
    }
	function detail($id)
	{
		#invoice detail
		$data['detail'] = $this->trnorder_model->order_detail($id)->row();
        if($this->input->post('approve'))
		{
			$this->trnorder_model->order_proses($id,1);
            $this->trnorder_model->update_stok($data['detail']->orderItemId, $data['detail']->orderQty);
            redirect('invoice/index/');
		}
		if($this->input->post('cancel'))
		{
			$this->trnorder_model->order_proses($id,2);
			redirect('invoice/index/');
		}
		#table data
		$this->template->set('title','Inventory Out :: Detail');
		$this->template->load('cpanel/template','invoice_detail',$data);
	}
    function update($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $data['loginname'] = $session_data['loginname'];
        //data detail (header)
        //$data['detail'] = $this->trninventory_model->trans_by_id($id)->row();

        // load view
        $this->template->set('title','Transit TO :: Update');
        $this->template->load('cpanel/template','transitAddUpdate');
    }
	function approve($id)
	{
		$this->trnorder_model->order_proses($id,1);
        #UPDATE STOK
        $detail = $this->trnorder_model->order_detail($id)->row();
        #print_r($detail->orderItemId);
        $this->trnorder_model->update_stok($detail->orderItemId, $detail->orderQty);

        redirect('invoice/index/');
	}
	function reject($id)
	{
		$this->trnorder_model->order_proses($id,2);	 
		redirect('invoice/index/');
	}
}