<?php 
Class Master_model extends CI_Model
{
	private $table_lokasi = 'mst_location';
    private $lokasi_primary_key = "id";
    private $table_reftype = 'sys_reftype';
	//START MASTER LOKASI
    function lokasi_get_paged_list($order_column='',$order_type='asc')
    {
        if (empty($order_column)||empty($order_type))
            $this->db->order_by($this->lokasi_primary_key,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table_lokasi);
    }
    function lokasi_count_all($name="")
    {
        $this->db->select('*');
        $this->db->from($this->table_lokasi);
        if (!empty($name))
        {
            $this->db->like('name',$name);
        }
        $data = $this->db->get();
        return $data->num_rows();
    }
    function lokasi_get_by_id ($id)
    {
        $this->db->where('id',$id);
        $this->db->from($this->table_lokasi);
        return $this->db->get();
    }
    function lokasi_save($supplier)
    {
        $this->db->insert($this->table_lokasi,$supplier);
        return $this->db->insert_id();
    }
    function lokasi_update ($id, $supplier)
    {
        $this->db->where('id',$id);
        $this->db->update($this->table_lokasi,$supplier);
    }
    function lokasi_delete ($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table_lokasi);
    }
    function lokasi_lookup ($keyword)
    {
        $this->db->select('id,code, name, address, notelp');
        $this->db->from($this->table_lokasi);
        $this->db->like('code',$keyword,'after');
        return $this->db->get();
    }
    function get_lokasi()
    {
        $this->db->order_by('id','asc');
        $hasil = $this->db->get($this->table_lokasi);
        $result[""] = "Select ...";
        foreach ($hasil->result_array() as $list)
        {
            $result[$list['id']] = $list['name'];
        }
        return $result;
    }
    //END MASTER LOKASI
}
?>