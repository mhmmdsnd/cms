<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/12/2017
 * Time: 11:31 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends CI_Controller
{
    private $limit = 10;
    function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->helper('form');
        $this->load->library('pagination');
    }

    function index($offset=0, $order_column='id', $order_type='asc')
    {
        if($this->session->userdata('logged_in'))
        {
            if(isset($_POST['submit']))
            {
                $data['name'] = $this->input->post('name');
                //set session user data untuk pencarian, untuk paging pencarian
                $this->session->set_userdata('sess_product', $data['name']);
            } else {
                $data['name'] = $this->session->userdata('sess_product');
            }
            if (!$offset) $offset=0;
            if (!$order_column) $order_column = 'id';
            if (!$order_type) $order_type = 'asc';

            $data['result'] = $this->master_model->spl_get_paged_list($this->limit, $offset, $order_column, $order_type, $data['name']);

            $config['base_url']=site_url('supplier/index/');
            $config['total_rows']=$this->master_model->spl_count_all($data['name']);
            //$config['per_page']=$this->limit;
            $config['uri_segment']='3';
            $this->pagination->initialize($config);
            $data['paginator']=$this->pagination->create_links();

            //$data = array('result'=>$result, 'paginator'=>$paginator);

            //table data
            $this->template->set('title','Supplier');
            $this->template->load('cpanel/template','supplierList',$data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    function create()
    {
        $user = $this->session->userdata('logged_in');
        if($this->input->post('action')){

            $data = array('code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'notelp' => $this->input->post('notelp'),
                'created_by'=> $user['loginname']);
            $id = $this->master_model->spl_save($data);

            //redirect
            redirect('supplier/index/');
        }
        // load view
        $this->template->set('title','Supplier :: Add Supplier');
        $this->template->load('cpanel/template','supplierAddUpdate');
    }
    function update($id)
    {
        $user = $this->session->userdata('logged_in');
        $data['detail'] = $this->master_model->spl_get_by_id($id)->row();

        if($this->input->post('action')){
            $data = array('name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'notelp' => $this->input->post('notelp'),
                'created_by'=> $user['loginname']);
            $this->master_model->spl_update($id,$data);
            //redirect
            redirect('supplier/index/');
        }
        // load view
        $this->template->set('title','Supplier :: Edit Supplier');
        $this->template->load('cpanel/template','supplierAddUpdate',$data);
    }
    function delete($id)
    {
        $this->master_model->spl_delete($id);
        redirect('supplier/index/', 'refresh');
    }
    function lookup()
    {
        $keyword = $this->input->post('term');
        $data['response'] = 'false';
        $data_lookup = $this->master_model->spl_lookup($keyword);
        $query = $data_lookup->result();

        if(!empty($query) ) {
            $data['response'] = 'true';
            $data['message'] = array();

            foreach($query as $row)
            {
                $data['message'][] = array('label'=>$row->code,'id'=>$row->id,'value'=>$row->code,'name'=>$row->name,
                    'address'=>$row->address);
            }
        }
        echo json_encode($data);
    }

}