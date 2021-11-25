<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiSrvc extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Bbm_model");
        $this->load->model("BR_model");
        $this->load->model("Kendaraan_model");
        $this->load->model("TransaksiSrvc_model");
    }
    public function add(){
        $validation = $this->form_validation; 
        $validation->set_rules($this->TransaksiSrvc_model->rule());
        var_dump(date());die();
        $user = strtolower($this->session->userdata("nama"));
        $data = array(
            'no_sevice'=>$this->input->post('no'),
            'periode'=>$this->input->post('per'),
            'tgl'=> $this->input->post('tgl'),
            'divisi'=>$this->input->post('div'),
            'nopol'=>$this->input->post('nopol'),
            'ket'=>$this->input->post('keterangan'),
            'KM'=>$this->input->post('km'),
            'jenis_service'=>$this->input->post('service'),
            'insert_by'=>$user
        ); 
        var_dump($data);die();
      
        echo $nominal = $this->input->post('transaksi');
        echo $jnsbbm = $this->input->post('nama');
        
        echo $nopol = $this->input->post('keperluan');die();
        
		if ($validation->run()) {     
            echo 'ssss'; 
        //     $bbm->insrt($data);
        //     $data['sts'] = 3;
        //   redirect("BBM/PengajuanBbm");
        }
    }
    public function index(){
        $divisi = $this->input->post('divisi');
        $periode = $this->input->post('periode');
        $a= $this->TransaksiSrvc_model->cekkode($divisi,$periode);
        
            switch ($divisi) {
                case "AGROWISATA": $huruf = "SVAG-"; break;
                case "CIAMIS": $huruf = "SVCI-"; break;
                case "DIREKSI": $huruf = "SVDI-"; break;
                case "ESTATE": $huruf = "SVES-"; break;
                case "HOTEL": $huruf = "SVHO-"; break;
                case "IND": $huruf = "SVIN-"; break;
                case "SKE": $huruf = "SVSK-"; break;
                case "TRADING": $huruf = "SVTR-"; break;
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
        $status = $this->BR_model->status($divisi,$periode);
        // var_dump($status);die();
        if ($status == null) {
            $data["data_Srvs"] = $this->TransaksiSrvc_model->getServis('','');          
            $data['sts'] = 1;
        }else {
            foreach ($status as $keys);
            if ($keys->status_closing == 1) {
                $data["data_Srvs"] = $this->TransaksiSrvc_model->getServis('','');                 
                $data['sts'] = 2;
            }else {         
                $data["data_Srvs"] = $this->TransaksiSrvc_model->getServis($divisi,$periode);
                $data['sts'] = 0;
            }            
        }
        if ($divisi == "" && $periode =="") {
            $data['sts'] = 0;
        }
        $this->load->view('header');
		$this->load->view('Transaksi/service/inputService',$data);
		$this->load->view('footer');
    }
}