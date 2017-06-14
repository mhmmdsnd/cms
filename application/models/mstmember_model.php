<?php
class Mstmember_model extends CI_Model
{
    private $table_name = 'mst_member';
    function login ($loginname,$password)
    {
        $this->db->select('memberId, memberName, memberFName, memberLName, memberAddress, memberPassword
        , memberEmail, memberPhone');
        $this->db->from ($this->table_name);
        $this->db->where ('memberName = '."'".$loginname."'" .'and memberPassword = '."'".md5($password)."'");
        $this->db->where ('memberPassword = '."'".md5($password)."'");
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    function get_paged_list ($limit=10,$offset=0, $order_column='',$order_type='asc')
    {
        if (empty($order_column)||empty($order_type))
            $this->db->order_by('memberId','asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table_name,$limit,$offset);
    }
    function count_all()
    {
        return $this->db->count_all($this->table_name);
    }
    function get_by_id ($id)
    {
        $this->db->where('memberId',$id);
        return $this->db->get($this->table_name);
    }
    function save($data)
    {
        $this->db->insert($this->table_name,$data);
        return $this->db->insert_id();
    }
    function update ($id, $data)
    {
        $this->db->where('memberId',$id);
        $this->db->update($this->table_name,$data);
    }
    function delete ($id)
    {
        $this->db->where('memberId',$id);
        $this->db->delete($this->table_name);
    }
}