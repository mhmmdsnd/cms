<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#session_start(); //we need to call PHP's session object to access it through CI
class Received extends CI_Controller {

    private $limit = 10;
    function __construct()
    {
        parent::__construct();
        $this->load->model(Trntransfer_model::class);
        $this->trntransfer = New Trntransfer_model();

        $this->load->helper('form');
        $this->load->library('pagination');
    }
    function index($offset=0, $order_column='id', $order_type='desc')
    {
        if($this->session->userdata('logged_in'))
        {
            if (!$offset) $offset=0;
            if (!$order_column) $order_column = 'id';
            if (!$order_type) $order_type = 'desc';

            $data['result'] = $this->trntransfer->transfer_paged_list($this->limit, $offset, $order_column, $order_type);

            $config['base_url']=site_url('received/index/');
            $config['total_rows']=$this->trntransfer->transfer_count_all();
            $config['per_page']=$this->limit;
            $config['uri_segment']='3';
            $this->pagination->initialize($config);
            $data['paginator']=$this->pagination->create_links();

            //table data
            $this->template->set('title','Received TO :: List');
            $this->template->load('cpanel/template','receivedList',$data);
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
        $this->template->set('title','Received TO :: Create');
        $this->template->load('cpanel/template','receivedAddUpdate',$data);
    }
    function update($id)
    {
        $session_data = $this->session->userdata('logged_in');
        $data['loginname'] = $session_data['loginname'];
        //data detail (header)
        $data['detail'] = $this->trninventory_model->trans_by_id($id)->row();

        // load view
        $this->template->set('title','Received TO :: Update');
        $this->template->load('cpanel/template','receivedAddUpdate',$data);
    }
	
}
?>