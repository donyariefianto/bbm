<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterSrvc extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("MasterSrvc_model");
    }
	//// Menu Jenis BBM
	public function JenisBbm()
	{
		$data["data_jnsBbm"] = $this->MasterSrvc_model->getJnsBbm();
		$this->load->view('header');
		$this->load->view('Master/services/jenisBbm',$data);
		$this->load->view('footer');
	}
	public function addBbm(){
		$Users = $this->MasterSrvc_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($Users->ruleBbm());
		if ($validation->run()) {
            $Users->save();
            redirect("MasterSrvc/JenisBbm");
        }
		$this->load->view('header');
		$this->load->view('Master/services/addBbm');
		$this->load->view('footer');
	}
	public function editBbm($jenis=null){
		$JenisBBM = $this->MasterSrvc_model;
		$validation = $this->form_validation; 
        $validation->set_rules($JenisBBM->ruleBbm());
		if ($validation->run()) {
            $JenisBBM->update($jenis);
            redirect("MasterSrvc/JenisBbm");
        }
		$this->load->view('header');
		$this->load->view('Master/services/editBbm');
		$this->load->view('footer');
	}
	public function deleteBbm($jenis){
		if (!isset($jenis)) redirect('MasterSrvc/JenisBbm'); 		
       	$this->MasterSrvc_model->delete($jenis);
		  redirect("MasterSrvc/JenisBbm");
	}
	/////Menu Item Barang
	public function ItemBrg(){
		$data["data_Itm"] = $this->MasterSrvc_model->getItem();
		$this->load->view('header');
		$this->load->view('Master/services/itemBrg',$data);
		$this->load->view('footer');  

	}
	public function addItem(){
		$Users = $this->MasterSrvc_model; 
		$validation = $this->form_validation; 
        $validation->set_rules($Users->ruleItem());
		if ($validation->run()) {
            $Users->saveItem();
            redirect("MasterSrvc/ItemBrg");
        }
		$this->load->view('header');
		$this->load->view('Master/services/addItem');
		$this->load->view('footer');
	}
	public function editItem($oid=null){
		$JenisBBM = $this->MasterSrvc_model;
		$validation = $this->form_validation; 
        $validation->set_rules($JenisBBM->ruleItem());
		if ($validation->run()) {
            $JenisBBM->updateItem($oid);
            redirect("MasterSrvc/ItemBrg");
        }
		$this->load->view('header');
		$this->load->view('Master/services/editItem');
		$this->load->view('footer');
	}
	public function deleteItem($oid){
		if (!isset($oid)) redirect('MasterSrvc/JenisBbm'); 		
       	$this->MasterSrvc_model->deleteItem($oid);
		  redirect("MasterSrvc/ItemBrg");
	}
	///menu Jenis Service
	public function JenisSrvc(){
	//	$data["data_divisi"] = $this->MasterSrvc_model->getDiv();
		$this->load->view('header');
		$this->load->view('Master/services/jenisSrvc');
		$this->load->view('footer');
	}

}
