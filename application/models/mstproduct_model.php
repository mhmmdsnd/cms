<?php
Class mstproduct_model	extends CI_Model {
	//LIST TABLE PRODUCT & PRODTYPE
	private $table_prodtype	= "mst_prodtype";
	private $table_product	= "mst_product";
	
	//START PRODUCT GROUP
	function prodtype_get_paged_list($limit=10,$offset=0, $order_column='',$order_type='asc',$name)
	{
		$prodtypelist = array();
		if (!empty($name))
		{
			$this->db->like('prodtypeName',$name);
		}
		if (empty($order_column)||empty($order_type))
			$this->db->order_by('prodtypeId','asc');
		else
			$this->db->order_by($order_column,$order_type);
		$result = $this->db->get($this->table_prodtype,$limit,$offset);
		foreach ($result->result() as $rst)
		{
			$prodtypelist[] = array('prodtypeId' =>$rst->prodtypeId,'prodtypeName'=>$rst->prodtypeName);
		}
		return $prodtypelist;
	}
	function prodtype_count_all()
	{
		return $this->db->count_all($this->table_prodtype);
	}
	function prodtype_get_by_id ($id)
	{
		$this->db->where('prodtypeId',$id);
		return $this->db->get($this->table_prodtype);
	}
	function prodtype_save($prodtype)
	{
		$this->db->insert($this->table_prodtype,$prodtype);
		return $this->db->insert_id();
	}
	function prodtype_update ($id, $prodtype)
	{
		$this->db->where('prodtypeId',$id);
		$this->db->update($this->table_prodtype,$prodtype);
	}
	function prodtype_delete ($id)
	{
		$this->db->where('prodtypeId',$id);
		$this->db->delete($this->table_prodtype);
	}
	function prodtype_get_dropdown ()
	{
		$this->db->select('prodtypeId, prodtypeName');
		$this->db->order_by('prodtypeName', 'ASC');
		$dropdown = $this->db->get($this->table_prodtype);
		$data = array();
		foreach ($dropdown->result() as $list) {
			$data[$list->prodtypeId] = $list->prodtypeName;
		}
		return ($data);
	}
	function prodtype_front ()
	{
		$this->db->select('prodtypeId, prodtypeName');
		$this->db->order_by('prodtypeName', 'ASC');
		$dropdown = $this->db->get($this->table_prodtype);
		foreach ($dropdown->result() as $rst)
		{
			$prodtypelist[] = array('prodtypeId' =>$rst->prodtypeId,'prodtypeName'=>$rst->prodtypeName);
		}
		return $prodtypelist;
	}
	//END PRODUCT GROUP
	//START PRODUCT
	function product_get_paged_list($limit=10,$offset=0, $order_column='',$order_type='asc',$name)
	{
		$productlist = array();
		$this->db->select('productId,productCode,productName,prodtypeName, stokIn, stokOut ');
		$this->db->from($this->table_product);
		$this->db->join($this->table_prodtype,$this->table_product.'.producttype = '.$this->table_prodtype.'.prodtypeId','inner'); //product Grp
		if (!empty($name))
		{
			$this->db->like('productName',$name);
		}
		if (empty($order_column)||empty($order_type))
			$this->db->order_by('productId','asc');
		else
			$this->db->order_by($order_column,$order_type);
		$this->db->limit($limit,$offset);
		$result = $this->db->get();
		foreach ($result->result() as $rst)
		{
			$productlist[] = array('productId' =>$rst->productId, 'productCode'=>$rst->productCode,
					'productName'=>$rst->productName, 'prodtypeName'=>$rst->prodtypeName,'stokIn'=>$rst->stokIn,
					'stokOut'=>$rst->stokOut);
		}
		return $productlist;		
	}
	function product_count_all()
	{
		return $this->db->count_all($this->table_product);
	}
	function product_get_by_id($productId)
	{
		$this->db->where('productId',$productId);
		return $this->db->get($this->table_product);
	}
	function product_save($productdata)
	{
		$this->db->insert($this->table_product,$productdata);
		return $this->db->insert_id();
	}
	function product_update ($id, $productdata)
	{
		$this->db->where('productId',$id);
		$this->db->update($this->table_product,$productdata);
	}
	function product_delete ($id)
	{
		$this->db->where('productId',$id);
		$this->db->delete($this->table_product);	
	}
	function product_lookup ($keyword)
	{
		$this->db->select('productId, productCode, productName, ProductPrice, stokIn ');
		$this->db->from($this->table_product);
		$this->db->like('productCode',$keyword,'after');
		return $this->db->get();
	}
	#LIST PRODUCT (FRONTEND)
	function product_front ()
	{
		$this->db->select('productId,productCode,productName,prodtypeName,productPrice, productPict, stokIn, productView, productSell');
		$this->db->from($this->table_product);
		$this->db->join($this->table_prodtype,$this->table_product.'.producttype = '.$this->table_prodtype.'.prodtypeId','inner'); //product Grp
		$this->db->order_by('productId','asc');
		//$this->db->limit($limit,$offset);
		$result = $this->db->get();
		foreach ($result->result() as $rst)
		{
			$productlist[] = array('productId' =>$rst->productId, 'productCode'=>$rst->productCode,
					'productName'=>$rst->productName, 'prodtypeName'=>$rst->prodtypeName,'productPrice'=>$rst->productPrice,
			'productPict'=>$rst->productPict,'stokIn'=>$rst->stokIn, 'productView'=>$rst->productView,'productSell'=>$rst->productSell);
		}
		return $productlist;	
	}
	#LIST TOP5 PRODUCT
	function top5_product()
	{
		$this->db->select('productId,productCode,productName,prodtypeName,productPrice, productPict, stokIn, productView, productSell');
		$this->db->from($this->table_product);
		$this->db->join($this->table_prodtype,$this->table_product.'.producttype = '.$this->table_prodtype.'.prodtypeId','inner'); //product Grp
		//$this->db->where('productView >=','5');
		$this->db->order_by('productView','desc');
		$this->db->limit(5,0);
		$result = $this->db->get();
		foreach ($result->result() as $rst)
		{
			$productlist[] = array('productId' =>$rst->productId, 'productCode'=>$rst->productCode,
					'productName'=>$rst->productName, 'prodtypeName'=>$rst->prodtypeName,'productPrice'=>$rst->productPrice,
			'productPict'=>$rst->productPict,'stokIn'=>$rst->stokIn, 'productView'=>$rst->productView,'productSell'=>$rst->productSell);
		}
		return $productlist;
	}
	//END PRODUCT
}
?>