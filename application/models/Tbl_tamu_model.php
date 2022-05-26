<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_tamu_model extends CI_Model
{

    public $table = 'tbl_tamu';
    public $id = 'id_tamu';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_tamu,nama_tamu,daftar_tamu');
        $this->datatables->from('tbl_tamu');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_tamu.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('admin/tbl_tamu/read/$1'),'Read')." | ".anchor(site_url('admin/tbl_tamu/update/$1'),'Update')." | ".anchor(site_url('admin/tbl_tamu/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_tamu');
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
        $this->db->like('id_tamu', $q);
	$this->db->or_like('nama_tamu', $q);
	$this->db->or_like('daftar_tamu', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tamu', $q);
	$this->db->or_like('nama_tamu', $q);
	$this->db->or_like('daftar_tamu', $q);
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

/* End of file Tbl_tamu_model.php */
/* Location: ./application/models/Tbl_tamu_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-29 03:38:36 */
/* http://harviacode.com */