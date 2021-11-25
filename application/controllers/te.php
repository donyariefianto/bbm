<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class te extends CI_Controller {
 
    public function index()
    {
        $mpdf = new \Mpdf\Mpdf([
        'margin_top' => 7,
        'margin_bottom' => 5,
        'margin_left' => 7,
        'margin_right' => 15
        ]);
        $html = $this->load->view('hasilPrint',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
 
}
