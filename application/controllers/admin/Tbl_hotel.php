<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_hotel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_hotel_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'tbl_hotel');
        $this->template->load('template','admin/tbl_hotel/tbl_hotel_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_hotel_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_hotel_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_hotel' => $row->id_hotel,
		'nama_hotel' => $row->nama_hotel,
		'kota' => $row->kota,
		'alamat' => $row->alamat,
		'telepon' => $row->telepon,
		'id_prov' => $row->id_prov,
		'confirm' => $row->confirm,
		'group' => $row->group,
	    );
            $this->template->load('template','admin/tbl_hotel/tbl_hotel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_hotel'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/tbl_hotel/create_action'),
	    'id_hotel' => set_value('id_hotel'),
	    'nama_hotel' => set_value('nama_hotel'),
	    'kota' => set_value('kota'),
	    'alamat' => set_value('alamat'),
	    'telepon' => set_value('telepon'),
	    'id_prov' => set_value('id_prov'),
	    'confirm' => set_value('confirm'),
	    'group' => set_value('group'),
	);
        $this->template->load('template','admin/tbl_hotel/tbl_hotel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_hotel' => $this->input->post('nama_hotel',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'id_prov' => $this->input->post('id_prov',TRUE),
		'confirm' => $this->input->post('confirm',TRUE),
		'group' => $this->input->post('group',TRUE),
	    );

            $this->Tbl_hotel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tbl_hotel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_hotel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/tbl_hotel/update_action'),
		'id_hotel' => set_value('id_hotel', $row->id_hotel),
		'nama_hotel' => set_value('nama_hotel', $row->nama_hotel),
		'kota' => set_value('kota', $row->kota),
		'alamat' => set_value('alamat', $row->alamat),
		'telepon' => set_value('telepon', $row->telepon),
		'id_prov' => set_value('id_prov', $row->id_prov),
		'confirm' => set_value('confirm', $row->confirm),
		'group' => set_value('group', $row->group),
	    );
            $this->template->load('template','admin/tbl_hotel/tbl_hotel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_hotel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hotel', TRUE));
        } else {
            $data = array(
		'nama_hotel' => $this->input->post('nama_hotel',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'id_prov' => $this->input->post('id_prov',TRUE),
		'confirm' => $this->input->post('confirm',TRUE),
		'group' => $this->input->post('group',TRUE),
	    );

            $this->Tbl_hotel_model->update($this->input->post('id_hotel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tbl_hotel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_hotel_model->get_by_id($id);

        if ($row) {
            $this->Tbl_hotel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tbl_hotel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_hotel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_hotel', 'nama hotel', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
	$this->form_validation->set_rules('id_prov', 'id prov', 'trim|required');
	$this->form_validation->set_rules('confirm', 'confirm', 'trim|required');

	$this->form_validation->set_rules('id_hotel', 'id_hotel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_hotel.php */
/* Location: ./application/controllers/Tbl_hotel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-11-03 04:27:05 */
/* http://harviacode.com */