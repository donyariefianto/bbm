<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LaporanReservasi extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY 
    }
 
    function index()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm','a4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','B',20);
        $pdf->Cell(0,7,'Rekap Laporan Periode',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(90,6,'Nama',1,0,'C');
        $pdf->Cell(120,6,'Alamat',1,0,'C');
        $pdf->Cell(40,6,'Telp',1,1,'C');
 
        $pdf->SetFont('Arial','',10);
        $kary = $this->db->get('inventory_bbm')->result();
        $no=0;
        foreach ($kary as $data){
            // $no++;
            // $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(90,6,$data->rno,1,1);
        }
        $pdf->Output();
    }
}