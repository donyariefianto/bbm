<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BBM extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Bbm_model");
        $this->load->model("BR_model");
        $this->load->model("Kendaraan_model");
        $this->load->model("MasterSrvc_model");
        $this->load->model("Users_model");
    }
    public function add() 
	{        
        $bbm = $this->Bbm_model; 
        $pengajuan = $this->input->post('pengajuan');
        $km = $this->input->post('km');
        $keperluan = $this->input->post('keperluan');
        $tujuan = $this->input->post('tujuan');
        $harga = $this->input->post('harga');
        $nominal = $this->input->post('nominal');
        $jnsbbm = $this->input->post('jenisbbm');
        $liter = $this->input->post('liter');
        $divisi = $this->input->post('Div');
        $driver = $this->input->post('nama');
        $nopol = $this->input->post('nopol');
        $periode = $this->input->post('Per');
        $kode = $this->input->post('no');
        $tgl = $this->input->post('tgl');
        $user = strtolower($this->session->userdata("nama"));
        $data = array(
            'nota' => $kode,
            'km'=>$km,
            'divisi'=>$divisi,
            'nama_driver' => $driver,
            'tanggal' => $tgl,
            'periode' => $periode,
            'pengajuan' => $pengajuan,
            'nopol' => $nopol,
            'jenis_bbm' => $jnsbbm,
            'liter' => $liter,
            'nominal' => $nominal,
            'hargaper_liter' => $harga,
            'Tujuan' => $tujuan,
            'Keperluan' => $keperluan,
            'keterangan' => $keperluan,
            'realisasi' =>0,
            'insert_by'=>$user       
        );
		$validation = $this->form_validation; 
        $validation->set_rules($bbm->rule());
		if ($validation->run()) {     
            $bbm->insrt($data);
            $data['sts'] = 3;
            redirect("BBM/PengajuanBbm");
        }
    }
    function cetak($K_nota=null){
        if (!isset($K_nota)) redirect('BBM/PengajuanBbm');
        $a = base64_decode ($K_nota);
        $hasil = $this->Bbm_model->gets($a);
        foreach ($hasil as $key) ;
        $data['key'] = $key;
        $tgl = $key->tanggal;
        $data['tgl'] = date(' d-M-Y', strtotime('+3 days', strtotime($tgl)));
        $mpdf = new \Mpdf\Mpdf([
        'margin_top' => 7,
        'margin_bottom' => 1,
        'margin_left' => 7,
        'margin_right' => 15
        ]);
        $this->load->view('report/nota',$data);
        $html = $this->load->view('report/nota',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function apr($K_nota=null){
       if (!isset($K_nota)) redirect('BBM/PengajuanBbm'); 
       $user = strtolower($this->session->userdata("nama"));
       $a = base64_decode ($K_nota);
       $this->Bbm_model->apr($a,$user);
		  redirect("BBM/PengajuanBbm");	 
    }
    function batal($K_nota=null){
       if (!isset($K_nota)) redirect('BBM/PengajuanBbm'); 
       $a= base64_decode ($K_nota);
       $this->Bbm_model->batal($a);
		  redirect("BBM/PengajuanBbm");
    }
    function realisasi($K_nota=null){
        if (!isset($K_nota)) redirect('BBM/PengajuanBbm'); 
        $bbm = $this->Bbm_model; 
        $realnominal = $this->input->post('nominal');
        $liter = $this->input->post('liter');
        $tgl = $this->input->post('tgl');      
        $user = strtolower($this->session->userdata("nama"));
        $a = base64_decode ($K_nota);
        $isi = array(
            'real_liter' => $liter,
            'real_nominals'=>$realnominal,
            'tanggal_realisasis'=>$tgl,
            'realisasi'=>1,
            'realisasi_by'=>$user       
        );
        $validation = $this->form_validation; 
        $validation->set_rules($bbm->rules());
		if ($validation->run()) {   
            $bbm->realisasi($isi,$a);            
            redirect("BBM/approvalBbm");
        }
        $this->load->view('header');
		$this->load->view('Transaksi/bbm/aprov');
		$this->load->view('footer');
    }
    function batalrealisasi($K_nota=null){
       if (!isset($K_nota)) redirect('BBM/PengajuanBbm'); 
       $a= base64_decode ($K_nota);
       $this->Bbm_model->batal($a);
		  redirect("BBM/PengajuanBbm");
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
		$this->load->view('header');
		$this->load->view('Transaksi/bbm/pengajuan',$data);
		$this->load->view('footer');
	}
    public function ApprovalBbm()    
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
            $data['sts'] = 1;
        }else {
            foreach ($status as $keys);
            if ($keys->status_closing == 1) {       
                $data["data_Pbbm"] = $this->Bbm_model->getByDiv('','');     
                $data['sts'] = 2;
            }else {            
                $data["data_Pbbm"] = $this->Bbm_model->getByDiv($divisi,$periode);
                $data['sts'] = 0;
            }            
        }
        if ($divisi == "" && $periode =="") {
            $data['sts'] = 0;
        }
		$this->load->view('header');
		$this->load->view('Transaksi/bbm/approve',$data);
		$this->load->view('footer');
	}
}
