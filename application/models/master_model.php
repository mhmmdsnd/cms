<?php 
Class Master_model extends CI_Model
{
	private $table_lokasi = 'mst_location';
    private $lokasi_primary_key = "id";

    private $table_category = 'mst_category';
    private $category_primary_key = 'id';

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
        $this->db->where($this->lokasi_primary_key,$id);
        $this->db->from($this->table_lokasi);
        return $this->db->get();
    }
    function lokasi_save($location)
    {
        $this->db->insert($this->table_lokasi,$location);
        return $this->db->insert_id();
    }
    function lokasi_update ($id, $location)
    {
        $this->db->where($this->lokasi_primary_key,$id);
        $this->db->update($this->table_lokasi,$location);
    }
    function lokasi_delete ($id)
    {
        $this->db->where($this->lokasi_primary_key,$id);
        $this->db->delete($this->table_lokasi);
    }
    function lokasi_lookup ()
    {
        return $this->db->get($this->table_lokasi);
    }
    function get_lokasi()
    {
        $this->db->order_by($this->lokasi_primary_key,'asc');
        $hasil = $this->db->get($this->table_lokasi);
        $result[""] = "Select ...";
        foreach ($hasil->result_array() as $list)
        {
            $result[$list[$this->lokasi_primary_key]] = $list['nama'];
        }
        return $result;
    }
    //END MASTER LOKASI

    //START MASTER CATEGORY
    function category_get_paged_list($order_column='',$order_type='asc')
    {
        if (empty($order_column)||empty($order_type))
            $this->db->order_by($this->category_primary_key,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table_category);
    }
    function category_count_all($name="")
    {
        $this->db->select('*');
        $this->db->from($this->table_category);
        if (!empty($name))
        {
            $this->db->like('name',$name);
        }
        $data = $this->db->get();
        return $data->num_rows();
    }
    function category_get_by_id ($id)
    {
        $this->db->where('id',$id);
        $this->db->from($this->table_category);
        return $this->db->get();
    }
    function category_save($category)
    {
        $this->db->insert($this->table_category,$category);
        return $this->db->insert_id();
    }
    function category_update ($id, $category)
    {
        $this->db->where('id',$id);
        $this->db->update($this->table_category,$category);
    }
    function category_delete ($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table_category);
    }
    function category_lookup ($keyword)
    {
        $this->db->select('id,code, name, address, notelp');
        $this->db->from($this->table_category);
        $this->db->like('code',$keyword,'after');
        return $this->db->get();
    }
    function get_category()
    {
        $this->db->order_by('id','asc');
        $hasil = $this->db->get($this->table_category);
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