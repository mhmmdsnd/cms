<?php
Class Trnorder_model extends CI_Model
{
	private $table_purchase = 'trn_barangmasuk';
	private $table_order = 'trn_barangkeluar';
	private $table_product	= "mst_product";
    private $table_customer	= "mst_customer";
    private $table_supplier	= "mst_supplier";
	
	//START PURCHASE 
	function purchase_paged_list ($limit=10,$offset=0, $order_column='',$order_type='asc')
	{
		$listtrans = array();
		$this->db->select('buyId, buyDate, buyDescription, isProccess, productName, name');
		$this->db->from($this->table_purchase);
		$this->db->join($this->table_product,$this->table_purchase.'.buyItemId = '.$this->table_product.'.productId','inner');
        $this->db->join($this->table_supplier,$this->table_purchase.'.supplier_id= '.$this->table_supplier.'.id','inner');
		if (empty($order_column)||empty($order_type))
			$this->db->order_by('buyId','asc');
		else
			$this->db->order_by($order_column,$order_type);
		$this->db->limit($limit,$offset);
		$result = $this->db->get();
		foreach ($result->result() as $rst)
		{
			$listtrans[] = array('buyId' =>$rst->buyId,'buyDate'=>$rst->buyDate,'buyDescription'=>$rst->buyDescription
			, 'isProccess'=>$rst->isProccess,'productName'=>$rst->productName, 'name'=>$rst->name);
		}
		return $listtrans;
	}	
	function purchase_count_all()
	{
		return $this->db->count_all($this->table_purchase);
	}
	function purchase_save($data_purchase)
	{
		$this->db->insert($this->table_purchase,$data_purchase);
		return $this->db->insert_id();
	}
	function purchase_by_id($id)
	{
		$this->db->select('buyId, buyDate, buyDescription, buyQty, buyPrice, buyItemId, ProductName, ProductCode, code, name, supplier_id, address ');
		$this->db->from($this->table_purchase);
		$this->db->join($this->table_product,$this->table_purchase.'.buyItemId = productId','inner');
        $this->db->join($this->table_supplier,$this->table_purchase.'.supplier_id = id','inner');

        $this->db->where('buyId',$id);
		return $this->db->get();
	}
	//END PURCHASE
	//START TRANSAKSI ORDER
	function order_paged_list($limit=10,$offset=0, $order_column='',$order_type='asc')
	{
		$listorder = array();
		$this->db->select('orderId,ticketId,name,'.$this->table_order.'.created_at, isProcess ');
		$this->db->from($this->table_order);
        $this->db->join($this->table_customer,$this->table_order.'.customer_id = id','inner');
        if (empty($order_column)||empty($order_type))
			$this->db->order_by('buyId','asc');
		else
			$this->db->order_by($order_column,$order_type);
		$this->db->limit($limit,$offset);
		$result = $this->db->get();
		foreach ($result->result() as $rst)
		{
			$listorder[] = array('orderId' =>$rst->orderId, 'ticketId'=>$rst->ticketId,'name'=>$rst->name
					,'created_at'=>$rst->created_at,'isProcess'=>$rst->isProcess);
		}
		return $listorder;
		
	}
	function order_count_all()
	{
		return $this->db->count_all($this->table_order);
	}
	function order_save($orderData)
	{
		$this->db->insert($this->table_order,$orderData);
		return $this->db->insert_id();
	}
	function order_by_id($id)
	{
		$this->db->where('orderId',$id);
		return $this->db->get($this->table_order);	
	}
	function order_detail($id)
	{
		$this->db->select('orderId,ticketId,code, name ,address, customer_id, orderItemId, ProductName, orderQty, 
		orderPrice, ProductDesc, isProcess,'.$this->table_order.'.created_at ');
		$this->db->from($this->table_order);
		$this->db->join($this->table_product,$this->table_order.'.orderItemId = '.$this->table_product.'.productId','inner');
        $this->db->join($this->table_customer,$this->table_order.'.customer_id = id ','inner');
		$this->db->where('orderId',$id);
		return $this->db->get();
	}
	function order_proses($id,$process)
	{
		$this->db->set('isProcess',$process,false);
		$this->db->where('orderId',$id);
		$this->db->update($this->table_order);
	}
	//END TRANSAKSI ORDER
	#START UPDATE STOK
	function add_stok($id,$purchaseQty)
	{
		$this->db->set('stokIn','stokIn+'.$purchaseQty,false);
		$this->db->where('productId',$id);
		$this->db->update($this->table_product);
	}
	function update_stok($id,$orderQty)
	{
		$this->db->set('stokIn','stokIn-'.$orderQty,false);
		$this->db->set('stokOut','stokOut+'.$orderQty,false);
		$this->db->where('productId',$id);
		$this->db->update($this->table_product);
	}
	#END UPDATE STOK
}
?>