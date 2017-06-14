<?php 
Class Master_model extends CI_Model
{
	private $table_customer = 'mst_customer';
    private $table_supplier = 'mst_supplier';
	private $table_reftype = 'sys_reftype';
	//START MASTER CUSTOMER
	function cst_get_paged_list($limit=10,$offset=0, $order_column='',$order_type='asc',$name)
	{
		$cstlist = array();
		$this->db->select('id,code, name, address, notelp');
		$this->db->from($this->table_customer);
		if (!empty($name))
		{
			$this->db->like('name',$name);
		}
		if (empty($order_column)||empty($order_type))
			$this->db->order_by('id','asc');
		else
			$this->db->order_by($order_column,$order_type);
		$this->db->limit($limit,$offset);
		$result = $this->db->get();
		foreach ($result->result() as $rst)
		{
            $cstlist[] = array('id' =>$rst->id,'code'=>$rst->code, 'name'=>$rst->name,'address'=>$rst->address, 'notelp'=>$rst->notelp);
		}
		return $cstlist;
	}
	function cst_count_all($name="")
	{
		$this->db->select('*');
		$this->db->from($this->table_customer);
		if (!empty($name))
		{
			$this->db->like('name',$name);
		}
		$data = $this->db->get();
		return $data->num_rows();
	}
	function cst_get_by_id ($id)
	{
		$this->db->where('id',$id);
		$this->db->from($this->table_customer);
		return $this->db->get();
	}
	function cst_save($customer)
	{
		$this->db->insert($this->table_customer,$customer);
		return $this->db->insert_id();
	}
	function cst_update ($id, $customer)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table_customer,$customer);
	}
	function cst_delete ($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table_customer);
	}
	//LIST AUTOCOMPLETE CUSTOMER
	function cst_lookup ($keyword)
	{
		$this->db->select('id,code, name, address, notelp');
		$this->db->from($this->table_customer);
		$this->db->like('code',$keyword,'after');
		return $this->db->get();
			
		//return $query->result();
	}
	//END MASTER CUSTOMER

    //START MASTER SUPPLIER
    function spl_get_paged_list($limit=10,$offset=0, $order_column='',$order_type='asc',$name)
    {
        $spllist = array();
        $this->db->select('id,code, name, address, notelp');
        $this->db->from($this->table_supplier);
        if (!empty($name))
        {
            $this->db->like('name',$name);
        }
        if (empty($order_column)||empty($order_type))
            $this->db->order_by('id','asc');
        else
            $this->db->order_by($order_column,$order_type);
        $this->db->limit($limit,$offset);
        $result = $this->db->get();
        foreach ($result->result() as $rst)
        {
            $spllist[] = array('id' =>$rst->id, 'code'=>$rst->code, 'name'=>$rst->name,'address'=>$rst->address, 'notelp'=>$rst->notelp);
        }
        return $spllist;
    }
    function spl_count_all($name="")
    {
        $this->db->select('*');
        $this->db->from($this->table_supplier);
        if (!empty($name))
        {
            $this->db->like('name',$name);
        }
        $data = $this->db->get();
        return $data->num_rows();
    }
    function spl_get_by_id ($id)
    {
        $this->db->where('id',$id);
        $this->db->from($this->table_supplier);
        return $this->db->get();
    }
    function spl_save($supplier)
    {
        $this->db->insert($this->table_supplier,$supplier);
        return $this->db->insert_id();
    }
    function spl_update ($id, $supplier)
    {
        $this->db->where('id',$id);
        $this->db->update($this->table_supplier,$supplier);
    }
    function spl_delete ($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table_supplier);
    }
    //LIST AUTOCOMPLETE CUSTOMER
    function spl_lookup ($keyword)
    {
        $this->db->select('id,code, name, address, notelp');
        $this->db->from($this->table_supplier);
        $this->db->like('code',$keyword,'after');
        return $this->db->get();

        //return $query->result();
    }
    //END MASTER SUPPLIER
}
?>