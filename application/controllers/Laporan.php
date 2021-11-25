<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model("Kendaraan_model");
        $this->load->model("laporan_model");
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY 
	}
	public function index(){
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        $this->load->view('header');
		$this->load->view('Laporan/laporanBbm/lapBbm',$data); 
        $this->load->view('footer');
    }
    function cetak(){
        $divisi = $this->input->post('Divisi');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'margin_right' => 30
        ]);
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;
        $data["divisi"] = $divisi;
        $data["npl2"] = $this->laporan_model->detail($divisi,$tgl1,$tgl2);
        // var_dump( $data["npl2"] );die();
        $this->load->view('report/mpdf_v',$data);
        $html = $this->load->view('report/mpdf_v',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function cetakPeriode(){
        $divisi = $this->input->post('L1');
        $periode = $this->input->post('P1');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'margin_right' => 30
        ]);
        $data["periode"] = $periode;
        $data["divisi"] = $divisi;
        $data["npl"] = $this->laporan_model->periode($divisi,$periode);
        $this->load->view('report/cetakPriod',$data);
        $html = $this->load->view('report/cetakPriod',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function cetakRekap(){
        $divisi = $this->input->post('Divisi1');
        $tgl1 = $this->input->post('Tgl11');
        $tgl2 = $this->input->post('Tgl21');
        // var_dump($tgl2);die();
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-P'
        ]);
        $data["tgl1"] = $tgl1;
        $data["tgl2"] = $tgl2;
        $data["divisi"] = $divisi;
        $data["npl2"] = $this->laporan_model->detail($divisi,$tgl1,$tgl2);
        $data["total"] = $this->laporan_model->total($divisi,$tgl1,$tgl2);
        $this->load->view('report/rekap',$data);
        $html = $this->load->view('report/rekap',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

   
}
