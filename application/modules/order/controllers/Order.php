<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#session_start(); //we need to call PHP's session object to access it through CI
class Order extends CI_Controller {
	
	function __construct()
	{
	   parent::__construct();
		$this->load->model('mstproduct_model');
		$this->load->model('trnorder_model');
		$this->load->helper('form');
		$this->load->helper('number');
	}
	function index()
	{
		$data['listproduct'] = $this->mstproduct_model->product_front();
		// load view
		$this->template->set('title','Product :: List Product');
		$this->template->load('front/vw_Home','order_list',$data);
	}
	function detail($id)
	{
		$data['detail'] = $this->mstproduct_model->product_get_by_id($id)->row();

		#UPDATE VIEW
		$this->trnorder_model->productView($id);
		
		// load view
		$this->template->set('title','Product :: View Product');
		$this->template->load('front/vw_Home','order_view',$data);
	}
	function create($id)
	{
        if($this->session->userdata('member_in')) {
            $data['detail'] = $this->mstproduct_model->product_get_by_id($id)->row();
            $data['orderdetail'] = $this->session->userdata('member_in');

            if ($this->input->post('send_order')) {
                #DATA ORDER
                $ExpiredDate = date('Y-m-d', mktime(0, 0, 0, date(m), date(d) + 3, date(Y))); #EXPIRED DATE (ORDER)
                $ticketId = mt_rand(111111, 999999); #NO TICKET ORDER
                $data_order = array('orderPrice' => $this->input->post('orderPrice'),
                    'orderItemId' => $id,
                    'orderQty' => $this->input->post('orderQty'),
                    'orderName' => $this->input->post('orderName'),
                    'orderEmail' => $this->input->post('orderEmail'),
                    'orderPhone' => $this->input->post('orderPhone'),
                    'orderAddress' => $this->input->post('orderAddress'),
                    'orderDate' => date('Y-m-d H:i:s'),
                    'orderExpiredDate' => $ExpiredDate,
                    'ticketId' => $ticketId,
                    'createdDate' => date('Y-m-d H:i:s'), 'createdBy' => $this->input->post('orderName'));
                $orderId = $this->trnorder_model->order_save($data_order);
                #UPDATE STOK
                $this->trnorder_model->update_stok($id, $this->input->post('orderQty'));

                redirect('order/confirm/' . $orderId);
            }

            // load view
            $this->template->set('title', 'Product :: Create New Order');
            $this->template->load('front/vw_Home', 'order_create', $data);
        }
        else {

            $data['detail'] = $this->mstproduct_model->product_get_by_id($id)->row();

            $this->template->set('title', 'Product :: Create New Order');
            $this->template->load('front/vw_Home', 'member/order_login',$data);
        }
	}
	function confirm($id)
	{
		$data['detail'] = $this->trnorder_model->order_detail($id)->row();
		
		// load view
		$this->template->set('title','Order :: Order Confirmation');
		$this->template->load('front/vw_Home','order_confirm',$data);
	}
	
}
?>