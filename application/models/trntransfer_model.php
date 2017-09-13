<?php
Class Trntransfer_model extends CI_Model
{
    private $table_transfer = 'trn_transfer_order';
    private $transfer_primarykey = 'id';
    //START PURCHASE
    function transfer_paged_list ($limit=10,$offset=0, $order_column='',$order_type='asc')
    {
        $listtrans = array();
        $this->db->select('id, toNumber');
        $this->db->from($this->table_transfer);
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
    function transfer_count_all()
    {
        return $this->db->count_all($this->table_transfer);
    }
    function transfer_save($data_purchase)
    {
        $this->db->insert($this->table_transfer,$data_purchase);
        return $this->db->insert_id();
    }
    function transfer_by_id($id)
    {
        $this->db->select('buyId, buyDate, buyDescription, buyQty, buyPrice, buyItemId, ProductName, ProductCode, code, name, supplier_id, address ');
        $this->db->from($this->table_transfer);
        $this->db->join($this->table_product,$this->table_transfer.'.buyItemId = productId','inner');
        $this->db->join($this->table_supplier,$this->table_transfer.'.supplier_id = id','inner');

        $this->db->where('buyId',$id);
        return $this->db->get();
    }
    //END PURCHASE
}