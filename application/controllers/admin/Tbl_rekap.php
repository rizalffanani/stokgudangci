<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_rekap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_rekap_model');
        $this->load->model('Tbl_rekap_dtl_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title' => 'tbl_rekap');
        $this->template->load('template','admin/tbl_rekap/tbl_rekap_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_rekap_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_rekap_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Read',
		'id_rekap' => $row->id_rekap,
		'tanggal' => $row->tanggal,
		'nospt' => $row->nospt,
		'mak' => $row->mak,
		'id_hotel' => $row->id_hotel,
		'total_tagihan' => $row->total_tagihan,
		'service_fee' => $row->service_fee,
		'date' => $row->date,
		'by' => $row->by,
	    );
            $this->template->load('template','admin/tbl_rekap/tbl_rekap_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_rekap'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('admin/tbl_rekap/create_action'),
	    'id_rekap' => set_value('id_rekap'),
	    'tanggal' => set_value('tanggal'),
	    'nospt' => set_value('nospt'),
	    'mak' => set_value('mak'),
	    'id_hotel' => set_value('id_hotel'),
	    'total_tagihan' => set_value('total_tagihan'),
	    'service_fee' => set_value('service_fee'),
	    'date' => set_value('date'),
	    'by' => set_value('by'),
	);
        $this->template->load('template','admin/tbl_rekap/tbl_rekap_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'tanggal' => $this->input->post('tanggal',TRUE),
        		'nospt' => $this->input->post('nospt',TRUE),
        		'mak' => $this->input->post('mak',TRUE),
        		'id_hotel' => $this->input->post('id_hotel',TRUE),
        		'total_tagihan' => $this->input->post('total_tagihan',TRUE),
        		'service_fee' => $this->input->post('service_fee',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'by' => $this->input->post('by',TRUE),
        	);

            $this->Tbl_rekap_model->insert($data);
            $id_rekap= $this->db->insert_id();
            $row = $this->Tbl_rekap_model->get_by_viewid($this->input->post('id_hotel',TRUE));
            $pagu="0";
            $count = count($this->input->post('golongan'));
            for ($x = 0; $x < $count; $x++) {
                $golongan = $this->input->post('golongan',TRUE)[$x];
                switch ($golongan) {
                  case "Es I":
                    $pagu = $row->eselon1;
                    break;
                  case "Es II":
                    $pagu = $row->eselon2;
                    break;
                  case "Gol IV":
                    $pagu = $row->golongan4;
                    break;
                  case "Gol III":
                    $pagu = $row->golongan321;
                    break;
                  case "Gol II":
                    $pagu = $row->golongan321;
                    break;
                  case "Gol I":
                    $pagu = $row->golongan321;
                    break;
                  default:
                    $pagu = $row->eselon1;
                }
                $service_fee = (($this->input->post('harga_kamar',TRUE)[$x]*10)/100);
                $tagihan = ($this->input->post('harga_kamar',TRUE)[$x] + $service_fee);
                $datas = array(
            		'id_rekap' => $id_rekap,
            		'golongan' => $golongan,
            		'pagu' => $pagu,
            		'nama_tamu' => $this->input->post('nama_tamu',TRUE)[$x],
            		'checkin' => $this->input->post('checkin',TRUE)[$x],
            		'checkout' => $this->input->post('checkout',TRUE)[$x],
            		'type_room' => $this->input->post('type_room',TRUE)[$x],
            		'harga_kamar' => $this->input->post('harga_kamar',TRUE)[$x],
            		'service_fee' => $service_fee,
            		'tagihan' => $tagihan,
            		'special' => '',
            	);
            	 $this->Tbl_rekap_dtl_model->insert($datas);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tbl_rekap_dtl/index/'.$id_rekap));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_rekap_model->get_by_id($id);
        if ($row) {
            $row2 = $this->Tbl_rekap_dtl_model->get_all($id);
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('admin/tbl_rekap/update_action'),
        		'id_rekap' => set_value('id_rekap', $row->id_rekap),
        		'tanggal' => set_value('tanggal', $row->tanggal),
        		'nospt' => set_value('nospt', $row->nospt),
        		'mak' => set_value('mak', $row->mak),
        		'id_hotel' => set_value('id_hotel', $row->id_hotel),
        		'total_tagihan' => set_value('total_tagihan', $row->total_tagihan),
        		'service_fee' => set_value('service_fee', $row->service_fee),
        		'date' => set_value('date', $row->date),
        		'by' => set_value('by', $row->by),
        		'jmlkmr' => count($row2),
        		'datas' => $row2
	        );
            $this->template->load('template','admin/tbl_rekap/tbl_rekap_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_rekap'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rekap', TRUE));
        } else {
            $data = array(
        		'tanggal' => $this->input->post('tanggal',TRUE),
        		'nospt' => $this->input->post('nospt',TRUE),
        		'mak' => $this->input->post('mak',TRUE),
        		'id_hotel' => $this->input->post('id_hotel',TRUE),
        		'total_tagihan' => $this->input->post('total_tagihan',TRUE),
        		'service_fee' => $this->input->post('service_fee',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'by' => $this->input->post('by',TRUE),
        	);
            $row = $this->Tbl_rekap_model->get_by_viewid($this->input->post('id_hotel',TRUE));
            $pagu="0";$count = count($this->input->post('golongan'));
            for ($x = 0; $x < $count; $x++) {
                $golongan = $this->input->post('golongan',TRUE)[$x];
                switch ($golongan) {
                  case "Es I":
                    $pagu = $row->eselon1;
                    break;
                  case "Es II":
                    $pagu = $row->eselon2;
                    break;
                  case "Gol IV":
                    $pagu = $row->golongan4;
                    break;
                  case "Gol III":
                    $pagu = $row->golongan321;
                    break;
                  case "Gol II":
                    $pagu = $row->golongan321;
                    break;
                  case "Gol I":
                    $pagu = $row->golongan321;
                    break;
                  default:
                    $pagu = $row->eselon1;
                }
                $service_fee = (($this->input->post('harga_kamar',TRUE)[$x]*10)/100);
                $tagihan = ($this->input->post('harga_kamar',TRUE)[$x] + $service_fee);
                $datas = array(
            		'golongan' => $golongan,
            		'pagu' => $pagu,
            		'nama_tamu' => $this->input->post('nama_tamu',TRUE)[$x],
            		'checkin' => $this->input->post('checkin',TRUE)[$x],
            		'checkout' => $this->input->post('checkout',TRUE)[$x],
            		'type_room' => $this->input->post('type_room',TRUE)[$x],
            		'harga_kamar' => $this->input->post('harga_kamar',TRUE)[$x],
            		'service_fee' => $service_fee,
            		'tagihan' => $tagihan
            	);
            	 $this->Tbl_rekap_dtl_model->update($this->input->post('novcr',TRUE)[$x],$datas);
            }

            $this->Tbl_rekap_model->update($this->input->post('id_rekap', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tbl_rekap'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_rekap_model->get_by_id($id);

        if ($row) {
            $this->Tbl_rekap_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tbl_rekap'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbl_rekap'));
        }
    }

    public function panggil() 
    {
        $panggil = $this->input->post('panggil',TRUE);
        $datetime = new DateTime('tomorrow');
        for ($i=0; $i < $panggil; $i++) { ?>
        <div class="row" id="novcr">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_tamu[]" id="nama_tamu" placeholder="Nama" value="" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Pagu</label>
                <select name="golongan[]" id="golongan" class="form-control" required>
                  <option value="Es I">Eselon I</option>
                  <option value="Es II">Eselon II</option>
                  <option value="Gol IV">GOLONGAN IV</option>
                  <option value="Gol III">GOLONGAN III</option>
                  <option value="Gol II">GOLONGAN II</option>
                  <option value="Gol I">GOLONGAN I</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tipe Kamar</label>
                <input type="text" class="form-control" name="type_room[]" id="type_room" placeholder="Tipe" value="" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Harga Kamar</label>
                <input type="number" class="form-control" name="harga_kamar[]" id="harga_kamar<?= $i?>" onkeyup="sum(this.value)" placeholder="Harga" value="" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Check In</label>
                <input type="date" class="form-control" name="checkin[]" id="checkin" placeholder="Checkin" value="" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Check Out</label>
                <input type="date" class="form-control" name="checkout[]" id="checkout" placeholder="Checkout" value="" required/>
              </div>
            </div>
        </div>
        <?php }
    }
    
    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nospt', 'nospt', 'trim|required');
	$this->form_validation->set_rules('mak', 'mak', 'trim|required');
	$this->form_validation->set_rules('id_hotel', 'id hotel', 'trim|required');
	$this->form_validation->set_rules('total_tagihan', 'total tagihan', 'trim|required');
	$this->form_validation->set_rules('service_fee', 'service fee', 'trim|required');

	$this->form_validation->set_rules('id_rekap', 'id_rekap', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_rekap.php */
/* Location: ./application/controllers/Tbl_rekap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-11-03 04:27:10 */
/* http://harviacode.com */