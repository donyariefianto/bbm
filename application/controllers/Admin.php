<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->model("Kendaraan_model");
        $this->load->model("welcome_model");
        $this->load->model("Bbm_model");
        $this->load->model("MasterSrvc_model");
        $this->load->model("Users_model");
        $this->load->model("BR_model");
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY 
	}
    public function index(){
        $divisi = array('estate','hotel','direksi','trading');
		$data['divM'] = $this->welcome_model->isi();
		$data['est'] = $this->welcome_model->countDiv($divisi[0]);
		$data['hot'] = $this->welcome_model->countDiv($divisi[1]);
		$data['dir'] = $this->welcome_model->countDiv($divisi[2]);
		$data['tra'] = $this->welcome_model->countDiv($divisi[3]);
		$this->load->view('headeradmin');
		$this->load->view('main',$data);
		$this->load->view('footer');
    }
    public function laporan(){
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        $this->load->view('headeradmin');
		$this->load->view('Laporan/laporanBbm/lapBbm',$data); 
		$this->load->view('footer');
    }
    public function PengajuanBbm()
	{        
        $divisi = $this->input->post('divisi');
        $periode = $this->input->post('periode');
        $a= $this->Bbm_model->cekkode($divisi,$periode);
            switch ($divisi) {
                case "AGROWISATA": $huruf = "AG-"; break;
                case "CIAMIS": $huruf = "CI-"; break; 
                case "DIREKSI": $huruf = "DI-"; break;
                case "ESTATE": $huruf = "ES-"; break;
                case "HOTEL": $huruf = "HO-"; break;
                case "IND": $huruf = "IN-"; break;
                case "SKE": $huruf = "SK-"; break;
                case "TRADING": $huruf = "TR-"; break;
                default: $huruf= "DIVISI TIDAK BOLEH KOSONG";
            }

            $last = (int) substr($a,8);
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
        
        $data["data_DivKend"] = $this->Kendaraan_model->getDiv();
        $data["data_BBM"] = $this->MasterSrvc_model->getJnsBbm();
        $data["data_nopol"] = $this->Users_model->getNopol();
        $status = $this->BR_model->status($divisi,$periode);
        if ($status == null) {
            $data["data_Pbbm"] = $this->Bbm_model->getByDiv('','');
            // $data["data_res"] = $this->BR_model->getRes('','');            
            $data['sts'] = 1;
        }else {
            foreach ($status as $keys);
            if ($keys->status_closing == 1) {
                // $data["data_res"] = $this->BR_model->getRes('','');       
                $data["data_Pbbm"] = $this->Bbm_model->getByDiv('','');     
                $data['sts'] = 2;
            }else {            
                // $data["data_res"] = $this->BR_model->getRes($divisi,$periode);
                $data["data_Pbbm"] = $this->Bbm_model->getByDiv($divisi,$periode);
                $data['sts'] = 0;
            }            
        }
        // print_r($data["data_res"]);die();
        if ($divisi == "" && $periode =="") {
            $data['sts'] = 0;
        }
		$this->load->view('headeradmin');
		$this->load->view('Transaksi/bbm/pengajuan',$data);
		$this->load->view('footer');
	}
}