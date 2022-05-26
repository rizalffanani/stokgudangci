<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_laporan_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_barang_masuk_model');
        $this->load->model('T_barang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'Laporan Barang Masuk');
        $this->template->load('template','admin/t_barang_masuk/t_laporan_masuk_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->T_barang_masuk_model->json();
    }

    public function read($id) 
    {
        $row = $this->T_barang_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_bm' => $row->id_bm,
		'tgl_bm' => $row->tgl_bm,
		'id_barang' => $row->id_barang,
		'nama_barang' => $row->nama_barang,
		'jml_bm' => $row->jml_bm,
		'harga_bm' => $row->harga_bm,
		'sub_total_bm' => $row->sub_total_bm,
        'id_supplier' => $row->id_supplier,
	    );
            $this->template->load('template','admin/t_barang_masuk/t_barang_masuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_barang_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/t_barang_masuk/create_action'),
	    'id_bm' => set_value('id_bm'),
	    'tgl_bm' => set_value('tgl_bm'),
	    'id_barang' => set_value('id_barang'),
	    'nama_barang' => set_value('nama_barang'),
	    'jml_bm' => set_value('jml_bm'),
	    'harga_bm' => set_value('harga_bm'),
	    'sub_total_bm' => set_value('sub_total_bm'),
        'id_supplier' => set_value('id_supplier'),
	);
        $this->template->load('template','admin/t_barang_masuk/t_barang_masuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'tgl_bm' => $this->input->post('tgl_bm',TRUE),
        		'id_barang' => $this->input->post('id_barang',TRUE),
        		'nama_barang' => $this->input->post('nama_barang',TRUE),
        		'jml_bm' => $this->input->post('jml_bm',TRUE),
        		'harga_bm' => $this->input->post('harga_bm',TRUE),
        		'sub_total_bm' => $this->input->post('sub_total_bm',TRUE),
                'id_supplier' => $this->input->post('id_supplier',TRUE),
	        );
            $this->T_barang_masuk_model->insert($data);
            $row = $this->T_barang_model->get_by_id($this->input->post('id_barang',TRUE));
            if ($row) {              
                $data = array(
                    'stok' => ($row->stok+$this->input->post('jml_bm',TRUE)),
                );
                $this->T_barang_model->update($this->input->post('id_barang', TRUE), $data);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_barang_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_barang_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/t_barang_masuk/update_action'),
		'id_bm' => set_value('id_bm', $row->id_bm),
		'tgl_bm' => set_value('tgl_bm', $row->tgl_bm),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'jml_bm' => set_value('jml_bm', $row->jml_bm),
		'harga_bm' => set_value('harga_bm', $row->harga_bm),
		'sub_total_bm' => set_value('sub_total_bm', $row->sub_total_bm),
        'id_supplier' => set_value('id_supplier', $row->id_supplier),
	    );
            $this->template->load('template','admin/t_barang_masuk/t_barang_masuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_barang_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bm', TRUE));
        } else {
            $stok_lama = $this->T_barang_masuk_model->get_by_id($this->input->post('id_bm', TRUE));
            $data = array(
        		'tgl_bm' => $this->input->post('tgl_bm',TRUE),
        		'id_barang' => $this->input->post('id_barang',TRUE),
        		'nama_barang' => $this->input->post('nama_barang',TRUE),
        		'jml_bm' => $this->input->post('jml_bm',TRUE),
        		'harga_bm' => $this->input->post('harga_bm',TRUE),
        		'sub_total_bm' => $this->input->post('sub_total_bm',TRUE),
                'id_supplier' => $this->input->post('id_supplier',TRUE),
           );
            $this->T_barang_masuk_model->update($this->input->post('id_bm', TRUE), $data);

            $stok_barang = $this->T_barang_model->get_by_id($this->input->post('id_barang',TRUE));
            if (!empty($stok_lama) && !empty($stok_barang)) {            
                $data = array(
                    'stok' => ($stok_barang->stok-$stok_lama->jml_bm+$this->input->post('jml_bm',TRUE)),
                );
                $this->T_barang_model->update($this->input->post('id_barang', TRUE), $data);
            }

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_barang_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_barang_masuk_model->get_by_id($id);

        if ($row) {
            $this->T_barang_masuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_barang_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_barang_masuk'));
        }
    }

    public function getHarga()
    {
        $id = $this->input->post('id_barang',TRUE);
        $row = $this->T_barang_model->get_by_id($id);
        echo $row->harga.":".$row->nama_barang;
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_bm', 'tgl bm', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('jml_bm', 'jml bm', 'trim|required');
	$this->form_validation->set_rules('harga_bm', 'harga bm', 'trim|required');
	$this->form_validation->set_rules('sub_total_bm', 'sub total bm', 'trim|required');
    $this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim|required');

	$this->form_validation->set_rules('id_bm', 'id_bm', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_barang_masuk.php */
/* Location: ./application/controllers/T_barang_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-13 17:53:23 */
/* http://harviacode.com */