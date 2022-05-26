<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_barang_keluar_model extends CI_Model
{

    public $table = 't_barang_keluar';
    public $id = 'id_bk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_bk,tgl_bk,id_barang,nama_barang,jml_bk,harga_bk,sub_total_bk');
        $this->datatables->from('t_barang_keluar');
        //add this line for join
        //$this->datatables->join('table2', 't_barang_keluar.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('admin/t_barang_keluar/read/$1'),'Read')." | ".anchor(site_url('admin/t_barang_keluar/update/$1'),'Update')." | ".anchor(site_url('admin/t_barang_keluar/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_bk');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_bk', $q);
	$this->db->or_like('tgl_bk', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('jml_bk', $q);
	$this->db->or_like('harga_bk', $q);
	$this->db->or_like('sub_total_bk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_bk', $q);
	$this->db->or_like('tgl_bk', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('jml_bk', $q);
	$this->db->or_like('harga_bk', $q);
	$this->db->or_like('sub_total_bk', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file T_barang_keluar_model.php */
/* Location: ./application/models/T_barang_keluar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-13 17:53:26 */
/* http://harviacode.com */