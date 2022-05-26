<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_rekap_dtl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_rekap_dtl_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index($in="")
    {
        $row = $this->Tbl_rekap_dtl_model->get_all($in);
        $data = array('title' => 'OUTPUT REKAP','in'=>@$in, 'data' => $row);
        $this->template->load('template','admin/tbl_rekap_dtl/tbl_rekap_dtl_list', $data);
    } 
    
    public function json($in="") {
        header('Content-Type: application/json');
        echo $this->Tbl_rekap_dtl_model->json($in);
    }

    public function read($id) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_all($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'novcr' => $row->novcr,
		'id_rekap' => $row->id_rekap,
		'golongan' => $row->golongan,
		'pagu' => $row->pagu,
		'nama_tamu' => $row->nama_tamu,
		'checkin' => $row->checkin,
		'checkout' => $row->checkout,
		'type_room' => $row->type_room,
		'harga_kamar' => $row->harga_kamar,
		'tagihan' => $row->tagihan,
		'service_fee' => $row->service_fee,
		'special' => $row->special,
	    );
            $this->template->load('template','admin/tbl_rekap_dtl/tbl_rekap_dtl_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_rekap_dtl'));
        }
    }
    
    public function cetak_vcr2($in) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_by_idnew($in);
        $data = array('users' => $row);
        $this->load->view('admin/tbl_rekap_dtl/cetak_vcr',$data);
    }
    public function cetak_vcr($in) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_by_idnew($in);
        if (@$row) {
            $mpdf = new \Mpdf\Mpdf();
            $data = array('users' => $row);
            $html = $this->load->view('admin/tbl_rekap_dtl/cetak_vcr',$data,true);
            $mpdf->AddPage('L', // L - landscape, P - portrait
            '', '', '', '',
            3, // margin_left
            3, // margin right
            0, // margin top
            10, // margin bottom
            18, // margin header
            12); // margin footer
            $mpdf->WriteHTML($html);
            $mpdf->Output('vcr'.$in.'_t_'.date('y_m_d_H_i_s').'.pdf', 'I');
        } 
    }
    
    public function cetak_invc2($in) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_by_idnew($in);
        $data = array('data' => $row);
        $this->load->view('admin/tbl_rekap_dtl/cetak_invc',$data);
    }
    public function cetak_invc($in) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_by_idnew($in);
        if (@$row) {
            $mpdf = new \Mpdf\Mpdf();
            $data = array('data' => $row);
            $html = $this->load->view('admin/tbl_rekap_dtl/cetak_invc',$data,true);
            $mpdf->AddPage('L', // L - landscape, P - portrait
            '', '', '', '',
            2, // margin_left
            2, // margin right
            2, // margin top
            10, // margin bottom
            18, // margin header
            12); // margin footer
            $mpdf->WriteHTML($html);
            $mpdf->Output('invoice'.$in.'_t_'.date('y_m_d_H_i_s').'.pdf', 'I');
        } 
        // redirect(site_url('admin/tbl_rekap_dtl/index/'.$in));
    }
    
    public function cetak2($in) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_all($in);
        $data = array('data' => $row);
        $this->load->view('admin/tbl_rekap_dtl/cetak',$data);
    }
    public function cetak($in) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_all($in);
        if (@$row) {
            $mpdf = new \Mpdf\Mpdf();
            $data = array('data' => $row);
            $html = $this->load->view('admin/tbl_rekap_dtl/cetak',$data,true);
            $mpdf->AddPage('L', // L - landscape, P - portrait
            '', '', '', '',
            10, // margin_left
            10, // margin right
            20, // margin top
            10, // margin bottom
            18, // margin header
            12); // margin footer
            $mpdf->WriteHTML($html);
            $mpdf->Output('rekapfile_'.$in.'_t_'.date('y_m_d_H_i_s').'.pdf', 'I');
        } 
        redirect(site_url('admin/tbl_rekap_dtl/index/'.$in));
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/tbl_rekap_dtl/create_action'),
	    'novcr' => set_value('novcr'),
	    'id_rekap' => set_value('id_rekap'),
	    'golongan' => set_value('golongan'),
	    'pagu' => set_value('pagu'),
	    'nama_tamu' => set_value('nama_tamu'),
	    'checkin' => set_value('checkin'),
	    'checkout' => set_value('checkout'),
	    'type_room' => set_value('type_room'),
	    'harga_kamar' => set_value('harga_kamar'),
	    'tagihan' => set_value('tagihan'),
	    'service_fee' => set_value('service_fee'),
	    'special' => set_value('special'),
	);
        $this->template->load('template','admin/tbl_rekap_dtl/tbl_rekap_dtl_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_rekap' => $this->input->post('id_rekap',TRUE),
		'golongan' => $this->input->post('golongan',TRUE),
		'pagu' => $this->input->post('pagu',TRUE),
		'nama_tamu' => $this->input->post('nama_tamu',TRUE),
		'checkin' => $this->input->post('checkin',TRUE),
		'checkout' => $this->input->post('checkout',TRUE),
		'type_room' => $this->input->post('type_room',TRUE),
		'harga_kamar' => $this->input->post('harga_kamar',TRUE),
		'tagihan' => $this->input->post('tagihan',TRUE),
		'service_fee' => $this->input->post('service_fee',TRUE),
		'special' => $this->input->post('special',TRUE),
	    );

            $this->Tbl_rekap_dtl_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tbl_rekap_dtl'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/tbl_rekap_dtl/update_action'),
		'novcr' => set_value('novcr', $row->novcr),
		'id_rekap' => set_value('id_rekap', $row->id_rekap),
		'golongan' => set_value('golongan', $row->golongan),
		'pagu' => set_value('pagu', $row->pagu),
		'nama_tamu' => set_value('nama_tamu', $row->nama_tamu),
		'checkin' => set_value('checkin', $row->checkin),
		'checkout' => set_value('checkout', $row->checkout),
		'type_room' => set_value('type_room', $row->type_room),
		'harga_kamar' => set_value('harga_kamar', $row->harga_kamar),
		'tagihan' => set_value('tagihan', $row->tagihan),
		'service_fee' => set_value('service_fee', $row->service_fee),
		'special' => set_value('special', $row->special),
	    );
            $this->template->load('template','admin/tbl_rekap_dtl/tbl_rekap_dtl_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_rekap_dtl'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('novcr', TRUE));
        } else {
            $data = array(
		'id_rekap' => $this->input->post('id_rekap',TRUE),
		'golongan' => $this->input->post('golongan',TRUE),
		'pagu' => $this->input->post('pagu',TRUE),
		'nama_tamu' => $this->input->post('nama_tamu',TRUE),
		'checkin' => $this->input->post('checkin',TRUE),
		'checkout' => $this->input->post('checkout',TRUE),
		'type_room' => $this->input->post('type_room',TRUE),
		'harga_kamar' => $this->input->post('harga_kamar',TRUE),
		'tagihan' => $this->input->post('tagihan',TRUE),
		'service_fee' => $this->input->post('service_fee',TRUE),
		'special' => $this->input->post('special',TRUE),
	    );

            $this->Tbl_rekap_dtl_model->update($this->input->post('novcr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tbl_rekap_dtl'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_rekap_dtl_model->get_by_id($id);

        if ($row) {
            $this->Tbl_rekap_dtl_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tbl_rekap_dtl'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_rekap_dtl'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_rekap', 'id rekap', 'trim|required');
	$this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
	$this->form_validation->set_rules('pagu', 'pagu', 'trim|required');
	$this->form_validation->set_rules('nama_tamu', 'nama tamu', 'trim|required');
	$this->form_validation->set_rules('checkin', 'checkin', 'trim|required');
	$this->form_validation->set_rules('checkout', 'checkout', 'trim|required');
	$this->form_validation->set_rules('type_room', 'type room', 'trim|required');
	$this->form_validation->set_rules('harga_kamar', 'harga kamar', 'trim|required');
	$this->form_validation->set_rules('tagihan', 'tagihan', 'trim|required');
	$this->form_validation->set_rules('service_fee', 'service fee', 'trim|required');
	$this->form_validation->set_rules('special', 'special', 'trim|required');

	$this->form_validation->set_rules('novcr', 'novcr', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_rekap_dtl.php */
/* Location: ./application/controllers/Tbl_rekap_dtl.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-11-03 04:27:17 */
/* http://harviacode.com */