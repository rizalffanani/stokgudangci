<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_provinsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_provinsi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'tbl_provinsi');
        $this->template->load('template','admin/tbl_provinsi/tbl_provinsi_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_provinsi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_provinsi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_prov' => $row->id_prov,
		'nama_prov' => $row->nama_prov,
		'satuan' => $row->satuan,
		'eselon1' => $row->eselon1,
		'eselon2' => $row->eselon2,
		'golongan4' => $row->golongan4,
		'golongan321' => $row->golongan321,
	    );
            $this->template->load('template','admin/tbl_provinsi/tbl_provinsi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_provinsi'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/tbl_provinsi/create_action'),
	    'id_prov' => set_value('id_prov'),
	    'nama_prov' => set_value('nama_prov'),
	    'satuan' => set_value('satuan'),
	    'eselon1' => set_value('eselon1'),
	    'eselon2' => set_value('eselon2'),
	    'golongan4' => set_value('golongan4'),
	    'golongan321' => set_value('golongan321'),
	);
        $this->template->load('template','admin/tbl_provinsi/tbl_provinsi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_prov' => $this->input->post('nama_prov',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'eselon1' => $this->input->post('eselon1',TRUE),
		'eselon2' => $this->input->post('eselon2',TRUE),
		'golongan4' => $this->input->post('golongan4',TRUE),
		'golongan321' => $this->input->post('golongan321',TRUE),
	    );

            $this->Tbl_provinsi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tbl_provinsi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_provinsi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/tbl_provinsi/update_action'),
		'id_prov' => set_value('id_prov', $row->id_prov),
		'nama_prov' => set_value('nama_prov', $row->nama_prov),
		'satuan' => set_value('satuan', $row->satuan),
		'eselon1' => set_value('eselon1', $row->eselon1),
		'eselon2' => set_value('eselon2', $row->eselon2),
		'golongan4' => set_value('golongan4', $row->golongan4),
		'golongan321' => set_value('golongan321', $row->golongan321),
	    );
            $this->template->load('template','admin/tbl_provinsi/tbl_provinsi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_provinsi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prov', TRUE));
        } else {
            $data = array(
		'nama_prov' => $this->input->post('nama_prov',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'eselon1' => $this->input->post('eselon1',TRUE),
		'eselon2' => $this->input->post('eselon2',TRUE),
		'golongan4' => $this->input->post('golongan4',TRUE),
		'golongan321' => $this->input->post('golongan321',TRUE),
	    );

            $this->Tbl_provinsi_model->update($this->input->post('id_prov', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tbl_provinsi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_provinsi_model->get_by_id($id);

        if ($row) {
            $this->Tbl_provinsi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tbl_provinsi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_provinsi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_prov', 'nama prov', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('eselon1', 'eselon1', 'trim|required');
	$this->form_validation->set_rules('eselon2', 'eselon2', 'trim|required');
	$this->form_validation->set_rules('golongan4', 'golongan4', 'trim|required');
	$this->form_validation->set_rules('golongan321', 'golongan321', 'trim|required');

	$this->form_validation->set_rules('id_prov', 'id_prov', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_provinsi.php */
/* Location: ./application/controllers/Tbl_provinsi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-30 13:24:14 */
/* http://harviacode.com */