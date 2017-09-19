<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/12/2017
 * Time: 11:31 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Controller
{
    private $limit = 10;
    function __construct()
    {
        parent::__construct();
        $this->load->model(Master_model::class);
        $this->load->library('pagination');
        $this->master_model = new Master_model();
    }

    function index($offset=0, $order_column='id', $order_type='asc')
    {
        if($this->session->userdata('logged_in'))
        {
            if (!$offset) $offset=0;
            if (!$order_column) $order_column = 'id';
            if (!$order_type) $order_type = 'asc';

            $data['result'] = $this->master_model->lokasi_get_paged_list($this->limit,$offset, $order_column, $order_type);

            $config['base_url']=site_url('location/index/');
            $config['total_rows']= $this->master_model->lokasi_count_all();
            $config['per_page']=$this->limit;
            $config['uri_segment']='3';
            $this->pagination->initialize($config);
            $data['paginator']=$this->pagination->create_links();

            //table data
            $this->template->set('title','Location');
            $this->template->load('cpanel/template','locationList',$data);
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
            if($this->input->post('action')){
                $data_user = array('kode' => $this->input->post('locationCode'),'nama' => $this->input->post('locationName'));
                $id = $this->master_model->lokasi_save($data_user);
                //validasi ID
                $this->validation->id = $id;
                //redirect
                redirect('location/index/');
            }
            $this->template->set('title','Location');
            $this->template->load('cpanel/template','locationAddUpdate');
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
            $data['detail'] = $this->master_model->lokasi_get_by_id($id)->row();

            if($this->input->post('action')){
                $id = $this->input->post('id');
                $data_user = array('kode' => $this->input->post('locationCode'),'nama' => $this->input->post('locationName'));
                $id = $this->master_model->lokasi_update($id,$data_user);
                //validasi ID
                $this->validation->id = $id;
                //redirect
                redirect('location/index/');
            }
            $this->template->set('title','Location');
            $this->template->load('cpanel/template','locationAddUpdate',$data);
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
            $this->master_model->lokasi_delete($id);
            redirect('location/index/', 'refresh');
        }
        else
        {
            redirect('login', 'refresh');
        }
    }

}