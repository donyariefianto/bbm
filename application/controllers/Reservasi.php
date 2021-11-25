<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Reservasi_model");
        $this->load->model("Kendaraan_model");
        $this->load->model("Users_model");
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY 
    }
    public function BYDiv()
	{
        $divisi = $this->input->post('Divisi');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        $Bydiv = $this->Reservasi_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($Bydiv->rule());
		if ($validation->run()) {
            error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
            $pdf = new FPDF('L', 'mm','Letter');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',18);
            $pdf->Cell(0,7,'Laporan Reservasi Per Divisi',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(20,7,$divisi,0,1);
            $pdf->Cell(24,7,$tgl1,0,0);
            $pdf->Cell(8,7,'s.d',0,0);
            $pdf->Cell(24,7,$tgl2,0,1);
            
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(6,5,'No',1,0,'C');
            $pdf->Cell(35,5,'No. reservasi',1,0,'C');
            $pdf->Cell(25,5,'Nopol',1,0,'C');
            $pdf->Cell(55,5,'Tujuan',1,0,'C');
            $pdf->Cell(70,5,'Keperluan',1,0,'C');
            $pdf->Cell(30,5,'Input By',1,0,'C');
            $pdf->Cell(40,5,'Driver',1,1,'C');
            
    
            $pdf->SetFont('Arial','',9);
            $kary = $Bydiv ->getLap($divisi,$tgl1,$tgl2);
            $no=0;
            foreach ($kary as $data){
                $no++;
                $pdf->Cell(6,7,$no,1,0, 'C');
                $pdf->Cell(35,7,$data->rno,1,0,'C');
                $pdf->Cell(25,7,$data->rnopol,1,0,'C');
                $pdf->Cell(55,7,$data->rtujuan,1,0,'C');
                $pdf->Cell(70,7,$data->rkeperluan,1,0,'C');
                $pdf->Cell(30,7,$data->rinputuser,1,0,'C');
                $pdf->Cell(40,7,$data->rpemakai,1,1,'C');
            }
            $pdf->Output();
        }
		$this->load->view('header');
		$this->load->view('Lihat Data/bydiv',$data);
		$this->load->view('footer');
	}
    
    public function BYDriv()
	{
        $driver = $this->input->post('Driver');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        $data["data_Driv"] = $this->Users_model->getDriver();
        $ByDriv = $this->Reservasi_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($ByDriv->ruleDriv());
        if ($validation->run()) {
            // var_dump($validation->run());
            // die();
            error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
            $pdf = new FPDF('L', 'mm','Letter');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',18);
            $pdf->Cell(0,7,'Laporan Reservasi Per Driver',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(20,7,$driver,0,1,'C');
            $pdf->Cell(24,7,$tgl1,0,0);
            $pdf->Cell(8,7,'s.d',0,0);
            $pdf->Cell(24,7,$tgl2,0,1);
            
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(6,5,'No',1,0,'C');
            $pdf->Cell(35,5,'No. reservasi',1,0,'C');
            $pdf->Cell(25,5,'Nopol',1,0,'C');
            $pdf->Cell(55,5,'Tujuan',1,0,'C');
            $pdf->Cell(70,5,'Keperluan',1,0,'C');
            $pdf->Cell(30,5,'Input By',1,0,'C');
            $pdf->Cell(40,5,'Driver',1,1,'C');
            
    
            $pdf->SetFont('Arial','',9);
            $kary = $ByDriv ->getLapDriv($driver,$tgl1,$tgl2);
            $no=0;
            foreach ($kary as $data){
                $no++;
                $pdf->Cell(6,7,$no,1,0, 'C');
                $pdf->Cell(35,7,$data->rno,1,0,'C');
                $pdf->Cell(25,7,$data->rnopol,1,0,'C');
                $pdf->Cell(55,7,$data->rtujuan,1,0,'C');
                $pdf->Cell(70,7,$data->rkeperluan,1,0,'C');
                $pdf->Cell(30,7,$data->rinputuser,1,0,'C');
                $pdf->Cell(40,7,$data->rpemakai,1,1,'C');
            }
            $pdf->Output();
        }
		$this->load->view('header');
		$this->load->view('Lihat Data/byDriv',$data);
		$this->load->view('footer');
	}
    public function BYNop()
	{
        $nopol = $this->input->post('Nopol');
        $tgl1 = $this->input->post('Tgl1');
        $tgl2 = $this->input->post('Tgl2');
        $data["data_Nop"] = $this->Kendaraan_model->getMob();
        $ByDriv = $this->Reservasi_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($ByDriv->ruleNop());
        if ($validation->run()) {
            // var_dump($validation->run());
            // die();
            error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
            $pdf = new FPDF('L', 'mm','Letter');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',18);
            $pdf->Cell(0,7,'Laporan Reservasi Per Driver',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(20,7,$nopol,0,1,'C');
            $pdf->Cell(24,7,$tgl1,0,0);
            $pdf->Cell(8,7,'s.d',0,0);
            $pdf->Cell(24,7,$tgl2,0,1);
            
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(6,5,'No',1,0,'C');
            $pdf->Cell(35,5,'No. reservasi',1,0,'C');
            $pdf->Cell(25,5,'Nopol',1,0,'C');
            $pdf->Cell(55,5,'Tujuan',1,0,'C');
            $pdf->Cell(70,5,'Keperluan',1,0,'C');
            $pdf->Cell(30,5,'Input By',1,0,'C');
            $pdf->Cell(40,5,'Driver',1,1,'C');
            
    
            $pdf->SetFont('Arial','',9);
            $kary = $ByDriv ->getLapNop($nopol,$tgl1,$tgl2);
            $no=0;
            foreach ($kary as $data){
                $no++;
                $pdf->Cell(6,7,$no,1,0, 'C');
                $pdf->Cell(35,7,$data->rno,1,0,'C');
                $pdf->Cell(25,7,$data->rnopol,1,0,'C');
                $pdf->Cell(55,7,$data->rtujuan,1,0,'C');
                $pdf->Cell(70,7,$data->rkeperluan,1,0,'C');
                $pdf->Cell(30,7,$data->rinputuser,1,0,'C');
                $pdf->Cell(40,7,$data->rpemakai,1,1,'C');
            }
            $pdf->Output();
        }
		$this->load->view('header');
		$this->load->view('Lihat Data/byNop',$data);
		$this->load->view('footer');
	}
    
}