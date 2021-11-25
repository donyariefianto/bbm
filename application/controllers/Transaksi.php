<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->model("Transaksi_model");
        $this->load->model("Kendaraan_model");
        $this->load->model("BR_model");
        $this->load->model("Users_model");
        
    }
    public function KendKel(){
        $period = $this->input->post('periode');
        $divisi = $this->input->post('divisi');
        $a= $this->Transaksi_model->cekkode($divisi,$period);        
            switch ($divisi) {
                case "AGROWISATA": $huruf = "KAG"; break;
                case "CIAMIS": $huruf = "KCI"; break;
                case "DIREKSI": $huruf = "KDI"; break;
                case "ESTATE": $huruf = "KES"; break;
                case "HOTEL": $huruf = "KHO"; break;
                case "IND": $huruf = "KIN"; break;
                case "SKE": $huruf = "KSK"; break;
                case "TRADING": $huruf = "KTR"; break;
                default: $huruf= "DIVISI TIDAK BOLEH KOSONG";
            }
            $last = (int) substr($a,8);            
            $newId = $last + 1;
            $now = date("ym/");
            $kode = $huruf . $now. sprintf("%05s", $newId);
            // print_r($kode); die();
        $data["kode"] = $kode;
        $data["data_res"] = $this->Transaksi_model->getRes($divisi,$period);
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        
         $status = $this->BR_model->status($divisi,$period);
        // var_dump($status);die(); 
        if ($status == null) {
            $data["data_KelMsk"] = $this->Transaksi_model->getKelMsk('','');          
            $data['sts'] = 1;
        }else {
            foreach ($status as $keys);
            if ($keys->status_closing == 1) {
                $data["data_KelMsk"] = $this->Transaksi_model->getKelMsk('','');          
                $data['sts'] = 2;
            }else {            
                $data["data_KelMsk"] = $this->Transaksi_model->getKelMsk($divisi,$period);
                $data['sts'] = 0;
            }            
        }
        if ($divisi == "" && $period =="") {
            $data['sts'] = 0;
        }
        $this->load->view('header');
		$this->load->view('Transaksi/transaksi/KendaraanKeluar',$data);
		$this->load->view('footer');
    }
    public function KendMsk(){
        $divisi = $this->input->post('divisi');
        $periode = $this->input->post('periode');        
        $a= $this->BR_model->cekkode($divisi,$periode);        
            switch ($divisi) {
                case "AGROWISATA": $huruf = "Rsv-AG"; break;
                case "CIAMIS": $huruf = "Rsv-CI"; break;
                case "DIREKSI": $huruf = "Rsv-DI"; break;
                case "ESTATE": $huruf = "Rsv-ES"; break;
                case "HOTEL": $huruf = "Rsv-HO"; break;
                case "IND": $huruf = "Rsv-IN"; break;
                case "SKE": $huruf = "Rsv-SK"; break;
                case "TRADING": $huruf = "Rsv-TR"; break;
                default: $huruf= "DIVISI TIDAK BOLEH KOSONG";
            }
            $last = (int) substr($a,11);            
            $newId =$last + 1;
            $now = date("ym/");
            $kode = $huruf . $now. sprintf("%05s", $newId);
            // print_r($kode);die();
        $sa =  ($this->session->userdata("div"));
		if ( $sa == 'DIREKSI') {
			$data["data_DivKend"] = $this->Kendaraan_model->getDiv(); 
        } else {
            $data["data_DivKend"] = $this->Kendaraan_model->getDivKhs($sa);
        }
        $data["kode"] = $kode;
        $data["per"] = $periode;
        $data["div"] = $divisi;
        $data["data_department"] = $this->BR_model->dept($divisi);
        $data["data_nopol"] = $this->Users_model->getNopol();
        $status = $this->BR_model->status($divisi,$periode);
        // var_dump($status);die(); 
        if ($status == null) {
            $data["data_res"] = $this->Transaksi_model->inout('','');            
            $data['sts'] = 1;
        }else {
            foreach ($status as $keys);
            if ($keys->status_closing == 1) {
                $data["data_res"] = $this->Transaksi_model->inout('','');            
                $data['sts'] = 2;
            }else {            
                $data["data_res"] = $this->Transaksi_model->inout($divisi,$periode);
                $data['sts'] = 0;
            }            
        }
        if ($divisi == "" && $periode =="") {
            $data['sts'] = 0;
        }
        $this->load->view('header');
		$this->load->view('Transaksi/transaksi/KendaraanMasuk',$data);
		$this->load->view('footer');
    }
    public function in(){
        $kmmsk = $this->input->post('kmmsk');
        $kmno = $this->input->post('kmno');
        // var_dump($kmmsk);die(); bm
        $query = $this->Transaksi_model->masuk($kmmsk,$kmno);  
        if ($query)
            {
                    echo "Success!";die();
            }
            else
            {
                    echo "failed!";die();
            }
    }
    public function out(){
        $pemakai = $this->input->post('pemakai');
        $nopol = $this->input->post('nopol');
        $driver = $this->input->post('driver');
        $department = $this->input->post('department');
        $out = $this->input->post('out');
        $ket = $this->input->post('ket');
        $user = strtolower($this->session->userdata("nama"));
        $data = array(
            "kmno" => $this->input->post('no'),
            "kmrsv" => $this->input->post('rsv'),
            "kmstart" => $this->input->post('tglpakai'),
            "kmend" => $this->input->post('tglsd'),
            "kmkilometer" => $this->input->post('km'),           
            "kminputtgl" => $this->input->post('out'),
            "kmdeskripsi" => $this->input->post('ket'),
            "kmperiode" => $this->input->post('periode'),
            "kmdivisi" => $this->input->post('divisi'),
            "kmdriver" => $this->input->post('driver'),
            "kminputuser" => $user,
            "kmstatus" => 1
        );
        $query = $this->Transaksi_model->keluar($data);  
        if ($query)
            {
                    echo "Success!";die();
            }
            else
            {
                    echo "Query failed!";die();
            }
    }
}