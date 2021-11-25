<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Posting_model"); 
        $this->load->model("Kendaraan_model");        
    }
    public function index()
	{         
        $data['hasil'] = null;
        $divisi = $this->input->post('divisi');
        $periode = $this->input->post('periode');
        
        switch ($divisi) {
            case "AGROWISATA": $huruf = "-AG"; break;
            case "CIAMIS": $huruf = "-CI"; break;
            case "DIREKSI": $huruf = "-DI"; break;
            case "ESTATE": $huruf = "-ES"; break;
            case "HOTEL": $huruf = "-HO"; break;
            case "IND": $huruf = "-IN"; break;
            case "SKE": $huruf = "-SK"; break;
            case "TRADING": $huruf = "-TR"; break;
            default: $huruf= "";
        }
        $validation = $this->form_validation; 
        $validation->set_rules($this->Posting_model->rule());
                    
        if ($validation->run()) {
            $cekstatus = $this->Posting_model->cek($divisi);   
            if ($cekstatus == null) {
                $pos = $this->Posting_model->get($divisi);      
                    if ($pos == null) {
                        $bln = substr($periode,0,-5);
                        $th = substr($periode,3);                        
                        $id =  $bln + 1 . '/' . $th . $huruf;
                        $as = $bln + 1 . '/' . $th ;
                        $this->Posting_model->isi($id,$as,$divisi);                        
                    }
              $data['hasil'] = 1;
            }else{
                $cekstatus = $this->Posting_model->cek($divisi);
                foreach ($cekstatus as $keys);             
                // print_r($keys->periode);die();         
                if ($keys->status_closing == 0 && $keys->periode == $periode) {  
                    $pos = $this->Posting_model->get($divisi);
                    foreach ($pos as $key);
                    $pecah = explode("/",$key->id);
                    $th = substr($key->id,3,-3);
                    if ($pecah[0] == 12 ) {            
                        $id = '01/';
                        $t = $th + 1;
                        $kode = sprintf("%02s", $id) .$t. $huruf ;
                        $periodbaru = sprintf("%02s", $id) .  $t ;
                    } else {
                        $id = $pecah[0] + 1;
                        $kode = sprintf("%02s", $id) . "/". $th . $huruf ;
                        $periodbaru = sprintf("%02s", $id) . "/". $th ;
                    }    
                    $barupost = $this->Posting_model->insrt($kode,$periodbaru,$divisi);
                    $barupost2 = $this->Posting_model->update($key->id); 
                    $data['hasil'] = 1;
                }else {
                    $data['hasil'] = 2;                
                }   
            }   
        }       
        
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        $this->load->view('header');
		$this->load->view('Laporan/posting/post',$data);
		$this->load->view('footer');
    }
}