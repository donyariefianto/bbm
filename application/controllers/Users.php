<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Kendaraan_model");
		$this->load->model("Users_model");
    }
	public function index()
	{
		$divisi = $this->input->post('divisi');
		$data["data_UAcces"] = $this->Users_model->getByDiv($divisi);
		$sa =  ($this->session->userdata("div"));
		if ( $sa == 'DIREKSI') {
			$data["data_DivKend"] = $this->Kendaraan_model->getDiv();
		} else {
			$data["data_DivKend"] = $this->Kendaraan_model->getDivKhs($sa);
		}	
		$this->load->view('header');
		$this->load->view('Master/users/pengguna',$data);
		$this->load->view('footer');
	}
	public function drivers(){ 
		$data["data_driver"] = $this->Users_model->getDriver();
		$this->load->view('header');
		$this->load->view('Master/users/drivers',$data);
		$this->load->view('footer');
	}
	public function divisi(){
		$data["data_divisi"] = $this->Users_model->getDiv();
		$this->load->view('header');
		$this->load->view('Master/users/divisi',$data);
		$this->load->view('footer');
	}
	public function addDriver(){
		$Users = $this->Users_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($Users->rule());
		if ($validation->run()) {
            $Users->save();
            redirect("Users/drivers");
        }
		$data["data_nopol"] = $this->Users_model->getNopol();
		$this->load->view('header');
		$this->load->view('Master/users/addDriver',$data);
		$this->load->view('footer');
	}
	public function delete($nik){
		if (!isset($nik)) redirect('Users'); 
       $this->Users_model->delete($nik);
		  redirect("Users/drivers");
	}
	public function editDrv($nik=null){
		$Users = $this->Users_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($Users->rule());
		if ($validation->run()) {
            $Users->update($nik);
            redirect("Users/drivers");
        }
		$data["data_nopol"] = $Users->getNopol();
		$data["data_driv"] = $Users->getDriver();
		$this->load->view('header');
		$this->load->view('Master/users/editDrv',$data);
		$this->load->view('footer');
	}

}
