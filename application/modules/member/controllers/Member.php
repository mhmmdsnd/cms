<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mstmember_model');
    }
    function check_database()
    {
        //Field validation succeeded.  Validate against database
        $loginname  = $_POST['loginname'];
        $password  = $_POST['password'];
        $productId  = $_POST['Id'];
        if(($_POST['loginname'] == "")|| ($_POST['password'] == ""))
        {
            $message = "Please, insert username and password";
            $status = "0";

            $output = '{"status": "'.$status.'","message" : "'.$message.'"}';
        }
        //query the database
        elseif (($_POST['loginname']!="")|| ($_POST['password']!= ""))
        {
            $result = $this->mstmember_model->login($loginname, $password);
            if($result)
            {
                $member_array = array();
                foreach($result as $row)
                {
                    $member_array = array(
                        'id' => $row->memberId,
                        'loginname' => $row->memberName,'memberFName'=>$row->memberFName,
                        'memberLName'=>$row->memberLName, 'memberAddress'=>$row->memberAddress,
                        'memberEmail'=>$row->memberEmail,'memberPhone'=>$row->memberPhone);

                    $this->session->set_userdata('member_in', $member_array);
                    //array_push($response[login],$sess_array);
                }
                $message = "OK";
                $status = "1";

                $output = '{"status": "'.$status.'","message" : "'.$message.'","uname":"'.$member_array['loginname'].'",
                "productId":"'.$productId.'"}';
            }
            else
            {
                $message = "Login failed, please try again";
                $status = "0";

                $output = '{"status": "'.$status.'","message" : "'.$message.'"}';
            }
        }

        echo $output;
    }
    function member_login()
    {
        $this->template->set('title', 'Product :: Create New Order');
        $this->template->load('front/vw_Home', 'member/member_login');
    }
    function register()
    {
        if ($this->input->post('register')) {
            #DATA MEMBER
            $data_order = array('memberName' => $this->input->post('memberName'),
                'memberFName' => $this->input->post('memberFName'),
                'memberLName' => $this->input->post('memberLName'),
                'memberPhone' => $this->input->post('memberPhone'),
                'memberEmail' => $this->input->post('memberEmail'),
                'memberAddress' => $this->input->post('memberAddress'),
                'memberPassword' => md5($this->input->post('memberPass')));
            $memberId = $this->mstmember_model->save($data_order);

            redirect('member/member_login/');
        }

        $this->template->set('title', 'Member :: Register');
        $this->template->load('front/vw_Home', 'member_register');
    }

}