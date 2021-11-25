<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presentase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("present_model");
    }
    public function index(){ 
		$this->load->view('header');
		$this->load->view('Laporan/present/presentase');
		$this->load->view('footer');
	}
    function cetak(){
        $periode = $this->input->post('per');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'margin_right' => 30
        ]);
        $data["isi"] = $this->present_model->detail($periode);
        if ( $data["isi"]) {
            $data["periode"] = $periode;
        }else {
            echo 'kosong';die();
        }
        $this->load->view('report/present',$data);
        $html = $this->load->view('report/present',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}