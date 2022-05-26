<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_supplier_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'Supplier');
        $this->template->load('template','admin/t_supplier/t_supplier_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->T_supplier_model->json();
    }

    public function read($id) 
    {
        $row = $this->T_supplier_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_supplier' => $row->id_supplier,
		'nama_sup' => $row->nama_sup,
		'tlp_sup' => $row->tlp_sup,
		'email_sup' => $row->email_sup,
		'alamat_sup' => $row->alamat_sup,
	    );
            $this->template->load('template','admin/t_supplier/t_supplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_supplier'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/t_supplier/create_action'),
	    'id_supplier' => set_value('id_supplier'),
	    'nama_sup' => set_value('nama_sup'),
	    'tlp_sup' => set_value('tlp_sup'),
	    'email_sup' => set_value('email_sup'),
	    'alamat_sup' => set_value('alamat_sup'),
	);
        $this->template->load('template','admin/t_supplier/t_supplier_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_sup' => $this->input->post('nama_sup',TRUE),
		'tlp_sup' => $this->input->post('tlp_sup',TRUE),
		'email_sup' => $this->input->post('email_sup',TRUE),
		'alamat_sup' => $this->input->post('alamat_sup',TRUE),
	    );

            $this->T_supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_supplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_supplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/t_supplier/update_action'),
		'id_supplier' => set_value('id_supplier', $row->id_supplier),
		'nama_sup' => set_value('nama_sup', $row->nama_sup),
		'tlp_sup' => set_value('tlp_sup', $row->tlp_sup),
		'email_sup' => set_value('email_sup', $row->email_sup),
		'alamat_sup' => set_value('alamat_sup', $row->alamat_sup),
	    );
            $this->template->load('template','admin/t_supplier/t_supplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_supplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supplier', TRUE));
        } else {
            $data = array(
		'nama_sup' => $this->input->post('nama_sup',TRUE),
		'tlp_sup' => $this->input->post('tlp_sup',TRUE),
		'email_sup' => $this->input->post('email_sup',TRUE),
		'alamat_sup' => $this->input->post('alamat_sup',TRUE),
	    );

            $this->T_supplier_model->update($this->input->post('id_supplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_supplier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_supplier_model->get_by_id($id);

        if ($row) {
            $this->T_supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_supplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_sup', 'nama sup', 'trim|required');
	$this->form_validation->set_rules('tlp_sup', 'tlp sup', 'trim|required');
	$this->form_validation->set_rules('email_sup', 'email sup', 'trim|required');
	$this->form_validation->set_rules('alamat_sup', 'alamat sup', 'trim|required');

	$this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_supplier.php */
/* Location: ./application/controllers/T_supplier.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-22 17:36:24 */
/* http://harviacode.com */