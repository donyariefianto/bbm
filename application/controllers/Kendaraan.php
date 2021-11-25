<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Kendaraan_model");
    } 

	public function index()
	{
		$sa =  ($this->session->userdata("div"));
		// $sa = 'ind';
		// var_dump($sa);die();
		if ( $sa == 'DIREKSI') {
			$data["data_DivKend"] = $this->Kendaraan_model->getDiv();
		} else {
			$data["data_DivKend"] = $this->Kendaraan_model->getDivKhs($sa);
		}		
		$divisi = $this->input->post('divisi');	
		$data["data_kendaraan"] = $this->Kendaraan_model->getByDiv($divisi);		
		$this->load->view('header');
		$this->load->view('Master/kendaraan/index',$data);
		$this->load->view('footer');
	}

	public function add(){

		$Kendaraan = $this->Kendaraan_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($Kendaraan->rule());
		if ($validation->run()) {
            $Kendaraan->save();
            redirect("Kendaraan");
        }
		
		$data["data_DivKend"] = $this->Kendaraan_model->getDiv();
		$data["data_jenisBBM"] = $this->Kendaraan_model->getJensBbm();
		$this->load->view('header');
		$this->load->view('Master/kendaraan/add',$data);
		$this->load->view('footer');
		
	}
	function edit($K_inv=null){
		$Kendaraan = $this->Kendaraan_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($Kendaraan->rule());
		if ($validation->run()) {			
            $Kendaraan->update($K_inv);			
            redirect("Kendaraan");
        }	
		$data["data_DivKend"] = $this->Kendaraan_model->getDiv();
		$data["data_jenisBBM"] = $this->Kendaraan_model->getJensBbm();
		$this->load->view('header');
		$this->load->view('Master/kendaraan/edit',$data);
		$this->load->view('footer');
    }
	function delete($K_inv=null){
       if (!isset($K_inv)) redirect('Kendaraan'); 
       $this->Kendaraan_model->delete($K_inv);
		  redirect("Kendaraan");	 
    }
	
}


