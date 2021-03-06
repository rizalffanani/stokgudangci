<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_barang_masuk_model extends CI_Model
{

    public $table = 't_barang_masuk';
    public $id = 'id_bm';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_bm,tgl_bm,id_barang,nama_barang,jml_bm,harga_bm,sub_total_bm,t_supplier.nama_sup');
        $this->datatables->from('t_barang_masuk');
        //add this line for join
        $this->datatables->join('t_supplier', 't_barang_masuk.id_supplier = t_supplier.id_supplier');
        $this->datatables->add_column('action', anchor(site_url('admin/t_barang_masuk/read/$1'),'Read')." | ".anchor(site_url('admin/t_barang_masuk/update/$1'),'Update')." | ".anchor(site_url('admin/t_barang_masuk/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_bm');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all join
    function get_all_join()
    {
        $this->db->select('t_barang_masuk.id_bm,tgl_bm,id_barang,nama_barang,jml_bm,harga_bm,sub_total_bm,t_supplier.nama_sup');
        $this->db->from($this->table);
        //add this line for join
        $this->db->join('t_supplier', 't_barang_masuk.id_supplier = t_supplier.id_supplier');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_bm', $q);
	$this->db->or_like('tgl_bm', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('jml_bm', $q);
	$this->db->or_like('harga_bm', $q);
	$this->db->or_like('sub_total_bm', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_bm', $q);
	$this->db->or_like('tgl_bm', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('jml_bm', $q);
	$this->db->or_like('harga_bm', $q);
	$this->db->or_like('sub_total_bm', $q);
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

/* End of file T_barang_masuk_model.php */
/* Location: ./application/models/T_barang_masuk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-13 17:53:23 */
/* http://harviacode.com */