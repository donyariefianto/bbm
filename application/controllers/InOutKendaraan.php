<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InOutKendaraan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Kendaraan_model");
        $this->load->model("IO_model");
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY 
	}
	public function index(){
        $divisi = $this->input->post('Divisi');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        $IO = $this->IO_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($IO->rule());
        if ($validation->run()) {
            error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
            $pdf = new FPDF('L', 'mm','a4');
            $pdf->AddPage(L);
            $pdf->SetFont('Arial','B',18);            
            $pdf->Cell(0,7,'Laporan Keluar Masuk Kendaraan',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(20,7,$divisi,0,1);
            $pdf->Cell(24,7,$tgl1,0,0);
            $pdf->Cell(8,7,'s.d',0,0);
            $pdf->Cell(24,7,$tgl2,0,1);
            
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(7,10,'No',1,0,'C');
            $pdf->Cell(20,10,'Nopol',1,0,'C');
            $pdf->Cell(30,10,'Driver',1,0,'C');
            $pdf->Cell(33,10,'No. Reservasi',1,0,'C');
            $pdf->Cell(27,10,'No. Keluar',1,0,'C');
            $pdf->Cell(38,10,'Waktu Keluar',1,0,'C');
            $pdf->Cell(15,10,'Km Out',1,0,'C');
            $pdf->Cell(38,10,'Waktu Masuk',1,0,'C');
            $pdf->Cell(13,10,'Km In',1,0,'C');
            $pdf->Cell(30,10,'Tujuan',1,0,'C');
            $pdf->Cell(30,10,'Keperluan',1,1,'C');
            
    
            $pdf->SetFont('Arial','',9);
            $kary = $IO ->getLap($divisi,$tgl1,$tgl2);
            $no=0;
            foreach ($kary as $data){
                $no++;
                $pdf->Cell(7,12,$no,1,0, 'C');
                $pdf->Cell(20,12,$data->rnopol,1,0,'L');
                $pdf->Cell(30,12,$data->dnama,1,0,'L');
                $pdf->Cell(33,12,$data->kmrsv,1,0,'L');
                $pdf->Cell(27,12,$data->kmno,1,0,'L');
                $pdf->Cell(38,12,$data->kmstart,1,0,'L');
                $pdf->Cell(15,12,$data->kmkilometer,1,0,'L');
                $pdf->Cell(38,12,$data->kmend,1,0,'L');
                $pdf->Cell(13,12,$data->kmmasukkm,1,0,'L');
                $pdf->Cell(30,12,$data->rtujuan,1,0,'C');
                $pdf->Cell(30,12,$data->rkeperluan,1,1,'L');
            }
            $pdf->Output();
        }
        // var_dump();die();

		$this->load->view('header');
        $this->load->view('Laporan/keluarMasuk/InOut',$data);
        $this->load->view('footer');
	}
}
