<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingReservasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BR_model');
        $this->load->model("Kendaraan_model");
        $this->load->model("Users_model");
	}
	public function index(){        
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
            $last = (int) substr($a,14);            
            $newId =$last + 1;
            $now = date("ym/");
            $kode = $huruf . $now. sprintf("%05s", $newId);
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
            $data["data_res"] = $this->BR_model->getRes('','');            
            $data['sts'] = 1;
        }else {
            foreach ($status as $keys);
            if ($keys->status_closing == 1) {
                $data["data_res"] = $this->BR_model->getRes('','');            
                $data['sts'] = 2;
            }else {            
                $data["data_res"] = $this->BR_model->getRes($divisi,$periode);
                $data['sts'] = 0;
            }            
        }
        if ($divisi == "" && $periode =="") {
            $data['sts'] = 0;
        }
        $this->load->view('header'); 
        $this->load->view('Transaksi/bookingReservasi/BR',$data);
        $this->load->view('footer');        
	}
    public function add()
	{ 
        $user = strtolower($this->session->userdata("nama"));
        $data = array(
            "rtglstart" => $this->input->post('tglAwl'),
            "rtglend" => $this->input->post('tglAkhr'),
            "rdivisi" => $this->input->post('Div'),
            "rdept" => $this->input->post('department'),
            "rpemakai" => $this->input->post('driv'),           
            "rkeperluan" => $this->input->post('keperluan'),
            "rnopol" => $this->input->post('nopol'),
            "rtujuan" => $this->input->post('tujuan'),
            "rno" => $this->input->post('No'),
            "rperiode" => $this->input->post('Per'),
            "rinputusers" => $user
        );
        $br = $this->BR_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($br->ruleadd());
		if ($validation->run()) {
            // print_r($data);die();
            $br->save($data);
        }else{
            redirect("bookingReservasi");
        }
    }
    function aprvl($rno=null){
        if (!isset($rno)) redirect('BookingReservasi/aprv'); 
        $br = $this->BR_model; 
        $driver = $this->input->post('driver');     
        $persetujuan = $this->input->post('persetujuan');     
        $user = strtolower($this->session->userdata("nama"));
        $a = base64_decode ($rno);        
        $isi = array(
            'rdriver' => $driver,
            'racc'=>$persetujuan,
            'raccuser'=>$user      
        );
        $data['driver'] = $br->driv();        
        $validation = $this->form_validation; 
        $validation->set_rules($br->rules());
		if ($validation->run()) {  
            // print_r($a);die(); 
            $br->updt($isi,$a);            
            redirect("bookingReservasi/aprv");
        }
        $this->load->view('header');
		$this->load->view('Transaksi/bookingReservasi/aprov',$data);
		$this->load->view('footer');
    }
    public function aprv()
	{ 
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
            $last = (int) substr($a,14);            
            $newId =$last + 1;
            $now = date("ym/");
            $kode = $huruf . $now. sprintf("%05s", $newId);
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
            $data["data_res"] = $this->BR_model->getRes('','');            
            $data['sts'] = 1;
        }else {
            foreach ($status as $keys);
            if ($keys->status_closing == 1) {
                $data["data_res"] = $this->BR_model->getRes('','');            
                $data['sts'] = 2;
            }else {            
                $data["data_res"] = $this->BR_model->getRes($divisi,$periode);
                $data['sts'] = 0;
            }            
        }
        if ($divisi == "" && $periode =="") {
            $data['sts'] = 0;
        }
        $this->load->view('header'); 
        $this->load->view('Transaksi/bookingReservasi/aprv',$data);
        $this->load->view('footer'); 
    }

}
