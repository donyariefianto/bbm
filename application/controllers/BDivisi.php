<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BDivisi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BDivisi_model");
        $this->load->model("Kendaraan_model");
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY
    }
    public function index(){
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        $this->load->view('header');
		$this->load->view('Laporan/breakDownDivisi/lapBbm',$data); 
        $this->load->view('footer');
    }
    public function lbs(){
        $divisi = $this->input->post('Divisi');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        if ($divisi == "SEMUA"){
            $data["total"] = $this->BDivisi_model->Tots($tgl1,$tgl2);
            $data["hsl"] = $this->BDivisi_model->getLaps($tgl1,$tgl2);
        }else {
            $data["hsl"] = $this->BDivisi_model->getLap($divisi,$tgl1,$tgl2);
            $data["total"] = $this->BDivisi_model->Tot($divisi,$tgl1,$tgl2);
        }
        // var_dump($data["total"]);die();
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'margin_right' => 30
        ]);
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;
        $data["divisi"] = $divisi;
        $this->load->view('report/lbs',$data);
        $html = $this->load->view('report/lbs',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function rbs(){
        $divisi = $this->input->post('dvs');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        if ($divisi == "SEMUA"){
            $data["total"] = $this->BDivisi_model->Tots($tgl1,$tgl2);
            $data["hsl"] = $this->BDivisi_model->getLaps($tgl1,$tgl2);
        }else {
            $data["total"] = $this->BDivisi_model->Tot($divisi,$tgl1,$tgl2);
            $data["hsl"] = $this->BDivisi_model->getLap($divisi,$tgl1,$tgl2);
        }
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-P',
        'margin_right' => 30
        ]);
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;
        $data["divisi"] = $divisi;
        $this->load->view('report/rbs',$data);
        $html = $this->load->view('report/rbs',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function sb(){
        $divisi = $this->input->post('dvs');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        if ($divisi == "SEMUA"){
            $data["hsl"] = $this->BDivisi_model->sumarybbm($tgl1,$tgl2);
            $data["total"] = $this->BDivisi_model->totals($tgl1,$tgl2);
        }else {
            $data["hsl"] = $this->BDivisi_model->sumarybbms($divisi,$tgl1,$tgl2);
            $data["total"] = $this->BDivisi_model->total($divisi,$tgl1,$tgl2);
        }
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-P'
        ]);
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;
        $data["divisi"] = $divisi;
        $this->load->view('report/sb',$data);
        $html = $this->load->view('report/sb',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}