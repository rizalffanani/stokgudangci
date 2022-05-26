<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_laporan_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_barang_keluar_model');
        $this->load->model('T_barang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'Laporan Barang Keluar');
        $this->template->load('template','admin/t_barang_keluar/t_laporan_keluar_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->T_barang_keluar_model->json();
    }

    public function read($id) 
    {
        $row = $this->T_barang_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_bk' => $row->id_bk,
		'tgl_bk' => $row->tgl_bk,
		'id_barang' => $row->id_barang,
		'nama_barang' => $row->nama_barang,
		'jml_bk' => $row->jml_bk,
		'harga_bk' => $row->harga_bk,
		'sub_total_bk' => $row->sub_total_bk,
	    );
            $this->template->load('template','admin/t_barang_keluar/t_barang_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_barang_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/t_barang_keluar/create_action'),
	    'id_bk' => set_value('id_bk'),
	    'tgl_bk' => set_value('tgl_bk'),
	    'id_barang' => set_value('id_barang'),
	    'nama_barang' => set_value('nama_barang'),
	    'jml_bk' => set_value('jml_bk'),
	    'harga_bk' => set_value('harga_bk'),
	    'sub_total_bk' => set_value('sub_total_bk'),
	);
        $this->template->load('template','admin/t_barang_keluar/t_barang_keluar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'tgl_bk' => $this->input->post('tgl_bk',TRUE),
        		'id_barang' => $this->input->post('id_barang',TRUE),
        		'nama_barang' => $this->input->post('nama_barang',TRUE),
        		'jml_bk' => $this->input->post('jml_bk',TRUE),
        		'harga_bk' => $this->input->post('harga_bk',TRUE),
        		'sub_total_bk' => $this->input->post('sub_total_bk',TRUE),
	        );

            $this->T_barang_keluar_model->insert($data);
            $row = $this->T_barang_model->get_by_id($this->input->post('id_barang',TRUE));
            if ($row) {              
                $data = array(
                    'stok' => ($row->stok-$this->input->post('jml_bk',TRUE)),
                );
                $this->T_barang_model->update($this->input->post('id_barang', TRUE), $data);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_barang_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_barang_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/t_barang_keluar/update_action'),
		'id_bk' => set_value('id_bk', $row->id_bk),
		'tgl_bk' => set_value('tgl_bk', $row->tgl_bk),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'jml_bk' => set_value('jml_bk', $row->jml_bk),
		'harga_bk' => set_value('harga_bk', $row->harga_bk),
		'sub_total_bk' => set_value('sub_total_bk', $row->sub_total_bk),
	    );
            $this->template->load('template','admin/t_barang_keluar/t_barang_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_barang_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bk', TRUE));
        } else {
            $stok_lama = $this->T_barang_keluar_model->get_by_id($this->input->post('id_bk', TRUE));
            $data = array(
        		'tgl_bk' => $this->input->post('tgl_bk',TRUE),
        		'id_barang' => $this->input->post('id_barang',TRUE),
        		'nama_barang' => $this->input->post('nama_barang',TRUE),
        		'jml_bk' => $this->input->post('jml_bk',TRUE),
        		'harga_bk' => $this->input->post('harga_bk',TRUE),
        		'sub_total_bk' => $this->input->post('sub_total_bk',TRUE),
            );

            $this->T_barang_keluar_model->update($this->input->post('id_bk', TRUE), $data);

            $stok_barang = $this->T_barang_model->get_by_id($this->input->post('id_barang',TRUE));
            if (!empty($stok_lama) && !empty($stok_barang)) {            
                $data = array(
                    'stok' => ($stok_barang->stok+$stok_lama->jml_bk-$this->input->post('jml_bk',TRUE)),
                );
                $this->T_barang_model->update($this->input->post('id_barang', TRUE), $data);
            }

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_barang_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_barang_keluar_model->get_by_id($id);

        if ($row) {
            $this->T_barang_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_barang_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_barang_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_bk', 'tgl bk', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('jml_bk', 'jml bk', 'trim|required');
	$this->form_validation->set_rules('harga_bk', 'harga bk', 'trim|required');
	$this->form_validation->set_rules('sub_total_bk', 'sub total bk', 'trim|required');

	$this->form_validation->set_rules('id_bk', 'id_bk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_barang_keluar.php */
/* Location: ./application/controllers/T_barang_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-13 17:53:26 */
/* http://harviacode.com */