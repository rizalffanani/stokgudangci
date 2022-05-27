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

    
    public function view($in=""){
        $row = $this->T_barang_keluar_model->get_all();
        if (@$row) {
            $data = array('data' => $row);
            $this->load->view('admin/t_barang_keluar/t_barang_keluar_cetak',$data);
        }
    }

    public function cetak($in=""){
        $row = $this->T_barang_keluar_model->get_all();
        if (@$row) {
            $mpdf = new \Mpdf\Mpdf();
            $data = array('data' => $row);
            $html = $this->load->view('admin/t_barang_keluar/t_barang_keluar_cetak',$data,true);
            $mpdf->AddPage('L', // L - landscape, P - portrait
            '', '', '', '',
            10, // margin_left
            10, // margin right
            20, // margin top
            10, // margin bottom
            18, // margin header
            12); // margin footer
            $mpdf->WriteHTML($html);
            $mpdf->Output(date('ymd_His').'laporan_barang_keluar'.$in.'_t_'.'.pdf', 'I');
        } 
        redirect(site_url('admin/t_barang_keluar/index/'.$in));
    }

}

/* End of file T_barang_keluar.php */
/* Location: ./application/controllers/T_barang_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-13 17:53:26 */
/* http://harviacode.com */